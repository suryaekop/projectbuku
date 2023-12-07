<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	//me-load model,session yang diperlukan di semua function
    public function __construct(){
        parent::__construct();
        if(!$this->ion_auth->is_admin()){
            redirect(base_url('welcome'));
        }
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('buku_model','buku');
        $this->load->model('kategori_model','kategori');
    }

    //http://localhost/appkaryawan/index.php/divisi/index
    //menampilkan semua data
    public function index(){
        $data['books'] = $this->buku->find_all();
        $data['kategori'] = $this->kategori->find_all();
        //print_r($data);
        $this->load->view('buku/index',$data);
    }

    //menampilkan form tambah
    function tambah(){
        $data['kategori'] = $this->kategori->find_all();
        $this->load->view('buku/tambah',$data);
    }

    //menyimpan data pada form tambah
    function tambah_save(){
        //validasi server side
        $this->form_validation->set_rules('kode_buku','Kode Buku','required');
        $this->form_validation->set_rules('judul','Judul Buku','required');
        $this->form_validation->set_rules('pengarang','Pengarang','required');
        $this->form_validation->set_rules('penerbit','Penerbit','required');
        $this->form_validation->set_rules('tanggal_terbit','Tanggal Terbit','required');
        $this->form_validation->set_rules('kota_terbit','Kota Terbit','required');
        $this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');
        $this->form_validation->set_rules('idcategory','Kategori','required');
        if($this->form_validation->run() == FALSE){
            //validasi menemukan error
            $this->load->view('buku/tambah');
        }else{
            //handle upload foto
            $config['upload_path'] = './fotobuku/';
            $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|JPEG';
            $config['max_size'] = 2048000;
            $config['max_width'] = 10000;
            $config['max_height'] = 10000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $foto = $this->upload->data();
                $foto = $foto['file_name'];
                $kode_buku = $this->input->post('kode_buku');
                $judul = $this->input->post('judul');
                $pengarang = $this->input->post('pengarang');
                $penerbit = $this->input->post('penerbit');
                $tanggal_terbit = $this->input->post('tanggal_terbit');
                $kota_terbit = $this->input->post('kota_terbit');
                $jumlah_halaman = $this->input->post('jumlah_halaman');
                $idcategory = $this->input->post('idcategory');
                
                $data = array(
                    'kode_buku' => $kode_buku,
                    'judul' => $judul,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'tanggal_terbit' => $tanggal_terbit,
                    'kota_terbit' => $kota_terbit,
                    'jumlah_halaman' => $jumlah_halaman,
                    'foto' => $foto,
                    'idcategory' => $idcategory
                );
                $this->db->insert('buku',$data);
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
                redirect(base_url('buku'));
        }
           
        }
    }

    //menampilkan form edit
    function edit(){
        $id = $this->uri->segment(3);
        $data = $this->buku->find_by_id($id);
        $data['kategori'] = $this->kategori->find_all();
        $this->load->view('buku/edit',$data);
    }

    //menyimpan data pada form edit
    function edit_save(){
        //validasi server side
        $id = $this->input->post('id');
        $this->form_validation->set_rules('kode_buku','Kode Buku','required');
        $this->form_validation->set_rules('judul','Judul Buku','required');
        $this->form_validation->set_rules('pengarang','Pengarang','required');
        $this->form_validation->set_rules('penerbit','Penerbit','required');
        $this->form_validation->set_rules('tanggal_terbit','Tanggal Terbit','required');
        $this->form_validation->set_rules('kota_terbit','Kota Terbit','required');
        $this->form_validation->set_rules('jumlah_halaman','Jumlah Halaman','required');
        $this->form_validation->set_rules('idcategory','Kategori','required');
        if($this->form_validation->run() == FALSE){
            //validasi menemukan error
            $this->load->view('buku/tambah');
        }else{
            //handle upload foto
            $config['upload_path'] = './fotobuku/';
            $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|JPEG';
            $config['max_size'] = 2048000;
            $config['max_width'] = 10000;
            $config['max_height'] = 10000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $kode_buku = $this->input->post('kode_buku');
                $judul = $this->input->post('judul');
                $pengarang = $this->input->post('pengarang');
                $penerbit = $this->input->post('penerbit');
                $tanggal_terbit = $this->input->post('tanggal_terbit');
                $kota_terbit = $this->input->post('kota_terbit');
                $jumlah_halaman = $this->input->post('jumlah_halaman');
                $idcategory = $this->input->post('idcategory');

                $data = array(
                    'kode_buku' => $kode_buku,
                    'judul' => $judul,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'tanggal_terbit' => $tanggal_terbit,
                    'kota_terbit' => $kota_terbit,
                    'jumlah_halaman' => $jumlah_halaman,
                    'idcategory' => $idcategory
                );

                $this->db->where('id',$id);
                $this->db->update('buku',$data);
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                redirect(base_url('buku'));
            } else {
                $foto = $this->upload->data();
                $foto = $foto['file_name'];
                $kode_buku = $this->input->post('kode_buku');
                $judul = $this->input->post('judul');
                $pengarang = $this->input->post('pengarang');
                $penerbit = $this->input->post('penerbit');
                $tanggal_terbit = $this->input->post('tanggal_terbit');
                $kota_terbit = $this->input->post('kota_terbit');
                $jumlah_halaman = $this->input->post('jumlah_halaman');
                $idcategory = $this->input->post('idcategory');
                
                $data = array(
                    'kode_buku' => $kode_buku,
                    'judul' => $judul,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'tanggal_terbit' => $tanggal_terbit,
                    'kota_terbit' => $kota_terbit,
                    'jumlah_halaman' => $jumlah_halaman,
                    'foto' => $foto,
                    'idcategory' => $idcategory
                );
                $this->db->where('id',$id);
                $this->db->update('buku',$data);
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                redirect(base_url('buku'));
        }
           
        }
    }

    //menampilkan detail data
    function detail(){
        $id = $this->uri->segment('3');
        $data = $this->buku->cari_detail_id($id);
        $this->load->view('buku/detail',$data);
    }

    //menghapus data
    function hapus(){
        $id = $this->uri->segment(3);
        $this->buku->delete($id);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect(base_url('buku'));
    }
}
