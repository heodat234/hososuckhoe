<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benhvien extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','my_helper','text'));
		$this->load->model(array('BenhVien_model','News_model'));
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
		$mdata['benhvien']		= $this->BenhVien_model->selectBV();
		$mdata['benhvien1']		= $mdata['benhvien'][0];
		$ten = $mdata['benhvien1']['ten'];
		$ten = to_slug($ten);
		$ten = str_replace( '-', '+', $ten );
		$map = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$ten&sensor=false");
		$map = json_decode($map,true);
		$location = $map['results'][0]['geometry']['location'];
		$mdata['toado'] = $location;
		$data['bv']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        // $this->_data['html_footer'] = $this->load->view('home/footer', NULL, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/pageBenhvien', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function benhVienById($id)
	{
		$mdata['benhvien']		= $this->BenhVien_model->selectBV();
		$mdata['benhvien1']		= $this->BenhVien_model->selectBV_by_Id($id);
		
		$ten = $mdata['benhvien1']['ten'];
		$ten = to_slug($ten);
		$ten = str_replace( '-', '+', $ten );
		$map = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$ten&sensor=false");
		$map = json_decode($map,true);
		$location = $map['results'][0]['geometry']['location'];
		$mdata['toado'] = $location;

		$data['bv']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        // $this->_data['html_footer'] = $this->load->view('home/footer', NULL, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/pageBenhvien', $mdata, TRUE);
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
