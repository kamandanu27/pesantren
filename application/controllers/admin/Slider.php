<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Slider_model', 'slider');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Foto Slider',
			'judul'			=> 'Foto Slider',
			'data' 			=> $this->slider->tabel(),
			'content'		=> 'admin/slider/v_content',
			'ajax'	 		=> 'admin/slider/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->slider->cek_kode_terkahir();
		$kode_baru = $dariDB + 1;

		$data = array(
			'title'			=> 'Admin - Tambah Foto Slider',
			'judul'			=> 'Tambah Foto Slider',
			'content'		=> 'admin/slider/v_add',
			'ajax'	 		=> 'admin/slider/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->slider->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/slider'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Foto Slider',
				'judul'			=> 'Edit Foto Slider',
				'data' 			=> 	$this->slider->detail($id)->row_array(),
				'content'		=> 'admin/slider/v_edit',
				'ajax'	 		=> 'admin/slider/v_ajax'
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
			'id_slider'					=> $this->input->post('id_slider'),
			'tulisanbesar_slider'		=> $this->input->post('tulisanbesar_slider'),
			'tulisankecil_slider'		=> $this->input->post('tulisankecil_slider'),
			'file_slider'				=> $image
		);
		$q = $this->slider->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/slider'),'refresh');

		
	}

	public function update()
	{
		$id = $this->input->post('id_slider');

		$cek = $this->slider->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/slider'),'refresh');
		}else{

			$nama		= strip_tags($this->input->post('tulisanbesar_slider'));
			$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
			$trim     	= trim($string);
			$slug     	= strtolower(str_replace(" ", "-", $trim));

			if($_FILES["upload_data"]['name'] == ""){

				$data = array(
					'id_slider'		=> $this->input->post('id_slider'),
					'tulisanbesar_slider'		=> $this->input->post('tulisanbesar_slider'),
					'tulisankecil_slider'		=> $this->input->post('tulisankecil_slider')
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
					'id_slider'					=> $this->input->post('id_slider'),
					'tulisanbesar_slider'		=> $this->input->post('tulisanbesar_slider'),
					'tulisankecil_slider'		=> $this->input->post('tulisankecil_slider'),
					'file_slider'				=> $image
				);
			}
			
			$this->slider->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/slider'),'refresh');
		}
		
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->slider->detail($id)->row_array();
		if($cek == null){
			$result['result']=2;
			echo json_encode($result);
		}else{

			$data = array(
				'id_slider'	=> $id
			);
			
			$this->slider->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}
		
	}


}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */