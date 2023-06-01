<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Gurustaf_model', 'gurustaf');
		$this->load->model('Jurusan_model', 'jurusan');
		$this->load->model('Album_model', 'album');
		$this->load->model('Foto_model', 'foto');
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
	}

	function index($slug = ''){

		$cek = $this->album->cek_slug($slug)->row_array();
		if($cek == null){
			redirect(base_url('/album'),'refresh');
		}else{
			$id_album = $cek['id_album'];
			$data = array(
				'halaman'	=>  'Galeri',
				'data_identitas'	=> $this->identitas->detail()->row_array(),
				'data_album'		=> $cek,
				'data_foto'			=> $this->foto->list_front($id_album),
				'data_jurusan'		=> $this->jurusan->list()
			);
	
			$this->template->load('template', 'contents' , 'front/detailalbum', $data);
			
		}
	}
}
