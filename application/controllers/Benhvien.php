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
        $this->_data['html_footer'] = $this->load->view('home/footer', $t_data, TRUE);
	}
	public function index()
	{
		$config['total_rows'] 	= $this->BenhVien_model->countAll();
        $config['base_url'] 	= base_url()."/benhvien/index";
        $config['per_page'] 	= 12;
        $config['next_link'] 	= "Sau";
  		$config['prev_link'] 	= "Trước";
  		$config['first_link'] 	= "Đầu";
  		$config['last_link'] 	= "Cuối";
  		$config['num_links'] 	= 5;
        $start=$this->uri->segment(3);
        $this->load->library('pagination', $config);
        $mdata['benhvien'] = $this->BenhVien_model->getBV($config['per_page'], $start);
        $mdata['phantrang'] =  $this->pagination->create_links();
		$mdata['noibat'] = $this->BenhVien_model->selectBVIndex();
		$data['bv']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/listBenhvien', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function benhVienById($id)
	{
		$mdata['benhvien']		= $this->BenhVien_model->selectBV();
		$mdata['benhvien1']		= $this->BenhVien_model->selectBV_by_Id($id);
		$array_User 		= unserialize($mdata['benhvien1']['userDanhgia']);
		$idUser 			= $this->session->userdata('user')['id'];
		if ($array_User) {
			if (isset($array_User['userDV']) || in_array($idUser, $array_User['userDV'])) {
				$mdata['danhgiaDV'] 	= 'active';
			}
			if (isset($array_User['userCM']) || in_array($idUser, $array_User['userCM'])) {
				$mdata['danhgiaCM'] 	= 'active';
			}
		}
	
		
		$ten = $mdata['benhvien1']['name'];
		$ten = to_slug($ten);
		$ten = str_replace( '-', '+', $ten );
		$flag = true;
		while ( $flag) {
			$map = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$ten&sensor=false");
			$map = json_decode($map,true);
			if(isset($map['results'][0])){
				$flag = false;
			}
		}
		

		
		$location = $map['results'][0]['geometry']['location'];
		
		$mdata['toado'] = $location;
		$mdata['gioithieu'] = json_decode($mdata['benhvien1']['article'],true)[0];

		$data['bv']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/pageBenhvien', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}

	public function danhgiaDichVu()
	{
		$adata['err']= '';
		$diem 				= $this->input->get('diem');
		$idBV 				= $this->input->get('idBV');
		$idUser 			= $this->session->userdata('user')['id'];
		$benhvien 			= $this->BenhVien_model->selectBV_by_Id($idBV);
		$data['diemDichVu'] = $benhvien['diemDichVu'] + $diem;
		$array_User 		= unserialize($benhvien['userDanhgia']);
		
		if (!$array_User) {
			$array_User 		= array('userDV' => array(), 'userCM' => array());
			$array_User['userDV'] 	 		= array($idUser);
			$data['userDanhgia']= serialize($array_User);
			$this->BenhVien_model->updateDiem($idBV,$data);
			$adata['err'] 	= '1';
		}else{
			$userDV				= $array_User['userDV'];
			if (empty($userDV)) {
				$array_User['userDV']	 = array($idUser);
				$data['userDanhgia']= serialize($array_User);
				$this->BenhVien_model->updateDiem($idBV,$data);
				$adata['err'] 	= '1';
			}else{
				if (in_array($idUser, $userDV)) {
					$adata['err'] 	= '0';
				}else{
					array_push($userDV, $idUser);
					$data['userDanhgia']= serialize($array_User);
					$this->BenhVien_model->updateDiem($idBV,$data);
					$adata['err'] 	= '1';
				}
			}
			
		}
		// var_dump($array_User);		
		echo json_encode($adata);
	}
	public function danhgiaChuyenMon()
	{
		$adata['err']= '';
		$diem 				= $this->input->get('diem');
		$idBV 				= $this->input->get('idBV');
		$idUser 			= $this->session->userdata('user')['id'];
		$benhvien 			= $this->BenhVien_model->selectBV_by_Id($idBV);
		$data['diemChuyenMon'] = $benhvien['diemChuyenMon'] + $diem;
		$array_User 		= unserialize($benhvien['userDanhgia']);
		
		if (!$array_User) {
			$array_User 		= array('userDV' => array(), 'userCM' => array());
			$array_User['userCM'] 	 	= array($idUser);
			$data['userDanhgia']= serialize($array_User);
			$this->BenhVien_model->updateDiem($idBV,$data);
			$adata['err'] 	= '1';
		}else{
			$userCM				= $array_User['userCM'];
			if (empty($userCM)) {
				$array_User['userCM']	 = array($idUser);
				$data['userDanhgia']= serialize($array_User);
				$this->BenhVien_model->updateDiem($idBV,$data);
				$adata['err'] 	= '1';
			}else{
				if (in_array($idUser, $userCM)) {
					$adata['err'] 	= '0';
				}else{
					array_push($userCM, $idUser);
					$data['userDanhgia']= serialize($array_User);
					$this->BenhVien_model->updateDiem($idBV,$data);
					$adata['err'] 	= '1';
				}
			}
			
		}
		// var_dump($array_User);		
		echo json_encode($adata);
	}
}
