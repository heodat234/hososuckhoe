<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thuoc extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','my_helper','text'));
		$this->load->model(array('Thuoc_model','News_model'));
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
		$config['total_rows'] 	= $this->Thuoc_model->countAll();
        $config['base_url'] 	= base_url()."/thuoc/index";
        $config['per_page'] 	= 8;
        $config['next_link'] 	= "Trước";
  		$config['prev_link'] 	= "Sau";
  		$config['num_links'] 	= 5;
        $start 					=$this->uri->segment(3);
        $this->load->library('pagination', $config);
        $mdata['benhvien'] 		= $this->Thuoc_model->getThuoc($config['per_page'], $start);
        $mdata['phantrang'] 	=  $this->pagination->create_links();
		$mdata['loai_thuoc'] 	= $this->Thuoc_model->selectLoaiThuoc();

		$data['thuoc']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/thuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function thuocByIdLoai($idLoai)
	{

		$config['total_rows'] 	= $this->Thuoc_model->countIdLoai($idLoai);
        $config['base_url'] 	= base_url()."/thuoc/thuocByIdLoai";
        $config['per_page'] 	= 8;
        $config['next_link'] 	= "Trước";
  		$config['prev_link'] 	= "Sau";
  		$config['num_links'] 	= 5;
        $start 					=$this->uri->segment(3);
        $this->load->library('pagination', $config);
        $mdata['benhvien'] 		= $this->Thuoc_model->getThuocByIdLoai($idLoai,$config['per_page'], $start);
        $mdata['phantrang'] 	=  $this->pagination->create_links();
		$mdata['loai_thuoc'] 	= $this->Thuoc_model->selectLoaiThuoc();

		$data['thuoc']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/thuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function thuocById($id)
	{
		$mdata['thuoc']		= $this->Thuoc_model->selectThuoc_by_Id($id);
		
		$data['thuoc']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/pageThuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}

	// public function tintucAdmin()
	// {
	// 	$this->a_Data['news']		= $this->News_model->selectTintuc();
	// 	$mdata['pageHoso']		= 'active';
	// 	$adata['tintuc']		= 'active';
	// 	$data['html_header'] 	= $this->load->view('hoso/header', $mdata, TRUE);  
 //        $data['html_footer'] 	= $this->load->view('hoso/footer', NULL, TRUE);
 //        $data['html_menu']		= $this->load->view('hoso/menu', $adata, TRUE);  
 //        $data['html_body'] 	= $this->load->view('hoso/newsAdmin', $this->a_Data, TRUE);
 //        return $this->load->view('hoso/account', $data);
	// }

	// public function themTintuc()
	// {
	// 	$frm = $this->input->post();
	// 	$image = '';
 //        if (!empty($_FILES['image']['name'])) {
            
 //             $this->upload->initialize($this->set_upload_options());
 //            // echo($this->upload->do_upload());
 //            if ($this->upload->do_upload('image')) {
 //                $uploadData = $this->upload->data();
 //                $image = $uploadData['file_name'];
 //                echo($image);
 //            } else{
 //                $image = '';
 //            }
 //        }else{
 //            $image = '';
 //        }
       
	// 	$new  = array(
	// 		'title' 		=> $frm['title'],
	// 		'description'  	=> $frm['desc'],
	// 		'content'  		=> $frm['content'],
	// 		'image'  		=> $image,
	// 	);
	// 	$this->News_model->insertTintuc($new);
	// 	redirect(base_url('tintucAdmin.html'));
	// }

	// public function suaTintuc()
	// {
	// 	$frm = $this->input->post();
	// 	$image = '';
 //        if (!empty($_FILES['file']['name'])) {
            
 //            $this->upload->initialize($this->set_upload_options());
 //            echo('sdfsdfs');
 //            if ($this->upload->do_upload('file')) {
 //                $uploadData = $this->upload->data();
 //                $image = $uploadData['file_name'];
 //            } else{
 //                $image = '';
 //            }
 //        }else{
 //            $image = '';
 //        }
       	
	// 	$new  = array(
	// 		'id' 			=> $frm['id'],
	// 		'title' 		=> $frm['title'],
	// 		'description'  	=> $frm['desc'],
	// 		'content'  		=> $frm['content'],
	// 		'image'  		=> $image,
	// 	);
	// 	$this->News_model->updateTintuc($new);
	// 	redirect(base_url('tintucAdmin.html'));
	// }

	// public function xoaTintuc()
	// {
	// 	$id 		= $this->input->post('id');
	// 	$tin		= $this->News_model->selectTintuc_by_Id($id);
	// 	$image 		= $tin['image'];


	// 	$this->News_model->deleteTintuc($id);
	// 	unlink('./images/tintuc/'.$image);

	// 	$csrf = array(
 //        'name' => $this->security->get_csrf_token_name(),
 //        'hash' => $this->security->get_csrf_hash()
	// 	);
	// 	$mData['csrf'] = $csrf;
	// 	echo(json_encode($mData));
	// }
	// private function set_upload_options()
	// {   

		
	//     //upload an image options
	//     $config = array();
	//     $config['upload_path'] 		= './images/tintuc/';
	//     $config['allowed_types'] 	= '*';
	//     $config['max_size']      	= '0';
	//     $config['overwrite']     	= FALSE;

	//     return $config;
	// }
}
