<?php
class Kategori_model extends CI_Model{

    public $table = "kategori";

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        //akan digenerate DML insert into oleh ci
        return $this->db->insert($this->table,$data);
    }

    public function update($idcategory,$data){
        //ci akan men-generate statement where 
        $this->db->where('idcategory',$idcategory);
        //ci mengupdate sesuai where diatas
        return $this->db->update($this->table,$data);
    }

    public function find_all(){
        return $this->db->get($this->table)->result_array();
    }

    public function find_by_id($idcategory){
        return $this->db->get_where($this->table,['idcategory' => $idcategory])->row_array();
    }

    public function delete($idcategory){
        $this->db->where('idcategory',$idcategory);
        $this->db->delete($this->table);
    }

    public function pagination($limit,$start){
        $this->db->limit($limit,$start);
        $result = $this->db->get($this->table)->result_array();
        if(count($result) > 0){
            return $result;
        }
        return false;
    }

    public function get_total(){
        return $this->db->count_all($this->table);
    }
}