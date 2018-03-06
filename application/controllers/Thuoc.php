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
        $config['base_url'] 	= base_url()."/thuoc/page";
        $config['per_page'] 	= 16;
        $config['next_link'] 	= "Sau";
  		$config['prev_link'] 	= "Trước";
  		$config['first_link'] 	= "Đầu";
  		$config['last_link'] 	= "Cuối";
  		$config['num_links'] 	= 5;
  		$config['use_page_numbers'] = TRUE;
        $start 					= $this->uri->segment(3);
        $this->load->library('pagination', $config);
        $mdata['thuocs'] 		= $this->Thuoc_model->getThuoc($config['per_page'], $start);

        $mdata['phantrang'] 	=  $this->pagination->create_links();
		$mdata['loai_thuoc'] 	= $this->Thuoc_model->selectLoaiThuoc();

		$data['thuoc']			= 'active';
		$this->_data['title']      = "Thuốc tây, thuốc bắc, thực phẩm chức năng tại hososuckhoe.org";
		$this->_data['description']	= "Tham khảo thông tin, giá cả, nơi bán và công dụng, cách dùng, chống chỉ định, tác dụng phụ, lưu ý khi sử dụng... của thuốc tây, thuốc bắc, thực phẩm chức năng...";
		$this->_data['keywords']	= "Thuốc tây, thuốc bắc, thuốc đông y, thực phẩm chức năng";
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/listThuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function thuocByIdLoai($idLoai,$slug)
	{

		$config['total_rows'] 	= $this->Thuoc_model->countIdLoai($idLoai);
        $config['base_url'] 	= base_url()."thuoc/".$idLoai."-".$slug."/page";
        $config['per_page'] 	= 16;
        $config['next_link'] 	= "Sau";
  		$config['prev_link'] 	= "Trước";
  		$config['first_link'] 	= "Đầu";
  		$config['last_link'] 	= "Cuối";
  		$config['num_links'] 	= 5;
  		$config['use_page_numbers'] = TRUE;
        $start 					= $this->uri->segment(4);
        $this->load->library('pagination', $config);
        $mdata['thuocs'] 		= $this->Thuoc_model->getThuocByIdLoai($idLoai,$config['per_page'], $start);
        // var_dump($mdata['thuocs'][0]['name_type']);
        $mdata['phantrang'] 	=  $this->pagination->create_links();
		$mdata['loai_thuoc'] 	= $this->Thuoc_model->selectLoaiThuoc();
		$mdata['id_Loai']		= $idLoai;

		$data['thuoc']			= 'active';
		$this->_data['title']      = $mdata['thuocs'][0]['name_type']." - Hồ sơ sức khỏe";
		$this->_data['description']	= "Hồ sơ sức khỏe - ".$mdata['thuocs'][0]['name_type'];
		$this->_data['keywords']	= $mdata['thuocs'][0]['name_type'];
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/listThuoc', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function thuocById($id)
	{
		
		$mdata['thuoc']		= $this->Thuoc_model->selectThuoc_by_Id($id);
		if ($mdata['thuoc'] == NUll) {
			redirect(base_url(''));
		}
		$id_type 			= $mdata['thuoc']['id_type'];
		$mdata['tuongtu']	= $this->Thuoc_model->selectThuoc_by_IdType($id_type);
		$anh		= json_decode($mdata['thuoc']['image'],true);
		$mdata['anh'] = array();
		$desc = nv_get_plaintext($mdata['thuoc']['short_desc']);
		foreach ($anh as $row) {
			if (isset($row['src'])) {
				array_push($mdata['anh'], $row['src']);
			}else if (isset($row['data-src'])) {
				array_push($mdata['anh'], $row['data-src']);
			}
		}
		$this->_data['meta']  	= 
		'<meta property="og:url"			content="http://hososuckhoe.org/thuoc/'.$view = $mdata['thuoc']['id'].'-'.to_slug($mdata['thuoc']['name']).'.html" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="'.$mdata['thuoc']['name'].'" />
	<meta property="og:description"   content="'.$desc.'" />
	<meta property="og:image"         content="'.$mdata['anh'][0].'" />';
		$mdata['content']			= json_decode($mdata['thuoc']['article'],true);
		$data['thuoc']			= 'active';
		$this->_data['title']      = "Thuốc ".$mdata['thuoc']['name']." | Mua thuốc online , giá thuốc trực tuyến";		
		$this->_data['description']	= trim($desc);
		$this->_data['keywords']	= $mdata['thuoc']['keywords'];
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
