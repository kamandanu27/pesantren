<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perizinan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perizinan_model', 'perizinan');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'		=> 'Admin - Perizinan',
			'data' 		=> $this->perizinan->tabel(),
			'content'	=> 'admin/perizinan/v_content',
			'ajax'	 	=> 'admin/perizinan/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->perizinan->cek_kode_terkahir();
        $nourut = substr($dariDB, 2, 4);
        $kode_baru = $nourut + 1;
		
		$data = array(
			'title'	=> 'Add perizinan',
			'kode_baru' => $kode_baru,
			'content'	=> 'admin/perizinan/v_add'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function edit($id)
	{
		$cek = $this->perizinan->detail($id);
		if($cek == null){

		}else{
			$data = $this->perizinan->detail($id);
			echo json_encode($data);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'nama_perizinan'			=> $this->input->post('nama_perizinan')
		);
		$q = $this->perizinan->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/perizinan'),'refresh');

		
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$data = array(
			'id_perizinan'			=> $this->input->post('e_id_perizinan'),
			'nama_perizinan'			=> $this->input->post('e_nama_perizinan')
		);
		
		$this->perizinan->update($data);

		$this->session->set_flashdata('flash', 'Update Berhasil');
		redirect(base_url('admin/perizinan'),'refresh');
			
	}

	public function delete($id)
	{
		$cek = $this->perizinan->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/perizinan'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->perizinan->delete($data);
			
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/perizinan'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */