<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','text','my_helper'));
		$this->load->model(array('News_model','BenhVien_model','Bacsi_model','Thuoc_model','Login_model','Contact_model'));
		$this->load->library(array('form_validation','session'));

		
		$t_data['ykhoa']		= $this->News_model->selectTintucYkhoa();
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
    $this->_data['description']   = "Bệnh án điện tử, thông tin sức khỏe, bác sĩ, bệnh viện, thuốc chữa bệnh, thuốc giá tốt , rẻ nhất , uy tín ,mua bán thuốc trực tuyến";
    $this->_data['keywords']   = "giá thuốc, bệnh án, điều trị bệnh, bác sĩ, bệnh viện uy tín";
    $this->_data['title']      = "Hồ sơ sức khỏe trực tuyến | Mua bán thuốc giá tốt giao hàng tận nhà";
		$mdata['tintuc']		= $this->News_model->selectTintucIndex();
		$mdata['benhvien']		= $this->BenhVien_model->selectBVIndex();
		// var_dump($mdata['benhvien']);
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);
        $this->_data['html_body'] = $this->load->view('home/index', $mdata, TRUE);
        // $this->_data['html_slider'] = $this->load->view('home/slider', NULL, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	
	public function contact()
	{
		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
    );
    $mdata['csrf'] = $csrf;
		$this->_data['html_header'] = $this->load->view('home/header', null, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/contact', $mdata, TRUE);
        // $this->_data['html_slider'] = $this->load->view('home/slider', NULL, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
  public function insertContact()
  {
    $frm = $this->input->post();
    if (!$this->session->has_userdata('user')) {
      $c_data['name'] = $frm['name'];
      $c_data['email'] = $frm['email'];
    }else{
      $user = $this->Login_model->selectUserById($this->session->userdata('user')['id']);
      $c_data['name'] = $user['name'];
      $c_data['email'] = $user['email'];
    }
    $c_data['subject'] = $frm['subject'];
    $c_data['content'] = $frm['content'];
    $this->Contact_model->insertContact($c_data);
    redirect(base_url());
  }

	public function loadData()
    {
    	$url = parse_url($_SERVER['REQUEST_URI']);
		  parse_str($url['query'], $params);
		// print_r($params['keyword']);
      $results = array();
      $data['0']      = $this->BenhVien_model->search_data($params['keyword']);
      $data['1']     = $this->Thuoc_model->search_data($params['keyword']);
      $data['2']     = $this->Bacsi_model->search_data($params['keyword']);
      $data['3']     = $this->News_model->search_data($params['keyword']);
       
          for ($i=0; $i < 2; $i++) { 
            if (!empty($data[$i])) {
              foreach ($data[$i] as $da)
              {
                if (isset($da['name'])) {
                  $results[] = $da['name'];
                }
                if (isset($da['title'])) {
                  $results[] = $da['title'];
                }
              }
            }
          }
            
            echo json_encode($results);
       
    }

   	public function pageSearch()
   	{
   		

   		$key 			= $this->input->get('search');

   		if ($key == '') {
   			$adata['benhvien'] = '';
   			$adata['thuocs'] = '';
   			$adata['bacsi'] = '';
   			$adata['tintuc'] = '';
        $adata['count'] =0;
   		}else{
	   		$adata['benhvien'] 	= $this->BenhVien_model->search_data($key);
	   		$adata['thuocs'] 	= $this->Thuoc_model->search_data($key);
	   		$adata['bacsi'] 	= $this->Bacsi_model->search_data($key);
	   		$adata['tintuc'] 	= $this->News_model->search_data($key);
        $adata['count'] = count($adata['benhvien']) + count($adata['thuocs'])+ count($adata['bacsi'])+ count($adata['tintuc']);
	   	}
      
      $adata['key'] = $key;

   		$this->_data['html_header'] = $this->load->view('home/header', NULL, TRUE);
        $this->_data['html_body'] 	= $this->load->view('page/pageSearch', $adata, TRUE);
        return $this->load->view('home/master', $this->_data);
   	}

   	public function pageSearchChitiet()
   	{
   		$adata['benhvien'] = '';
      $adata['thuocs'] = '';
      $adata['bacsi'] = '';
      $adata['tintuc'] = '';
      $adata['count'] = 0;

   		$key 			= $this->input->get('search');
   		$check_thuoc 	= $this->input->get('check_thuoc');
   		$check_bv 		= $this->input->get('check_bv');
   		$check_bs 		= $this->input->get('check_bs');
   		$check_tin 		= $this->input->get('check_tin');
      // var_dump($check_tin);
   		
   		if ($key == '') {
   			$adata['benhvien'] = '';
   			$adata['thuocs'] = '';
   			$adata['bacsi'] = '';
   			$adata['tintuc'] = '';
        $adata['count'] = 0;
   		}else{
   			if (isset($check_thuoc) && $check_thuoc == 'check1') {
   				$adata['thuocs'] 		= $this->Thuoc_model->search_data($key);
          $adata['count'] += count($adata['thuocs']);
   			}else{
   				$adata['hideThuoc']  	= 'hide';
   			}
   			if (isset($check_bv) && $check_bv == 'check2') {
   				$adata['benhvien'] 		= $this->BenhVien_model->search_data($key);
          $adata['count'] += count($adata['benhvien']) ;
   			}else{
   				$adata['hideBv']  		= 'hide';
   			}
   			if (isset($check_bs) && $check_bs == 'check3') {
   				$adata['bacsi'] 		= $this->Bacsi_model->search_data($key);
          $adata['count'] += count($adata['bacsi']);
   			}else{
   				$adata['hideBs']  		= 'hide';
   			}
   			if (isset($check_tin) && $check_tin == 'check4') {
   				$adata['tintuc'] 		= $this->News_model->search_data($key);
          $adata['count'] += count($adata['tintuc']);
   			}else{
   				$adata['hideTin']  		= 'hide';
   			}
        if ($check_thuoc==null && $check_bv==null && $check_bs==null && $check_tin==null) {
            $adata['thuocs']    = $this->Thuoc_model->search_data($key);
            $adata['benhvien']    = $this->BenhVien_model->search_data($key);
            $adata['bacsi']     = $this->Bacsi_model->search_data($key);
            $adata['tintuc']    = $this->News_model->search_data($key);
            $adata['hideTin'] = $adata['hideThuoc'] = $adata['hideBv'] = $adata['hideBs']  = '';
            $adata['count'] = count($adata['benhvien']) + count($adata['thuocs'])+ count($adata['bacsi'])+ count($adata['tintuc']);
        }
         
	   	}
      $adata['key'] = $key;
   		$this->_data['html_header'] = $this->load->view('home/header', NULL, TRUE);
      $this->_data['html_body'] 	= $this->load->view('page/pageSearch', $adata, TRUE);
      return $this->load->view('home/master', $this->_data);
   	}
	
}
