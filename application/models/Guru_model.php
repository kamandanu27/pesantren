<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->order_by('id_guru', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_guru)
	{
		$this->db->select('*');
		$this->db->from('tbl_guru');
		$this->db->where('id_guru', $id_guru);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_guru', $data);
	}

	public function update($data)
	{
		$this->db->where('id_guru', $data['id_guru']);
		$this->db->update('tbl_guru', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_guru', $data['id_guru']);
		$this->db->delete('tbl_guru', $data);
	}



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */