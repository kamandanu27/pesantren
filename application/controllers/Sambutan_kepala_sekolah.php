<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sambutan_kepala_sekolah extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
       	$this->load->library('template');
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Jurusan_model', 'jurusan');
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
	}
    
	public function index()
	{

		$data = array(
			'title'				=> 'SMK Muhammadiyah Kedawung',
			'halaman'			=> 'Sambutan Kepala Sekolah',
			'data_identitas'	=> $this->identitas->detail()->row_array(),
			'data_jurusan'		=> $this->jurusan->list(),
			'data_kepsek'		=> $this->kepalasekolah->detail()->row_array()
		);

		$this->template->load('template', 'contents' , 'front/sambutan', $data);
	}
	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */