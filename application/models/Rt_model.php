<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rt_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('tbl_rt.id_rt,tbl_rt.id_desa,tbl_rt.nama_rt,tbl_rt.nomor_urutan,tbl_desa.nama_desa');
		$this->db->from('tbl_rt');
		$this->db->join('tbl_desa','tbl_rt.id_desa = tbl_desa.id_desa', 'inner');
		$this->db->order_by('id_rt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function list()
	{
		$this->db->select('tbl_rt.id_rt,tbl_rt.id_desa,tbl_rt.nama_rt,tbl_rt.nomor_urutan,tbl_desa.nama_desa');
		$this->db->from('tbl_rt');
		$this->db->join('tbl_desa','tbl_rt.id_desa = tbl_desa.id_desa', 'inner');
		$this->db->order_by('id_rt', 'desc');
		$query = $this->db->get($this->table)->result();
		return $query;
	}

	public function detail($id_rt)
	{
		$this->db->select('tbl_rt.id_rt,tbl_rt.id_desa,tbl_rt.nama_rt,tbl_rt.nomor_urutan,tbl_desa.nama_desa');
		$this->db->from('tbl_rt');
		$this->db->join('tbl_desa','tbl_rt.id_desa = tbl_desa.id_desa', 'inner');
		$this->db->where('tbl_rt.id_rt', $id_rt);
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_rt', $data);
	}

	public function update($data)
	{
		$this->db->where('id_rt', $data['id_rt']);
		$this->db->update('tbl_rt', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_rt', $data['id']);
		$this->db->delete('tbl_rt');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_rt) as id_rt from tbl_rt");
        $hasil = $query->row();
        return $hasil->id_rt;
    }

	public function data_get_rt($id_desa)
	{
		$this->db->select('*');
		$this->db->from('tbl_rt');
		$this->db->where('id_desa', $id_desa);
		$query = $this->db->get();
		return $query->result();
	}


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */