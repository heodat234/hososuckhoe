<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hoso extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation','session'));
		$this->_data['html_header'] 	= $this->load->view('hoso/header', NULL, TRUE);  
		$this->_data['html_menu']		= $this->load->view('hoso/menu', NULL, TRUE);  
        $this->_data['html_footer'] 	= $this->load->view('hoso/footer', NULL, TRUE);
	}
	public function index()
	{
		// $this->_data['page']		= 'account';
        $this->_data['html_body'] = $this->load->view('hoso/welcome', NULL, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}
	public function medNowVisit()
	{
		// $this->_data['page']		= 'account';
        $this->_data['html_body'] = $this->load->view('hoso/mednow_visit', NULL, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}
	public function center()
	{
		// $this->_data['page']		= 'account';
        $this->_data['html_body'] = $this->load->view('hoso/message_center', NULL, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}
	
}
