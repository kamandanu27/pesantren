<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_jurusan');
		$this->db->order_by('id_jurusan', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_jurusan');
		$this->db->order_by('id_jurusan', 'Asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function detail($id_jurusan)
	{
		$this->db->select('*');
		$this->db->from('tbl_jurusan');
		$this->db->where('id_jurusan', $id_jurusan);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_jurusan)
	{
		$this->db->select('*');
		$this->db->from('tbl_jurusan');
		$this->db->where('slug_jurusan', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_jurusan');
		$this->db->where('slug_jurusan', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_jurusan', $data);
	}

	public function update($data)
	{
		$this->db->where('id_jurusan', $data['id_jurusan']);
		$this->db->update('tbl_jurusan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_jurusan', $data['id_jurusan']);
		$this->db->delete('tbl_jurusan');
	}



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */