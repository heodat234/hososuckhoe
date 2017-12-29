<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ChitietHoso_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $_name = 'chitiet_hoso';
	
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    
   
    public function selectFile($dk)
    {
        $this->db->select()->where($dk);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    public function selectChiSo($dk)
    {
        $this->db->select()->where($dk);
        $query = $this->db->get($this->_name);
        return $query->result_array();
    }
    //thêm tài khoản mới
    public function insertChitiet_Hoso($data)
    {
        $this->db->insert($this->_name,$data);
    }

    public function selectFileActive()
    {
        $sql = "SELECT  a.id_hoso,COUNT(a.dulieu) AS tong,b.ten, c.name FROM chitiet_hoso a, hoso b, users c WHERE a.loai = 0 AND a.active =0 AND a.id_hoso = b.id AND c.id = b.id_user GROUP BY a.id_hoso";
        $query = $this->db->query($sql); 
        return $query->result_array();
    }
    //active file hồ sơ
    public function activeAnh($data)
    {
        $this->db->where('id', $data['id'])->update($this->_name,$data);
    }
    
   
   
  
}