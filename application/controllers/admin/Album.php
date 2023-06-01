<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Album_model', 'album');
		$this->load->model('Foto_model', 'foto');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'			=> 'Admin - Album Foto',
			'judul'			=> 'Album Foto',
			'data' 			=> $this->album->tabel(),
			'content'		=> 'admin/album/v_content',
			'ajax'	 		=> 'admin/album/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$dariDB = $this->album->cek_kode_terkahir();
		$kode_baru = $dariDB + 1;

		$data = array(
			'title'			=> 'Admin - Tambah Album Foto',
			'kode_baru' 	=> $kode_baru,
			'judul'			=> 'Tambah Album Foto',
			'data' 			=> $this->foto->tabel(),
			'content'		=> 'admin/album/v_add',
			'ajax'	 		=> 'admin/album/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->album->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/album'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Album Foto',
				'judul'			=> 'Edit Album Foto',
				'data' 			=> 	$this->album->detail($id)->row_array(),
				'content'		=> 'admin/album/v_edit',
				'ajax'	 		=> 'admin/album/v_ajax'
			);
			//var_dump($data);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$album_title		= strip_tags($this->input->post('album_title'));
		$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $album_title);
		$trim     	= trim($string);
		$slug     	= strtolower(str_replace(" ", "-", $trim));

		$image 								= time().'-'.$_FILES["upload_data"]['name'];
		$config['upload_path'] 				= './public/image/upload/galeri_foto/';
		$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
		$config['max_size']  				= '2400';
		$config['file_name']  				= $image;

		$this->load->library('upload', $config);

		$this->upload->do_upload('upload_data');

		$data = array(
			'id_album'			=> $this->input->post('id_album'),
			'album_title'		=> $album_title,
			'album_slug'		=> $slug,
			'status_post'		=> 'Draft',
			'album_cover'		=> $image,
			'created_by'		=> $this->session->userdata('id_user')
		);
		$q = $this->album->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/album'),'refresh');

		
	}

	public function update()
	{
		$id = $this->input->post('id_album');

		$cek = $this->album->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/album'),'refresh');
		}else{

			$nama		= strip_tags($this->input->post('album_title'));
			$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
			$trim     	= trim($string);
			$slug     	= strtolower(str_replace(" ", "-", $trim));

			if($_FILES["upload_data"]['name'] == ""){

				$data = array(
					'id_album'		=> $this->input->post('id_album'),
					'album_title'		=> $this->input->post('album_title'),
					'album_slug'		=> $slug
				);
				
			}else{

				$image 								= time().'-'.$_FILES["upload_data"]['name'];
				$config['upload_path'] 				= './public/image/upload/galeri_foto/';
				$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
				$config['max_size']  				= '2400';
				$config['file_name']  				= $image;

				$this->load->library('upload', $config);
	
				$this->upload->do_upload('upload_data');

				$data = array(
					'id_album'		=> $this->input->post('id_album'),
					'album_title'		=> $this->input->post('album_title'),
					'album_slug'		=> $slug,
					'album_cover'		=> $image
				);
			}
			
			$this->album->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/album'),'refresh');
		}
		
	}

	public function update_status()
	{
		$id = $this->input->post('id');

		$cek = $this->album->detail($id)->row_array();
		if($cek == null){
			$result['result']=2;
			echo json_encode($result);
		}else{

				$data = array(
					'id_album'		=> $this->input->post('id'),
					'status_post'		=> $this->input->post('statusnext')
				);
				
			
			
			$this->album->update($data);
	
			$result['result']=1;
			echo json_encode($result);
		}
		
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->album->detail($id)->row_array();
		if($cek == null){
			$result['result']=2;
			echo json_encode($result);
		}else{

			$data = array(
				'id_album'	=> $id
			);
			
			$this->album->delete($data);
			
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
		$cek = $this->album->detail($id)->row_array();
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
		$config['max_size']  		= '2400';
		$config['file_name']  		= $image;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('photo_name'))
			{
				$result['result']=3;
				echo json_encode($result);
			}else{
				$data = array(
					'id_album'		=> $this->input->post('id_album'),
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