<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tambah extends CI_Controller {
	public function __construct() {
	parent::__construct();
	$this->load->model('crud_model');
	$this->load->library('upload');
}

	public function index(){
		$tampil = $this->crud_model->tampil();
		$data=array( 'tampil' => $tampil,
			'isi' => 'crud/tambah_view');
 		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
		$upload_file = $_FILES['gambar']['name'];
		if($upload_file){
			$config['upload_path']   = './assets/img/';
			$config['max_size'] = '2048';
			$config['allowed_types'] = 'jpg|png|jpeg|';

			$this->upload->initialize($config);

			if($this->upload->do_upload('gambar')) {
				$data = array(
					'id_data' => $this->input->post(''),
					'nama_data' => $this->input->post('nama'),
					'gambar' => $this->upload->data('file_name'));
					$this->crud_model->tambah($data);
					$this->session->set_flashdata('pesan', '<div class="alert"> Berhasil Ditambah </div>');
					redirect(base_url('tambah'), 'refresh');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert"> Gambar Gagal Ditambah </div>');
					redirect(base_url('tambah'), 'refresh');
				}
			}else{
				$data = array(
					'id_data' => $this->input->post(''),
					'nama_data' => $this->input->post('nama'));
					$this->crud_model->tambah($data);
					$this->session->set_flashdata('pesan', '<div class="alert"> Berhasil Ditambah </div>');
					redirect(base_url('tambah'), 'refresh');
			}

	}

	public function hapus($id) {
		$coba = $this->crud_model->isi_data($id);
		$isi_data = $coba['gambar'];
		if ($isi_data != null) {
			unlink(FCPATH.'./assets/img/'.$isi_data);
		}
		$this->crud_model->delete($id);
		$this->session->set_flashdata('pesan', '<div class="alert"> Berhasil Dihapus </div>');
		redirect(base_url().'tambah/');
	}

	public function edit($id=null) {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data=array(
			'detail' => $this->crud_model->detail($id),
			'isi' =>'crud/edit_view');
			$this->load->view('layout/wrapper',$data);
		// Kalau tidak ada error  diupdate
		}else{
		$upload_file = $_FILES['gambar']['name'];
		if($upload_file){
			$config['upload_path']   = './assets/img/';
			$config['max_size'] = '2048';
			$config['allowed_types'] = 'jpg|png|jpeg|';

			$this->upload->initialize($config);

			if($this->upload->do_upload('gambar')) {
				$gambarlama = $this->input->post('gambarlama');
					if ($gambarlama != null) {
						unlink(FCPATH.'./assets/img/'.$gambarlama);
					}
				$data = array(
					'id_data' => $this->input->post('id_data'),
					'nama_data' => $this->input->post('nama'),
					'gambar' => $this->upload->data('file_name'));
					$this->crud_model->edit($data);
					$this->session->set_flashdata('pesan', '<div class="alert"> Berhasil Diperbarui </div>');
					redirect(base_url('tambah'), 'refresh');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert"> Gambar Gagal Diperbarui </div>');
					redirect(base_url('tambah'), 'refresh');
				}
			}else{
				$data = array(
					'id_data' => $this->input->post('id_data'),
					'nama_data' => $this->input->post('nama'));
					$this->crud_model->edit($data);
					$this->session->set_flashdata('pesan', '<div class="alert"> Berhasil Diperbarui </div>');
					redirect(base_url('tambah'), 'refresh');
			}

		}
	}
}