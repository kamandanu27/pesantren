<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepalasekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}


	public function index()
	{

			$data = array(
				'title'				=> 'Kepala Sekolah',
				'data' 				=> $this->kepalasekolah->detail()->row_array(),
				'content'			=> 'admin/kepalasekolah/v_content',
				'ajax'	 			=> 'admin/kepalasekolah/v_ajax'
			);
			//var_dump($data['data']);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		
	}



	public function update()
	{
		$valid = $this->form_validation->set_rules('id','title','required|trim'); 

		if($valid->run()==false){
				$this->session->set_flashdata('flash', 'Eror Tidak ada');
				redirect(base_url('admin/kepalasekolah'),'refresh');
		}else{

			$id				= $this->input->post('id');
			$cek 			= $this->kepalasekolah->detail($id);
			if($cek == null){
				$this->session->set_flashdata('flash', 'Eror Tidak ada');
				redirect(base_url('admin/Kepalasekolah'),'refresh');
			}else{
				if($_FILES["upload_data"]['name'] == ""){
					$data = array(
						'id'				=> $this->input->post('id'),
						'nama'				=> $this->input->post('nama'),
						'sambutan'			=> $this->input->post('sambutan'),
						'visi'				=> $this->input->post('visi'),
						'misi'				=> $this->input->post('misi'),
						'tujuan'			=> $this->input->post('tujuan'),
						'update_at'			=> date('yyyy-mm-dd hh:ii:ss')
					);

				}else{
					$nama1 = str_replace("_","",$_FILES["upload_data"]['name']);
					$nama2 = str_replace(" ","",$nama1);

					$image 								= time().'-'.$nama2;
					$config['upload_path'] 				= './public/image/upload/kepsek/';
					$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
					$config['quality']					= '20%';
					$config['width']					= 600;
                	$config['height']					= 400;
					$config['max_size']  				= '240000';
					$config['file_name']  				= $image;
		
					$this->load->library('upload', $config);
					$this->upload->do_upload('upload_data');
		
					$data = array(
						'id'				=> $this->input->post('id'),
						'nama'				=> $this->input->post('nama'),
						'sambutan'			=> $this->input->post('sambutan'),
						'visi'				=> $this->input->post('visi'),
						'misi'				=> $this->input->post('misi'),
						'tujuan'			=> $this->input->post('tujuan'),
						'update_at'			=> date('yyyy-mm-dd hh:ii:ss'),
						'poto'				=> $image
					);
					
				}

					$sql = $this->kepalasekolah->update($data);
					if($sql == null){
						$this->session->set_flashdata('flash', 'Update Berhasil');
					}else{
						$this->session->set_flashdata('flash', 'Eror Tidak ada');
					}
					redirect(base_url('admin/kepalasekolah'),'refresh');
				
			}
		}

			
	}

	public function images_upload_handler() {
		$config['upload_path'] = './public/image/upload/kepsek/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 0;
		$this->vars = [];
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')) {
			$this->vars['status'] = 'error';
			$this->vars['message'] = $this->upload->display_errors('', '');
		} else {
			$file = $this->upload->data();
			$this->vars['status'] = 'success';
			$this->vars['location'] = base_url('public/image/upload/kepsek/'.$file['file_name']);
		}
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))
			->_display();
		exit;
	}

	
	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */