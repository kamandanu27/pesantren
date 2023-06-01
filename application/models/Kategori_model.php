<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('tbl_kategori.id_kategori,tbl_kategori.id_jenis,tbl_kategori.nama_kategori,tbl_jenis.nama_jenis');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_jenis','tbl_kategori.id_jenis = tbl_jenis.id_jenis', 'inner');
		$this->db->order_by('id_jenis', 'desc');
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function list()
	{
		$this->db->select('tbl_kategori.id_kategori,tbl_kategori.id_jenis,tbl_kategori.nama_kategori,tbl_jenis.nama_jenis');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_jenis','tbl_kategori.id_jenis = tbl_jenis.id_jenis', 'inner');
		$this->db->order_by('id_jenis', 'desc');
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get($this->table)->result();
		return $query;
	}

	public function listkategori($id_jenis)
	{
		$this->db->select('tbl_kategori.id_kategori,tbl_kategori.id_jenis,tbl_kategori.nama_kategori,tbl_jenis.nama_jenis');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_jenis','tbl_kategori.id_jenis = tbl_jenis.id_jenis', 'inner');
		$this->db->order_by('id_jenis', 'desc');
		$this->db->order_by('id_kategori', 'desc');
		$this->db->where('tbl_kategori.id_jenis', $id_jenis);
		$query = $this->db->get()->result();
		return $query;
	}

	public function detail($id_kategori)
	{
		$this->db->select('tbl_kategori.id_kategori,tbl_kategori.id_jenis,tbl_kategori.nama_kategori,tbl_jenis.nama_jenis');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_jenis','tbl_kategori.id_jenis = tbl_jenis.id_jenis', 'inner');
		$this->db->where('tbl_kategori.id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}


	public function insert($data)
	{
		$this->db->insert('tbl_kategori', $data);
	}

	public function update($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('tbl_kategori', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_kategori', $data['id']);
		$this->db->delete('tbl_kategori');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_kategori) as id_kategori from tbl_kategori");
        $hasil = $query->row();
        return $hasil->id_kategori;
    }


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */