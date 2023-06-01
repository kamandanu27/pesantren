<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurusan_model', 'jurusan');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Jenjang Pendidikan',
			'judul'			=> 'Jenjang Pendidikan',
			'data' 			=> $this->jurusan->tabel(),
			'content'		=> 'admin/jurusan/v_content',
			'ajax'	 		=> 'admin/jurusan/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah Jenjang Pendidikan',
			'judul'			=> 'Tambah Jenjang Pendidikan',
			'data' 			=> $this->jurusan->tabel(),
			'content'		=> 'admin/jurusan/v_add',
			'ajax'	 		=> 'admin/jurusan/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->jurusan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/jurusan'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Jenjang Pendidikan',
				'judul'			=> 'Edit Jenjang Pendidikan',
				'data' 			=> 	$this->jurusan->detail($id)->row_array(),
				'content'		=> 'admin/jurusan/v_edit',
				'ajax'	 		=> 'admin/jurusan/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$nama		= strip_tags($this->input->post('nama'));
		$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
		$trim     	= trim($string);
		$slug     	= strtolower(str_replace(" ", "-", $trim));

		$nama1 = str_replace("_","",$_FILES["upload_data"]['name']);
		$nama2 = str_replace(" ","",$nama1);

		$image 								= time().'-'.$nama2;
		$config['upload_path'] 				= './public/image/upload/kompetensi/';
		$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
		$config['max_size']  				= '240000';
		$config['file_name']  				= $image;

		$this->load->library('upload', $config);

		$this->upload->do_upload('upload_data');

		$data = array(
			'nama'			=> $nama,
			'slug_jurusan'	=> $slug,
			'deskripsi'		=> $this->input->post('deskripsi'),
			'foto'			=> $image
		);
		$q = $this->jurusan->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/jurusan'),'refresh');

		
	}

	public function update()
	{
		$id = $this->input->post('id_jurusan');

		$cek = $this->jurusan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/jurusan'),'refresh');
		}else{

			$nama		= strip_tags($this->input->post('nama'));
			$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
			$trim     	= trim($string);
			$slug     	= strtolower(str_replace(" ", "-", $trim));

			if($_FILES["upload_data"]['name'] == ""){

				$data = array(
					'id_jurusan'	=> $this->input->post('id_jurusan'),
					'nama'			=> $nama,
					'slug_jurusan'	=> $slug,
					'deskripsi'		=> $this->input->post('deskripsi')
				);
				
			}else{

				$nama1 = str_replace("_","",$_FILES["upload_data"]['name']);
				$nama2 = str_replace(" ","",$nama1);

				$image 								= time().'-'.$nama2;
				$config['upload_path'] 				= './public/image/upload/kompetensi/';
				$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
				$config['max_size']  				= '240000';
				$config['file_name']  				= $image;

				$this->load->library('upload', $config);
	
				$this->upload->do_upload('upload_data');

				$data = array(
					'id_jurusan'	=> $this->input->post('id_jurusan'),
					'nama'			=> $nama,
					'slug_jurusan'	=> $slug,
					'deskripsi'		=> $this->input->post('deskripsi'),
					'foto'			=> $image
				);
			}
			
			$this->jurusan->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/jurusan'),'refresh');
		}

		
			
	}

	public function delete($id)
	{
		$cek = $this->jurusan->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/jurusan'),'refresh');
		}else{

			$data = array(
				'id_jurusan'	=> $id
			);
			
			$this->jurusan->delete($data);
			
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/jurusan'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */