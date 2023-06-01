<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model', 'blog');
		// $this->load->model('Job_model', 'job');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'					=> $this->session->userdata('level_user').' - Dashboard',
			'c_draft' 				=> $this->blog->count_artikel('Draft')->row_array(),
			'c_request' 			=> $this->blog->count_artikel('Request')->row_array(),
			'c_publish' 			=> $this->blog->count_artikel('Publish')->row_array(),
			'c_reject' 				=> $this->blog->count_artikel('Reject')->row_array(),
			'topten' 				=> $this->blog->topten('Artikel')->result(),
			'content'	 			=> 'admin/dashboard/v_content',
			'ajax'	 				=> 'admin/dashboard/v_ajax'
		);
		//var_dump($data['c_draft']);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */