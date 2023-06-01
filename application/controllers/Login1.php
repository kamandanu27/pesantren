<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'admin');
		$this->load->model('guru_model', 'guru');
		$this->load->model('siswa_model', 'siswa');
		$this->load->model('wali_model', 'wali');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->helper('captcha');
		ob_start();
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required',
			array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{
			$username    = $this->input->post('username');
			$password    = $this->input->post('password');
			$captcha_insert = $this->input->post('captcha');
            $contain_sess_captcha = $this->session->userdata('valuecaptchaCode');
            if ($captcha_insert === $contain_sess_captcha) {
                $cek_a = $this->admin->cek_username($username);
    			$cek_g = $this->guru->cek_nip($username);
    			$cek_s = $this->siswa->cek_nisn($username);
    			$cek_w = $this->wali->cek_nohp($username);
    			if ($cek_a==1) 
    			{
    				$this->auth_a->login($username,$password);
    			}

    			else
    			{
    				$this->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Username tidak ada!');
    				redirect(base_url('home'),'refresh');
    			}
            }else{
                $this->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Captcha Salah!');
				redirect(base_url('home'),'refresh');
            }
		}

		$data = array(
			'title'	=> 'Login Admin | Apps Sekolah'
		);
// 		print_r($data);die();
		$this->load->view('home_v2', $data, FALSE);
	}
	
	public function lupa_password()
	{
		$this->form_validation->set_rules('username', 'Username', 'required',
			array( 'required'  => '%s harus diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array( 'required'  => '%s harus diisi!'));

		if ($this->form_validation->run()) 
		{
			$username    = $this->input->post('username');
			$password    = $this->input->post('password');
            $newpassword = $this->input->post('newpassword');
            if ($password === $newpassword) {
                $cek_a = $this->admin->cek_username($username);
    			$cek_g = $this->guru->cek_nip($username);
    			$cek_s = $this->siswa->cek_nisn($username);
    			$cek_w = $this->wali->cek_nohp($username);
    			if ($cek_a==1) 
    			{
    				$id_admin = $this->admin->username($username)->id_admin;
    				$data = array(
						'id_admin'   => $id_admin,
						'password'  => sha1($newpassword)
					);
					$this->admin->ubahpassword($data);
					$this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Ubah Password Berhasil!');
    				redirect(base_url('home'),'refresh');
    			}
    			if ($cek_g==1) 
    			{
    				$id_guru = $this->guru->username($username)->id_guru;
    				$data = array(
						'id_guru'   => $id_guru,
						'password'  => sha1($newpassword)
					);
					$this->guru->ubahpassword($data);
					$this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Ubah Password Berhasil!');
    				redirect(base_url('home'),'refresh');
    			}
    			if ($cek_s==1) 
    			{
    				$id_siswa = $this->siswa->username($username)->id_siswa;
    				$data = array(
						'id_siswa'   => $id_siswa,
						'password'  => sha1($newpassword)
					);
					$this->siswa->ubahpassword($data);
					$this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Ubah Password Berhasil!');
    				redirect(base_url('home'),'refresh');
    			}
    			if ($cek_w==1) 
    			{
    				$id_wali = $this->wali->username($username)->id_wali;
    				$data = array(
						'id_wali'   => $id_wali,
						'password'  => sha1($newpassword)
					);
					$this->wali->ubahpassword($data);
					$this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Ubah Password Berhasil!');
    				redirect(base_url('home'),'refresh');
    			}
    			else
    			{
    				$this->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Username tidak ada!');
    				redirect(base_url('login/lupa_password'),'refresh');
    			}
            }else{
                $this->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Konfirmasi password tidak benar, silahkan konfirmasi password dengan benar!');
				redirect(base_url('login/lupa_password'),'refresh');
            }
		}

		$data = array(
			'title'	=> 'Login Admin | Apps Sekolah'
		);
// 		print_r($data);die();
		$this->load->view('lupa_password_v2', $data, FALSE);
	}

	public function logout_a()
	{
		$this->auth_a->logout();
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */