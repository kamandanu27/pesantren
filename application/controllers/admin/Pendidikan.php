<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pendidikan_model', 'pendidikan');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'		=> 'Admin - Pendidikan',
			'data' 		=> $this->pendidikan->tabel(),
			'content'	=> 'admin/pendidikan/v_content',
			'ajax'	 	=> 'admin/pendidikan/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->pendidikan->cek_kode_terkahir();
        $nourut = substr($dariDB, 2, 4);
        $kode_baru = $nourut + 1;
		
		$data = array(
			'title'	=> 'Add pendidikan',
			'kode_baru' => $kode_baru,
			'content'	=> 'admin/pendidikan/v_add'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function edit($id)
	{
		$cek = $this->pendidikan->detail($id);
		if($cek == null){

		}else{
			$data = $this->pendidikan->detail($id);
			echo json_encode($data);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'nama_pendidikan'			=> $this->input->post('nama_pendidikan')
		);
		$q = $this->pendidikan->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/pendidikan'),'refresh');

		
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$data = array(
			'id_pendidikan'			=> $this->input->post('e_id_pendidikan'),
			'nama_pendidikan'			=> $this->input->post('e_nama_pendidikan')
		);
		
		$this->pendidikan->update($data);

		$this->session->set_flashdata('flash', 'Update Berhasil');
		redirect(base_url('admin/pendidikan'),'refresh');
			
	}

	public function delete($id)
	{
		$cek = $this->pendidikan->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/pendidikan'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->pendidikan->delete($data);
			
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/pendidikan'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */