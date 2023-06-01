<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_layout_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_layout');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_layout');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}


	public function tabel_detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_layout');
		$this->db->where('id_perusahaan', $id);
		$this->db->order_by('id', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_detail_foto_layout($id)
    {
        $this->db->select('*');
		$this->db->from('tbl_detail_layout');
		$this->db->where('id_perusahaan', $id);
		$this->db->order_by('id', 'Asc');
		$query = $this->db->get();
		return $query->result();
    }

	

	public function insert($data)
	{
		$this->db->insert('tbl_detail_layout', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_detail_layout', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('tbl_detail_layout');
	}

	public function delete_id_perusahaan($data)
	{
		$this->db->where('id_perusahaan', $data['id']);
		$this->db->delete('tbl_detail_layout');
	}


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */