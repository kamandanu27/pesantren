<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guru_model', 'guru');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Sumber Daya Manusia',
			'judul'			=> 'Sumber Daya Manusia',
			'data' 			=> $this->guru->tabel(),
			'content'		=> 'admin/guru/v_content',
			'ajax'	 		=> 'admin/guru/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah Sumber Daya Manusia',
			'judul'			=> 'Tambah Sumber Daya Manusia',
			'data' 			=> $this->guru->tabel(),
			'content'		=> 'admin/guru/v_add',
			'ajax'	 		=> 'admin/guru/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->guru->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/Guru'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Sumber Daya Manusia',
				'judul'			=> 'Edit Sumber Daya Manusia',
				'data' 			=> 	$this->guru->detail($id)->row_array(),
				'content'		=> 'admin/guru/v_edit',
				'ajax'	 		=> 'admin/guru/v_ajax'
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
			redirect(base_url('admin/Guru'),'refresh');
		}

		$valid = $this->form_validation;

		if($_FILES["foto_guru"]['name'] == ""){
			$data = array(
				'id_guru'	=> $this->input->post('id_guru'),
				'nama_guru'			=> $this->input->post('nama_guru'),
				'nip_guru'			=> $this->input->post('nip_guru'),
				'alamat_guru'		=> $this->input->post('alamat_guru'),
				'notlp_guru'		=> $this->input->post('notlp_guru'),
				'username_guru'			=> $this->input->post('username_guru'),
				'password_guru'		=> sha1($this->input->post('password_guru'))
			);


		}else{

			$image 								= time().'-'.$_FILES["foto_guru"]['name'];
			$config['upload_path'] 				= './public/image/upload/guru/';
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
			$config['max_size']  				= '2400';
			$config['file_name']  				= $image;

			$this->load->library('upload', $config);

			$this->upload->do_upload('foto_guru');

			$data = array(
				'id_guru'	=> $this->input->post('id_guru'),
				'nama_guru'			=> $this->input->post('nama_guru'),
				'nip_guru'			=> $this->input->post('nip_guru'),
				'alamat_guru'		=> $this->input->post('alamat_guru'),
				'notlp_guru'		=> $this->input->post('notlp_guru'),
				'username_guru'			=> $this->input->post('username_guru'),
				'password_guru'		=> sha1($this->input->post('password_guru')),
				'foto_guru'		=> $image 
			);

		}

		$q = $this->guru->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/Guru'),'refresh');

		
	}

	public function update()
	{
		$id = $this->input->post('id_guru');

		$cek = $this->guru->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/Guru'),'refresh');
		}else{

			if($_FILES["foto_guru"]['name'] == ""){

				if($this->input->post('password') == "" ){
					$data = array(
						'id_guru'	=> $this->input->post('id_guru'),
						'nama_guru'			=> $this->input->post('nama_guru'),
						'nip_guru'			=> $this->input->post('nip_guru'),
						'alamat_guru'		=> $this->input->post('alamat_guru'),
						'notlp_guru'		=> $this->input->post('notlp_guru'),
						'username_guru'			=> $this->input->post('username_guru'),
					);

				}else{
					$data = array(
						'id_guru'	=> $this->input->post('id_guru'),
						'nama_guru'			=> $this->input->post('nama_guru'),
						'nip_guru'			=> $this->input->post('nip_guru'),
						'alamat_guru'		=> $this->input->post('alamat_guru'),
						'notlp_guru'		=> $this->input->post('notlp_guru'),
						'username_guru'			=> $this->input->post('username_guru'),
						'password_guru'		=> sha1($this->input->post('password_guru'))
					);

				}
			}else{
				$image 								= time().'-'.$_FILES["foto_guru"]['name'];
				$config['upload_path'] 				= './public/image/upload/guru/';
				$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
				$config['max_size']  				= '2400';
				$config['file_name']  				= $image;

				$this->load->library('upload', $config);
	
				$this->upload->do_upload('foto_guru');

				if($this->input->post('password') == "" ){
					$data = array(
						'id_guru'	=> $this->input->post('id_guru'),
						'nama_guru'			=> $this->input->post('nama_guru'),
						'nip_guru'			=> $this->input->post('nip_guru'),
						'alamat_guru'		=> $this->input->post('alamat_guru'),
						'notlp_guru'		=> $this->input->post('notlp_guru'),
						'username_guru'			=> $this->input->post('username_guru'),
						'foto_guru'		=> $image 
					);

				}else{

					$data = array(
						'id_guru'	=> $this->input->post('id_guru'),
						'nama_guru'			=> $this->input->post('nama_guru'),
						'nip_guru'			=> $this->input->post('nip_guru'),
						'alamat_guru'		=> $this->input->post('alamat_guru'),
						'notlp_guru'		=> $this->input->post('notlp_guru'),
						'username_guru'			=> $this->input->post('username_guru'),
						'password_guru'		=> sha1($this->input->post('password_guru')),
						'foto_guru'		=> $image 
					);

				}

			}

			
			$this->guru->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/Guru'),'refresh');
		}

		
			
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->guru->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/guru'),'refresh');
		}else{

			$data = array(
				'id_guru'	=> $id
			);
			
			$query = $this->guru->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */