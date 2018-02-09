<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Thuoc_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'drug';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    
    public function countAll(){
        $query=$this->db->where('hidden', 0)->get($this->_name);
        return $query->num_rows(); 
    }
    public function countIdLoai($id){
        $this->db->where('id_type',$id)->where('hidden', 0);
        $query=$this->db->get($this->_name);
        return $query->num_rows(); 
    }
    public function getThuoc($total, $start){
       $this->db->where('hidden', 0)->limit($total, $start);
       $query=$this->db->get($this->_name);
       return $query->result_array();
    }
    
    public function selectThuoc()
    {
        $this->db->select()->where('hidden', 0)->order_by("id", "desc");
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectThuocLimit()
    {
        $this->db->select()->where('hidden', 0)->order_by("id", "desc")->limit(5);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectThuoc_by_Id($id)
    {
        $this->db->select()->where("id", $id)->where('hidden', 0);
        $query = $this->db->get($this->_name);
        return $query->row_array();
    }
    public function selectThuoc_by_IdType($id_type)
    {
        $this->db->select()->where("id_type", $id_type)->where('hidden', 0)->limit(5);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectThongTinThuoc_by_Id($id)
    {
        $this->db->select()->where("id_drug", $id);
        $query = $this->db->get('drug_detail');
        return $query->row_array();
    }
    public function search_data($key)
    {
      $sql = "SELECT * FROM `drug` WHERE name LIKE '%$key%'";
      $query = $this->db->query($sql); 
      return $query->result_array();
    }


    public function selectLoaiThuoc()
    {
        $this->db->select();
        $query = $this->db->get('loai_thuoc');
        return $query->result_array();
    }
    public function getThuocByIdLoai($idLoai, $total, $start){
       $this->db->where('id_type',$idLoai)->where('hidden', 0)->limit($total, $start);
       $query=$this->db->get($this->_name);
       return $query->result_array();
    }
    
  
}