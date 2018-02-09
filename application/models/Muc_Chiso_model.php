<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Muc_Chiso_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'type_index';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    
   
    public function selectChiso()
    {

        $this->db->select()->where('id !=', '1')->where('hidden !=', '1');
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    //thêm tài khoản mới
    public function insertChiSo($data)
    {
        $this->db->insert($this->_name,$data);
        return $this->db->insert_id();
    }

    public function checkChiSo( $name ){
        $a =   $this->db->select()
                            ->where('name', $name)
                            ->get($this->_name)
                            ->row_array();
        if(count($a) >0){
            return true;
        } else {
            return false;
        }
    }

}