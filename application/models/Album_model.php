<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_album');
		$this->db->order_by('id_album', 'Desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_album');
		$this->db->order_by('nama', 'Asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function list_front()
	{
		$this->db->select('*');
		$this->db->from('tbl_album');
		$this->db->order_by('id_album', 'Desc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function detail($id_album)
	{
		$this->db->select('*');
		$this->db->from('tbl_album');
		$this->db->where('id_album', $id_album);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_album', $data);
	}

	public function update($data)
	{
		$this->db->where('id_album', $data['id_album']);
		$this->db->update('tbl_album', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_album', $data['id_album']);
		$this->db->delete('tbl_album');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_album) as id_album from tbl_album");
        $hasil = $query->row();
        return $hasil->id_album;
    }

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_album');
		$this->db->where('album_slug', $slug);
		$query = $this->db->get();
		return $query;
	}



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */