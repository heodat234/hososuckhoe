<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'users';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    //kiểm tra thông tin đăng nhập thường
    function a_fCheckUser( $a_UserInfo ){
    	$a_User	=	$this->db->select()
					    	->where('email', $a_UserInfo['username'])
                            ->or_where('phone', $a_UserInfo['username'])
					    	->where('password', $a_UserInfo['password'])
					    	->get($this->_name)
					    	->row_array();
    	if(count($a_User) >0){
    		return $a_User;
    	} else {
    		return false;
    	}
    }
    //kiểm tra mail đã tồn tại hay chưa
    public function checkMail( $mail ){
        $a_User =   $this->db->select()
                            ->where('email', $mail)
                            ->get($this->_name)
                            ->row_array();
        if(count($a_User) >0){
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($id, $pass ){
        $a_User =   $this->db->select()
                            ->where('id', $id)
                            ->where('password', md5($pass))
                            ->get($this->_name)
                            ->row_array();
        if(count($a_User) >0){
            return 1;
        } else {
            return 0;
        }
    }

    public function selectUser()
    {
        $this->db->select() ;
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectUserById($id)
    {
        $this->db->select()->where('id', $id);
        $query = $this->db->get($this->_name);
        return $query->row_array();
    }
    //thêm tài khoản mới
    public function insertUser($data)
    {
        $a_User =   $this->db->insert($this->_name,$data);
    }
    //sửa tài khoản 
    public function editUser($data)
    {
        $a_User =   $this->db->where('id', $data['id'])
                            ->update($this->_name,$data);
    }
    public function editPassword($data)
    {
        $a_User =   $this->db->where('id', $data['id'])
                            ->update($this->_name,$data);
    }
    //xóa tài khoản
    public function deleteUser($data)
    {
        $a_User =   $this->db->where('email', $data)
                            ->delete($this->_name);
    }
    //kiểm tra thông tin đăng nhập bằng facebook hoặc google
    public function checkUser($data){
         $prevCheck = $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']))
                ->get($this->_name)
                ->row_array();
                // var_dump($data);
        if($prevCheck > 0){
            // $update = $this->db->update($this->_name,$data,array('id'=>$prevCheck['id']));
            $userID = $prevCheck['id'];
        }else{
            if ($this->checkMail($data['email'])) {
                $update = $this->db->where('email', $data['email'])
                               ->update($this->_name,$data);
                $userID = 1;
            }else{
                $insert = $this->db->insert($this->_name,$data);
                $userID = $this->db->insert_id();
            }
        }

        return $userID?$userID:FALSE;
    }

    function activeUser($email)
    {
        $data['active'] = 1;
        $a_User =   $this->db->where('email', $email)
                            ->update($this->_name,$data);
    }
  
}