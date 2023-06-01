<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perizinan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_perizinan');
		$this->db->order_by('id_perizinan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_perizinan)
	{
		$this->db->select('*');
		$this->db->from('tbl_perizinan');
		$this->db->where('id_perizinan', $id_perizinan);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_perizinan', $data);
	}

	public function update($data)
	{
		$this->db->where('id_perizinan', $data['id_perizinan']);
		$this->db->update('tbl_perizinan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_perizinan', $data['id']);
		$this->db->delete('tbl_perizinan');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_perizinan) as id_perizinan from tbl_perizinan");
        $hasil = $query->row();
        return $hasil->id_perizinan;
    }


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */