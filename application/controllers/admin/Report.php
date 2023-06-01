<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

		public function __construct() {
        parent::__construct();

        $this->output->set_header('Last-Modified:' . gmdate('D,d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        $this->load->library('Pdf');
		$this->load->model('Job_model', 'job');
		$this->load->model('Engineer_model', 'engineer');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
    }

	public function index()
	{

		$data = array(
			'title'	=> 'Report',
			'data_engineer' 	=> $this->engineer->tabel(),
			'content'	=> 'admin/report/v_content'
		);
		
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		
	}

	public function print()
	{
		$tgl_awal 		= $this->input->post('tgl_awal');
		$tgl_akhir 		= $this->input->post('tgl_akhir');
		$job_status 	= $this->input->post('job_status');
		$id_engineer 	= $this->input->post('id_engineer');

		if($job_status !== "" and $id_engineer !== ""){

			$cari = array('status_job' => $job_status, 'id_engineer' => $id_engineer, 'created_date >=' => $tgl_awal , 'created_date <=' => $tgl_akhir);

		}elseif($job_status == "" and $id_engineer !== ""){

			$cari = array('id_engineer' => $id_engineer, 'created_date >=' => $tgl_awal , 'created_date <=' => $tgl_akhir);

		}elseif($job_status !== "" and $id_engineer == ""){

			$cari = array('status_job' => $job_status, 'created_date >=' => $tgl_awal , 'created_date <=' => $tgl_akhir);

		}elseif($job_status == "" and $id_engineer == ""){
			
			$cari = array('created_date >=' => $tgl_awal , 'created_date <=' => $tgl_akhir);
		}

		$cek = $this->job->cek_report($cari);
		if($cek == null){
			$this->session->set_flashdata('danger', '<i class="fa fa-danger-circle"></i>
			Job Report Not Found');
			redirect(base_url('admin/report'),'refresh');
		}else{

			$data = array(
				'title'	=> 'Report Job',
				'data_job'	=> $this->job->report($cari)
			);
			
			//var_dump($data);
			$this->load->view('admin/cetak/report_job', $data, FALSE);
		}
	}

	
}
