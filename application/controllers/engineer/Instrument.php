<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instrument extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('instrument_model', 'instrument');
		$this->load->model('company_model', 'company');
		$this->load->model('instrument_detail_model', 'instrument_detail');
		$this->load->model('product_model', 'product');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Instrument',
			'data_instrument' 	=> $this->instrument->tabel(),
			'content'	 	=> 'admin/instrument/v_content'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->instrument->cek_kode_terkahir();
        $nourut = substr($dariDB, 2, 7);
		$kode_baru = $nourut + 1;

		$data = array(
			'title'	=> 'Add instrument',
			'kode_baru' => $kode_baru,
			'data_company' 	=> $this->company->tabel(),
			'data_product' 	=> $this->product->tabel(),
			'content'	=> 'admin/instrument/v_add'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function edit($id)
	{
		$cek = $this->instrument->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/instrument'),'refresh');
		}else{

			$data = array(
				'title'	=> 'Edit Instrument',
				'data'	=> $this->instrument->detail($id),
				'data_company' 	=> $this->company->tabel(),
				'data_product' 	=> $this->product->tabel(),
				'id'	=> $id,
				'content'	=> 'admin/instrument/v_edit'
			);
			
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'id_instrument'	=> $this->input->post('id_instrument'),
			'name_instrument'	=> $this->input->post('name_instrument'),
			'id_company'	=> $this->input->post('id_company'),
			'status'	=> $this->input->post('status')
		);
		$this->instrument->insert($data);

		$post = $this->input->post();
 
		foreach ($post['sn'] as $key => $value) {
		   //masukkan data ke variabel array jika kedua form tidak kosong
		   if ($post['sn'][$key] != '' || $post['id_instrument_detail'][$key] != '')
		   {
			  $simpan[] = array(
				 'sn' => $post['sn'][$key],
				 'id_instrument_detail' => $post['id_instrument_detail'][$key],
			  );
		   }
		}

		//simpan data
		$this->db->update_batch('tbl_instrument_detail' , $simpan , 'id_instrument_detail' );

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/instrument'),'refresh');
		//var_dump($data);
	
	}

	public function update()
	{
		$data = array(
			'id_instrument'	=> $this->input->post('id_instrument'),
			'name_instrument'	=> $this->input->post('name_instrument'),
			'id_company'	=> $this->input->post('id_company'),
			'status'	=> $this->input->post('status')
		);
		$this->instrument->update($data);
		
		$post = $this->input->post();
 
		foreach ($post['sn'] as $key => $value) {
		   //masukkan data ke variabel array jika kedua form tidak kosong
		   if ($post['sn'][$key] != '' || $post['id_instrument_detail'][$key] != '')
		   {
			  $simpan[] = array(
				 'sn' => $post['sn'][$key],
				 'id_instrument_detail' => $post['id_instrument_detail'][$key],
			  );
		   }
		}

		$this->db->update_batch('tbl_instrument_detail' , $simpan , 'id_instrument_detail' );

		$this->session->set_flashdata('flash', 'Update Berhasil');
		redirect(base_url('admin/instrument'),'refresh');
		//var_dump($data);
			
	}

	public function delete($id)
	{
		$cek = $this->instrument->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/instrument'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);

			$this->instrument->delete($data);
			$this->instrument_detail->delete($data);
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/instrument'),'refresh');
		}
		
	}

	public function detail_instrument($id)
	{
		$list = $this->instrument_detail->get_detail_datatable($id);
		$data = array();
		$no=1;
        foreach ($list as $r) {
			$row = array();

			$test =  $this->security->xss_clean($r->id_instrument_detail);
			$row[] = $this->security->xss_clean($no);
            $row[] = $this->security->xss_clean($r->id_product);
			$row[] = $this->security->xss_clean($r->name_product);
			$row[] = "<input type='hidden' value='$r->id_instrument_detail' name='id_instrument_detail[]'></input>
			<input type='text' value='$r->sn' name='sn[]'></input>";

			$row[] = "<button type='button' class='btn btn-danger btn_hapus_instrument_detail' id='$test' title='Hapus'>
			<i class='btn-icon-only icon-trash'> </i></button>";
			$data[] = $row;
			$no++;
        }
        $result = array(
            "data" => $data,
        );
        echo json_encode($result);
	}

	public function hapus_instrument_detail($id)
	{

		$data = array(
			'id'	=> $id
		);
		$this->instrument_detail->delete($data);

		$result['result']=1;
		echo json_encode($result);

	}

	public function insert_instrument_detail()
	{
		

		$data = array(
			'id_instrument'	=> $this->input->post('id_instrument'),
			'id_product'	=> $this->input->post('id_product')
		);
		$this->instrument_detail->insert($data);
		$result['result']=1;
		echo json_encode($result);
	
	}
	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */