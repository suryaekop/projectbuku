<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('cari');
	}
	public function cari_kategori()
	{
		$this->load->view('carikategori');
	}
	public function cari_action(){
		$judul = $this->input->post('judul');
		$this->load->model('buku_model','buku');
		$data['books'] = $this->buku->find_by_nama($judul);
		$this->load->view('cari',$data);
	}
	public function cari_action_category(){
		$nama_kategori = $this->input->post('nama_kategori');
		$this->load->model('buku_model','buku');
		$data['books'] = $this->buku->find_by_category($nama_kategori);
		$this->load->view('carikategori',$data);
	}
}
