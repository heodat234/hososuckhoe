<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('News_model','BenhVien_model'));
		$this->load->library(array('form_validation','session'));

		
		$t_data['ykhoa']		= $this->News_model->selectTintucYkhoa();
		$t_data['noibo']		= $this->News_model->selectTintucNoibo();
        $this->_data['html_footer'] = $this->load->view('home/footer', $t_data, TRUE);
	}
	public function index()
	{
		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$mdata['csrf'] = $csrf;

		$data['trangchu']		= 'active';
		$mdata['tintuc']		= $this->News_model->selectTintucIndex();
		$mdata['benhvien']		= $this->BenhVien_model->selectBVIndex();
		// var_dump($mdata['benhvien']);
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

	public function loadData()
    {
       // $keyword = $this->input->get('keyword');
    	$url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $params);
		// print_r($params['keyword']);
       $results = array();
       $data = $this->BenhVien_model->search_data($params['keyword']);
       
       if (!empty($data)) {
            foreach ($data as $da)
            {
                $results[] = $da['ten'];
            }
            echo json_encode($results);
       }
    }

   	public function pageSearch()
   	{
   		$this->_data['html_header'] = $this->load->view('home/header', NULL, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/pageSearch', NULL, TRUE);
        return $this->load->view('home/master', $this->_data);
   	}
	
}
