<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bacsi_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'doctor';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    
    public function countAll(){
        $query=$this->db->get($this->_name);
        return $query->num_rows(); 
    }
    public function getBS($total, $start){
       $this->db->limit($total, $start);
       $query=$this->db->get($this->_name);
       return $query->result_array();
    }
    // public function selectBSIndex()
    // {
    //     $this->db->select()->order_by("danh_gia", "desc")->limit(10);
    //     $query = $this->db->get($this->_name);
    //     return $query->result_array();
    // }
    public function selectBS()
    {
        $this->db->select()->order_by("id", "desc")->limit(5);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectBS_by_Id($id)
    {
        $this->db->select()->where("id", $id);
        $query = $this->db->get($this->_name);
        return $query->row_array();
    }


    public function search_data($key)
    {
      $sql = "SELECT * FROM `bacsi` WHERE ten LIKE '%$key%'";
      $query = $this->db->query($sql); 
      return $query->result_array();
    }

    // // thêm lượt xem
    // public function updateView($data)
    // {
    //     $this->db->where('id', $data['id'])->update($this->_name,$data);
    // }
    // public function insertTintuc($data)
    // {
    //     $this->db->insert($this->_name,$data);
    // }
    // //sửa tin
    // public function updateTintuc($data)
    // {
    //     $this->db->where('id', $data['id'])->update($this->_name,$data);
    // }
    // function deleteTintuc($id)
    // {
    //     $this->db->where('id', $id)->delete($this->_name);
    // }
   
   
  
}