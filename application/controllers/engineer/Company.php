<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Company_model', 'company');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'		=> 'Admin - Company',
			'data' 		=> $this->company->tabel(),
			'content'	=> 'admin/company/v_content'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->company->cek_kode_terkahir();
        $nourut = substr($dariDB, 2, 4);
        $kode_baru = $nourut + 1;
		
		$data = array(
			'title'	=> 'Add Company',
			'kode_baru' => $kode_baru,
			'content'	=> 'admin/company/v_add'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function edit($id)
	{
		$cek = $this->company->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/company'),'refresh');
		}else{

			$data = array(
				'title'	=> 'Edit company',
				'data'	=> $this->company->detail($id),
				'id'	=> $id,
				'content'	=> 'admin/company/v_edit'
			);
			
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'id_company'			=> $this->input->post('id_company'),
			'name_company'			=> $this->input->post('name_company'),
			'street_company'		=> $this->input->post('street_company'),
			'phone_company'			=> $this->input->post('phone_company'),
			'description_company'	=> $this->input->post('description_company')
		);
		$q = $this->company->insert($data);

		$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
		Add company data successfully');
		redirect(base_url('admin/company'),'refresh');
		
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$data = array(
			'id_company'			=> $this->input->post('id_company'),
			'name_company'			=> $this->input->post('name_company'),
			'street_company'		=> $this->input->post('street_company'),
			'phone_company'			=> $this->input->post('phone_company'),
			'description_company'	=> $this->input->post('description_company')
		);
		
		$this->company->update($data);

		$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
		Update company data successfully');
		redirect(base_url('admin/company'),'refresh');
			
	}

	public function delete($id)
	{
		$cek = $this->company->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/company'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->company->delete($data);
			$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
			Delete company data successfully');
			redirect(base_url('admin/company'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */