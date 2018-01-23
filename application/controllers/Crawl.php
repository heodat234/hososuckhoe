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
		$this->load->model(array('Hoso_model','ChitietHoso_model','Muc_Chiso_model','Login_model','M_data'));

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
		$site_domain = $arr_expl[0].'//'.$arr_expl[2];
		$data = [];
		switch ($arr_expl[3]) {
			case 'thuoc':
				$keywords['xpath'] = 'ul/li/a';
				$keywords['xpath_inner'] = 'ul/li/a/h3';
				$data = $this->crawl_level_2($site_domain, $site_url, $keywords);
				break;
			case 'benh': 
				$keywords['xpath'] = 'div[@class="illgroup"]/a';
				$keywords['xpath_inner'] = 'div[@class="illgroup"]/a';
				$data = $this->crawl_level_2($site_domain, $site_url, $keywords);
				break;
			case 'bac-si': 
				$keywords['xpath'] = '/html/body/section[2]/ul[2]/li/a';
				$keywords['xpath_inner'] = '/html/body/section[2]/ul[2]/li/a/div/h3';
				$keywords['code'] = 'bac-si';
				$keywords['xpath_script'] = 'script';
				$keywords['xpath_viewmore'] = 'a[@class="viewmore"]';
				$keywords['extra_link'] = '/aj/Doctor/BoxDoctor';
				$newkeywords['xpath_viewmore'] = 'a[@class="viewmore"]';
				$newkeywords['xpath'] = 'ul/li/a';
				$newkeywords['xpath_inner'] = 'ul/li/a/div[2]/h3';
				$data = $this->crawl_level_3($site_domain, $site_url, $keywords,$newkeywords);
				break;
			case 'benh-vien': 
				$keywords['xpath'] = '/html/body/section[2]/ul[2]/li/a';
				$keywords['xpath_inner'] = '/html/body/section[2]/ul[2]/li/a/div[2]/h3';
				$keywords['code'] = 'benh-vien';
				$keywords['xpath_script'] = 'script';
				$keywords['xpath_viewmore'] = 'a[@class="viewmore"]';
				$keywords['extra_link'] = '/aj/Hospital/BoxHospital';
				$newkeywords['xpath_viewmore'] = 'a[@class="viewmore"]';
				$newkeywords['xpath'] = 'ul/li/a';
				$newkeywords['xpath_inner'] = 'ul/li/a/div[2]/h3';
				$data = $this->crawl_level_3($site_domain, $site_url, $keywords,$newkeywords);
				break;
			case 'hoi-thao': 
				$keywords['xpath'] = '/html/body/section[2]/div[1]/ul/li/a';
				$keywords['xpath_inner'] = '/html/body/section[2]/div[1]/ul/li/a/h3';
				$keywords['code'] = 'hoi-thao';
				$data = $this->crawl_level_3($site_domain, $site_url, $keywords,[]);
				break;
			case 'hoa-my-pham': 
				$keywords['xpath'] = '//*[@id="product"]/ul/li/a';
				$keywords['xpath_inner'] = '//*[@id="product"]/ul/li/a/h3';
				$keywords['extra_link'] = '/aj/Category/Products';
				$keywords['code'] = 'hoa-my-pham';
				$data = $this->crawl_level_3($site_domain, $site_url, $keywords,[]);
				break;
			case 'phuong-phap-chua-benh-moi': 
				$keywords['xpath'] = '//*[@id="newscate"]/div[1]/ul/li/a';
				$keywords['xpath_inner'] = '//*[@id="newscate"]/div[1]/ul/li/a/h3';
				$keywords['code'] = 'phuong-phap-chua-benh-moi';
				$data = $this->crawl_level_3($site_domain, $site_url, $keywords,[]);
				break;
			case 'nha-thuoc': 
				$keywords['xpath'] = '/html/body/section[2]/div[2]/ul/li/h3/a';
				$keywords['xpath_inner'] = '/html/body/section[2]/div[2]/ul/li/h3/a';
				$keywords['code'] = 'nha-thuoc';
				$data = $this->crawl_level_3($site_domain, $site_url, $keywords,[]);
				break;
			default:
				$keywords['xpath'] = '';
				$keywords['xpath_inner'] = '';
				break;
		}
		echo json_encode($data);
	}

	public function crawl_domain_category_content(){
		$site_url = $this->input->post('name_domain');
		$arr_expl = explode('/', trim($site_url));
		$site_domain = $arr_expl[0].'//'.$arr_expl[2];
		$data = [];
		switch ($arr_expl[3]) {
			case 'benh':
				$keywords['xpath'] = '/html/body/section[2]/div[1]/a';
				$keywords['xpath_inner'] = '/html/body/section[2]/div[1]/a';
				$keywords['code'] = 'benh';
				$data = $this->crawl_level_3($site_domain,$site_url,$keywords,[]);
				break;
			default:
				$keywords['xpath'] = 'div/ul/li/a';
				$keywords['xpath_inner'] = 'div/ul/li/a/h3';
				$keywords['xpath_script'] = 'script';
				$keywords['xpath_viewmore'] = 'a[@class="viewmore"]';
				$keywords['extra_link'] = '/aj/Category/Products';
				$keywords['code'] = 'thuoc';
				$newkeywords['xpath'] = 'div/ul/li/a';
				$newkeywords['xpath_inner'] = 'div/ul/li/a/h3';
				$data = $this->crawl_level_3($site_domain,$site_url,$keywords,$newkeywords);
				break;
		}
		
		echo json_encode($data);
	}

	function save_crawl_link_result(){
		$frm = $this->input->post();
		$type = $frm['name_category'];
		$code = $frm['code'];
		unset($frm['name_category'],$frm['code']);
		switch ($code) {
			case 'thuoc':
				$data = $this->save_drug($type,$frm);
				break;
			case 'bac-si':
				$data = $this->save_doctor($frm);
				break;
			case 'benh':
				$data = $this->save_sick($type,$frm);
				break;
			case 'benh-vien':
				$data = $this->save_hospital($frm);
				break;
			case 'phuong-phap-chua-benh-moi':
				$data = $this->save_news($frm);
				break;
			default:
				$data['error'] = "Dữ liệu trang này đang được cập nhật.";
				break;
		}
		
		echo json_encode($data);
	}

	private function save_drug($type,$frm){
		$count = 0;
		$crawl_data = [];
		$data = [];
		$id_type = $this->M_data->insert(array('name'=>$type),'loai_thuoc');
		if ($id_type) {
		$xpath['title'] = 'h1[@class="pagtilte"]';
		$xpath['article'] = 'article';
		$xpath['image'] = 'a[@class="item"]/img';
		$xpath['price'] = 'div[@class="price"]/strong';
		$xpath['unit'] = 'div[@class="price"]/span';
		$xpath['short_desc'] = 'div[@class="shortdesc"]';
		$xpath['view_guide'] = 'a[@class="viewguide"]';
		foreach ($frm as $key => $value) {
			if (substr($value, 0, 4) == 'http') {
				$crawl_data[$count] = $this->get_crawl_data($value, $xpath);
				$direct = explode('/', $value);
				$base_domain = $direct[0].'//'.$direct[2];
				if (!empty($crawl_data[$count])) {
					$drug = array(
						'id_type'=>$id_type,
						'title'=>$crawl_data[$count]['title'][0],
						'short_desc'=>$crawl_data[$count]['short_desc'][0],
						'unit'=>$crawl_data[$count]['unit'][0],
						'price'=>$crawl_data[$count]['price'][0],
						'image'=>json_encode($crawl_data[$count]['image']),
						'article'=>json_encode($crawl_data[$count]['article'])
					);	
					$id_drug = $this->M_data->insert($drug,'drug');
					if ($crawl_data[$count]['view_guide'][0]['href']!='') {
						$direct_link = $base_domain.$crawl_data[$count]['view_guide'][0]['href'];
						$detail = $this->get_crawl_result_detail($direct_link);
						$drug_detail = array(
							'id_drug'=>$id_drug,
							'title'=>$detail[0]['title'][0],
							'image'=>json_encode($detail[0]['image']),
							'article'=>json_encode($detail[0]['article'])
						);
						$id_drug_detail = $this->M_data->insert($drug_detail,'drug_detail');	
					}
				$data['success'] = "Thành công.";
				}
				$count++;
			}else{
				$data['success'] = "Link bị lỗi.";
			}
		}}else{
			$data['success'] = "Thất bại.";
		}
		return $data;
	}

	private function save_doctor($frm){
		$count = 0;
		$crawl_data = [];
		$data = [];
		$xpath['name'] = '/html/body/section[2]/article[1]/h1';
		$xpath['article'] = '/html/body/section[2]/article[@class="cv"]';
		$xpath['image'] = '/html/body/section[2]/article[1]/img';
		$xpath['branch'] = '/html/body/section[2]/article[1]/div/b';
		$xpath['short_desc'] = '/html/body/section[2]/article[1]/div/p[1]';
		foreach ($frm as $key => $value) {
			if (substr($value, 0, 4) == 'http') {
				$crawl_data[$count] = $this->get_crawl_data($value, $xpath);
				if (!empty($crawl_data[$count])) {
					$doctor = array(
						'name'=>$crawl_data[$count]['name'][0],
						'short_desc'=>$crawl_data[$count]['short_desc'][0],
						'branch'=>$crawl_data[$count]['branch'][0],
						'image'=>json_encode($crawl_data[$count]['image']),
						'article'=>json_encode($crawl_data[$count]['article'])
					);	
					$id_doctor = $this->M_data->insert($doctor,'doctor');
				}
				$count++;
			}else{
				$data['error'][$count] = "Link ".$count." bị lỗi.";
			}
		}
		$data['success'] = "Thành công.";
		return $data;
	}

	private function save_sick($type,$frm){
		$count = 0;
		$crawl_data = [];
		$data = [];
		$id_type = $this->M_data->insert(array('name'=>$type),'type_sick');
		if ($id_type) {
			$xpath['name'] = '/html/body/section[2]/h1';
			$xpath['article'] = '/html/body/section[2]/article';
			foreach ($frm as $key => $value) {
				if (substr($value, 0, 4) == 'http') {
					$crawl_data[$count] = $this->get_crawl_data($value, $xpath);
					if (!empty($crawl_data[$count])) {
						$save_data = array(
							'id_type'=>$id_type,
							'name'=>$crawl_data[$count]['name'][0],
							'article'=>json_encode($crawl_data[$count]['article'])
						);	
						$id_save = $this->M_data->insert($save_data,'sick');
					}
					$count++;
				}else{
					$data['error'][$count] = "Link ".$count." bị lỗi.";
				}
			}
			$data['success'] = "Thành công.";
		}else{
			$data['error'] = "Thêm loại bệnh thất bại.";
		}
		return $data;
	}

	private function save_hospital($frm){
		$count = 0;
		$crawl_data = [];
		$data = [];
		$xpath['name'] = '/html/body/section[2]/article[1]/h1';
		$xpath['article'] = '/html/body/section[2]/article[@class="cv"]';
		$xpath['image'] = '/html/body/section[2]/article[1]/img';
		$xpath['tel'] = '/html/body/section[2]/article[1]/div/label[1]/span/a';
		$xpath['address'] = '/html/body/section[2]/article[1]/div/label[2]/span/a';
		$xpath['short_desc'] = '/html/body/section[2]/article[1]/div/label[3]/span';
		$xpath['web_site'] = '/html/body/section[2]/article[1]/div/label[4]/span/a';
		foreach ($frm as $key => $value) {
			if (substr($value, 0, 4) == 'http') {
				$crawl_data[$count] = $this->get_crawl_data($value, $xpath);
				if (!empty($crawl_data[$count])) {
					$save_data = array(
						'name'=>$crawl_data[$count]['name'][0],
						'short_desc'=>$crawl_data[$count]['short_desc'][0],
						'tel'=>$crawl_data[$count]['tel'][0],
						'address'=>$crawl_data[$count]['address'][0],
						'web_site'=>$crawl_data[$count]['web_site'][0],
						'image'=>json_encode($crawl_data[$count]['image']),
						'article'=>json_encode($crawl_data[$count]['article'])
					);	
					$id_data = $this->M_data->insert($save_data,'hospital');
				}
				$count++;
			}else{
				$data['error'][$count] = "Link ".$count." bị lỗi.";
			}
		}
		$data['success'] = "Thành công.";
		return $data;
	}

	private function save_news($frm){
		$count = 0;
		$crawl_data = [];
		$data = [];
		$xpath['title'] = '/html/body/section[2]/h1';
		$xpath['image'] = '/html/body/section[2]/article/p/img';
		$xpath['article'] = '/html/body/section[2]/article';
		$xpath['short_desc'] = '/html/body/section[2]/article/h2';
		foreach ($frm as $key => $value) {
			if (substr($value, 0, 4) == 'http') {
				$crawl_data[$count] = $this->get_crawl_data($value, $xpath);
				if (!empty($crawl_data[$count])) {
					$save_data = array(
						'title'=>$crawl_data[$count]['title'][0],
						'short_desc'=>$crawl_data[$count]['short_desc'][0],
						'image'=>json_encode($crawl_data[$count]['image']),
						'article'=>json_encode($crawl_data[$count]['article'])
					);	
					$id_data = $this->M_data->insert($save_data,'news');
				}
				$count++;
			}else{
				$data['error'][$count] = "Link ".$count." bị lỗi.";
			}
		}
		$data['success'] = "Thành công.";
		return $data;
	}

	function get_crawl_result_detail($url){
		$count = 0;
		$crawl_data = [];
		$xpath['title'] = '/html/body/div[1]/div[1]';
		$xpath['image'] = '/html/body/div[1]/article[1]/div/div/img';
		$xpath['article'] = '/html/body/div[1]/article';
		if (substr($url, 0, 4) == 'http') {
			$crawl_data[$count] = $this->get_crawl_data($url, $xpath);
			$count++;
		}
		return $crawl_data;
	}

	private function crawl_level_2($site_domain,$site_url,$xpath){
		$data = [];
		if (substr($site_url, 0, 4) != 'http') {
			$data['error'] = "Link bạn nhập không hợp lệ.";
		}else{
			$site_data = $this->get_site_a_href($site_url, $xpath);
			if(empty($site_data['links'])){
				$data['error'] = "Không tìm thấy dữ liệu.";
			}else{
				foreach ($site_data['links'] as $key => $value) {
					if (substr($value, 0, 1) == '/') {
						$data['level_2']['category'][$key]['href'] = $site_domain.$value;
						$data['level_2']['category'][$key]['name'] = $site_data['contents'][$key];
					}
				}
			}
		}
		return $data;
	}

	private function crawl_level_3($site_domain,$site_url,$keywords,$newkeywords){
		$data = [];
		if (substr($site_url, 0, 4) != 'http') {
			$data['error'] = "Link bạn nhập không hợp lệ.";
		}else{
			$site_data = $this->get_site_a_href($site_url, $keywords);
			if(empty($site_data['links'])){
				$data['error'] = "Không tìm thấy dữ liệu.";
			}else{
				$data['code'] = $keywords['code'];
				foreach ($site_data['links'] as $key => $value) {
					if (substr($value, 0, 1) == '/') {
						$data['level_3']['crawl_list'][$key]['href'] = $site_domain.$value;
						$data['level_3']['crawl_list'][$key]['name'] = $site_data['contents'][$key];
					}
				}
				if (isset($site_data['scripts'])) {
					foreach ($site_data['scripts'] as $key => $value) {
						if (strpos($value, 'query')) {
							$query = $value;
							break;
						}
					}
				}
				if(!empty($site_data['viewmore']) && isset($query) && !empty($newkeywords)){
					$items = preg_replace('/[^0-9]/', '', $site_data['viewmore']);
					if ($items[0]!='') {
						$data['level_3']['count_extra'] = (int)$items[0];
						for ($i=0; $i <= (int)((int)$items[0]/10); $i++) { 
							$tail = '?';
							$more_url = '';
							$more_data = [];
							$arr = explode(' ', $this->clean_text($query));
							$tail.= $arr[5].$arr[6].$arr[7].$arr[8].$arr[9].(String)($i+1).'&'.$arr[11].$arr[12];	
							$tail = str_replace(',', '&', $tail);
							$tail = str_replace(':', '=', $tail);
							$tail = str_replace("'", '', $tail);
								
							$more_url = $site_domain.$keywords['extra_link'].$tail;
							$more_data = $this->get_site_a_href($more_url, $newkeywords);
							for ($j=0; $j < count($more_data['links']); $j++) { 
								if (substr($more_data['links'][$j], 0, 1) == '/') {
									$data['level_3_extra']['crawl_list_extra'][$i][$j]['href'] = $site_domain.$more_data['links'][$j];
									$data['level_3_extra']['crawl_list_extra'][$i][$j]['name'] = $more_data['contents'][$j];
								}
							}
							// $data['crawl_links_extra'][$i] = $more_url;
						}
					}else{
						switch ($keywords['code']) {
							case 'bac-si':
								$count = 0;
								for ($i=0; $i <= 1; $i++) { 
									$tail = '?';
									$more_url = '';
									$more_data = [];
									$arr = explode(' ', $this->clean_text($query));
									$tail.= $arr[5].$arr[6].$arr[7].(String)($i+1).'&'.$arr[9].$arr[10];	
									$tail = str_replace(',', '&', $tail);
									$tail = str_replace(':', '=', $tail);
									$tail = str_replace("'", '', $tail);
									$more_url = $site_domain.$keywords['extra_link'].$tail;
									$more_data = $this->get_site_a_href($more_url, $newkeywords);
									for ($j=0; $j < count($more_data['links']); $j++) { 
										if (substr($more_data['links'][$j], 0, 1) == '/') {
											$count++;
											$data['level_3_extra']['crawl_list_extra'][$i][$j]['href'] = $site_domain.$more_data['links'][$j];
											$data['level_3_extra']['crawl_list_extra'][$i][$j]['name'] = $more_data['contents'][$j];
										}
									}
									if (empty($more_data['viewmore'])) {
										break;		
									}
									// $data['crawl_links_extra'][$i] = $more_url;
								}
								$data['level_3']['count_extra'] = $count;
								break;
							case 'benh-vien':
								$count = 0;
								for ($i=0; $i <= 5; $i++) { 
									$tail = '?';
									$more_url = '';
									$more_data = [];
									$arr = explode(' ', $this->clean_text($query));
									$tail.= $arr[5].$arr[6].$arr[7].(String)($i+1).'&'.$arr[9].$arr[10];	
									$tail = str_replace(',', '&', $tail);
									$tail = str_replace(':', '=', $tail);
									$tail = str_replace("'", '', $tail);
									$more_url = $site_domain.$keywords['extra_link'].$tail;
									$more_data = $this->get_site_a_href($more_url, $newkeywords);
									for ($j=0; $j < count($more_data['links']); $j++) { 
										if (substr($more_data['links'][$j], 0, 1) == '/') {
											$count++;
											$data['level_3_extra']['crawl_list_extra'][$i][$j]['href'] = $site_domain.$more_data['links'][$j];
											$data['level_3_extra']['crawl_list_extra'][$i][$j]['name'] = $more_data['contents'][$j];
										}
									}
									if (empty($more_data['viewmore'])) {
										break;		
									}
									// $data['crawl_links_extra'][$i] = $more_url;
								}
								$data['level_3']['count_extra'] = $count;
								break;
							default:
								break;
						}
					}
				}
			}
		}
		return $data;
	}

	private function get_crawl_data($site_url, $keywords){
		$this->load->library(array('crawler'));
		$site_data = array();

		if($this->crawler->set_url($site_url) !== false){
			if (isset($keywords['title'])) {
				$site_data['title'] = $this->crawler->get_contents_by_xpath($keywords['title']);
			}
			if (isset($keywords['name'])) {
				$site_data['name'] = $this->crawler->get_contents_by_xpath($keywords['name']);
			}
			if (isset($keywords['branch'])) {
				$site_data['branch'] = $this->crawler->get_contents_by_xpath($keywords['branch']);
			}
			if (isset($keywords['tel'])) {
				$site_data['tel'] = $this->crawler->get_contents_by_xpath($keywords['tel']);
			}
			if (isset($keywords['address'])) {
				$site_data['address'] = $this->crawler->get_contents_by_xpath($keywords['address']);
			}
			if (isset($keywords['web_site'])) {
				$site_data['web_site'] = $this->crawler->get_contents_by_xpath($keywords['web_site']);
			}
			if (isset($keywords['price'])) {
				$site_data['price'] = $this->crawler->get_contents_by_xpath($keywords['price']);
			}
			if (isset($keywords['unit'])) {
				$site_data['unit'] = $this->crawler->get_contents_by_xpath($keywords['unit']);
			}
			if (isset($keywords['short_desc'])) {
				$site_data['short_desc'] = $this->crawler->get_articles_by_xpath($keywords['short_desc']);
			}
			if (isset($keywords['article'])) {
				$site_data['article'] = $this->crawler->get_articles_by_xpath($keywords['article']);
			}
			if (isset($keywords['image'])) {
				$site_data['image'] = $this->crawler->get_images_by_xpath($keywords['image']);
			}
			if (isset($keywords['view_guide'])) {
				$site_data['view_guide'] = $this->crawler->get_images_by_xpath($keywords['view_guide']);
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
			if (isset($keywords['xpath_script'])) {
				$site_data['scripts'] = $this->crawler->get_contents_by_xpath($keywords['xpath_script']);
			}
			if (isset($keywords['xpath_viewmore'])) {
				$site_data['viewmore'] = $this->crawler->get_contents_by_xpath($keywords['xpath_viewmore']);
			}
			return $site_data;
		}
		else{
			return false;
		}
	}
	private function clean_text($text){
		$preg_patterns = array(
			"/[\x80-\xFF]/", //remove special characters
			"/&nbsp/",
			"/\s+/", //remove extra whitespace
		);
		$text = strip_tags(preg_replace($preg_patterns, " ", html_entity_decode($text, ENT_QUOTES, 'UTF-8')));
		
		return $text;
	}

	private function get_site_data($site_url, $max_depth = 1, $current_depth = 0, $keywords){
		$current_depth++;
		$this->load->library(array('crawler'));
		$site_data = array();

		if($this->crawler->set_url($site_url) !== false){
			// $site_data['html'] = $this->crawler->get_html();
			// $site_data['title'] = $this->crawler->get_title();
			// $site_data['description'] = $this->crawler->get_description();
			// $site_data['keywords'] = $this->crawler->get_keywords();
			// $site_data['text'] = $this->crawler->get_text();
			// $site_data['image'] = $this->crawler->get_images();
			// $site_data['content'] = $this->crawler->get_contents_by_class($keywords['class']);
			// $site_data['links'] = $this->crawler->get_links();
			$site_data['title'] = $this->crawler->get_contents_by_xpath($keywords['title']);
			$site_data['price'] = $this->crawler->get_contents_by_xpath($keywords['price']);
			$site_data['unit'] = $this->crawler->get_contents_by_xpath($keywords['unit']);
			$site_data['short_desc'] = $this->crawler->get_contents_by_xpath($keywords['short_desc']);
			$site_data['article'] = $this->crawler->get_articles_by_xpath($keywords['article']);
			$site_data['image'] = $this->crawler->get_images_by_xpath($keywords['image']);

			// if($current_depth <= $max_depth){
			// 	foreach($site_data['links'] as $link_key => &$link){
			// 		$link['data'] = $this->get_site_data($link, $max_depth, $current_depth);
			// 	}
			// }

			return $site_data;
		}
		else{
			return false;
		}
	}
}