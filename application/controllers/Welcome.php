<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation','session'));
		$this->_data['html_header'] = $this->load->view('home/header', NULL, TRUE);  
        $this->_data['html_footer'] = $this->load->view('home/footer', NULL, TRUE);
	}
	public function index()
	{
		$this->_data['page']		= 'index';
        $this->_data['html_body'] = $this->load->view('home/index', NULL, TRUE);
        // $this->_data['html_slider'] = $this->load->view('home/slider', NULL, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	
	
}
