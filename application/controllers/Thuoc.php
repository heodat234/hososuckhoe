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
        $this->_data['html_footer'] = $this->load->view('home/footer', $t_data, TRUE);
	}
	public function index()
	{
		$config['total_rows'] 	= $this->Thuoc_model->countAll();
        $config['base_url'] 	= base_url()."/thuoc/index";
        $config['per_page'] 	= 16;
        $config['next_link'] 	= "Sau";
  		$config['prev_link'] 	= "Trước";
  		$config['first_link'] 	= "Đầu";
  		$config['last_link'] 	= "Cuối";
  		$config['num_links'] 	= 5;
        $start 					= $this->uri->segment(3);
        $this->load->library('pagination', $config);
        $mdata['thuocs'] 		= $this->Thuoc_model->getThuoc($config['per_page'], $start);

        $mdata['phantrang'] 	=  $this->pagination->create_links();
		$mdata['loai_thuoc'] 	= $this->Thuoc_model->selectLoaiThuoc();

		$data['thuoc']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/listThuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function thuocByIdLoai($idLoai)
	{

		$config['total_rows'] 	= $this->Thuoc_model->countIdLoai($idLoai);
        $config['base_url'] 	= base_url()."/thuoc/thuocByIdLoai/".$idLoai."/";
        $config['per_page'] 	= 16;
        $config['next_link'] 	= "Sau";
  		$config['prev_link'] 	= "Trước";
  		$config['first_link'] 	= "Đầu";
  		$config['last_link'] 	= "Cuối";
  		$config['num_links'] 	= 5;
        $start 					=$this->uri->segment(4);
        $this->load->library('pagination', $config);
        $mdata['thuocs'] 		= $this->Thuoc_model->getThuocByIdLoai($idLoai,$config['per_page'], $start);
        $mdata['phantrang'] 	=  $this->pagination->create_links();
		$mdata['loai_thuoc'] 	= $this->Thuoc_model->selectLoaiThuoc();
		$mdata['id_Loai']		= $idLoai;

		$data['thuoc']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/listThuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function thuocById($id)
	{
		$mdata['thuoc']		= $this->Thuoc_model->selectThuoc_by_Id($id);
		$id_type 			= $mdata['thuoc']['id_type'];
		$mdata['tuongtu']	= $this->Thuoc_model->selectThuoc_by_IdType($id_type);

		$mdata['anh'] 		= json_decode($mdata['thuoc']['image'],true);
		$content 			= json_decode($mdata['thuoc']['article'],true);
		$mdata['content']	= $content;
		$data['thuoc']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/pageThuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}

	
	public function thongTinThuocById($id)
	{
		$mdata['thuoc']		= $this->Thuoc_model->selectThongTinThuoc_by_Id($id);
		$mdata['tuongtu']	= $this->Thuoc_model->selectThuocLimit();

		$mdata['anh'] 		= json_decode($mdata['thuoc']['image'],true);
		$content 			= json_decode($mdata['thuoc']['article'],true);
		$mdata['content']	= $content;
		$data['thuoc']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/chitietThuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	
}
