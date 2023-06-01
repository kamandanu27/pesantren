<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_slider');
		$this->db->order_by('id_slider', 'Desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_slider');
		$this->db->order_by('nama', 'Asc');
		$query = $this->db->get()->result();
		return $query;
	}

	public function list_front()
	{
		$this->db->select('*');
		$this->db->from('tbl_slider');
		$this->db->order_by('id_slider', 'Desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($id_slider)
	{
		$this->db->select('*');
		$this->db->from('tbl_slider');
		$this->db->where('id_slider', $id_slider);
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_slider', $data);
	}

	public function update($data)
	{
		$this->db->where('id_slider', $data['id_slider']);
		$this->db->update('tbl_slider', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_slider', $data['id_slider']);
		$this->db->delete('tbl_slider');
	}

	public function cek_kode_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_slider) as id_slider from tbl_slider");
        $hasil = $query->row();
        return $hasil->id_slider;
    }

	public function cek_slug($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_slider');
		$this->db->where('slider_slug', $slug);
		$query = $this->db->get();
		return $query;
	}



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */