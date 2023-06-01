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
		$valid = $this->form_validation->set_rules('id_identitas','nama_identitas','required|trim'); 

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
						'id_identitas'				=> $this->input->post('id_identitas'),
						'noijin_identitas'				=> $this->input->post('noijin_identitas'),
						'nama_identitas'				=> $this->input->post('nama_identitas'),
						'alamat_identitas'			=> $this->input->post('alamat_identitas'),
						'rt_identitas'				=> $this->input->post('rt_identitas'),
						'rw_identitas'				=> $this->input->post('rw_identitas'),
						'telp_identitas'				=> $this->input->post('telp_identitas'),
						'kelurahan_identitas'				=> $this->input->post('kelurahan_identitas'),
						'kecamatan_identitas'				=> $this->input->post('kecamatan_identitas'),
						'provinsi_identitas'				=> $this->input->post('provinsi_identitas'),
						'email_identitas'				=> $this->input->post('email_identitas'),
						'fb_identitas'				=> $this->input->post('fb_identitas'),
						'twitter_identitas'			=> $this->input->post('twitter_identitas'),
						'instagram_identitas'			=> $this->input->post('instagram_identitas')
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
						'id_identitas'				=> $this->input->post('id_identitas'),
						'logo_identitas'				=> $image
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