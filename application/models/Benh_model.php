<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Benh_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'sick';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    
    public function countAll(){
        $query=$this->db->get($this->_name);
        return $query->num_rows(); 
    }
    public function countIdLoai($id){
        $this->db->where('id_type',$id);
        $query=$this->db->get($this->_name);
        return $query->num_rows(); 
    }
    public function getBenh($total, $start){
       $this->db->limit($total, $start);
       $query=$this->db->get($this->_name);
       return $query->result_array();
    }
    
    public function selectBenh()
    {
        $this->db->select()->order_by("id", "desc");
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectBenh_by_Id($id)
    {
        $this->db->select()->where("id", $id);
        $query = $this->db->get($this->_name);
        return $query->row_array();
    }


    public function search_data($key)
    {
      $sql = "SELECT * FROM `sick` WHERE ten LIKE '%$key%'";
      $query = $this->db->query($sql); 
      return $query->result_array();
    }


    public function selectLoaiBenh()
    {
        $this->db->select();
        $query = $this->db->get('type_sick');
        return $query->result_array();
    }
    public function getBenhByIdLoai($idLoai){
       $this->db->select('id,name')->where('id_type',$idLoai);
       $query=$this->db->get($this->_name);
       return $query->result_array();
    }
    public function getTenLoai($idLoai)
    {
        $this->db->select('name')->where('id',$idLoai);
        $query = $this->db->get('type_sick');
        return $query->row_array();
    }

    public function selectBenh_by_IdType($id_type)
    {
        $this->db->select()->where("id_type", $id_type)->limit(5);
        $query = $this->db->get($this->_name);
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