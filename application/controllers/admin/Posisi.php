<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Posisi_model', 'posisi');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'		=> 'Admin - Posisi',
			'data' 		=> $this->posisi->tabel(),
			'content'	=> 'admin/posisi/v_content',
			'ajax'	 	=> 'admin/posisi/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->posisi->detail($id);
		if($cek == null){

		}else{
			$data = $this->posisi->detail($id);
			echo json_encode($data);
		}
	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'nama_posisi'			=> $this->input->post('nama_posisi')
		);
		$q = $this->posisi->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/posisi'),'refresh');

		
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$data = array(
			'id_posisi'			=> $this->input->post('e_id_posisi'),
			'nama_posisi'			=> $this->input->post('e_nama_posisi')
		);
		
		$this->posisi->update($data);

		$this->session->set_flashdata('flash', 'Update Berhasil');
		redirect(base_url('admin/posisi'),'refresh');
			
	}

	public function delete($id)
	{
		$cek = $this->posisi->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/posisi'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->posisi->delete($data);
			
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/posisi'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */