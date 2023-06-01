<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brosur_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_brosur');
		$this->db->order_by('id_brosur', 'Desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_brosur');
		$this->db->order_by('nama', 'Asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function list_front()
	{
		$this->db->select('*');
		$this->db->from('tbl_brosur');
		$this->db->order_by('id_brosur', 'Desc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function detail($id_brosur)
	{
		$this->db->select('*');
		$this->db->from('tbl_brosur');
		$this->db->where('id_brosur', $id_brosur);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_brosur', $data);
	}

	public function update($data)
	{
		$this->db->where('id_brosur', $data['id_brosur']);
		$this->db->update('tbl_brosur', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_brosur', $data['id_brosur']);
		$this->db->delete('tbl_brosur');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_brosur) as id_brosur from tbl_brosur");
        $hasil = $query->row();
        return $hasil->id_brosur;
    }

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_brosur');
		$this->db->where('brosur_slug', $slug);
		$query = $this->db->get();
		return $query;
	}



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */