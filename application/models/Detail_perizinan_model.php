<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_perizinan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function tabel()
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_perizinan');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_perizinan');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}


	public function tabel_detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_perizinan');
		$this->db->where('id_perusahaan', $id);
		$this->db->order_by('id', 'Asc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_detail_perizinan($id)
    {
        $this->db->select('*');
		$this->db->from('tbl_detail_perizinan');
		$this->db->where('id_perusahaan', $id);
		$this->db->order_by('id', 'Asc');
		$query = $this->db->get();
		return $query->result();
    }

	

	public function insert($data)
	{
		$this->db->insert('tbl_detail_perizinan', $data);
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_detail_perizinan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('tbl_detail_perizinan');
	}

	public function delete_idannex_me_a($data)
	{
		$this->db->where('id_annex_me', $data['id_annex_me']);
		$this->db->delete('tbl_detail_perizinan');
	}


}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */