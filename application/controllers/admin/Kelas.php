<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kelas_model', 'kelas');
		$this->load->model('Institusi_model', 'institusi');
		$this->load->model('Guru_model', 'guru');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Kelas',
			'judul'			=> 'Kelas',
			'data' 			=> $this->kelas->tabel(),
			'content'		=> 'admin/kelas/v_content',
			'ajax'	 		=> 'admin/kelas/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'list_institusi' 	=> $this->institusi->tabel(),
			'list_guru' 	=> $this->guru->tabel(),
			'title'			=> 'Admin - Tambah Kelas',
			'judul'			=> 'Tambah Kelas',
			'data' 			=> $this->kelas->tabel(),
			'content'		=> 'admin/kelas/v_add',
			'ajax'	 		=> 'admin/kelas/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->kelas->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/kelas'),'refresh');
		}else{

			$data = array(
				'list_institusi' 	=> $this->institusi->tabel(),
				'list_guru' 	=> $this->guru->tabel(),
				'title'			=> 'Admin - Edit Kelas',
				'judul'			=> 'Edit Kelas',
				'data' 			=> 	$this->kelas->detail($id)->row_array(),
				'content'		=> 'admin/kelas/v_edit',
				'ajax'	 		=> 'admin/kelas/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
			
			$data = array(
				'id_kelas'				=> $this->input->post('id_kelas'),
				'nama_kelas'			=> $this->input->post('nama_kelas'),
				'id_institusi'				=> $this->input->post('id_institusi'),
				'id_guru'				=> $this->input->post('id_guru')
				
			);

			$q = $this->kelas->insert($data);

			$this->session->set_flashdata('success', '<i class="fa fa-check"></i> Selamat, Tambah data berhasil');
			redirect(base_url('admin/kelas'),'refresh');
		
	}

	public function update()
	{
		$id = $this->input->post('id_kelas');

		$cek = $this->kelas->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/kelas'),'refresh');
		}else{

			$data = array(
				'id_kelas'				=> $this->input->post('id_kelas'),
				'nama_kelas'			=> $this->input->post('nama_kelas'),
				'id_institusi'				=> $this->input->post('id_institusi'),
				'id_guru'				=> $this->input->post('id_guru')
				
			);
			
			$this->kelas->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/kelas'),'refresh');
		}
			
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->kelas->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/kelas'),'refresh');
		}else{

			$data = array(
				'id_kelas'	=> $id
			);
			
			$query = $this->kelas->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}

	}

}

/* End of file kelas.php */
/* Location: ./application/controllers/admin/kelas.php */