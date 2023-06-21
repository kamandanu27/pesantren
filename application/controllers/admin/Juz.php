<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juz extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Juz_model', 'juz');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Juz',
			'judul'			=> 'Juz',
			'data' 			=> $this->juz->tabel(),
			'content'		=> 'admin/juz/v_content',
			'ajax'	 		=> 'admin/juz/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah Juz',
			'judul'			=> 'Tambah Juz',
			'data' 			=> $this->juz->tabel(),
			'content'		=> 'admin/juz/v_add',
			'ajax'	 		=> 'admin/juz/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->juz->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/juz'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Juz',
				'judul'			=> 'Edit Juz',
				'data' 			=> 	$this->juz->detail($id)->row_array(),
				'content'		=> 'admin/juz/v_edit',
				'ajax'	 		=> 'admin/juz/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			
			$data = array(
				'id_juz'				=> $this->input->post('id_juz'),
				'nama_juz'				=> $this->input->post('nama_juz')
				
			);

			$q = $this->juz->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('admin/juz'),'refresh');
		
	}

	public function update()
	{
		$id = $this->input->post('id_juz');

		$cek = $this->juz->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/juz'),'refresh');
		}else{

			$data = array(
				'id_juz'			=> $this->input->post('id_juz'),
				'nama_juz'			=> $this->input->post('nama_juz')
				
			);
			
			$this->juz->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/juz'),'refresh');
		}
			
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->juz->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/juz'),'refresh');
		}else{

			$data = array(
				'id_juz'	=> $id
			);
			
			$query = $this->juz->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}

	}

}

/* End of file juz.php */
/* Location: ./application/controllers/admin/juz.php */