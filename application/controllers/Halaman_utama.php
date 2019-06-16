<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Halaman_utama extends CI_Controller {
	public function __construct() {
	parent::__construct();
	$this->load->model('crud_model');
}
	public function index(){
		$tampil = $this->crud_model->tampil();
		$data=array( 
			'tampil' => $tampil,
			'isi'=>'crud/halaman_utama');
 		$this->load->view('layout/wrapper',$data);
	}
}
