<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Job_model', 'job');
		$this->load->model('Job_detail_model', 'job_detail');
		$this->load->model('Job_report_model', 'job_report');
		$this->load->model('Instrument_model', 'instrument');
		$this->load->model('Engineer_model', 'engineer');
		$this->load->model('Product_model', 'product');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Engineer - Job',
			'getengineer'	 => $this->public_model->get_engineer($this->session->userdata('id_engineer')),
			'data_job' 		=> $this->job->tabelengineer($this->session->userdata('id_engineer')),
			'content'	 	=> 'engineer/job/v_content'
		);
		$this->load->view('engineer/layout/v_wrapper', $data, FALSE);
	}

	public function status($status)
	{
		$data = array(
			'title'			=> 'Engineer - Job',
			'data_job' 		=> $this->job->tabelengineer_status($this->session->userdata('id_engineer'),$status),
			'getengineer' 	=> $this->public_model->get_engineer($this->session->userdata('id_engineer')),
			'content'	 	=> 'engineer/job/v_content'
		);
		
		$this->load->view('engineer/layout/v_wrapper', $data, FALSE);
	}


	public function detail($id)
	{
		$cek = $this->job->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('job/job'),'refresh');
		}else{

			$data = array(
				'title'						=> 'Engineer - Detail job',
				'id'						=> $id,
				'data'						=> $this->job->detail($id),
				'id_instrument'				=> $this->job->detail($id)->id_instrument,
				'getengineer' 				=> $this->public_model->get_engineer($this->session->userdata('id_engineer')),
				'data_instrument' 			=> $this->instrument->tabel(),
				'data_instrument_detail' 	=> $this->product->tabel_instrument_detail($this->job->detail($id)->id_instrument),
				'data_engineer' 			=> $this->engineer->tabel(),
				'data_report' 				=> $this->job_report->tabel($id),
				'content'	=> 'engineer/job/v_detail'
			);
			//var_dump($data);
			$this->load->view('engineer/layout/v_wrapper', $data, FALSE);
		}
	}

	public function update_start()
	{
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d');
		$id = $this->input->post('id_job');
			$data = array(
				'id_job'				=> $this->input->post('id_job'),
				'status_job'			=> 'Continue',
				'start_date'			=> $now
			);
			$this->job->update($data);
	
			$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
			Update Status Job successfully');
			redirect(base_url('engineer/job/detail/'.$id),'refresh');
	}

	public function update_finish()
	{
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d');
		$id = $this->input->post('id_job');
			$data = array(
				'id_job'				=> $this->input->post('id_job'),
				'status_job'			=> 'Finish',
				'Finish_date'			=> $now
			);
			$this->job->update($data);
	
			$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
			Update Status Job successfully');
			redirect(base_url('engineer/job/detail/'.$id),'refresh');
	}

	public function insert_report()
	{
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d');
		$id = $this->input->post('id_job');

			$image = time().'-'.$_FILES["upload_data"]['name'];
			$config['upload_path'] 		= './public/image/report/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|xls|doc|xlsx|pdf';
			$config['max_size']  		= '2400';
			$config['file_name']  		= $image;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('upload_data'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->session->set_flashdata('danger', '<i class="fa fa-danger-circle"></i>
						FIle not found');
						redirect(base_url('engineer/job/detail/'.$id),'refresh');
                }
                else
                {
					$data = array('upload_data' => $this->upload->data());

					$data = array(
						'id_job'					=> $this->input->post('id_job'),
						'id_engineer'				=> $this->session->userdata('id_engineer'),
						'description'				=> $this->input->post('description'),
						'attachment'				=> $image,
						'created_date'				=> $now
					);
					$this->job_report->insert($data);
			
					$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
					Add Report Job successfully');
					redirect(base_url('engineer/job/detail/'.$id),'refresh');
                }

			

			
	}

	public function delete_idreport($id_job,$id_report)
	{	
		$cek = $this->job_report->detail($id_report);
		if($cek == null){
			$this->session->set_flashdata('danger', '<i class="fa fa-danger-circle"></i>
			Id Report Job Not Found');
			redirect(base_url('engineer/job/detail/'.$id_job),'refresh');
		}else{

			$data = array(
				'id'	=> $id_report
			);
			
			$this->job_report->delete_idreport($data);
			$this->session->set_flashdata('sukses', '<i class="fa fa-success-circle"></i>
			Delete Job Report Successfully');
			redirect(base_url('engineer/job/detail/'.$id_job),'refresh');
		}
	}



}

/* End of file Guru.php */
/* Location: ./application/controllers/job/Guru.php */