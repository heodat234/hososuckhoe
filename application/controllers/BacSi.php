 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BacSi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','my_helper','text'));
		$this->load->model(array('Bacsi_model','News_model'));
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
		$config['total_rows'] = $this->Bacsi_model->countAll();
        $config['base_url'] = base_url()."/BacSi/index";
        $config['per_page'] = 4;
        $config['next_link'] = "Sau";
  		$config['prev_link'] = "Trước";
  		$config['first_link'] 	= "Đầu";
  		$config['last_link'] 	= "Cuối";
  		$config['num_links'] = 5;
        $start=$this->uri->segment(3);
        $this->load->library('pagination', $config);
        $mdata['bacsi'] = $this->Bacsi_model->getBS($config['per_page'], $start);
        $mdata['phantrang'] =  $this->pagination->create_links();
		$mdata['noibat'] = $this->Bacsi_model->selectBS();
		$data['bs']			= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/listBacsi', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function bacSiById($id)
	{
		$mdata['bacsi']				= $this->Bacsi_model->selectBS_by_Id($id);

		$url = json_decode($mdata['bacsi']['image'],true)[0]['src'];
		$headers = @get_headers($url);
		if ($headers == true){
			$mdata['image'] = $url;
		}else{
			$mdata['image'] = base_url().'images/profile.png';
		}
		$mdata['content']       = json_decode($mdata['bacsi']['article'],true);
		// var_dump($mdata['content']  );

		$mdata['cate_bacsi']		= $this->Bacsi_model->selectBS($id);

		$data['bacsi']				= 'active';
		$this->_data['html_header'] = $this->load->view('home/header', $data, TRUE);  
        $this->_data['html_body'] 	= $this->load->view('page/pageBacsi', $mdata, TRUE);
        return $this->load->view('home/master', $this->_data);
	}

	
}
