<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_surat');
		$this->db->join('tbl_juz', 'tbl_surat.id_juz = tbl_juz.id_juz');
		$this->db->order_by('id_surat', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_surat');
		$this->db->join('tbl_juz', 'tbl_surat.id_juz = tbl_juz.id_juz');
		$this->db->where('id_surat', $id_surat);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_surat', $data);
	}

	public function update($data)
	{
		$this->db->where('id_surat', $data['id_surat']);
		$this->db->update('tbl_surat', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_surat', $data['id_surat']);
		$this->db->delete('tbl_surat', $data);
	}



}

/* End of file surat_model.php */
/* Location: ./application/models/surat_model.php */