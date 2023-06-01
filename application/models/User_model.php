<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	


	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query;
	}

	public function ubahpassword($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user', $data);
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function username($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->row();
	}

	public function login($username,$enpass)
	{
		$username = $this->db->escape_str($username);
		$password = $this->db->escape_str($enpass);
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array(
			'username' => $username,
			'password' => sha1($password)
		));
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	public function update($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user', $data);
	}

	public function update_guru($data)
	{
		$this->db->where('username', $data['username']);
		$this->db->update('tbl_user', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user', 'is_deleted => 1');
	}

	public function delete_guru($data)
	{
		$this->db->where('username', $data['username']);
		$this->db->update('tbl_user', $data);
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */