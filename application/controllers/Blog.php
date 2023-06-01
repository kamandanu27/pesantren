<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->library('template');
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
		$this->load->model('Album_model', 'album');
		$this->load->model('Blog_model', 'blog');
		$this->load->model('Jurusan_model', 'jurusan');
		$this->load->helper('tgl_indo');
	}
    
	public function artikel()
	{

		$kategori_populer = 'Artikel';
		$kategori_terbaru = 'Berita';

		$data = array(
			'title'				=> 'SMK Muhammadiyah Kedawung',
			'halaman'			=> 'Artikel',
			'data_identitas'	=> $this->identitas->detail()->row_array(),
			'data_jurusan'		=> $this->jurusan->list(),
			'data_artikel'		=> $this->blog->front_terbaru($kategori_populer,6)->result(),
			'data_populer'		=> $this->blog->front_populer($kategori_populer,5)->result(),
			'data_terbaru'		=> $this->blog->front_terbaru($kategori_terbaru,5)->result()
		);

		$this->template->load('template', 'contents' , 'front/artikel_list', $data);
	}

	public function detail_artikel($slug)
	{
		$cek_slug = $this->blog->cek_slug_artikel($slug)->row_array();
		$blog_id = $cek_slug['blog_id'];
		if($cek_slug == null){
			redirect(base_url('artikel'),'refresh');

		}else{

			$kategori_populer = 'Artikel';
			$kategori_terbaru = 'Berita';
	
			$data = array(
				'title'				=> 'SMK Muhammadiyah Kedawung',
				'halaman'			=> 'Artikel',
				'data_identitas'	=> $this->identitas->detail()->row_array(),
				'data_jurusan'		=> $this->jurusan->list(),
				'data_detail'		=> $this->blog->front_detail($blog_id)->row_array(),
				'data_populer'		=> $this->blog->front_populer($kategori_populer,5)->result(),
				'data_terbaru'		=> $this->blog->front_terbaru($kategori_terbaru,5)->result()
			);
	
			$this->template->load('template', 'contents' , 'front/artikel_detail', $data);
		}
	}

	public function berita()
	{
		$kategori_populer = 'Berita';
		$kategori_terbaru = 'Artikel';

		$data = array(
			'title'				=> 'SMK Muhammadiyah Kedawung',
			'halaman'			=> 'Berita Sekolah',
			'data_identitas'	=> $this->identitas->detail()->row_array(),
			'data_jurusan'		=> $this->jurusan->list(),
			'data_berita'		=> $this->blog->front_home_berita(6)->result(),
			'data_populer'		=> $this->blog->front_populer($kategori_populer,5)->result(),
			'data_terbaru'		=> $this->blog->front_terbaru($kategori_terbaru,5)->result()
		);

		$this->template->load('template', 'contents' , 'front/berita_list', $data);
	}

	public function detail_berita($slug)
	{
		$cek_slug = $this->blog->cek_slug_berita($slug)->row_array();
		$blog_id = $cek_slug['blog_id'];
		if($cek_slug == null){
			redirect(base_url('berita'),'refresh');

		}else{

			$kategori_populer = 'Berita';
			$kategori_terbaru = 'Artikel';
	
			$data = array(
				'title'				=> 'SMK Muhammadiyah Kedawung',
				'halaman'			=> 'Berita',
				'data_identitas'	=> $this->identitas->detail()->row_array(),
				'data_jurusan'		=> $this->jurusan->list(),
				'data_detail'		=> $this->blog->front_detail($blog_id)->row_array(),
				'data_populer'		=> $this->blog->front_populer($kategori_populer,5)->result(),
				'data_terbaru'		=> $this->blog->front_terbaru($kategori_terbaru,5)->result()
			);
	
			$this->template->load('template', 'contents' , 'front/berita_detail', $data);
		}
	}

	public function profile($slug="")
	{

		echo $slug;
	}


	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */