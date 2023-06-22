<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institusi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_institusi');
		$this->db->order_by('id_institusi', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_institusi)
	{
		$this->db->select('*');
		$this->db->from('tbl_institusi');
		$this->db->where('id_institusi', $id_institusi);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_institusi', $data);
	}

	public function update($data)
	{
		$this->db->where('id_institusi', $data['id_institusi']);
		$this->db->update('tbl_institusi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_institusi', $data['id_institusi']);
		$this->db->delete('tbl_institusi', $data);
	}



}

/* End of file institusi_model.php */
/* Location: ./application/models/institusi_model.php */