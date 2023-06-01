<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brosur extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->library('template');
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
		$this->load->model('Brosur_model', 'brosur');
		$this->load->model('Blog_model', 'blog');
		$this->load->model('Jurusan_model', 'jurusan');
	}
    
	public function index()
	{

		$data = array(
			'title'					=> 'Brosur',
			'data_identitas'		=> $this->identitas->detail()->row_array(),
			'data_kepalasekolah'	=> $this->kepalasekolah->detail()->row_array(),
			'data_jurusan'			=> $this->jurusan->list(),
			'data_berita'			=> $this->blog->front_home_berita(5)->result(),
			'data_artikel'			=> $this->blog->front_home_artikel(5)->result(),
			'data_brosur'			=> $this->brosur->list_front()
		);

		$this->template->load('template', 'contents' , 'front/brosur', $data);
	}

	public function profile($slug="")
	{

		echo $slug;
	}


	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */