<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Testimoni_model', 'testimoni');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Testimoni',
			'judul'			=> 'Testimoni',
			'data' 			=> $this->testimoni->tabel(),
			'content'		=> 'admin/testimoni/v_content',
			'ajax'	 		=> 'admin/testimoni/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah Testimoni',
			'judul'			=> 'Tambah Testimoni',
			'content'		=> 'admin/testimoni/v_add',
			'ajax'	 		=> 'admin/testimoni/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->testimoni->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/testimoni'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Testimoni',
				'judul'			=> 'Edit Testimoni',
				'data' 			=> 	$this->testimoni->detail($id)->row_array(),
				'content'		=> 'admin/testimoni/v_edit',
				'ajax'	 		=> 'admin/testimoni/v_ajax'
			);
			//var_dump($data);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$nama1 = str_replace("_","",$_FILES["upload_data"]['name']);
		$nama2 = str_replace(" ","",$nama1);

		$image 								= time().'-'.$nama2;
		$config['upload_path'] 				= './public/image/upload/galeri_foto/';
		$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
		$config['max_size']  				= '2400';
		$config['file_name']  				= $image;

		$this->load->library('upload', $config);

		$this->upload->do_upload('upload_data');

		$data = array(
			'id_testimoni'					=> $this->input->post('id_testimoni'),
			'nama_testimoni'		=> $this->input->post('nama_testimoni'),
			'keterangan_testimoni'		=> $this->input->post('keterangan_testimoni'),
			'isi_testimoni'		=> $this->input->post('isi_testimoni'),
			'file_testimoni'				=> $image
		);
		$q = $this->testimoni->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/testimoni'),'refresh');

		
	}

	public function update()
	{
		$id = $this->input->post('id_testimoni');

		$cek = $this->testimoni->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/testimoni'),'refresh');
		}else{

			$nama		= strip_tags($this->input->post('nama_testimoni'));
			$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
			$trim     	= trim($string);
			$slug     	= strtolower(str_replace(" ", "-", $trim));

			if($_FILES["upload_data"]['name'] == ""){

				$data = array(
					'id_testimoni'		=> $this->input->post('id_testimoni'),
					'nama_testimoni'		=> $this->input->post('nama_testimoni'),
					'keterangan_testimoni'		=> $this->input->post('keterangan_testimoni'),
					'isi_testimoni'		=> $this->input->post('isi_testimoni')
				);
				
			}else{

				$nama1 = str_replace("_","",$_FILES["upload_data"]['name']);
				$nama2 = str_replace(" ","",$nama1);

				$image 								= time().'-'.$nama2;
				$config['upload_path'] 				= './public/image/upload/galeri_foto/';
				$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
				$config['max_size']  				= '2400';
				$config['file_name']  				= $image;

				$this->load->library('upload', $config);
	
				$this->upload->do_upload('upload_data');

				$data = array(
					'id_testimoni'					=> $this->input->post('id_testimoni'),
					'nama_testimoni'		=> $this->input->post('nama_testimoni'),
					'keterangan_testimoni'		=> $this->input->post('keterangan_testimoni'),
					'isi_testimoni'		=> $this->input->post('isi_testimoni'),
					'file_testimoni'				=> $image
				);
			}
			
			$this->testimoni->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/testimoni'),'refresh');
		}
		
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->testimoni->detail($id)->row_array();
		if($cek == null){
			$result['result']=2;
			echo json_encode($result);
		}else{

			$data = array(
				'id_testimoni'	=> $id
			);
			
			$this->testimoni->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}
		
	}


}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */