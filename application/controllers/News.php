<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','my_helper','text'));
		$this->load->model(array('News_model'));
		$this->load->library(array('form_validation','session','upload'));
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$this->a_Data['csrf'] = $csrf;
	}
	public function index()
	{
        $config['total_rows'] = $this->News_model->countAll();
        $config['base_url'] = base_url()."tintuc/page";
        $config['per_page'] = 4;
        $config['next_link'] = "Sau";
  		$config['prev_link'] = "Trước";
  		$config['first_link'] 	= "Đầu";
  		$config['last_link'] 	= "Cuối";
  		$config['num_links'] = 5;
  		$config['use_page_numbers'] = TRUE;
        $start=$this->uri->segment(3);
        // var_dump($start);
        $this->load->library('pagination', $config);
        $mdata['category'] = $this->News_model->getNews($config['per_page'], $start);
        $mdata['phantrang'] =  $this->pagination->create_links();
		$mdata['noibat'] = $this->News_model->selectTintucNoiBat();
		$data['new']			= 'active';
		$this->_data['title']      = "Tổng hợp các tin tức mới liên quan đến sức khỏe";
		$this->_data['description']	= "Xem và nghe lại file video, audio toạ đàm về các bệnh thường gặp";
		$this->_data['keywords']	= "Hội thảo bệnh, tuyền truyền phòng chống bệnh, radio bác sĩ gia đình, toạ đàm bệnh, bác sĩ nói về bệnh";
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $t_data['ykhoa']		= $this->News_model->selectTintucYkhoa();
        $this->_data['html_footer'] = $this->load->view('home/footer', $t_data, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/listNews', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}

	public function tinTucById($id)
	{
		$mdata['category']		= $this->News_model->selectTintuc();
		$mdata['tintuc']		= $this->News_model->selectTintuc_by_Id($id);
		$mdata['content']       = json_decode($mdata['tintuc']['article'],true);
		$desc= trim(str_replace('"', "'", $mdata['tintuc']['short_desc']));
		if (isset(json_decode($mdata['tintuc']['image'],true)[0]['data-original'])) {
			$this->_data['meta']  	= '
			<meta property="og:url"content="http://hososuckhoe.org/tintuc/'.$view = $mdata['tintuc']['id'].'-'.to_slug($mdata['tintuc']['title']).'.html" />
	  		<meta property="og:type"          content="website" />
		  	<meta property="og:title"         content="'.$view = $mdata['tintuc']['title'].'" />
		  	<meta property="og:description"   content= "'.$view = $desc.'" />
		  	<meta property="og:image"         content="'.json_decode($mdata['tintuc']['image'],true)[0]['data-original'].'" />';
	  	}else {
	  		$this->_data['meta']  	= '
	  		<meta property="og:url"content="http://hososuckhoe.org/tintuc/'.$view = $mdata['tintuc']['id'].'-'.to_slug($mdata['tintuc']['title']).'.html" />
	  		<meta property="og:type"          content="website" />
		  	<meta property="og:title"         content="'.$view = $mdata['tintuc']['title'].'" />
		  	<meta property="og:description"   content="'.$view = $desc.'" />
		  	<meta property="og:image"         content="'.json_decode($mdata['tintuc']['image'],true)[0]['src'].'" />';
	  	}
	  	
		$view = $mdata['tintuc']['view'] + 1;
		$dk = array('id' =>$id , 'view'=>$view );
		$this->News_model->updateView($dk);
		$data['new']			= 'active';
		$this->_data['title']      = $mdata['tintuc']['title']." - Hồ sơ sức khỏe";
		$this->_data['description']	= $desc;
		$this->_data['keywords']	= $mdata['tintuc']['keywords'];
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE); 
        $t_data['ykhoa']		= $this->News_model->selectTintucYkhoa();
        $this->_data['html_footer'] = $this->load->view('home/footer', $t_data, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/news', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}

	public function tintucAdmin()
	{
		$this->a_Data['news']		= $this->News_model->selectTintuc();
		$mdata['pageHoso']		= 'active';
		$adata['tintuc']		= 'active';
		$data['html_header'] 	= $this->load->view('hoso/header', $mdata, TRUE);  
        $data['html_footer'] 	= $this->load->view('hoso/footer', NULL, TRUE);
        $data['html_menu']		= $this->load->view('hoso/menu', $adata, TRUE);  
        $data['html_body'] 	= $this->load->view('hoso/newsAdmin', $this->a_Data, TRUE);
        return $this->load->view('hoso/account', $data);
	}

	public function themTintuc()
	{
		$frm = $this->input->post();
		$image = '';
        if (!empty($_FILES['image']['name'])) {
            
             $this->upload->initialize($this->set_upload_options());
            // echo($this->upload->do_upload());
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
                echo($image);
            } else{
                $image = '';
            }
        }else{
            $image = '';
        }
       
		$new  = array(
			'title' 		=> $frm['title'],
			'description'  	=> $frm['desc'],
			'content'  		=> $frm['content'],
			'image'  		=> $image,
		);
		$this->News_model->insertTintuc($new);
		redirect(base_url('tintucAdmin.html'));
	}

	public function suaTintuc()
	{
		$frm = $this->input->post();
		$image = '';
        if (!empty($_FILES['file']['name'])) {
            
            $this->upload->initialize($this->set_upload_options());
            echo('sdfsdfs');
            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
            } else{
                $image = '';
            }
        }else{
            $image = '';
        }
       	
		$new  = array(
			'id' 			=> $frm['id'],
			'title' 		=> $frm['title'],
			'description'  	=> $frm['desc'],
			'content'  		=> $frm['content'],
			'image'  		=> $image,
		);
		$this->News_model->updateTintuc($new);
		redirect(base_url('tintucAdmin.html'));
	}

	public function xoaTintuc()
	{
		$id 		= $this->input->post('id');
		$tin		= $this->News_model->selectTintuc_by_Id($id);
		$image 		= $tin['image'];


		$this->News_model->deleteTintuc($id);
		unlink('./images/tintuc/'.$image);

		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$mData['csrf'] = $csrf;
		echo(json_encode($mData));
	}
	private function set_upload_options()
	{   

		
	    //upload an image options
	    $config = array();
	    $config['upload_path'] 		= './images/tintuc/';
	    $config['allowed_types'] 	= '*';
	    $config['max_size']      	= '0';
	    $config['overwrite']     	= FALSE;

	    return $config;
	}
}
