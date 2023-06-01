<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Admin_model', 'admin');
		$this->load->model('User_model', 'user');
		ob_start();
	}

	public function index()
	{

		$data = array(
			'title'				=> 'Login | Admin',
			'data' 				=> $this->identitas->detail()->row_array(),
		);
		$this->load->view('login', $data, FALSE);
	}

	public function login()
	{

		$this->form_validation->set_rules('username', 'Username', 'required',
			array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{
			$username    = $this->input->post('username');
			$password    = $this->input->post('password');

				$cek_u = $this->user->cek_username($username);
				
    			if ($cek_u==1) 
					{
						$this->auth_a->login($username,$password);
					}
    			else
					{
						$this->session->set_flashdata('gagal', '<i class="fa fa-danger-circle"></i>Username dan Password Tidak Ditemukan');
						redirect(base_url('home'),'refresh');
					}
            
		}

		$data = array(
			'title'	=> 'Login | Card'
		);
		$this->load->view('home_v2', $data, FALSE);
	}
	

	public function logout()
	{
		$this->auth_a->logout();
		$this->auth_u->logout();
	}
	

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */