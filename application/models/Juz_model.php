<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juz_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_juz');
		$this->db->order_by('id_juz', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_juz)
	{
		$this->db->select('*');
		$this->db->from('tbl_juz');
		$this->db->where('id_juz', $id_juz);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_juz', $data);
	}

	public function update($data)
	{
		$this->db->where('id_juz', $data['id_juz']);
		$this->db->update('tbl_juz', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_juz', $data['id_juz']);
		$this->db->delete('tbl_juz', $data);
	}



}

/* End of file juz_model.php */
/* Location: ./application/models/juz_model.php */