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
    public function selectChiSo($id_hoso)
    {
        $this->db->select()->where('id_hoso',$id_hoso)->where('loai_chiso !=',0);
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
        $sql = "SELECT  a.id_hoso,COUNT(a.dulieu) AS tong,b.ten, c.name FROM chitiet_hoso a, hoso b, users c WHERE a.loai_chiso = 0 AND a.active =0 AND a.id_hoso = b.id AND c.id = b.id_user GROUP BY a.id_hoso";
        $query = $this->db->query($sql); 
        return $query->result_array();
    }
    //active file hồ sơ
    public function activeAnh($data)
    {
        $this->db->where('id', $data['id'])->update($this->_name,$data);
    }
    
   public function thongkeChiso($idUser,$loai_chiso)
    {
        $sql = "SELECT b.* FROM chitiet_hoso b,hoso a WHERE a.id_user = '$idUser' AND a.id= b.id_hoso AND b.loai_chiso !=0 AND loai_chiso= '$loai_chiso'";
        $query = $this->db->query($sql); 

           return $query->result_array();
        
    }
    public function thongkeChiso_CoDK($idUser,$loai_chiso,$from,$to)
    {
        $sql = "SELECT b.* FROM chitiet_hoso b,hoso a WHERE a.id_user = '$idUser' AND a.id= b.id_hoso AND b.loai_chiso !=0 AND loai_chiso= '$loai_chiso' AND created_at >= '$from' AND created_at <= '$to'";
        $query = $this->db->query($sql); 

           return $query->result_array();
        
    }
  
}