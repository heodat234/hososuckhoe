<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('News_model'));
		$this->load->library(array('form_validation','session'));
		  
        $this->_data['html_footer'] = $this->load->view('home/footer', NULL, TRUE);
	}
	public function index()
	{
		$data['trangchu']		= 'active';
		$mdata['tintuc']		= $this->News_model->selectTintucIndex();
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);
        $this->_data['html_body'] = $this->load->view('home/index', $mdata, TRUE);
        // $this->_data['html_slider'] = $this->load->view('home/slider', NULL, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	
	public function thanhvien()
	{
		$data['thanhvien']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/thanhvien', NULL, TRUE);
        // $this->_data['html_slider'] = $this->load->view('home/slider', NULL, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	
}
