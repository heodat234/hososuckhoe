<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hoso extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','security'));
		$this->load->library(array('form_validation','session','upload'));
		$this->load->model(array('Hoso_model','ChitietHoso_model','Muc_Chiso_model'));

		$adata['pageHoso']		= 'active';
		$this->_data['html_header'] 	= $this->load->view('hoso/header', $adata, TRUE);  
        $this->_data['html_footer'] 	= $this->load->view('hoso/footer', NULL, TRUE);

        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$this->a_Data['csrf'] = $csrf;
	}
	public function index()
	{
		$this->data['welcome']		= 'active';
		$this->_data['html_menu']		= $this->load->view('hoso/menu', $this->data, TRUE);  
        $this->_data['html_body'] = $this->load->view('hoso/welcome', $this->a_Data, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}
	public function pageHoso()
	{
		$this->data['a']		= 'active';
		$this->a_Data['hoso'] = $this->Hoso_model->selectHoso();
		$this->_data['html_menu']		= $this->load->view('hoso/menu', $this->data, TRUE); 
        $this->_data['html_body'] = $this->load->view('hoso/pageHoso', $this->a_Data, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}
	public function formChiso($id)
	{
		$this->a_Data['id_hoso'] 		= $id;
		$this->data['a']				= 'active';
		$this->a_Data['chiso'] 			= $this->Muc_Chiso_model->selectChiso();
		$this->_data['html_menu']		= $this->load->view('hoso/menu', $this->data, TRUE); 
        $this->_data['html_body'] 		= $this->load->view('hoso/form_chiso', $this->a_Data, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}
	public function center()
	{
		$this->data['b']				= 'active';
		$this->_data['html_menu']		= $this->load->view('hoso/menu', $this->data, TRUE); 
        $this->_data['html_body'] 		= $this->load->view('hoso/message_center', NULL, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}
	
	public function addHoso()
	{
		$frm = $this->input->post();
		$hoso['id_user'] 			= $this->session->userdata('user')['id'];
		$hoso['ten'] 				= $frm['name'];
		$hoso['loai'] 				= $frm['loai'];
		$hoso['ngay_batdau'] 		= $frm['from'];
		$hoso['ngay_ketthuc'] 		= $frm['end'];
		$this->Hoso_model->insertHoso( $hoso );

		redirect(base_url('hoso.html'));
	}

	public function addFile()
    {
    	$id 		= $this->input->post('id');

	    $dataInfo 	= array();
	    $data 		= array();
	    $files 		= $_FILES;
	    $cpt 		= count($_FILES['userfile']['name']);
	    
	    for($i=0; $i<$cpt; $i++){           
	        $_FILES['userfile']['name']		= $files['userfile']['name'][$i];
	        $_FILES['userfile']['type']		= $files['userfile']['type'][$i];
	        $_FILES['userfile']['tmp_name']	= $files['userfile']['tmp_name'][$i];
	        $_FILES['userfile']['error']	= $files['userfile']['error'][$i];
	        $_FILES['userfile']['size']		= $files['userfile']['size'][$i];    
	        $this->upload->initialize($this->set_upload_options());
	        if ($this->upload->do_upload()) {
	        	$dataInfo[] = $this->upload->data();
	        } else{
				$error = $this->upload->display_errors();
        		echo $error;
			}
	    }
	    
	    for ($i=0; $i < $cpt; $i++) { 
	    	$_data['dulieu'] 		= $dataInfo[$i]['file_name'];
    		$_data['id_hoso'] 		= $id;
    		$_data['ten_data'] 		= 'file';
    		$_data['loai'] 			= '0';
	    	$this->ChitietHoso_model->insertChitiet_Hoso($_data);				
	    }

	    redirect(base_url('hoso.html'));

    }
    private function set_upload_options()
	{   

		
	    //upload an image options
	    $config = array();
	    $config['upload_path'] 		= './images/hoso/';
	    $config['allowed_types'] 	= '*';
	    $config['max_size']      	= '0';
	    $config['overwrite']     	= FALSE;

	    return $config;
	}



	public function loadImage()
	{
		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$mData['csrf'] = $csrf;


		$id_hoso 		= $this->input->post('id_hoso');
		
		$active = $this->input->post('active');
		if ($active == 0) {
			$dk  	= array('loai' => 0, 'id_hoso' => $id_hoso,'active'=>$active );
		}else{
			$dk  	= array('loai' => 0, 'id_hoso' => $id_hoso );
		}
		$mData['image'] = $this->ChitietHoso_model->selectFile($dk);
		print_r(json_encode($mData));
	}

	public function addChiSo()
	{
		$frm 				= $this->input->post();
		$mang 				= json_decode($frm['count'],true);

		$chiso 				= $this->Muc_Chiso_model->selectChiso();
		$data 				= array();
		$data['loai'] 		= 1;
		$data['id_hoso'] 	= $frm['id_hoso']; 
		$data['active'] 	= 1;

		for ($i=1; $i < count($mang); $i++) { 
			if ($mang[$i] == 1) {
				$data['dulieu'] = $frm[$i];
				for ($j=0; $j < count($chiso) ; $j++) { 
					if ($chiso[$j]['id'] == $i) {
						$data['ten_data'] 	= $chiso[$j]['ten_chiso'];
						$data['don_vi'] 	= $chiso[$j]['don_vi'];
					}
				}
				$this->ChitietHoso_model->insertChitiet_Hoso($data);
			}
		}
		redirect(base_url('hoso.html'));
	}


	public function pageChiSo()
	{
		$id_hoso = $this->input->post('id_hoso');
		$dk = array('loai' => 1, 'id_hoso' => $id_hoso );
		$this->data['a']				= 'active';
		$this->a_Data['chiso'] 			= $this->ChitietHoso_model->selectChiSo($dk);
		$this->_data['html_menu']		= $this->load->view('hoso/menu', $this->data, TRUE); 
        $this->_data['html_body'] 		= $this->load->view('hoso/pageChiSo', $this->a_Data, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}

	public function pageAdmin()
	{
		$this->data['a']			= 'active';
		$this->a_Data['thongbao'] 	= $this->ChitietHoso_model->selectFileActive();
		// var_dump($this->a_Data['hoso']);
		$this->_data['html_menu']	= $this->load->view('hoso/menu', $this->data, TRUE); 
        $this->_data['html_body'] 	= $this->load->view('hoso/pageAdmin', $this->a_Data, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}
	public function loadThongbao()
	{
		$noti 		= $this->ChitietHoso_model->selectFileActive();
		print_r( json_encode($noti));
	}

	public function activeFile()
	{
		$frm = $this->input->post();
		$dk  	= array('loai' => 0, 'id_hoso' => $frm['id_hoso'] );
		$noti 		= $this->ChitietHoso_model->selectFile($dk);
		// var_dump($noti);
		foreach ($noti as $no) {
			if ( isset($frm[$no['id']]) && $frm[$no['id']] == 'on' ) {
				// echo('234234');
				$dk = array('id' => $no['id'], 'active' => 1 );
				$this->ChitietHoso_model->activeAnh($dk);
			}
		}
		redirect(base_url('admin.html'));
	}
}
