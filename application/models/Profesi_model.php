<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_profesi');
		$this->db->order_by('id_profesi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_profesi)
	{
		$this->db->select('*');
		$this->db->from('tbl_profesi');
		$this->db->where('id_profesi', $id_profesi);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_profesi', $data);
	}

	public function update($data)
	{
		$this->db->where('id_profesi', $data['id_profesi']);
		$this->db->update('tbl_profesi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_profesi', $data['id']);
		$this->db->delete('tbl_profesi');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_profesi) as id_profesi from tbl_profesi");
        $hasil = $query->row();
        return $hasil->id_profesi;
    }


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */