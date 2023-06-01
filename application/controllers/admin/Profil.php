<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}


	public function index()
	{
		$id = $this->session->userdata('id_user');
			$data = array(
				'title'				=> 'Profil User',
				'data' 				=> $this->user->detail($id)->row_array(),
				'content'			=> 'admin/profil/v_content',
				'ajax'	 			=> 'admin/profil/v_ajax'
			);
			//var_dump($data['data']);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		
	}



	public function update()
	{
		$valid = $this->form_validation->set_rules('password','title','required|trim'); 

		if($valid->run()==false){
			$this->session->set_flashdata('flash', 'Tidak Ada Perubahan');
			redirect(base_url('admin/profil'),'refresh');
		}else{

			$id				= $this->input->post('id');
			$cek 			= $this->user->detail($id);

			$data = array(
				'id_user'			=> $this->input->post('id_user'),
				'password'			=> sha1($this->input->post('password'))
			);

		
			$sql = $this->user->ubahpassword($data);
			if($sql == null){
				$this->session->set_flashdata('flash', 'Update Berhasil');
			}else{
				$this->session->set_flashdata('flash', 'Eror Tidak ada');
			}
			redirect(base_url('admin/profil'),'refresh');
				
			
		}

			
	}



	
	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */