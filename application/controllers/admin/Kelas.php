<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kelas_model', 'kelas');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Sumber Daya Manusia',
			'judul'			=> 'Sumber Daya Manusia',
			'data' 			=> $this->kelas->tabel(),
			'content'		=> 'admin/kelas/v_content',
			'ajax'	 		=> 'admin/kelas/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Admin - Tambah Sumber Daya Manusia',
			'judul'			=> 'Tambah Sumber Daya Manusia',
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
				'title'			=> 'Admin - Edit Sumber Daya Manusia',
				'judul'			=> 'Edit Sumber Daya Manusia',
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
				'nama_kelas'				=> $this->input->post('nama_kelas')
				
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
				'id_kelas'	=> $this->input->post('id_kelas'),
				'nama_kelas'			=> $this->input->post('nama_kelas'),
				
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