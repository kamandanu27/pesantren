<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auth_a->cek();
		$this->load->model('Identitas_model', 'identitas');
		$this->load->helper('tgl_indo');
	}


	public function index()
	{

			$data_a = array(
				'title'				=> 'Identitas',
				'data' 				=> $this->identitas->detail()->row_array(),
				'content'			=> 'admin/identitas/v_content',
				'ajax'	 			=> 'admin/identitas/v_ajax'
			);
			//var_dump($data['data']);
			$this->load->view('admin/layout/v_wrapper', $data_a, FALSE);
		
	}



	public function update()
	{
		$valid = $this->form_validation->set_rules('id','title','required|trim'); 

		if($valid->run()==false){
				$this->session->set_flashdata('flash', 'Eror Tidak ada');
				redirect(base_url('admin/identitas'),'refresh');
		}else{

			$id				= $this->input->post('id');
			$cek = $this->identitas->detail($id);
			if($cek == null){
				$this->session->set_flashdata('flash', 'Eror Tidak ada');
				redirect(base_url('admin/identitas'),'refresh');
			}else{
					$data = array(
						'id'				=> $this->input->post('id'),
						'title'				=> $this->input->post('title'),
						'alamat'			=> $this->input->post('alamat'),
						'telp'				=> $this->input->post('telp'),
						'email'				=> $this->input->post('email'),
						'fb'				=> $this->input->post('fb'),
						'twitter'			=> $this->input->post('twitter'),
						'instagram'			=> $this->input->post('instagram')
					);
					$sql = $this->identitas->update($data);

				if($_FILES["upload_data"]['name'] !== ""){
					$nama1 = str_replace("_","",$_FILES["upload_data"]['name']);
					$nama2 = str_replace(" ","",$nama1);

					$image 								= time().'-'.$nama2;
					$config['upload_path'] 				= './public/image/upload/logo/';
					$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
					$config['max_size']  				= '240000';
					$config['file_name']  				= $image;
		
					$this->load->library('upload', $config);
					$this->upload->do_upload('upload_data');
		
					$data = array(
						'id'				=> $this->input->post('id'),
						'logo'				=> $image
					);
					$sql = $this->identitas->update($data);
					
				}

				if($_FILES["upload_data1"]['name'] !== ""){
					$nama1 = str_replace("_","",$_FILES["upload_data1"]['name']);
					$nama2 = str_replace(" ","",$nama1);

					$image 								= time().'-'.$nama2;
					$config['upload_path'] 				= './public/image/upload/logo/';
					$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
					$config['max_size']  				= '240000';
					$config['file_name']  				= $image;

					$this->load->library('upload', $config);
					$this->upload->do_upload('upload_data1');
		
					$data = array(
						'id'				=> $this->input->post('id'),
						'logo_panjang'		=> $image
					);
					$sql = $this->identitas->update($data);
					
				}

					
					if($sql == null){
						$this->session->set_flashdata('flash', 'Update Berhasil');
					}else{
						$this->session->set_flashdata('flash', 'Eror Tidak ada');
					}
					redirect(base_url('admin/identitas'),'refresh');
				
			}
		}


	
		
			
	}

	
	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */