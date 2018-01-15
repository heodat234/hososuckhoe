<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'news';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    public function countAll(){
        $query=$this->db->get("news");
        return $query->num_rows(); 
    }
    public function getNews($total, $start){
       $this->db->limit($total, $start);
       $query=$this->db->get("news");
       return $query->result_array();
    }
    public function selectTintucIndex()
    {
        $this->db->select()->order_by("id", "desc")->limit(4);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectTintuc()
    {
        $this->db->select()->order_by("id", "desc");
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectTintucNoiBat()
    {
        $this->db->select()->order_by("view", "desc")->limit(5);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectTintucYkhoa()
    {
        $this->db->select()->where('id_loai',1)->order_by("view", "desc")->limit(3);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectTintucNoibo()
    {
        $this->db->select()->where('id_loai',2)->order_by("view", "desc")->limit(3);
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