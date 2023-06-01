<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gurustaf_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_gurustaf');
		$this->db->where('is_deleted', 0);
		$this->db->order_by('id_gurustaf', 'Asc');
		$this->db->order_by('aktif', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function list($kelompok,$limit)
	{
		$this->db->select('*');
		$this->db->from('tbl_gurustaf');
		$this->db->where('is_deleted', 0);
		$this->db->where('aktif', 0);
		$this->db->where('kelompok', $kelompok);
		$this->db->order_by('nama', 'Asc');
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query;
	}

	public function list_load($kelompok,$limit)
	{
		$this->db->select('*');
		$this->db->from('tbl_gurustaf');
		$this->db->where('is_deleted', 0);
		$this->db->where('aktif', 0);
		$this->db->where('kelompok', $kelompok);
		$this->db->order_by('nama', 'Asc');
		$this->db->limit(4,$limit);
		$query = $this->db->get();
		return $query;
	}

	public function detail($id_gurustaf)
	{
		$this->db->select('*');
		$this->db->from('tbl_gurustaf');
		$this->db->where('id_gurustaf', $id_gurustaf);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_gurustaf', $data);
	}

	public function update($data)
	{
		$this->db->where('id_gurustaf', $data['id_gurustaf']);
		$this->db->update('tbl_gurustaf', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_gurustaf', $data['id_gurustaf']);
		$this->db->update('tbl_gurustaf', $data);
	}



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */