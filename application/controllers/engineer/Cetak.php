<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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
		$this->load->model('Perlimbungan_kapal_model', 'perlimbungan_kapal');
		$this->load->model('Perlimbungan_tongkang_model', 'perlimbungan_tongkang');
		$this->load->model('Gt35_kayu_model', 'gt35_kayu');
		$this->load->model('Gt35_model', 'gt35');
		$this->load->model('Lambung_bawah_model', 'lambung_bawah');
		$this->load->model('Mlc_model', 'mlc');
		$this->load->model('Curah_padat_model', 'curah_padat');
		$this->load->model('Kelayakan_kapal_model', 'kelayakan_kapal');
		$this->load->model('Detail_kelayakan_kapal_model', 'detail_kelayakan_kapal');
		$this->load->model('Gt500_model', 'gt500');
		$this->load->model('Liquid_model', 'liquid');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
        // $this->load->model('siswa_model', 'siswa');
		// $this->load->model('kelas_model', 'kelas');
		// $this->load->model('pengetahuan_model', 'pengetahuan');
		// $this->load->model('keterampilan_model', 'keterampilan');
		// $this->load->model('mapel_model', 'mapel');
		// $this->auth_g->cek();
    }

	public function lppk($id)
	{


		$cek = $this->perlimbungan_kapal->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/perlimbungan_kapal'),'refresh');
		}else{

			$data = array(
				'title'	=> 'LPPK',
				'data'	=> $this->perlimbungan_kapal->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_lppk', $data, FALSE);
		}
	}

	public function lppt($id)
	{


		$cek = $this->perlimbungan_tongkang->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/perlimbungan_tongkang'),'refresh');
		}else{

			$data = array(
				'title'	=> 'LPPT',
				'url_base'	=> base_url(),
				'data'	=> $this->perlimbungan_tongkang->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_lppt', $data, FALSE);
		}
	}

	public function gt35_kayu($id)
	{

		$cek = $this->gt35_kayu->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/gt35_kayu'),'refresh');
		}else{

			$data = array(
				'title'	=> 'GT35 Kayu',
				'data'	=> $this->gt35_kayu->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_gt35_kayu', $data, FALSE);
		}
	}

	public function lambung_bawah($id)
	{

		$cek = $this->lambung_bawah->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/lambung_bawah'),'refresh');
		}else{

			$data = array(
				'title'	=> 'Lambung Bawah',
				'url_base'	=> base_url(),
				'data'	=> $this->lambung_bawah->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_lambung_bawah', $data, FALSE);
		}
	}

	public function mlc($id)
	{

		$cek = $this->mlc->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/mlc'),'refresh');
		}else{

			$data = array(
				'title'	=> 'MLC',
				'url_base'	=> base_url(),
				'data'	=> $this->mlc->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_mlc', $data, FALSE);
		}
	}

	public function curah_padat($id)
	{

		$cek = $this->curah_padat->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/curah_padat'),'refresh');
		}else{

			$data = array(
				'title'	=> 'CURAH PADAT',
				'url_base'	=> base_url(),
				'data'	=> $this->curah_padat->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_curahpadat', $data, FALSE);
		}
	}
	
		public function kelayakan_kapal($id)
	{

		$cek = $this->kelayakan_kapal->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/kelayakan_kapal'),'refresh');
		}else{

			$data = array(
				'title'	=> 'Pengangkutan Barang Berbahaya',
				'url_base'	=> base_url(),
				'data'	=> $this->kelayakan_kapal->detail($id),
				'data_detail'	=> $this->detail_kelayakan_kapal->tabel_detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_kelayakan_kapal', $data, FALSE);
		}
	}
	
	public function gt500($id)
	{

		$cek = $this->gt500->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/gt500'),'refresh');
		}else{

			$data = array(
				'title'	=> 'KLM',
				'url_base'	=> base_url(),
				'data'	=> $this->gt500->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_gt500', $data, FALSE);
		}
	}
	
		public function liquid($id)
	{

		$cek = $this->liquid->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/liquid'),'refresh');
		}else{

			$data = array(
				'title'	=> 'Liquid Gas In Bulk',
				'url_base'	=> base_url(),
				'data'	=> $this->liquid->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_liquid', $data, FALSE);
		}
	}

	public function gt35($id)
	{

		$cek = $this->gt35->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/gt35'),'refresh');
		}else{

			$data = array(
				'title'	=> 'GT35 Kayu',
				'data'	=> $this->gt35->detail($id),
				'id'	=> $id
			);
			
			$this->load->view('admin/cetak/c_gt35', $data, FALSE);
		}
	}

}
