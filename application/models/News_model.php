<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'news';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    
   
    public function selectTintucIndex()
    {
        $this->db->select()->order_by("id", "desc")->limit(2);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectTintuc()
    {
        $this->db->select()->order_by("id", "desc");
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectTintuc_by_Id($id)
    {
        $this->db->select()->where("id", $id);
        $query = $this->db->get($this->_name);
        return $query->row_array();
    }
    // thêm lượt xem
    public function updateView($data)
    {
        $this->db->where('id', $data['id'])->update($this->_name,$data);
    }
    public function insertTintuc($data)
    {
        $this->db->insert($this->_name,$data);
    }
    //sửa tin
    public function updateTintuc($data)
    {
        $this->db->where('id', $data['id'])->update($this->_name,$data);
    }
    function deleteTintuc($id)
    {
        $this->db->where('id', $id)->delete($this->_name);
    }
   
   
  
}