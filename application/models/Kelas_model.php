<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_kelas');
		$this->db->join('tbl_institusi', 'tbl_kelas.id_institusi = tbl_institusi.id_institusi');
		$this->db->join('tbl_guru', 'tbl_kelas.id_guru = tbl_guru.id_guru');
		$this->db->order_by('id_kelas', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_kelas)
	{
		$this->db->select('*');
		$this->db->from('tbl_kelas');
		$this->db->join('tbl_institusi', 'tbl_kelas.id_institusi = tbl_institusi.id_institusi');
		$this->db->join('tbl_guru', 'tbl_kelas.id_guru = tbl_guru.id_guru');
		$this->db->where('id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_kelas', $data);
	}

	public function update($data)
	{
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->update('tbl_kelas', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->delete('tbl_kelas', $data);
	}



}

/* End of file kelas_model.php */
/* Location: ./application/models/kelas_model.php */