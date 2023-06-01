<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepalasekolah_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function detail()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepalasekolah');
		$this->db->where('id_kepalasekolah', 1);
		$query = $this->db->get();
		return $query;
	}


	public function update($data)
	{
		$this->db->where('id_kepalasekolah', $data['id_kepalasekolah']);
		$this->db->update('tbl_kepalasekolah', $data);
	}

}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */