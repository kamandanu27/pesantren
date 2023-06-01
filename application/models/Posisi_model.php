<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_posisi');
		$this->db->order_by('id_posisi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_posisi)
	{
		$this->db->select('*');
		$this->db->from('tbl_posisi');
		$this->db->where('id_posisi', $id_posisi);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_posisi', $data);
	}

	public function update($data)
	{
		$this->db->where('id_posisi', $data['id_posisi']);
		$this->db->update('tbl_posisi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_posisi', $data['id']);
		$this->db->delete('tbl_posisi');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_posisi) as id_posisi from tbl_posisi");
        $hasil = $query->row();
        return $hasil->id_posisi;
    }


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */