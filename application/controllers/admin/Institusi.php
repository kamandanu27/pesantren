<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institusi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Institusi_model', 'institusi');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Institusi',
			'judul'			=> 'Institusi',
			'data' 			=> $this->institusi->tabel(),
			'content'		=> 'admin/institusi/v_content',
			'ajax'	 		=> 'admin/institusi/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah Institusi',
			'judul'			=> 'Tambah Institusi',
			'data' 			=> $this->institusi->tabel(),
			'content'		=> 'admin/institusi/v_add',
			'ajax'	 		=> 'admin/institusi/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->institusi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/institusi'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Institusi',
				'judul'			=> 'Edit Institusi',
				'data' 			=> 	$this->institusi->detail($id)->row_array(),
				'content'		=> 'admin/institusi/v_edit',
				'ajax'	 		=> 'admin/institusi/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			
			$data = array(
				'id_institusi'				=> $this->input->post('id_institusi'),
				'nama_institusi'			=> $this->input->post('nama_institusi')
				
			);

			$q = $this->institusi->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('admin/institusi'),'refresh');
		
	}

	public function update()
	{
		$id = $this->input->post('id_institusi');

		$cek = $this->institusi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/institusi'),'refresh');
		}else{

			$data = array(
				'id_institusi'				=> $this->input->post('id_institusi'),
				'nama_institusi'			=> $this->input->post('nama_institusi'),
				
			);
			
			$this->institusi->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/institusi'),'refresh');
		}
			
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->institusi->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/institusi'),'refresh');
		}else{

			$data = array(
				'id_institusi'	=> $id
			);
			
			$query = $this->institusi->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}

	}

}

/* End of file institusi.php */
/* Location: ./application/controllers/admin/institusi.php */