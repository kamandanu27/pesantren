<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompetensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Gurustaf_model', 'gurustaf');
		$this->load->model('Jurusan_model', 'jurusan');
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
	}

	function index($slug = ''){

		$cek = $this->jurusan->cek_slug($slug)->row_array();

		if($cek == null){
			redirect(base_url('/'),'refresh');
		}else{
			$data = array(
				'halaman'	=>  $cek['nama'],
				'data_identitas'	=> $this->identitas->detail()->row_array(),
				'data_kompetensi'	=> $cek,
				'data_jurusan'		=> $this->jurusan->list()
			);
	
			$this->template->load('template', 'contents' , 'front/kompetensi', $data);
			
		}
	}
}
