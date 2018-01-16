<?php //defined('BASEPATH') OR exit('No direct script access allowed');

class Crawl extends CI_Controller {

	public function __construct(){
		parent::__construct();
		stream_context_set_default( [
		    'ssl' => [
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		    ],
		]);
		$this->load->helper(array('url','security','text'));
		$this->load->library(array('form_validation','session','upload'));
		$this->load->model(array('Hoso_model','ChitietHoso_model','Muc_Chiso_model','Login_model'));

		$adata['pageHoso']		= 'active';
		$this->_data['html_header'] 	= $this->load->view('hoso/header', $adata, TRUE);  
        $this->_data['html_footer'] 	= $this->load->view('hoso/footer', NULL, TRUE);

        $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$this->a_Data['csrf'] = $csrf;
	}

	public function index(){
		$this->data['crawl']		= 'active';
		$this->_data['html_menu']		= $this->load->view('hoso/menu', $this->data, TRUE);  
        $this->_data['html_body'] = $this->load->view('hoso/v_crawl', $this->a_Data, TRUE);
        return $this->load->view('hoso/account',$this->_data);
	}

	public function crawl_domain_category(){
		$site_url = $this->input->post('name_domain');
		$keywords['xpath'] = 'nav/a';
		$keywords['xpath_inner'] = 'nav/a/h3';
		if (substr($site_url, 0, 4) != 'http') {
			$data['error'] = "Link bạn nhập không hợp lệ.";
		}else{
			$site_data = $this->get_site_a_href($site_url, $keywords);
			$data['category'] = [];
			if(empty($site_data)){
				$data['error'] = "Không tìm thấy dữ liệu.";
			}else{
				foreach ($site_data['links'] as $key => $value) {
					if (substr($value, 0, 1) == '/') {
						$data['category'][$key]['href'] = $site_url.$value;
						$data['category'][$key]['name'] = $site_data['contents'][$key];
					}
				}
			}
		}
		echo json_encode($data);
	}

	public function crawl_domain_category_detail(){
		$site_url = $this->input->post('name_domain');
		$arr_expl = explode('/', trim($site_url));
		switch ($arr_expl[3]) {
			case 'thuoc':
				$keywords['xpath'] = 'ul/li/a';
				$keywords['xpath_inner'] = 'ul/li/a/h3';
				break;
			case 'benh': 
				$keywords['xpath'] = 'div[@class="illgroup"]/a|div[@class="illlist"]/a';
				$keywords['xpath_inner'] = 'div[@class="illgroup"]/a|div[@class="illlist"]/a';
				break;
			default:
				$keywords['xpath'] = '';
				$keywords['xpath_inner'] = '';
				break;
		}
		
		if (substr($site_url, 0, 4) != 'http') {
			$data['error'] = "Link bạn nhập không hợp lệ.";
		}else{
			$site_data = $this->get_site_a_href($site_url, $keywords);
			$data['category'] = [];
			if(empty($site_data['links'])){
				$data['error'] = "Không tìm thấy dữ liệu.";
			}else{
				foreach ($site_data['links'] as $key => $value) {
					if (substr($value, 0, 1) == '/') {
						$data['category'][$key]['href'] = $site_url.$value;
						$data['category'][$key]['name'] = $site_data['contents'][$key];
					}
				}
			}
		}
		echo json_encode($data);
	}

	function save_crawl(){
		$frm = $this->input->post();
		$record['category'] = '2';
		$record['title'] = $frm['title'];
		$record['image'] = $frm['image'];
		$record['description'] = $frm['description'];
		$record['content'] = $frm['content'];
		if($this->M_table->add_data_row('project',$record)){
			$data['success'] = "success";
		}else{
			$data['error'] = "error";
		}
		echo json_encode($data);
	}

	private function get_site_data($site_url, $max_depth = 1, $current_depth = 0, $keywords){
		$current_depth++;
		$this->load->library(array('crawler'));
		$site_data = array();

		if($this->crawler->set_url($site_url) !== false){
			// $site_data['html'] = $this->crawler->get_html();
			$site_data['title'] = $this->crawler->get_title();
			$site_data['description'] = $this->crawler->get_description();
			// $site_data['keywords'] = $this->crawler->get_keywords();
			// $site_data['text'] = $this->crawler->get_text();
			$site_data['image'] = $this->crawler->get_images();
			// $site_data['content'] = $this->crawler->get_contents_by_class($keywords['class']);
			$site_data['links'] = $this->crawler->get_links();
			$site_data['link'] = $this->crawler->get_links_by_class($keywords['xpath']);

			if($current_depth <= $max_depth){
				foreach($site_data['links'] as $link_key => &$link){
					$link['data'] = $this->get_site_data($link, $max_depth, $current_depth);
				}
			}

			return $site_data;
		}
		else{
			return false;
		}
	}
	private function get_site_a_href($site_url, $keywords){
		$this->load->library(array('crawler'));
		$site_data = array();

		if($this->crawler->set_url($site_url) !== false){
			$site_data['links'] = $this->crawler->get_links_by_xpath($keywords['xpath']);
			$site_data['contents'] = $this->crawler->get_contents_by_xpath($keywords['xpath_inner']);
			return $site_data;
		}
		else{
			return false;
		}
	}
}