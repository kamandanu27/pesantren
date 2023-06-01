<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function get_user($id_user)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query->row();
	}

	

}

/* End of file Public_model.php */
/* Location: ./application/models/Public_model.php */