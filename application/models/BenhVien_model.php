<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Benhvien_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'hospital';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    
    public function countAll(){
        $query=$this->db->get($this->_name);
        return $query->num_rows(); 
    }
    public function getBV($total, $start){
       $this->db->limit($total, $start);
       $query=$this->db->get($this->_name);
       return $query->result_array();
    }
    public function selectBVIndex()
    {
        $sql = "SELECT *, diemDichVu + diemChuyenMon AS tong FROM `hospital` ORDER BY tong DESC LIMIT 10";
        $query = $this->db->query($sql); 
        return $query->result_array();
    }
    public function selectBV()
    {
        $this->db->select()->order_by("id", "desc");
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectBV_by_Id($id)
    {
        $this->db->select()->where("id", $id);
        $query = $this->db->get($this->_name);
        return $query->row_array();
    }


    public function search_data($key)
    {
      $sql = "SELECT * FROM `hospital` WHERE name LIKE '%$key%'";
      $query = $this->db->query($sql); 
      return $query->result_array();
    }

    // // thêm lượt xem
    public function updateDiem($idBV,$data)
    {
        $this->db->where('id', $idBV)->update($this->_name,$data);
    }
   
  
}