<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Muc_Chiso_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'muc_chiso';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    
   
    public function selectChiso()
    {

        $this->db->select()->where('id !=', '1');
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    //thêm tài khoản mới
    public function insertChitiet_Hoso($data)
    {
        $this->db->insert($this->_name,$data);
    }

    // //thêm file hồ sơ
    // public function insertFile($data)
    // {
    //     $this->db->where('id', $data['id'])->update($this->_name,$data);
    // }
    
   
   
  
}