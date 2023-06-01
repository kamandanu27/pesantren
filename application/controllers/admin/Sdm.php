<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gurustaf_model', 'gurustaf');
		$this->load->model('User_model', 'user');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Sumber Daya Manusia',
			'judul'			=> 'Sumber Daya Manusia',
			'data' 			=> $this->gurustaf->tabel(),
			'content'		=> 'admin/gurustaf/v_content',
			'ajax'	 		=> 'admin/gurustaf/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah Sumber Daya Manusia',
			'judul'			=> 'Tambah Sumber Daya Manusia',
			'data' 			=> $this->gurustaf->tabel(),
			'content'		=> 'admin/gurustaf/v_add',
			'ajax'	 		=> 'admin/gurustaf/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->gurustaf->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/sdm'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Sumber Daya Manusia',
				'judul'			=> 'Edit Sumber Daya Manusia',
				'data' 			=> 	$this->gurustaf->detail($id)->row_array(),
				'content'		=> 'admin/gurustaf/v_edit',
				'ajax'	 		=> 'admin/gurustaf/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
		$username = $this->input->post('email');
		$cek = $this->user->cek_username($username);

		if($cek > 0){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/sdm'),'refresh');
		}

		$valid = $this->form_validation;

		if($_FILES["upload_data"]['name'] == ""){
			$data = array(
				'id_gurustaf'	=> $this->input->post('id_gurustaf'),
				'nik'			=> $this->input->post('nik'),
				'nama'			=> $this->input->post('nama'),
				'jabatan'		=> $this->input->post('jabatan'),
				'no_telp'		=> $this->input->post('no_telp'),
				'email'			=> $this->input->post('email'),
				'kelompok'		=> $this->input->post('kelompok'),
				'aktif'			=> $this->input->post('aktif'),
				'password'		=> sha1($this->input->post('password'))
			);

			$data_user = array(
				'name_user'		=> $this->input->post('nama'),
				'username'		=> $this->input->post('email'),
				'level_user'	=> $this->input->post('kelompok'),
				'password'		=> sha1($this->input->post('password'))
			);

		}else{

			$image 								= time().'-'.$_FILES["upload_data"]['name'];
			$config['upload_path'] 				= './public/image/upload/gurustaf/';
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
			$config['max_size']  				= '2400';
			$config['file_name']  				= $image;

			$this->load->library('upload', $config);

			$this->upload->do_upload('upload_data');

			$data = array(
				'id_gurustaf'	=> $this->input->post('id_gurustaf'),
				'nik'			=> $this->input->post('nik'),
				'nama'			=> $this->input->post('nama'),
				'jabatan'		=> $this->input->post('jabatan'),
				'no_telp'		=> $this->input->post('no_telp'),
				'email'			=> $this->input->post('email'),
				'kelompok'		=> $this->input->post('kelompok'),
				'aktif'			=> $this->input->post('aktif'),
				'password'		=> sha1($this->input->post('password')),
				'foto_gurustaf'		=> $image 
			);

			$data_user = array(
				'name_user'		=> $this->input->post('nama'),
				'username'		=> $this->input->post('email'),
				'level_user'	=> $this->input->post('kelompok'),
				'foto_user'		=> $image,
				'password'		=> sha1($this->input->post('password'))
			);
		}

		$q = $this->gurustaf->insert($data);
		$q_user = $this->user->insert($data_user);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/sdm'),'refresh');

		
	}

	public function update()
	{
		$id = $this->input->post('id_gurustaf');

		$cek = $this->gurustaf->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/sdm'),'refresh');
		}else{

			if($_FILES["upload_data"]['name'] == ""){

				if($this->input->post('password') == "" ){
					$data = array(
						'id_gurustaf'	=> $this->input->post('id_gurustaf'),
						'nik'			=> $this->input->post('nik'),
						'nama'			=> $this->input->post('nama'),
						'jabatan'		=> $this->input->post('jabatan'),
						'no_telp'		=> $this->input->post('no_telp'),
						'kelompok'		=> $this->input->post('kelompok'),
						'aktif'			=> $this->input->post('aktif'),
						'email'			=> $this->input->post('email')
					);

					$data_user = array(
						'name_user'		=> $this->input->post('nama'),
						'username'		=> $this->input->post('email'),
						'level_user'	=> $this->input->post('kelompok')
					);

				}else{
					$data = array(
						'id_gurustaf'	=> $this->input->post('id_gurustaf'),
						'nik'			=> $this->input->post('nik'),
						'nama'			=> $this->input->post('nama'),
						'jabatan'		=> $this->input->post('jabatan'),
						'no_telp'		=> $this->input->post('no_telp'),
						'email'			=> $this->input->post('email'),
						'kelompok'		=> $this->input->post('kelompok'),
						'aktif'			=> $this->input->post('aktif'),
						'password'		=> sha1($this->input->post('password'))
					);

					$data_user = array(
						'name_user'		=> $this->input->post('nama'),
						'username'		=> $this->input->post('email'),
						'level_user'	=> $this->input->post('kelompok'),
						'password'		=> sha1($this->input->post('password'))
					);

				}
			}else{
				$image 								= time().'-'.$_FILES["upload_data"]['name'];
				$config['upload_path'] 				= './public/image/upload/gurustaf/';
				$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
				$config['max_size']  				= '2400';
				$config['file_name']  				= $image;

				$this->load->library('upload', $config);
	
				$this->upload->do_upload('upload_data');

				if($this->input->post('password') == "" ){
					$data = array(
						'id_gurustaf'	=> $this->input->post('id_gurustaf'),
						'nik'			=> $this->input->post('nik'),
						'nama'			=> $this->input->post('nama'),
						'jabatan'		=> $this->input->post('jabatan'),
						'no_telp'		=> $this->input->post('no_telp'),
						'kelompok'		=> $this->input->post('kelompok'),
						'aktif'			=> $this->input->post('aktif'),
						'email'			=> $this->input->post('email'),
						'foto_gurustaf'		=> $image 
					);

					$data_user = array(
						'name_user'		=> $this->input->post('nama'),
						'username'		=> $this->input->post('email'),
						'level_user'	=> $this->input->post('kelompok'),
						'foto_user'		=> $image
					);
				}else{

					$data = array(
						'id_gurustaf'	=> $this->input->post('id_gurustaf'),
						'nik'			=> $this->input->post('nik'),
						'nama'			=> $this->input->post('nama'),
						'jabatan'		=> $this->input->post('jabatan'),
						'no_telp'		=> $this->input->post('no_telp'),
						'kelompok'		=> $this->input->post('kelompok'),
						'aktif'			=> $this->input->post('aktif'),
						'email'			=> $this->input->post('email'),
						'password'		=> sha1($this->input->post('password')),
						'foto_gurustaf'		=> $image 
					);

					$data_user = array(
						'name_user'		=> $this->input->post('nama'),
						'username'		=> $this->input->post('email'),
						'level_user'	=> $this->input->post('kelompok'),
						'foto_user'		=> $image,
						'password'		=> sha1($this->input->post('password'))
					);
				}

			}

			
			$this->gurustaf->update($data);
			$this->user->update_guru($data_user);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/sdm'),'refresh');
		}

		
			
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->gurustaf->detail($id)->row_array();
		$username = $cek['email'];
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/sdm'),'refresh');
		}else{

			$data = array(
				'id_gurustaf'	=> $id,
				'is_deleted'	=> 1
			);

			$data_user = array(
				'username'	=> $username,
				'is_deleted'	=> 1
			);
			
			$query = $this->gurustaf->delete($data);
			$query_user = $this->user->delete_guru($data_user);
			
			$result['result']=1;
			echo json_encode($result);
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */