<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->library('template');
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
		$this->load->model('Album_model', 'album');
		$this->load->model('Blog_model', 'blog');
		$this->load->model('Jurusan_model', 'jurusan');
		$this->load->model('Slider_model', 'slider');
		$this->load->model('Testimoni_model', 'testimoni');
	}
    
	public function index()
	{

		$data = array(
			'title'					=> 'Beranda',
			'data_identitas'		=> $this->identitas->detail()->row_array(),
			'data_kepalasekolah'	=> $this->kepalasekolah->detail()->row_array(),
			'data_jurusan'			=> $this->jurusan->list(),
			'data_berita'			=> $this->blog->front_home_berita(5)->result(),
			'data_artikel'			=> $this->blog->front_home_artikel(5)->result(),
			'data_slider'			=> $this->slider->list_front()->result(),
			'data_testimoni'		=> $this->testimoni->list_front()->result()
		);

		$this->template->load('template', 'contents' , 'front/index', $data);
	}

	public function profile($slug="")
	{

		echo $slug;
	}


	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */