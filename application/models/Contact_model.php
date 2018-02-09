<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'contact';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
   
   
    public function insertContact($data)
    {
        $this->db->insert($this->_name,$data);
        return $this->db->insert_id();
    }

   
  
}