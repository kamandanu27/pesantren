<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->order_by('id_foto', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function list_front($id_album)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->order_by('id_foto', 'Asc');
		$this->db->where('id_album', $id_album);
		$query = $this->db->get()->result();
		return $query;
	}

	public function detail($id_foto)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('id_foto', $id_foto);
		$query = $this->db->get();
		return $query;
	}

	public function detail_front($id_foto)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('slug_foto', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('slug_foto', $slug);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_foto', $data);
	}

	public function update($data)
	{
		$this->db->where('id_foto', $data['id_foto']);
		$this->db->update('tbl_foto', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_foto', $data['id_foto']);
		$this->db->delete('tbl_foto');
	}

	function get_detail_foto($id)
    {
        $this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('id_album', $id);
		$this->db->order_by('id_foto', 'Asc');
		$query = $this->db->get();
		return $query->result();
    }



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */