<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	//me-load model,session yang diperlukan di semua function
    public function __construct(){
        parent::__construct();
        if(!$this->ion_auth->is_admin()){
            redirect(base_url('welcome'));
        }
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('kategori_model','kategori');
    }

    //http://localhost/appkaryawan/index.php/divisi/index
    //menampilkan semua data
    public function index(){
        $data['categories'] = $this->kategori->find_all();
        //print_r($data);
        $this->load->view('kategori/index',$data);
    }

    //menampilkan form tambah
    function tambah(){
        $this->load->view('kategori/tambah');
    }

    //menyimpan data pada form tambah
    function tambah_save(){
        //validasi server side
        $this->form_validation->set_rules('kode_kategori','Kode Kategori','required');
        $this->form_validation->set_rules('nama_kategori','Nama Kategori','required');
        if($this->form_validation->run() == FALSE){
            //validasi menemukan error
            $this->load->view('kategori/tambah');
        }else{
            //lolos validasi
            $data = [
                'kode_kategori' => $this->input->post('kode_kategori'),
                'nama_kategori' => $this->input->post('nama_kategori')
            ];
            $this->kategori->insert($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            redirect(base_url('kategori'));
        }
    }

    //menampilkan form edit
    function edit(){
        $idcategory = $this->uri->segment(3);
        $data = $this->kategori->find_by_id($idcategory);
        $this->load->view('kategori/edit',$data);
    }

    //menyimpan data pada form edit
    function edit_save(){
        //validasi server side
        $idcategory = $this->input->post('idcategory');
        $this->form_validation->set_rules('kode_kategori','Kode kategori','required');
        $this->form_validation->set_rules('nama_kategori','Nama kategori','required');
        if($this->form_validation->run() == FALSE){
            //validasi menemukan error
            $data = $this->kategori->find_by_id($idcategory);
            $this->load->view('kategori/edit',$data);
        }else{
            //lolos validasi
            $data = [
                'kode_kategori' => $this->input->post('kode_kategori'),
                'nama_kategori' => $this->input->post('nama_kategori')
            ];
            $this->kategori->update($idcategory,$data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
            redirect(base_url('kategori'));
        }
    }

    //menampilkan detail data
    function detail(){
        $idcategory = $this->uri->segment(3);
        $data = $this->kategori->find_by_id($idcategory);
        $this->load->view('kategori/detail',$data);
    }

    //menghapus data
    function hapus(){
        $idcategory = $this->uri->segment(3);
        $this->kategori->delete($idcategory);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect(base_url('kategori'));
    }
}
