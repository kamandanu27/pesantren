<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listkategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model', 'kategori');
		$this->load->model('Jenis_model', 'jenis');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$cek = $this->jenis->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/dashboard'),'refresh');
		}else{
			$data = array(
				'title'	=> 'Admin - List Kategori',
				'data'	=> $this->kategori->listkategori($id_jenis),
				'content'	=> 'admin/listkategori/v_content',
				'ajax'	 	=> 'admin/listkategori/v_ajax'
			);
			
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function edit($id)
	{
		$cek = $this->kategori->detail($id);
		if($cek == null){

		}else{
			$data_kategori = $this->kategori->detail($id);
			$list_jenis = $this->jenis->tabel();
			//var_dump($coba);
			$edit_kategori = 
			"<div class='form-group'>
				<label>jenis</label>
				<select class='form-control' name='e_id_jenis' id='e_id_jenis' required>
					<option value='".$data_kategori->id_jenis."'>".$data_kategori->nama_jenis."</option>
					<option value=''>- Pilih jenis -</option>";
					foreach($list_jenis as $row){
						$edit_kategori .= "<option value='".$row->id_jenis."'>".$row->nama_jenis."</option>";
					}
				$edit_kategori .="</select>
			</div>
			<div class='form-group'>
            	<label class='control-label'>Nama kategori</label>
            	<input class='form-control' type='text' id='e_nama_kategori' name='e_nama_kategori' value='".$data_kategori->nama_kategori."' required>
            	<input class='form-control' type='hidden' id='e_id_kategori' name='e_id_kategori' value='".$data_kategori->id_kategori."' required>
          	</div>";

			$data = array('edit' => $edit_kategori);
			echo json_encode($data);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'nama_kategori'		=> $this->input->post('nama_kategori'),
			'id_jenis'			=> $this->input->post('id_jenis')
		);
		$q = $this->kategori->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/kategori'),'refresh');

		
	}

	public function update()
	{
		$valid = $this->form_validation;

			$id	= $this->input->post('id');
			$data = array(
				'id_kategori'			=> $this->input->post('e_id_kategori'),
				'nama_kategori'		=> $this->input->post('e_nama_kategori'),
				'id_jenis'			=> $this->input->post('e_id_jenis')
			);
			
			$this->kategori->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/kategori'),'refresh');
		
			
	}

	public function delete($id)
	{
		$cek = $this->kategori->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/kategori'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->kategori->delete($data);
			
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/kategori'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */