<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model', 'blog');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function view($status='')
	{
		if($status == 'request'){
			$status_new = 'Request';
		}elseif($status == 'publish'){
			$status_new = 'Publish';
		}elseif($status == 'reject'){
			$status_new = 'Reject';
		}else{
			$status_new = 'Draft';
		}
		$data = array(
			'title'			=> 'Artikel - '.$status_new,
			'judul'			=> 'Artikel - '.$status_new,
			'status'		=> $status_new,
			'content'		=> 'admin/artikel/v_content',
			'ajax'	 		=> 'admin/artikel/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'title'			=> 'Tambah Artikel',
			'judul'			=> 'Tambah Artikel',
			'content'		=> 'admin/artikel/v_add',
			'ajax'	 		=> 'admin/artikel/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function tabel($status='')
	{
		
		$cek = $this->blog->tabel_artikel($status)->result();
		$data = array();
		$no=1;
		foreach ($cek as $r) {
			$row = array();

			$blog_id =  $this->security->xss_clean($r->blog_id);
			$blog_judul =  $this->security->xss_clean($r->blog_judul);
			$blog_views =  $this->security->xss_clean($r->blog_views);
			$blog_gambar =  $this->security->xss_clean($r->blog_gambar);
			$request_date =  $this->security->xss_clean($r->request_date);
			$publish_date =  $this->security->xss_clean($r->publish_date);
			$name_user =  $this->security->xss_clean($r->name_user);
			$blog_status =  $this->security->xss_clean($r->blog_status);

			
			if($blog_status == 'Draft'){
				$tgl_riwayat = format_indo($r->created_date);
			}elseif($blog_status == 'Request'){
				$tgl_riwayat = format_indo($r->request_date);
			}elseif($blog_status == 'Publish'){
				$tgl_riwayat = format_indo($r->publish_date);
			}else{
				$tgl_riwayat = format_indo($r->updated_date);
			}
			

			$row[] = $this->security->xss_clean($no);
			$row[] = "<img src='../../public/image/upload/artikel/$blog_gambar' style='width:100px;'>";
			$row[] = $blog_judul;
			$row[] = $name_user;
			$row[] = $tgl_riwayat;
			$row[] = $blog_views;
			$button = "
			<button type='button' class='btn btn-info btn-sm btn_del_foto' id='$blog_id' title='Lihat'>
			<i class='fa fa-eye'></i></button>";

			if($blog_status == 'Draft'){
				$button .= "

				<button type='button' class='btn btn-success btn-sm btnpublish' data-id='$blog_id' title='Publish'>
				<i class='fa fa-send'></i></button>
				<a href='edit/$blog_id' type='button' class='btn btn-warning btn-sm' title='Edit'>
				<i class='fa fa-edit'></i></a>
				<button type='button' class='btn btn-danger btn-sm btnhapus' data-id='$blog_id' title='Hapus'>
				<i class='fa fa-trash'></i></button> 
				
				";

			}elseif($blog_status == 'Request'){
				if($this->session->userdata('level_user') == 'Admin'){

					$button .= "
					<button type='button' class='btn btn-success btn-sm btnpublish' data-id='$blog_id' title='Publish'>
					<i class='fa fa-send'></i></button>
					<a href='edit/$blog_id' type='button' class='btn btn-warning btn-sm' title='Edit'>
					<i class='fa fa-edit'></i></a>
					<button type='button' class='btn btn-secondary btn-sm btnreject' data-id='$blog_id' title='Reject'>
					<i class='fa fa-close'></i></button> 
					";

				}else{

					$button .= "
					<a href='edit/$blog_id' type='button' class='btn btn-warning btn-sm' title='Edit'>
					<i class='fa fa-edit'></i></a>
					<button type='button' class='btn btn-danger btn-sm btnhapus' data-id='$blog_id' title='Hapus'>
					<i class='fa fa-trash'></i></button>
					";
				}

			}elseif($blog_status == 'Publish'){
				if($this->session->userdata('level_user') == 'Admin'){
					$button .= "
					<a href='edit/$blog_id' type='button' class='btn btn-warning btn-sm' title='Edit'>
					<i class='fa fa-edit'></i></a>
					<button type='button' class='btn btn-secondary btn-sm btnnonaktif' data-id='$blog_id' title='Non Aktif'>
					<i class='fa fa-close'></i></button>";

				}else{
					$button .= "
					<button type='button' class='btn btn-warning btn-sm btneditpublis' data-id='$blog_id' title='Edit'>
					<i class='fa fa-edit'></i></button>";
				}


			}elseif($blog_status == 'Reject'){

				$button .= "
				<button type='button' class='btn btn-danger btn-sm btnhapussoft' data-id='$blog_id' title='Hapus'>
				<i class='fa fa-trash'></i></button>";
			}




			$row[] 	= $button;
			$data[] = $row;
			$no++;
		}

		$result = array(
            "data" => $data,
        );
        echo json_encode($result);
	}

	public function edit($id)
	{
		$cek = $this->blog->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/artikel'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Kompetensi Keahlian',
				'judul'			=> 'Edit Kompetensi Keahlian',
				'data' 			=> 	$this->blog->detail($id)->row_array(),
				'content'		=> 'admin/artikel/v_edit',
				'ajax'	 		=> 'admin/artikel/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

	
	}

	public function editp($id)
	{
		$cek = $this->blog->detail($id)->row_array();
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/artikel'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Admin - Edit Artikel',
				'judul'			=> 'Edit Artikel',
				'data' 			=> 	$this->blog->detail($id)->row_array(),
				'content'		=> 'admin/artikel/v_edit_p',
				'ajax'	 		=> 'admin/artikel/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$blog_judul		= $this->input->post('blog_judul');
		$blog_isi		= $this->input->post('blog_isi');

		$nama		= strip_tags($this->input->post('blog_judul'));
		$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
		$trim     	= trim($string);
		$blog_slug     	= strtolower(str_replace(" ", "-", $trim));

		$image 								= time().'-'.$_FILES["inputfile"]['name'];
		$config['upload_path'] 				= './public/image/upload/artikel/';
		$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
		$config['max_size']  				= '2400';
		$config['file_name']  				= $image;

		$this->load->library('upload', $config);

		$this->upload->do_upload('inputfile');

		$data = array(
			'blog_judul'		=> $blog_judul,
			'blog_isi'			=> $blog_isi,
			'blog_kategori'		=> 'Artikel',
			'blog_status'		=> 'Draft',
			'blog_gambar'		=> $image,
			'id_user'			=> $this->session->userdata('id_user'),
			'blog_slug'			=> $blog_slug
		);
		$q = $this->blog->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/artikel/draft'),'refresh');

		
	}

	public function update()
	{
		
		$valid = $this->form_validation;
		
		$blog_id		= $this->input->post('blog_id');
		$blog_judul		= $this->input->post('blog_judul');
		$blog_isi		= $this->input->post('blog_isi');
		
		$cek = $this->blog->detail($blog_id)->row_array();


			if($cek['blog_status'] == 'Request'){
				$alamat = 'request';
			}elseif($cek['blog_status'] == 'Publish'){
				$alamat = 'publish';
			}elseif($cek['blog_status'] == 'Reject'){
				$alamat = 'reject';
			}else{
				$alamat = 'draft';
			}
		
		$nama		= strip_tags($this->input->post('blog_judul'));
		$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
		$trim     	= trim($string);
		$blog_slug     	= strtolower(str_replace(" ", "-", $trim));

		if($_FILES["inputfile"]['name'] == ""){
	
			$data = array(
				'blog_id'			=> $blog_id,
				'blog_judul'		=> $blog_judul,
				'blog_isi'			=> $blog_isi,
				'blog_kategori'		=> 'Artikel',
				'blog_slug'			=> $blog_slug
			);
			$q = $this->blog->update($data);

		}else{

			$image 								= time().'-'.$_FILES["inputfile"]['name'];
			$config['upload_path'] 				= './public/image/upload/artikel/';
			$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
			$config['max_size']  				= '2400';
			$config['file_name']  				= $image;
	
			$this->load->library('upload', $config);
	
			$this->upload->do_upload('inputfile');
	
			$data = array(
				'blog_id'			=> $blog_id,
				'blog_judul'		=> $blog_judul,
				'blog_isi'			=> $blog_isi,
				'blog_kategori'		=> 'Artikel',
				'blog_gambar'		=> $image,
				'blog_slug'			=> $blog_slug
			);
			$q = $this->blog->update($data);
		}

		$this->session->set_flashdata('flash', 'Update Berhasil');
		redirect(base_url('admin/artikel/'.$alamat),'refresh');
	}

	public function update_publis_user()
	{
		
		$valid = $this->form_validation->set_rules('blog_id','title','required|trim');
		$valid = $this->form_validation->set_rules('update_publis_user','title','required|trim'); 

		if($valid->run()==false){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/artikel/publish'),'refresh');
		}else{

			$blog_id		= $this->input->post('blog_id');
			$blog_judul		= $this->input->post('blog_judul');
			$blog_isi		= $this->input->post('blog_isi');
			
			$cek = $this->blog->detail($blog_id)->row_array();
	
			$nama		= strip_tags($this->input->post('blog_judul'));
			$string   	= preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $nama);
			$trim     	= trim($string);
			$blog_slug     	= strtolower(str_replace(" ", "-", $trim));
	
			if($_FILES["inputfile"]['name'] == ""){
		
				$data = array(
					'blog_id'			=> $blog_id,
					'blog_judul'		=> $blog_judul,
					'blog_isi'			=> $blog_isi,
					'blog_kategori'		=> 'Artikel',
					'blog_status'		=> 'Request',
					'request_date'		=> date('Y-m-d H:i:s'),
					'blog_slug'			=> $blog_slug
				);
				$q = $this->blog->update($data);
	
			}else{
	
				$image 								= time().'-'.$_FILES["inputfile"]['name'];
				$config['upload_path'] 				= './public/image/upload/artikel/';
				$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
				$config['max_size']  				= '2400';
				$config['file_name']  				= $image;
		
				$this->load->library('upload', $config);
		
				$this->upload->do_upload('inputfile');
		
				$data = array(
					'blog_id'			=> $blog_id,
					'blog_judul'		=> $blog_judul,
					'blog_isi'			=> $blog_isi,
					'blog_kategori'		=> 'Artikel',
					'blog_gambar'		=> $image,
					'blog_status'		=> 'Request',
					'request_date'		=> date('Y-m-d H:i:s'),
					'blog_slug'			=> $blog_slug
				);
				$q = $this->blog->update($data);
			}
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/artikel/publish'),'refresh');
		}
		
	}

	public function update_status()
	{
		if($this->input->post('status') == 'Publish'){

			if($this->session->userdata('level_user') == 'Admin'){
				$status = 'Publish';
			}else{
				$status = 'Request';
			}

		}else{
			$status 	= $this->input->post('status');
		}

		$id 	= $this->input->post('id');
		$cek = $this->blog->detail($id)->row_array();
		if($cek == null){
			$result['result']=0;
			echo json_encode($result);
		}else{

			
			if($this->session->userdata('level_user') == 'Admin'){
				$slug = $cek['blog_slug'];

				if($this->input->post('status') == 'Publish'){
					
					$cek_slug = $this->blog->cek_slug_artikel($slug)->row_array();
				}else{
					$cek_slug = null;
				}

				if($cek_slug == null){
					$data = array(
						'blog_id'		=> $id,
						'publish_date'		=> date('Y-m-d H:i:s'),
						'blog_status'	=> $status
					);
					
					$this->blog->update($data);
	
					$result['result']=1;
					echo json_encode($result);

				}else{
					$result['result']=3;
					echo json_encode($result);
					
				}

			}else{
				$data = array(
					'blog_id'		=> $id,
					'request_date'		=> date('Y-m-d H:i:s'),
					'blog_status'	=> $status
				);
				
				$this->blog->update($data);

				$result['result']=2;
				echo json_encode($result);

			}
		}

	}


	public function deletesoft()
	{

		$id 	= $this->input->post('id');
		$cek = $this->blog->detail($id)->row_array();
		if($cek == null){
			$result['result']=0;
			echo json_encode($result);
		}else{

			$data = array(
				'blog_id'		=> $id,
				'is_deleted'	=> 1
			);
			
			$this->blog->update($data);
			
			$result['result']=1;
			echo json_encode($result);

		}

	}


	public function delete()
	{
		$id = $this->input->post('id');
		$cek = $this->blog->detail($id)->row_array();
		if($cek == null){
			$result['result']=0;
			echo json_encode($result);
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->blog->delete($data);
			
			$result['result']=1;
			echo json_encode($result);
		}

	}

	public function handleimage()
	{
		$ds = DIRECTORY_SEPARATOR;

      $storeFolder = 'images';

      if (!empty($_FILES)) 
      {
		$baseurl = base_url();
		$tempFile = $_FILES['file']['tmp_name'];

		$image 								= time().'-'.$_FILES["file"]['name'];
		$config['upload_path'] 				= './public/image/upload/detailartikel/';
		$config['allowed_types'] 			= 'gif|jpg|png|jpeg';
		$config['max_size']  				= '2400';
		$config['file_name']  				= $image;
		$filetowrite = $config['upload_path'] . $image;

		$this->load->library('upload', $config);

		$this->upload->do_upload('file');



		echo json_encode(array('location' => base_url().'public/image/upload/detailartikel/'.$image));

       }
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */