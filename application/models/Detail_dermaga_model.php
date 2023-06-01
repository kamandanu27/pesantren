<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_dermaga_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_dermaga');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_dermaga');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}


	public function tabel_detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_dermaga');
		$this->db->where('id_annex_me', $id);
		$this->db->order_by('id', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_detail_foto_dermaga($id)
    {
        $this->db->select('*');
		$this->db->from('tbl_detail_dermaga');
		$this->db->where('id_perusahaan', $id);
		$this->db->order_by('id', 'Asc');
		$query = $this->db->get();
		return $query->result();
    }

	

	public function insert($data)
	{
		$this->db->insert('tbl_detail_dermaga', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_detail_dermaga', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('tbl_detail_dermaga');
	}

	public function delete_id_perusahaan($data)
	{
		$this->db->where('id_perusahaan', $data['id']);
		$this->db->delete('tbl_detail_dermaga');
	}


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */