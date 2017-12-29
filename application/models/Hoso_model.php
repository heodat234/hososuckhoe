<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hoso_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'hoso';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    // //kiểm tra thông tin đăng nhập thường
    // function a_fCheckUser( $a_UserInfo ){
    // 	$a_User	=	$this->db->select()
				// 	    	->where('email', $a_UserInfo['username'])
    //                         ->or_where('phone', $a_UserInfo['username'])
				// 	    	->where('password', $a_UserInfo['password'])
				// 	    	->get($this->_name)
				// 	    	->row_array();
    // 	if(count($a_User) >0){
    // 		return $a_User;
    // 	} else {
    // 		return false;
    // 	}
    // }
   
    public function selectHoso()
    {
        $this->db->select();
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    //thêm tài khoản mới
    public function insertHoso($data)
    {
        $this->db->insert($this->_name,$data);
    }

    // //thêm file hồ sơ
    // public function insertFile($data)
    // {
    //     $this->db->where('id', $data['id'])->update($this->_name,$data);
    // }
    //sửa tài khoản 
    // public function editUser($data)
    // {
    //     $a_User =   $this->db->where('id', $data['id'])
    //                         ->update($this->_name,$data);
    // }
    //xóa tài khoản
    // public function deleteUser($data)
    // {
    //     $a_User =   $this->db->where('email', $data)
    //                         ->delete($this->_name);
    // }
   
  
}