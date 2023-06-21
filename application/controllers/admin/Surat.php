<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Surat_model', 'surat');
		$this->load->model('Juz_model', 'juz');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Surat',
			'judul'			=> 'Surat',
			'data' 			=> $this->surat->tabel(),
			'content'		=> 'admin/surat/v_content',
			'ajax'	 		=> 'admin/surat/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'list_juz' 		=> $this->juz->tabel(),
			'title'			=> 'Admin - Tambah Surat',
			'judul'			=> 'Tambah Surat',
			'data' 			=> $this->surat->tabel(),
			'content'		=> 'admin/surat/v_add',
			'ajax'	 		=> 'admin/surat/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->surat->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/surat'),'refresh');
		}else{

			$data = array(
				'list_juz' 		=> $this->juz->tabel(),
				'title'			=> 'Admin - Edit Surat',
				'judul'			=> 'Edit Surat',
				'data' 			=> 	$this->surat->detail($id)->row_array(),
				'content'		=> 'admin/surat/v_edit',
				'ajax'	 		=> 'admin/surat/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			
			$data = array(
				'id_surat'				=> $this->input->post('id_surat'),
				'nama_surat'			=> $this->input->post('nama_surat'),
				'id_juz'				=> $this->input->post('id_juz')
				
			);

			$q = $this->surat->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('admin/surat'),'refresh');
		
	}

	public function update()
	{
		$id = $this->input->post('id_surat');

		$cek = $this->surat->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/surat'),'refresh');
		}else{

			$data = array(
				'id_surat'				=> $this->input->post('id_surat'),
				'nama_surat'			=> $this->input->post('nama_surat'),
				'id_juz'				=> $this->input->post('id_juz')
				
			);
			
			$this->surat->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/surat'),'refresh');
		}
			
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->surat->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/surat'),'refresh');
		}else{

			$data = array(
				'id_surat'	=> $id
			);
			
			$query = $this->surat->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}

	}

}

/* End of file surat.php */
/* Location: ./application/controllers/admin/surat.php */