<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepalasekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auth_a->cek();
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
		$this->load->helper('tgl_indo');
	}


	public function index()
	{

			$data_a = array(
				'title'				=> 'kepalasekolah',
				'data' 				=> $this->kepalasekolah->detail()->row_array(),
				'content'			=> 'admin/kepalasekolah/v_content',
				'ajax'	 			=> 'admin/kepalasekolah/v_ajax'
			);
			//var_dump($data['data']);
			$this->load->view('admin/layout/v_wrapper', $data_a, FALSE);
		
	}



	public function update()
	{
		$valid = $this->form_validation->set_rules('id_kepalasekolah','nama_kepalasekolah','required|trim'); 

		if($valid->run()==false){
				$this->session->set_flashdata('flash', 'Eror Tidak ada');
				redirect(base_url('admin/kepalasekolah'),'refresh');
		}else{

			$id				= $this->input->post('id');
			$cek = $this->kepalasekolah->detail($id);
			if($cek == null){
				$this->session->set_flashdata('flash', 'Eror Tidak ada');
				redirect(base_url('admin/kepalasekolah'),'refresh');
			}else{
					$data = array(
						'id_kepalasekolah'				=> $this->input->post('id_kepalasekolah'),
						'nama_kepalasekolah'			=> $this->input->post('nama_kepalasekolah'),
						'nip_kepalasekolah'				=> $this->input->post('nip_kepalasekolah')
					);
					$sql = $this->kepalasekolah->update($data);

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
						'id_kepalasekolah'				=> $this->input->post('id_kepalasekolah'),
						'logo_kepalasekolah'				=> $image
					);
					$sql = $this->kepalasekolah->update($data);
					
				}

				

					
					if($sql == null){
						$this->session->set_flashdata('flash', 'Update Berhasil');
					}else{
						$this->session->set_flashdata('flash', 'Eror Tidak ada');
					}
					redirect(base_url('admin/kepalasekolah'),'refresh');
				
			}
		}


	
		
			
	}

	
	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */