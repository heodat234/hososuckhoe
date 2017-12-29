<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

class Login extends CI_Controller {

	private $fb;
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','string','security'));
		$this->load->model(array('Login_model'));
		$this->load->library(array('form_validation','session'));

		$config = array(
		    'protocol'  =>  'smtp',
		    'smtp_host' =>  'ssl://smtp.googlemail.com',
		    'smtp_port' =>  465,
		    'smtp_user' =>  'hunglt2345@gmail.com',
		    'smtp_pass' =>  'Heodat2304',
		    'mailtype'  =>  'html', 
		    'charset'   =>  'utf-8',
		);
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$this->a_Data['csrf'] = $csrf;

		$this->_data['html_header'] = $this->load->view('home/header', NULL, TRUE);  
        $this->_data['html_footer'] = $this->load->view('home/footer', NULL, TRUE);
        
	}
	//vào trang đăng nhập
	public function index()
	{	
		
		$this->_data['html_body'] = $this->load->view('page/login', $this->a_Data, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	public function pageRegister()
	{
		
		$this->_data['html_body'] = $this->load->view('page/register', $this->a_Data, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	//đăng nhập thường
	public function loginUser()
	{
		$frm = $this->input->post();
		$a_UserInfo['username'] = $frm['username'];
		$a_UserInfo['password'] = md5($frm['password']);
		$a_UserChecking = $this->Login_model->a_fCheckUser( $a_UserInfo );
		if($a_UserChecking){
			if ($a_UserChecking['active'] == 0) {
				$this->b_Check = 'Tài khoản của bạn chưa được xác nhận. Vui lòng xác nhận tài khoản của bạn trước khi đăng nhập.';
			}else{
				$this->session->set_userdata('user', $a_UserChecking);
				redirect(base_url(''));
			}
		}else{
			$this->b_Check = 'Tài khoản không đúng. Xin vui lòng đăng nhập lại !';
		}
		$this->a_Data['b_Check']= $this->b_Check;
		$this->_data['html_body'] = $this->load->view('page/login',$this->a_Data, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	//vào trang cá nhân
	public function account()
	{
		$this->_data['html_body'] = $this->load->view('page/account',NULL, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	//đăng kí tài khoản mới
	public function insertUser()
	{
		$frm = $this->input->post();
		$a_UserInfo['name'] = $frm['name'];
		$a_UserInfo['email'] = $frm['email'];
		$a_UserInfo['password'] = md5($frm['password']);
		$a_UserInfo['phone'] 		= $frm['phone'];
		$a_UserInfo['dia_chi'] 		= $frm['dia_chi'];
		$a_UserInfo['gioi_tinh'] 	= $frm['gioi_tinh'];
		$a_UserInfo['ngay_sinh'] 	= $frm['ngay_sinh'];
		$a_UserInfo['cmnd'] 		= $frm['cmnd'];
		if ($this->Login_model->checkMail( $a_UserInfo['email'] )) {
			$this->b_Check = false;
		}else{
			$this->b_Check = true;
			$this->Login_model->insertUser( $a_UserInfo );
			$this->email->from('hunglt2345@gmail.com', 'Hồ sơ sức khỏe');
			//cau hinh nguoi nhan
			$this->email->to($a_UserInfo['email']);
			$this->email->subject('Xác nhận tài khoản');
			$this->email->message('Cảm ơn bạn đã đăng ký tài khoản tại hososuckhoe.org. Bấm vào <a href="'.base_url().'activeUser/'.$a_UserInfo['email'].'/'.$this->a_Data['csrf']['hash'].'">đây</a> để xác nhận tài khoản của bạn.<br>');
			 
			//thuc hien gui
			$this->email->send();
			redirect(base_url('pageLogin'));
		}
		$this->a_Data['b_Check']= $this->b_Check;
		$this->_data['html_body'] = $this->load->view('page/register',$this->a_Data, TRUE);
        return $this->load->view('home/master', $this->_data);
	}

	public function activeUser($email, $token){
        $this->Login_model->activeUser($email);
        $this->a_Data['d_Check']= true;
		$this->_data['html_body'] = $this->load->view('page/login',$this->a_Data, TRUE);
        return $this->load->view('home/master', $this->_data);

    }
	//sửa tài khoản
	public function editUser()
	{
		$frm = $this->input->post();
		// var_dump($frm);
		$a_UserInfo['name'] 		= $frm['name'];
		$a_UserInfo['id'] 			= $frm['id'];
		$a_UserInfo['phone'] 		= $frm['phone'];
		$a_UserInfo['dia_chi'] 		= $frm['dia_chi'];
		$a_UserInfo['gioi_tinh'] 	= $frm['gioi_tinh'];
		$a_UserInfo['ngay_sinh'] 	= $frm['ngay_sinh'];
		$a_UserInfo['cmnd'] 		= $frm['cmnd'];
		$editUser = $this->Login_model->editUser( $a_UserInfo );

		$this->session->unset_userdata('user');
		redirect(base_url('pageLogin'));
	}
	//xóa tài khoản
	public function deleteUser()
	{
		$frm = $this->input->post();
		$a_UserInfo['email'] = $this->session->userdata('user')['email'];
		$a_UserInfo['password'] = md5($frm['password']);
		$a_UserChecking = $this->Login_model->a_fCheckUser( $a_UserInfo );
		if($a_UserChecking){
			$this->Login_model->deleteUser($a_UserInfo['email']);
			$this->session->unset_userdata('user');
			redirect(base_url(''));
		}else{
			$this->a_Check = false;
		}
		$a_Data['a_Check']= $this->a_Check;
		$this->_data['html_body'] = $this->load->view('page/account',$a_Data, TRUE);
        return $this->load->view('home/master', $this->_data);
	}
	//đăng xuất
	public function logout($value='')
	{
		$this->session->unset_userdata('user');	// Unset session of user
		redirect(base_url(''));
	}

	//lấy lại password, gửi qua mail
	public function forgotPassword()
	{
		$mail = $this->input->post('email');
		 
		//cau hinh email va ten nguoi gui
		$this->email->from('hunglt2345@gmail.com', 'Hồ sơ sức khỏe');
		//cau hinh nguoi nhan
		$this->email->to($mail);
		$this->email->subject('Lấy lại mật khẩu');
		$this->email->message('Bấm vào <a href="'.base_url().'login">đây</a> để đăng nhập bằng mật khẩu bên dưới và đổi mật khẩu mới cho tài khoản của bạn.<br>
			Mật khẩu mới: <b>'.random_string('alnum',8).'</b><br>');
		 
		
		//thuc hien gui
		$this->email->send();
	    $this->c_Check = true;
	    $this->a_Data['c_Check']= $this->c_Check;
		$this->_data['html_body'] = $this->load->view('page/login',$this->a_Data, TRUE);
    	return $this->load->view('home/master', $this->_data);

		
	}

	public function checkPassword()
	{
		$password 	= $this->input->post('pass');
		$id 		= $this->input->post('id');
		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$this->a_Data['csrf'] = $csrf;
		$this->a_Data['data'] = $this->Login_model->checkPassword($id, $password);
		print_r(json_encode($this->a_Data));
	}

	public function editPassword()
	{
		// var_dump($this->input->post());
		$data['password'] = md5($this->input->post('new_pass'));
		$data['id'] = $this->input->post('id');
		$this->Login_model->editPassword($data);
		$this->session->unset_userdata('user');
		redirect(base_url('pageLogin'));
	}

	//đăng nhập bằng facebook
	public function loginFacebook()
	{
		$cb = base_url()."Login/callback";
		$fb = new Facebook\Facebook([
          'app_id' => '1835738986453711',
          'app_secret' => '43e5c2d04ac4d93baf4d39d0f91b5def',
          'default_graph_version' => 'v2.5',
        ]);

	   $helper = $fb->getRedirectLoginHelper();

	   $permissions = ['email','user_location','user_birthday','publish_actions']; 
	// For more permissions like user location etc you need to send your application for review

	   $loginUrl = $helper->getLoginUrl($cb, $permissions);

	   header("location: ".$loginUrl);
	}
	public function callback()
	{
		$cb = base_url()."Login/callback";
		$fb = new Facebook\Facebook([
        'app_id' => '1835738986453711',
          'app_secret' => '43e5c2d04ac4d93baf4d39d0f91b5def',
        'default_graph_version' => 'v2.5',
        ]);
        
        $helper = $fb->getRedirectLoginHelper();  
  
        try {  
            
            $accessToken = $helper->getAccessToken($cb);  
            
        }catch(Facebook\Exceptions\FacebookResponseException $e) {  
          // When Graph returns an error  
          echo 'Graph returned an error: ' . $e->getMessage();  
          exit;  
        } catch(Facebook\Exceptions\FacebookSDKException $e) {  
          // When validation fails or other local issues  
          echo 'Facebook SDK returned an error: ' . $e->getMessage();  
          exit;  
        }  
 
        try {
          $response = $fb->get('/me?fields=id,name,email,first_name,last_name,birthday,location,gender', $accessToken);
         // print_r($response);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'ERROR: Graph ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'ERROR: validation fails ' . $e->getMessage();
          exit;
        }
        // User Information Retrival begins................................................
        $me = $response->getGraphUser();
        $a_UserInfo['oauth_provider']  = 'facebook';
        $a_UserInfo['oauth_uid'] = $me->getProperty('id');
        $a_UserInfo['name'] = $me->getProperty('name');
		$a_UserInfo['email'] = $me->getProperty('email');
		// var_dump($a_UserInfo);
		if ($this->Login_model->checkUser( $a_UserInfo )) {
			$this->session->set_userdata('user', $a_UserInfo);
			redirect(base_url(''));
		}else{
			$this->a_Data['b_Check']= false;
			$this->_data['html_body'] = $this->load->view('page/login',$this->a_Data, TRUE);
        	return $this->load->view('home/master', $this->_data);
		} 
	}



	//đăng nhập bằng google
	public function loginGoogle()
	{
		$client_id = '770402780651-neuv86ccneqbgftnoc7n24rlpek873of.apps.googleusercontent.com';
        $client_secret = 'vXtRTsreEIPR6BuYo_7KoYvN';
        $redirect_uri = base_url('gcallback');;

        //Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("1001cv");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        //Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);
        
        $authUrl = $client->createAuthUrl();
        
        header('Location: '.$authUrl);
	}

	function gcallback()
    {
            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
	     $client_id = '770402780651-neuv86ccneqbgftnoc7n24rlpek873of.apps.googleusercontent.com';
	     $client_secret = 'vXtRTsreEIPR6BuYo_7KoYvN';
	     $redirect_uri = base_url('gcallback');

	    //Create Client Request to access Google API
	    $client = new Google_Client();
	    $client->setApplicationName("1001cv");
	    $client->setClientId($client_id);
	    $client->setClientSecret($client_secret);
	    $client->setRedirectUri($redirect_uri);
	    $client->addScope("email");
	    $client->addScope("profile");

	    //Send Client Request
	    $service = new Google_Service_Oauth2($client);

	    $client->authenticate($_GET['code']);
	    $_SESSION['access_token'] = $client->getAccessToken();
	  
	    // User information retrieval starts..............................
	    $user = $service->userinfo->get(); //get user info
	    $a_UserInfo['oauth_provider']  = 'google';
	    $a_UserInfo['oauth_uid'] = $user->id;
	    $a_UserInfo['name'] = $user->name;
		$a_UserInfo['email'] = $user->email;
		// var_dump($a_UserInfo);
		if ($this->Login_model->checkUser( $a_UserInfo )) {
			$this->session->set_userdata('user', $a_UserInfo);
			redirect(base_url(''));
		}else{
			$this->a_Data['b_Check']= false;
			$this->_data['html_body'] = $this->load->view('page/login',$this->a_Data, TRUE);
	    	return $this->load->view('home/master', $this->_data);
		}
       
    }
}