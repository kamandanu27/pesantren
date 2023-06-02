<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Santri_model', 'santri');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Sumber Daya Manusia',
			'judul'			=> 'Sumber Daya Manusia',
			'data' 			=> $this->santri->tabel(),
			'content'		=> 'admin/santri/v_content',
			'ajax'	 		=> 'admin/santri/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah Sumber Daya Manusia',
			'judul'			=> 'Tambah Sumber Daya Manusia',
			'data' 			=> $this->santri->tabel(),
			'content'		=> 'admin/santri/v_add',
			'ajax'	 		=> 'admin/santri/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->santri->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/santri'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Sumber Daya Manusia',
				'judul'			=> 'Edit Sumber Daya Manusia',
				'data' 			=> 	$this->santri->detail($id)->row_array(),
				'content'		=> 'admin/santri/v_edit',
				'ajax'	 		=> 'admin/santri/v_ajax'
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
			redirect(base_url('admin/santri'),'refresh');
		}

		$valid = $this->form_validation;

		if($_FILES["foto_santri"]['name'] == ""){
			$data = array(
				'id_santri'	=> $this->input->post('id_santri'),
				'nama_santri'			=> $this->input->post('nama_santri'),
				'nis_santri'			=> $this->input->post('nis_santri'),
				'alamat_santri'		=> $this->input->post('alamat_santri'),
				'notlp_santri'		=> $this->input->post('notlp_santri'),
				'username_santri'			=> $this->input->post('username_santri'),
				'password_santri'		=> sha1($this->input->post('password_santri'))
			);


		}else{

			$image 								= time().'-'.$_FILES["foto_santri"]['name'];
			$config['upload_path'] 				= './public/image/upload/santri/';
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
			$config['max_size']  				= '2400';
			$config['file_name']  				= $image;

			$this->load->library('upload', $config);

			$this->upload->do_upload('foto_santri');

			$data = array(
				'id_santri'	=> $this->input->post('id_santri'),
				'nama_santri'			=> $this->input->post('nama_santri'),
				'nis_santri'			=> $this->input->post('nis_santri'),
				'alamat_santri'		=> $this->input->post('alamat_santri'),
				'notlp_santri'		=> $this->input->post('notlp_santri'),
				'username_santri'			=> $this->input->post('username_santri'),
				'password_santri'		=> sha1($this->input->post('password_santri')),
				'foto_santri'		=> $image 
			);

		}

		$q = $this->santri->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/santri'),'refresh');

		
	}

	public function update()
	{
		$id = $this->input->post('id_santri');

		$cek = $this->santri->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/santri'),'refresh');
		}else{

			if($_FILES["foto_santri"]['name'] == ""){

				if($this->input->post('password') == "" ){
					$data = array(
						'id_santri'	=> $this->input->post('id_santri'),
						'nama_santri'			=> $this->input->post('nama_santri'),
						'nis_santri'			=> $this->input->post('nis_santri'),
						'alamat_santri'		=> $this->input->post('alamat_santri'),
						'notlp_santri'		=> $this->input->post('notlp_santri'),
						'username_santri'			=> $this->input->post('username_santri'),
					);

				}else{
					$data = array(
						'id_santri'	=> $this->input->post('id_santri'),
						'nama_santri'			=> $this->input->post('nama_santri'),
						'nis_santri'			=> $this->input->post('nis_santri'),
						'alamat_santri'		=> $this->input->post('alamat_santri'),
						'notlp_santri'		=> $this->input->post('notlp_santri'),
						'username_santri'			=> $this->input->post('username_santri'),
						'password_santri'		=> sha1($this->input->post('password_santri'))
					);

				}
			}else{
				$image 								= time().'-'.$_FILES["foto_santri"]['name'];
				$config['upload_path'] 				= './public/image/upload/santri/';
				$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
				$config['max_size']  				= '2400';
				$config['file_name']  				= $image;

				$this->load->library('upload', $config);
	
				$this->upload->do_upload('foto_santri');

				if($this->input->post('password') == "" ){
					$data = array(
						'id_santri'	=> $this->input->post('id_santri'),
						'nama_santri'			=> $this->input->post('nama_santri'),
						'nis_santri'			=> $this->input->post('nis_santri'),
						'alamat_santri'		=> $this->input->post('alamat_santri'),
						'notlp_santri'		=> $this->input->post('notlp_santri'),
						'username_santri'			=> $this->input->post('username_santri'),
						'foto_santri'		=> $image 
					);

				}else{

					$data = array(
						'id_santri'	=> $this->input->post('id_santri'),
						'nama_santri'			=> $this->input->post('nama_santri'),
						'nis_santri'			=> $this->input->post('nis_santri'),
						'alamat_santri'		=> $this->input->post('alamat_santri'),
						'notlp_santri'		=> $this->input->post('notlp_santri'),
						'username_santri'			=> $this->input->post('username_santri'),
						'password_santri'		=> sha1($this->input->post('password_santri')),
						'foto_santri'		=> $image 
					);

				}

			}

			
			$this->santri->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/santri'),'refresh');
		}

		
			
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->santri->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/santri'),'refresh');
		}else{

			$data = array(
				'id_santri'	=> $id
			);
			
			$query = $this->santri->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}
		

	}

}

/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */