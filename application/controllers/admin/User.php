<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - User',
			'judul'			=> 'User',
			'data' 			=> $this->user->tabel(),
			'content'		=> 'admin/user/v_content',
			'ajax'	 		=> 'admin/user/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah User',
			'judul'			=> 'Tambah User',
			'data' 			=> $this->user->tabel(),
			'content'		=> 'admin/user/v_add',
			'ajax'	 		=> 'admin/user/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->user->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/user'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit User',
				'judul'			=> 'Edit User',
				'data' 			=> 	$this->user->detail($id)->row_array(),
				'content'		=> 'admin/user/v_edit',
				'ajax'	 		=> 'admin/user/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			
			$data = array(
				'nama_user'					=> $this->input->post('nama_user'),
				'alamat_user'				=> $this->input->post('alamat_user'),
				'nohp_user'					=> $this->input->post('nohp_user'),
				'email_user'				=> $this->input->post('email_user'),
				'instansi_user'				=> $this->input->post('instansi_user'),
				'level_user'				=> $this->input->post('level_user'),
				'username'					=> $this->input->post('username'),
				'password'					=> $this->input->post('password')
			);

			$q = $this->user->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('admin/user'),'refresh');
		
	}

	public function update()
	{
		$id = $this->input->post('id_user');

		$cek = $this->user->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/user'),'refresh');
		}else{

			$data = array(
				'id_user'					=> $this->input->post('id_user'),
				'nama_user'					=> $this->input->post('nama_user'),
				'alamat_user'				=> $this->input->post('alamat_user'),
				'nohp_user'					=> $this->input->post('nohp_user'),
				'email_user'				=> $this->input->post('email_user'),
				'instansi_user'				=> $this->input->post('instansi_user'),
				'level_user'				=> $this->input->post('level_user'),
				'username'					=> $this->input->post('username'),
				'password'					=> $this->input->post('password')
				
			);
			
			$this->user->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/user'),'refresh');
		}
			
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->user->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/user'),'refresh');
		}else{

			$data = array(
				'id_user'	=> $id
			);
			
			$query = $this->user->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}

	}

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */