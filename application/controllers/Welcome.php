<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','text'));
		$this->load->model(array('News_model','BenhVien_model','Bacsi_model','Thuoc_model'));
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
   		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$adata['csrf'] = $csrf;


   		$key 			= $this->input->post('search');

   		if ($key == '') {
   			$adata['benhvien'] = '';
   			$adata['thuocs'] = '';
   			$adata['bacsi'] = '';
   			$adata['tintuc'] = '';
   		}else{
	   		$adata['benhvien'] 	= $this->BenhVien_model->search_data($key);
	   		$adata['thuocs'] 	= $this->Thuoc_model->search_data($key);
	   		$adata['bacsi'] 	= $this->Bacsi_model->search_data($key);
	   		$adata['tintuc'] 	= $this->News_model->search_data($key);
	   	}
   		$this->_data['html_header'] = $this->load->view('home/header', NULL, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/pageSearch', $adata, TRUE);
        return $this->load->view('home/master', $this->_data);
   	}

   	public function pageSearchChitiet()
   	{
   		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$adata['csrf'] = $csrf;


   		$key 			= $this->input->post('search');
   		$check_thuoc 	= $this->input->post('check_thuoc');
   		$check_bv 		= $this->input->post('check_bv');
   		$check_bs 		= $this->input->post('check_bs');
   		$check_tin 		= $this->input->post('check_tin');

   		
   		if ($key == '') {
   			$adata['benhvien'] = '';
   			$adata['thuocs'] = '';
   			$adata['bacsi'] = '';
   			$adata['tintuc'] = '';
   		}else{
   			if (isset($check_thuoc) && $check_thuoc == 'check1') {
   				$adata['thuocs'] 		= $this->Thuoc_model->search_data($key);
   			}else{
   				$adata['hideThuoc']  	= 'hide';
   			}
   			if (isset($check_bv) && $check_bv == 'check2') {
   				$adata['benhvien'] 		= $this->BenhVien_model->search_data($key);
   			}else{
   				$adata['hideBv']  		= 'hide';
   			}
   			if (isset($check_bs) && $check_bs == 'check3') {
   				$adata['bacsi'] 		= $this->Bacsi_model->search_data($key);
   			}else{
   				$adata['hideBs']  		= 'hide';
   			}
   			if (isset($check_tin) && $check_tin == 'check4') {
   				$adata['tintuc'] 		= $this->News_model->search_data($key);
   			}else{
   				$adata['hideTin']  		= 'hide';
   			}
	   	
	   	}
   		$this->_data['html_header'] = $this->load->view('home/header', NULL, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/pageSearch', $adata, TRUE);
        return $this->load->view('home/master', $this->_data);
   	}
	
}
