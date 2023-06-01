<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_pendidikan');
		$this->db->order_by('id_pendidikan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_pendidikan)
	{
		$this->db->select('*');
		$this->db->from('tbl_pendidikan');
		$this->db->where('id_pendidikan', $id_pendidikan);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_pendidikan', $data);
	}

	public function update($data)
	{
		$this->db->where('id_pendidikan', $data['id_pendidikan']);
		$this->db->update('tbl_pendidikan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_pendidikan', $data['id']);
		$this->db->delete('tbl_pendidikan');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_pendidikan) as id_pendidikan from tbl_pendidikan");
        $hasil = $query->row();
        return $hasil->id_pendidikan;
    }


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */