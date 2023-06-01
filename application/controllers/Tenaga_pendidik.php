<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_pendidik extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->library('template');
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Gurustaf_model', 'gurustaf');
		$this->load->model('Jurusan_model', 'jurusan');
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
	}
    
	public function index()
	{
		$kelompok = 'Tenaga Pendidik';
		$data = array(
			'halaman'			=> $kelompok,
			'data_identitas'	=> $this->identitas->detail()->row_array(),
			'data_gurustaf'		=> $this->gurustaf->list($kelompok,4)->result(),
			'data_jurusan'		=> $this->jurusan->list()
		);

		$this->template->load('template', 'contents' , 'front/tenagapendidik', $data);
	}
	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */