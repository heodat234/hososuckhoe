<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benh extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','my_helper','text'));
		$this->load->model(array('Benh_model','News_model'));
		$this->load->library(array('form_validation','session','upload'));
		
        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$this->a_Data['csrf'] = $csrf;
		$t_data['ykhoa']		= $this->News_model->selectTintucYkhoa();
		$t_data['noibo']		= $this->News_model->selectTintucNoibo();
        $this->_data['html_footer'] = $this->load->view('home/footer', $t_data, TRUE);
	}
	public function index()
	{
        $mdata['benhs'] 		= $this->Benh_model->selectBenh();
		$mdata['loai_benh'] 	= $this->Benh_model->selectLoaiBenh();
		$data['benh']			= 'active';
		$this->_data['title']      = "Tìm hiểu về các bệnh thường gặp - Hồ sơ sức khỏe";
		$this->_data['description']	= "Tìm hiểu bệnh là gì, triệu chứng, nguyên nhân mắc bệnh, cách chữa trị và phòng ngừa... bài viết do các bác sĩ chuyên khoa biên soạn.";
		$this->_data['keywords']	= "các bệnh thường gặp, triệu chứng bệnh, nguyên nhân mắc bệnh, điều trị bệnh, phòng ngừa bệnh";
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/listBenh', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function benhByIdLoai()
	{
		$l_data['mdata'] ='';
		$idLoai = $this->input->get('id');
		$tenNhom = $this->Benh_model->getTenLoai($idLoai);
		$tenNhom = $tenNhom['name'];
        $benhs		= $this->Benh_model->getBenhByIdLoai($idLoai);
        $l_data['mdata'].='<div class="col-md-12 col-sm-12 loadBenh">';
        $l_data['mdata'].= '<div style="margin-left: 15px;"><h4>Các bệnh thuộc nhóm bệnh '.$tenNhom.'</h4></div><ul>';
        foreach ($benhs as $benh) {
        	$l_data['mdata'].= '<div class="col-md-3 col-sx-6 ds-benh"><li><a href="'.base_url().'benh/'.$benh['id'].'-'.to_slug($benh['name']).'.html'.'"><h5>'.$benh['name'].'</h5></a></li></div>';
        }
        $l_data['mdata'].= '</ul></div>';
        print_r( json_encode($l_data['mdata']));
        
	}
	public function benhById($id,$ten)
	{
		$mdata['benh']		= $this->Benh_model->selectBenh_by_Id($id);
		$id_type 			= $mdata['benh']['id_type'];
		$mdata['tuongtu']	= $this->Benh_model->selectBenh_by_IdType($id_type);
		$desc 		= json_decode($mdata['benh']['article'],true);
		$mdata['desc'] = $desc[0];
		$data['benh']			= 'active';
		$this->_data['title']      = $mdata['benh']['name']." - Hồ sơ sức khỏe";
		$this->_data['description']	= trim($mdata['benh']['short_desc']);
		$this->_data['keywords']	= $mdata['benh']['keywords'];
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/chitietbenh', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}

	
}
