<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profesi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profesi_model', 'profesi');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'		=> 'Admin - profesi',
			'data' 		=> $this->profesi->tabel(),
			'content'	=> 'admin/profesi/v_content',
			'ajax'	 	=> 'admin/profesi/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->profesi->cek_kode_terkahir();
        $nourut = substr($dariDB, 2, 4);
        $kode_baru = $nourut + 1;
		
		$data = array(
			'title'	=> 'Add profesi',
			'kode_baru' => $kode_baru,
			'content'	=> 'admin/profesi/v_add'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function edit($id)
	{
		$cek = $this->profesi->detail($id);
		if($cek == null){

		}else{
			$data = $this->profesi->detail($id);
			echo json_encode($data);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'nama_profesi'			=> $this->input->post('nama_profesi')
		);
		$q = $this->profesi->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/profesi'),'refresh');

		
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$data = array(
			'id_profesi'			=> $this->input->post('e_id_profesi'),
			'nama_profesi'			=> $this->input->post('e_nama_profesi')
		);
		
		$this->profesi->update($data);

		$this->session->set_flashdata('flash', 'Update Berhasil');
		redirect(base_url('admin/profesi'),'refresh');
			
	}

	public function delete($id)
	{
		$cek = $this->profesi->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/profesi'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->profesi->delete($data);
			
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/profesi'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */