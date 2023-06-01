<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model', 'product');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - product',
			'data' 	=> $this->product->tabel(),
			'content'	 	=> 'admin/product/v_content'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->product->cek_kode_terkahir();
        $nourut = substr($dariDB, 2, 4);
		$kode_baru = $nourut + 1;
		
		$data = array(
			'title'	=> 'Add product',
			'kode_baru' => $kode_baru,
			'content'	=> 'admin/product/v_add'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function edit($id)
	{
		$cek = $this->product->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/product'),'refresh');
		}else{

			$data = array(
				'title'	=> 'Edit product',
				'data'	=> $this->product->detail($id),
				'id'	=> $id,
				'content'	=> 'admin/product/v_edit'
			);
			
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'id_product'	=> $this->input->post('id_product'),
			'name_product'	=> $this->input->post('name_product'),
			'description_product'	=> $this->input->post('description_product')
		);
		$q = $this->product->insert($data);

		$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
		Add product data successfully');
		redirect(base_url('admin/product'),'refresh');

		
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$data = array(
			'id_product'	=> $this->input->post('id_product'),
			'name_product'	=> $this->input->post('name_product'),
			'description_product'	=> $this->input->post('description_product')
		);
		
		$this->product->update($data);

		$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
		Update product data successfully');
		redirect(base_url('admin/product'),'refresh');
			
	}

	public function delete($id)
	{
		$cek = $this->product->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/product'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->product->delete($data);

			$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
			Delete product data successfully');
			redirect(base_url('admin/product'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */