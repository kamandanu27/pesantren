<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Engineer_model', 'engineer');
		$this->load->model('Job_model', 'job');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Engineer - Dashboard',
			'getengineer' => $this->public_model->get_engineer($this->session->userdata('id_engineer')),
			'j_jobopen' 			=> $this->job->jumlah_jobopen_engineer(),
			'j_jobcontinue' 		=> $this->job->jumlah_jobcontinue_engineer(),
			'j_jobfinish' 			=> $this->job->jumlah_jobfinish_engineer(),
			'j_jobclose' 			=> $this->job->jumlah_jobclose_engineer(),
			'content'	 	=> 'engineer/dashboard/v_content'
		);
		$this->load->view('engineer/layout/v_wrapper', $data, FALSE);

	}

	public function add()
	{
		$data = array(
			'title'	=> 'Tambah MLC',
			'content'	=> 'admin/mlc/v_add'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function edit($id)
	{
		$cek = $this->mlc->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/mlc'),'refresh');
		}else{

			$data = array(
				'title'	=> 'Edit MLC',
				'data'	=> $this->mlc->detail($id),
				'id'	=> $id,
				'content'	=> 'admin/mlc/v_edit'
			);
			
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'a1'	=> $this->input->post('b1'),
			'a2'	=> $this->input->post('b2'),
			'a3'	=> $this->input->post('a3'),
			'a4'	=> $this->input->post('b4'),
			'a5'	=> $this->input->post('b5'),
			'a6'	=> $this->input->post('b6'),
			'b1'	=> $this->input->post('b1'),
			'b2'	=> $this->input->post('b2'),
			'b3'	=> $this->input->post('b3'),
			'b4'	=> $this->input->post('b4'),
			'b5'	=> $this->input->post('b5'),
			'b6'	=> $this->input->post('b6'),
			'c1_a'	=> $this->input->post('c1_a'),
			'c1_b'	=> $this->input->post('c1_b'),
			'c1_c'	=> $this->input->post('c1_c'),
			'c1_d'	=> $this->input->post('c1_d'),
			'c2_a'	=> $this->input->post('c2_a'),
			'c2_b'	=> $this->input->post('c2_b'),
			'c2_c'	=> $this->input->post('c2_c'),
			'c2_d'	=> $this->input->post('c2_d'),
			'c3_a'	=> $this->input->post('c3_a'),
			'c3_b'	=> $this->input->post('c3_b'),
			'c3_c'	=> $this->input->post('c3_c'),
			'c3_d'	=> $this->input->post('c3_d'),
			'c4_a'	=> $this->input->post('c4_a'),
			'c4_b'	=> $this->input->post('c4_b'),
			'c4_c'	=> $this->input->post('c4_c'),
			'c4_d'	=> $this->input->post('c4_d'),
			'c5_a'	=> $this->input->post('c5_a'),
			'c5_b'	=> $this->input->post('c5_b'),
			'c5_c'	=> $this->input->post('c5_c'),
			'c5_d'	=> $this->input->post('c5_d'),
			'd1_a'	=> $this->input->post('d1_a'),
			'd1_b'	=> $this->input->post('d1_b'),
			'd1_c'	=> $this->input->post('d1_c'),
			'd1_d'	=> $this->input->post('d1_d'),
			'd2_a'	=> $this->input->post('d2_a'),
			'd2_b'	=> $this->input->post('d2_b'),
			'd2_c'	=> $this->input->post('d2_c'),
			'd2_d'	=> $this->input->post('d2_d'),
			'd3_a'	=> $this->input->post('d3_a'),
			'd3_b'	=> $this->input->post('d3_b'),
			'd3_c'	=> $this->input->post('d3_c'),
			'd3_d'	=> $this->input->post('d3_d'),
			'd4_a'	=> $this->input->post('d4_a'),
			'd4_b'	=> $this->input->post('d4_b'),
			'd4_c'	=> $this->input->post('d4_c'),
			'd4_d'	=> $this->input->post('d4_d'),
			'e1_a'	=> $this->input->post('e1_a'),
			'e1_b'	=> $this->input->post('e1_b'),
			'e1_c'	=> $this->input->post('e1_c'),
			'e1_d'	=> $this->input->post('e1_d'),
			'e2_a'	=> $this->input->post('e2_a'),
			'e2_b'	=> $this->input->post('e2_b'),
			'e2_c'	=> $this->input->post('e2_c'),
			'e2_d'	=> $this->input->post('e2_d'),
			'e3_a'	=> $this->input->post('e3_a'),
			'e3_b'	=> $this->input->post('e3_b'),
			'e3_c'	=> $this->input->post('e3_c'),
			'e3_d'	=> $this->input->post('e3_d'),
			'e4_1_a'	=> $this->input->post('e4_1_a'),
			'e4_1_b'	=> $this->input->post('e4_1_b'),
			'e4_1_c'	=> $this->input->post('e4_1_c'),
			'e4_1_d'	=> $this->input->post('e4_1_d'),
			'e4_2_a'	=> $this->input->post('e4_2_a'),
			'e4_2_b'	=> $this->input->post('e4_2_b'),
			'e4_2_c'	=> $this->input->post('e4_2_c'),
			'e4_2_d'	=> $this->input->post('e4_2_d'),
			'f1_a'	=> $this->input->post('f1_a'),
			'f1_b'	=> $this->input->post('f1_b'),
			'f1_c'	=> $this->input->post('f1_c'),
			'f1_d'	=> $this->input->post('f1_d'),
			'f2_a'	=> $this->input->post('f2_a'),
			'f2_b'	=> $this->input->post('f2_b'),
			'f2_c'	=> $this->input->post('f2_c'),
			'f2_d'	=> $this->input->post('f2_d'),
			'g1_a'	=> $this->input->post('g1_a'),
			'g1_b'	=> $this->input->post('g1_b'),
			'g1_c'	=> $this->input->post('g1_c'),
			'g1_d'	=> $this->input->post('g1_d'),
			'g2_a'	=> $this->input->post('g2_a'),
			'g2_b'	=> $this->input->post('g2_b'),
			'g2_c'	=> $this->input->post('g2_c'),
			'g2_d'	=> $this->input->post('g2_d'),
			'g3_a'	=> $this->input->post('g3_a'),
			'g3_b'	=> $this->input->post('g3_b'),
			'g3_c'	=> $this->input->post('g3_c'),
			'g3_d'	=> $this->input->post('g3_d'),


		);
		$this->mlc->insert($data);
		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/mlc'),'refresh');
		//var_dump($data);

		
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$data = array(
			'id'	=> $this->input->post('id'),
			'a1'	=> $this->input->post('b1'),
			'a2'	=> $this->input->post('b2'),
			'a3'	=> $this->input->post('a3'),
			'a4'	=> $this->input->post('b4'),
			'a5'	=> $this->input->post('b5'),
			'a6'	=> $this->input->post('b6'),
			'b1'	=> $this->input->post('b1'),
			'b2'	=> $this->input->post('b2'),
			'b3'	=> $this->input->post('b3'),
			'b4'	=> $this->input->post('b4'),
			'b5'	=> $this->input->post('b5'),
			'b6'	=> $this->input->post('b6'),
			'c1_a'	=> $this->input->post('c1_a'),
			'c1_b'	=> $this->input->post('c1_b'),
			'c2_a'	=> $this->input->post('c2_a'),
			'c2_b'	=> $this->input->post('c2_b'),
			'c3_a'	=> $this->input->post('c3_a'),
			'c3_b'	=> $this->input->post('c3_b'),
			'c4_a'	=> $this->input->post('c4_a'),
			'c4_b'	=> $this->input->post('c4_b'),
			'c5_a'	=> $this->input->post('c5_a'),
			'c5_b'	=> $this->input->post('c5_b'),
			'd1_a'	=> $this->input->post('d1_a'),
			'd1_b'	=> $this->input->post('d1_b'),
			'd2_a'	=> $this->input->post('d2_a'),
			'd2_b'	=> $this->input->post('d2_b'),
			'd3_a'	=> $this->input->post('d3_a'),
			'd3_b'	=> $this->input->post('d3_b'),
			'd4_a'	=> $this->input->post('d4_a'),
			'd4_b'	=> $this->input->post('d4_b'),
			'e1_a'	=> $this->input->post('e1_a'),
			'e1_b'	=> $this->input->post('e1_b'),
			'e2_a'	=> $this->input->post('e2_a'),
			'e2_b'	=> $this->input->post('e2_b'),
			'e3_a'	=> $this->input->post('e3_a'),
			'e3_b'	=> $this->input->post('e3_b'),
			'e4_1_a'	=> $this->input->post('e4_1_a'),
			'e4_1_b'	=> $this->input->post('e4_1_b'),
			'e4_2_a'	=> $this->input->post('e4_2_a'),
			'e4_2_b'	=> $this->input->post('e4_2_b'),
			'f1_a'	=> $this->input->post('f1_a'),
			'f1_b'	=> $this->input->post('f1_b'),
			'f2_a'	=> $this->input->post('f2_a'),
			'f2_b'	=> $this->input->post('f2_b'),
			'g1_a'	=> $this->input->post('g1_a'),
			'g1_b'	=> $this->input->post('g1_b'),
			'g2_a'	=> $this->input->post('g2_a'),
			'g2_b'	=> $this->input->post('g2_b'),
			'g3_a'	=> $this->input->post('g3_a'),
			'g3_b'	=> $this->input->post('g3_b')
		);
		
		$this->mlc->update($data);
		$this->session->set_flashdata('flash', 'Update Berhasil');
		redirect(base_url('admin/mlc'),'refresh');
		//var_dump($data);
			
	}

	public function delete($id)
	{
		$cek = $this->mlc->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/mlc'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			$this->mlc->delete($data);
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/mlc'),'refresh');
		}
		

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */