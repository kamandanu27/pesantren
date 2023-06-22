<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_santri');
		$this->db->join('tbl_kelas', 'tbl_santri.id_kelas = tbl_kelas.id_kelas');
		$this->db->order_by('id_santri', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_santri)
	{
		$this->db->select('*');
		$this->db->from('tbl_santri');
		$this->db->join('tbl_kelas', 'tbl_santri.id_kelas = tbl_kelas.id_kelas');
		$this->db->where('id_santri', $id_santri);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_santri', $data);
	}

	public function update($data)
	{
		$this->db->where('id_santri', $data['id_santri']);
		$this->db->update('tbl_santri', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_santri', $data['id_santri']);
		$this->db->delete('tbl_santri', $data);
	}



}

/* End of file Santri_model.php */
/* Location: ./application/models/Santri_model.php */