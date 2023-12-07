<?php
class Buku_model extends CI_Model{

    public $table = "buku";

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        //akan digenerate DML insert into oleh ci
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data){
        //ci akan men-generate statement where 
        $this->db->where('id',$id);
        //ci mengupdate sesuai where diatas
        return $this->db->update($this->table,$data);
    }

    public function find_all(){
        return $this->db->query("SELECT buku.*, kategori.nama_kategori as namakategori from buku INNER JOIN kategori on buku.idcategory = kategori.idcategory")->result_array();
    }
    public function cari_detail_id($id){
        $result =  $this->db->query("SELECT buku.*, kategori.nama_kategori as namakategori from buku INNER JOIN kategori on buku.idcategory = kategori.idcategory WHERE buku.id='$id'")->result_array();
        if($result){
            return $result[0];
        }else{
            return false;
        }
    }

    public function find_by_id($id){
        return $this->db->get_where($this->table,['id' => $id])->row_array();
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }
    public function find_by_nama($judul){
        $result = $this->db->query("SELECT buku.*, kategori.nama_kategori as namakategori from buku INNER JOIN kategori on buku.idcategory=kategori.idcategory WHERE buku.judul LIKE '%$judul%'")->result_array();
        return $result;
    }
    public function find_by_category($nama_kategori){
        $result = $this->db->query("SELECT buku.*, kategori.nama_kategori as namakategori from buku INNER JOIN kategori on buku.idcategory=kategori.idcategory WHERE kategori.nama_kategori LIKE '%$nama_kategori%'")->result_array();
        return $result;
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