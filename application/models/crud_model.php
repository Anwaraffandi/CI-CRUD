<?php
class Crud_model extends CI_Model {
public function __construct() {
$this->load->database();
}

public function tampil() {
	$query = $this->db->get('tb_data');
	$this->db->order_by('id_data', 'DESC');
	return $query->result_array();
}
public function tambah($data) {
	return $this->db->insert('tb_data', $data);
}
public function edit($data) {
	$this->db->where('id_data', $data['id_data']);
	return $this->db->update('tb_data', $data);
}
public function detail($id= FALSE) {
	if ($id === FALSE) {
		$query = $this->db->get('tb_data');
		return $query->result_array();
	}
	$query = $this->db->get_where('tb_data', array('id_data' => $id));
	return $query->row_array();
}
public function delete($id) {
	$this->db->where('id_data',$id);
	return $this->db->delete('tb_data');
}
public function isi_data($id) {
	$query = $this->db->get_where('tb_data', array('id_data' => $id));
	return $query->row_array();
}
}
