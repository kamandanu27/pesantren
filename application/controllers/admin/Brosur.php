<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brosur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Brosur_model', 'brosur');
		$this->load->model('Foto_model', 'foto');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Foto Brosur',
			'judul'			=> 'Foto Brosur',
			'data' 			=> $this->brosur->tabel(),
			'content'		=> 'admin/brosur/v_content',
			'ajax'	 		=> 'admin/brosur/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->brosur->cek_kode_terkahir();
		$kode_baru = $dariDB + 1;

		$data = array(
			'title'			=> 'Admin - Tambah Foto Brosur',
			'kode_baru' 	=> $kode_baru,
			'judul'			=> 'Tambah Foto Brosur',
			'data' 			=> $this->foto->tabel(),
			'content'		=> 'admin/brosur/v_add',
			'ajax'	 		=> 'admin/brosur/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->brosur->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/brosur'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Foto Brosur',
				'judul'			=> 'Edit Foto Brosur',
				'data' 			=> 	$this->brosur->detail($id)->row_array(),
				'content'		=> 'admin/brosur/v_edit',
				'ajax'	 		=> 'admin/brosur/v_ajax'
			);
			//var_dump($data);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$keterangan_brosur		= strip_tags($this->input->post('keterangan_brosur'));
		$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $keterangan_brosur);
		$trim     	= trim($string);
		$slug     	= strtolower(str_replace(" ", "-", $trim));

		$nama1 = str_replace("_","",$_FILES["upload_data"]['name']);
		$nama2 = str_replace(" ","",$nama1);

		$image 								= time().'-'.$nama2;
		$config['upload_path'] 				= './public/image/upload/galeri_foto/';
		$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
		$config['max_size']  				= '240000';
		$config['file_name']  				= $image;

		$this->load->library('upload', $config);

		$this->upload->do_upload('upload_data');

		$data = array(
			'id_brosur'			=> $this->input->post('id_brosur'),
			'keterangan_brosur'		=> $keterangan_brosur,
			'file_brosur'		=> $image
		);
		$q = $this->brosur->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/brosur'),'refresh');

		
	}

	public function update()
	{
		$id = $this->input->post('id_brosur');

		$cek = $this->brosur->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/brosur'),'refresh');
		}else{

			$nama		= strip_tags($this->input->post('keterangan_brosur'));
			$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
			$trim     	= trim($string);
			$slug     	= strtolower(str_replace(" ", "-", $trim));

			if($_FILES["upload_data"]['name'] == ""){

				$data = array(
					'id_brosur'		=> $this->input->post('id_brosur'),
					'keterangan_brosur'		=> $this->input->post('keterangan_brosur')
				);
				
			}else{

				$nama1 = str_replace("_","",$_FILES["upload_data"]['name']);
				$nama2 = str_replace(" ","",$nama1);

				$image 								= time().'-'.$nama2;
				$config['upload_path'] 				= './public/image/upload/galeri_foto/';
				$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
				$config['max_size']  				= '240000';
				$config['file_name']  				= $image;

				$this->load->library('upload', $config);
	
				$this->upload->do_upload('upload_data');

				$data = array(
					'id_brosur'		=> $this->input->post('id_brosur'),
					'keterangan_brosur'		=> $this->input->post('keterangan_brosur'),
					'file_brosur'		=> $image
				);
			}
			
			$this->brosur->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/brosur'),'refresh');
		}
		
	}

	public function update_status()
	{
		$id = $this->input->post('id');

		$cek = $this->brosur->detail($id)->row_array();
		if($cek == null){
			$result['result']=2;
			echo json_encode($result);
		}else{

				$data = array(
					'id_brosur'		=> $this->input->post('id'),
					'status_post'		=> $this->input->post('statusnext')
				);
				
			
			
			$this->brosur->update($data);
	
			$result['result']=1;
			echo json_encode($result);
		}
		
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->brosur->detail($id)->row_array();
		if($cek == null){
			$result['result']=2;
			echo json_encode($result);
		}else{

			$data = array(
				'id_brosur'	=> $id
			);
			
			$this->brosur->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}
		
	}

	public function delete_idfoto($id)
	{
		$data = array(
			'id_foto'	=> $id
		);
		$this->foto->delete($data);

		$result['result']=1;
		echo json_encode($result);
		
	}


	public function tabel_foto($id)
	{
		$cek = $this->brosur->detail($id)->row_array();
		$list = $this->foto->get_detail_foto($id);
		$data = array();
		$no=1;
		if($cek == null){
			foreach ($list as $r) {
				$row = array();
	
				$test =  $this->security->xss_clean($r->id_foto);
				$foto =  $this->security->xss_clean($r->photo_name);
				$row[] = $this->security->xss_clean($no);
				$row[] = "<img src='../../public/image/upload/galeri_foto/$foto' style='width:200px;'>";
				$row[] = "<button type='button' class='btn btn-danger btn-sm btn_del_foto' id='$test' title='Hapus'>
				<i class='fa fa-trash'></i></button>";
	
				$data[] = $row;
				$no++;
			}
		}else{

			foreach ($list as $r) {
				$row = array();
	
				$test =  $this->security->xss_clean($r->id_foto);
				$foto =  $this->security->xss_clean($r->photo_name);
				$row[] = $this->security->xss_clean($no);
				$row[] = "<img src='../../../public/image/upload/galeri_foto/$foto' style='width:200px;'>";
				$row[] = "<button type='button' class='btn btn-danger btn-sm btn_del_foto' id='$test' title='Hapus'>
				<i class='fa fa-trash'></i></button>";
	
				$data[] = $row;
				$no++;
			}
		}
        $result = array(
            "data" => $data,
        );
        echo json_encode($result);
	}

	public function insert_foto()
	{
		$image = $_FILES["photo_name"]['name'];
		$config['upload_path'] 		= './public/image/upload/galeri_foto/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '240000';
		$config['file_name']  		= $image;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('photo_name'))
			{
				$result['result']=3;
				echo json_encode($result);
			}else{
				$data = array(
					'id_brosur'		=> $this->input->post('id_brosur'),
					'photo_name'	=> str_replace(' ', '_', $image)
				);
				$q = $this->foto->insert($data);

				if($q){
					$result['result']=2;
					echo json_encode($result);
				}else{
					$result['result']=1;
					echo json_encode($result);
				}
			}
		
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */