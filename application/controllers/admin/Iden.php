<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Identitas_model', 'Identitas');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}


	public function data($id_kategori = "")
	{
		$cek = $this->kategori->detail($id_kategori);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/dashboard'),'refresh');
		}else{
			$get_kategori = $this->kategori->detail($id_kategori);
			$data = array(
				'title'				=> 'Admin - Identitas',
				'data' 				=> $this->Identitas->tabel($id_kategori),
				'nama_kategori' 	=> $get_kategori->nama_kategori,
				'nama_jenis' 		=> $get_kategori->nama_jenis,
				'id_kategori' 		=> $id_kategori,
				'content'			=> 'admin/Identitas/v_content',
				'ajax'	 			=> 'admin/Identitas/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
		
		
	}

	public function index()
	{

			$get_kategori = $this->kategori->detail($id_kategori);
			$data = array(
				'title'				=> 'Identitas',
				'data' 				=> $this->identitas->detail(),
				'content'			=> 'admin/Identitas/v_content',
				'ajax'	 			=> 'admin/Identitas/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		
	}

	public function listkategori($id_jenis = "")
	{
		$cek = $this->jenis->detail($id_jenis);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/dashboard'),'refresh');
		}else{
			$get_jenis = $this->jenis->detail($id_jenis);
			$data = array(
				'title'			=> 'Admin - List Kategori',
				'data'			=> $this->kategori->listkategori($id_jenis),
				'nama_jenis' 	=> $get_jenis->nama_jenis,
				'content'		=> 'admin/listkategori/v_content',
				'ajax'	 		=> 'admin/listkategori/v_ajax'
			);
			
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}

	public function add($id_kategori = "")
	{
		$cek = $this->kategori->detail($id_kategori);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/dashboard'),'refresh');
		}else{
			$get_kategori = $this->kategori->detail($id_kategori);
			$dariDB = $this->Identitas->cek_kode_terkahir();
			$kode_baru = $dariDB + 1;
			
			$data = array(
				'title'				=> 'Add Identitas',
				'kode_baru' 		=> $kode_baru,
				'nama_kategori' 	=> $get_kategori->nama_kategori,
				'id_kategori' 		=> $get_kategori->id_kategori,
				'nama_jenis' 		=> $get_kategori->nama_jenis,
				'content'			=> 'admin/Identitas/v_add',
				'ajax'	 			=> 'admin/Identitas/v_ajax'
			);
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}
	}


	public function edit($id ="")
	{
		$cek = $this->Identitas->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/Identitas'),'refresh');
		}else{

			$data = array(
				'title'			=> 'Edit Identitas',
				'data'			=> $this->Identitas->detail($id),
				'id'			=> $id,
				'dataIdentitas' 	=> $this->Identitas->detail($id),
				'content'		=> 'admin/Identitas/v_edit',
				'ajax'	 		=> 'admin/Identitas/v_ajax'
			);
			
			$this->load->view('admin/layout/v_wrapper', $data, FALSE);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;
		$id_kategori				= $this->input->post('id_kategori');
		$data = array(
			'id_Identitas'				=> $this->input->post('id_Identitas'),
			'nama_Identitas'			=> $this->input->post('nama_Identitas'),
			'alamat'					=> $this->input->post('alamat'),
			'koordinat'					=> $this->input->post('koordinat'),
			'spesifikasi_dermaga'		=> $this->input->post('spesifikasi_dermaga'),
			'jarak_dermaga_terdekat'	=> $this->input->post('jarak_dermaga_terdekat'),
			'jarak_dermaga_pelindo'		=> $this->input->post('jarak_dermaga_pelindo'),
			'luas_perairan'				=> $this->input->post('luas_perairan'),
			'id_kategori'				=> $this->input->post('id_kategori')
		);
		$q = $this->Identitas->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/Identitas/data/'.$id_kategori),'refresh');

		
	}

	public function update()
	{
		$valid = $this->form_validation;

		$id				= $this->input->post('id_Identitas');
		$id_kategori	= $this->input->post('id_kategori');
		$cek = $this->Identitas->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/Identitas'),'refresh');
		}else{

		}

			$data = array(
				'id_Identitas'				=> $this->input->post('id_Identitas'),
				'nama_Identitas'			=> $this->input->post('nama_Identitas'),
				'alamat'					=> $this->input->post('alamat'),
				'koordinat'					=> $this->input->post('koordinat'),
				'spesifikasi_dermaga'		=> $this->input->post('spesifikasi_dermaga'),
				'jarak_dermaga_terdekat'	=> $this->input->post('jarak_dermaga_terdekat'),
				'jarak_dermaga_pelindo'		=> $this->input->post('jarak_dermaga_pelindo'),
				'luas_perairan'				=> $this->input->post('luas_perairan'),
				'id_kategori'				=> $this->input->post('id_kategori')
			);
			
			$this->Identitas->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/Identitas/data/'.$id_kategori),'refresh');
		
			
	}

	public function delete($id)
	{
		$cek = $this->Identitas->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/Identitas'),'refresh');
		}else{
			$get_kategori = $this->Identitas->detail($id);
			$id_kategori = $get_kategori->id_kategori;
			$data = array(
				'id'	=> $id
			);
			
			$this->Identitas->delete($data);
			$this->detail_dermaga->delete_id_Identitas($data);
			$this->detail_layout->delete_id_Identitas($data);
			$this->detail_sarana->delete_id_Identitas($data);
			
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/Identitas/data/'.$id_kategori),'refresh');
		}
		

	}

	public function tabel_foto_dermaga($id)
	{
		$list = $this->detail_dermaga->get_detail_foto_dermaga($id);
		$data = array();
		$no=1;
        foreach ($list as $r) {
			$row = array();

			$test =  $this->security->xss_clean($r->id);
			$foto =  $this->security->xss_clean($r->foto);
            $row[] = $this->security->xss_clean($no);
			$row[] = "<img src='../../../public/image/upload/dermaga/$foto' style='width:200px;'>";
            $row[] = $this->security->xss_clean($r->keterangan);

			$row[] = "<button type='button' class='btn btn-danger btn-sm btn_del_foto_dermaga' id='$test' title='Hapus'>
			<i class='fa fa-trash'></i></button>";
			$data[] = $row;
			$no++;
        }
        $result = array(
            "data" => $data,
        );
        echo json_encode($result);
	}

	public function insert_foto_dermaga()
	{
			$image = $_FILES["foto_dermaga"]['name'];
			$config['upload_path'] 		= './public/image/upload/dermaga/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';
			$config['file_name']  		= $image;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto_dermaga'))
                {
					$result['result']=3;
					echo json_encode($result);
				}else{
					$data = array(
						'id_Identitas'		=> $this->input->post('id_Identitas_dermaga'),
						'foto'				=> $image,
						'keterangan'		=> $this->input->post('keterangan_dermaga')
					);
					$q = $this->detail_dermaga->insert($data);
		
					if($q){
						$result['result']=2;
						echo json_encode($result);
					}else{
						$result['result']=1;
						echo json_encode($result);
					}
				}
		
	}

	public function delete_foto_dermaga($id)
	{
		$data = array(
			'id'	=> $id
		);
		$this->detail_dermaga->delete($data);

		$result['result']=1;
		echo json_encode($result);
	}

	public function tabel_foto_layout($id)
	{
		$list = $this->detail_layout->get_detail_foto_layout($id);
		$data = array();
		$no=1;
        foreach ($list as $r) {
			$row = array();

			$test =  $this->security->xss_clean($r->id);
			$foto =  $this->security->xss_clean($r->foto);
            $row[] = $this->security->xss_clean($no);
			$row[] = "<img src='../../../public/image/upload/layout/$foto' style='width:200px;'>";
            $row[] = $this->security->xss_clean($r->keterangan);

			$row[] = "<button type='button' class='btn btn-danger btn-sm btn_del_foto_layout' id='$test' title='Hapus'>
			<i class='fa fa-trash'></i></button>";
			$data[] = $row;
			$no++;
        }
        $result = array(
            "data" => $data,
        );
        echo json_encode($result);
	}

	public function insert_foto_layout()
	{
			$image = $_FILES["foto_layout"]['name'];
			$config['upload_path'] 		= './public/image/upload/layout/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';
			$config['file_name']  		= $image;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto_layout'))
                {
					$result['result']=3;
					echo json_encode($result);
				}else{
					$data = array(
						'id_Identitas'		=> $this->input->post('id_Identitas_layout'),
						'foto'				=> $image,
						'keterangan'		=> $this->input->post('keterangan_layout')
					);
					$q = $this->detail_layout->insert($data);
		
					if($q){
						$result['result']=2;
						echo json_encode($result);
					}else{
						$result['result']=1;
						echo json_encode($result);
					}
				}
		
	}

	public function delete_foto_layout($id)
	{
		$data = array(
			'id'	=> $id
		);
		$this->detail_layout->delete($data);

		$result['result']=1;
		echo json_encode($result);
	}

	public function tabel_foto_sarana($id)
	{
		$list = $this->detail_sarana->get_detail_foto_sarana($id);
		$data = array();
		$no=1;
        foreach ($list as $r) {
			$row = array();

			$test =  $this->security->xss_clean($r->id);
			$foto =  $this->security->xss_clean($r->foto);
            $row[] = $this->security->xss_clean($no);
			$row[] = "<a href='../../../public/public/image/upload/sarana/$foto' target='_blank'>Download</a>";
            $row[] = $this->security->xss_clean($r->keterangan);

			$row[] = "<button type='button' class='btn btn-danger btn-sm btn_del_foto_sarana' id='$test' title='Hapus'>
			<i class='fa fa-trash'></i></button>";
			$data[] = $row;
			$no++;
        }
        $result = array(
            "data" => $data,
        );
        echo json_encode($result);
	}

	public function insert_foto_sarana()
	{
			$image = $_FILES["foto_sarana"]['name'];
			$config['upload_path'] 		= './public/image/upload/sarana/';
			$config['allowed_types'] 	= 'gif|jpg|png|pdf|jpeg';
			$config['max_size']  		= '2400';
			$config['file_name']  		= $image;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto_sarana'))
                {
					$result['result']=3;
					echo json_encode($result);
				}else{
					$data = array(
						'id_Identitas'		=> $this->input->post('id_Identitas_sarana'),
						'foto'				=> $image,
						'keterangan'		=> $this->input->post('keterangan_sarana')
					);
					$q = $this->detail_sarana->insert($data);
		
					if($q){
						$result['result']=2;
						echo json_encode($result);
					}else{
						$result['result']=1;
						echo json_encode($result);
					}
				}
		
	}

	public function delete_foto_sarana($id)
	{
		$data = array(
			'id'	=> $id
		);
		$this->detail_sarana->delete($data);

		$result['result']=1;
		echo json_encode($result);
	}

	public function tabel_detail_perizinan($id)
	{
		$list = $this->detail_perizinan->get_detail_perizinan($id);
		$data = array();
		$no=1;
        foreach ($list as $r) {
			$row = array();

			$test =  $this->security->xss_clean($r->id);
			$foto =  $this->security->xss_clean($r->file);
            $row[] = $this->security->xss_clean($no);
			$row[] = "<a href='../../public/image/upload/perizinan/$foto' target='_blank'>Download</a>";
            $row[] = $this->security->xss_clean($r->id_perizinan);

			$row[] = "<button type='button' class='btn btn-danger btn-sm btn_del_foto_perizinan' id='$test' title='Hapus'>
			<i class='fa fa-trash'></i></button>";
			$data[] = $row;
			$no++;
        }
        $result = array(
            "data" => $data,
        );
        echo json_encode($result);
	}

	public function insert_foto_perizinan()
	{
			$image = $_FILES["foto_perizinan"]['name'];
			$config['upload_path'] 		= './public/image/upload/perizinan/';
			$config['allowed_types'] 	= 'gif|jpg|png|pdf|jpeg';
			$config['max_size']  		= '2400';
			$config['file_name']  		= $image;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto_perizinan'))
                {
					$result['result']=3;
					echo json_encode($result);
				}else{
					$data = array(
						'id_Identitas'		=> $this->input->post('id_Identitas_perizinan'),
						'foto'				=> $image,
						'keterangan'		=> $this->input->post('keterangan_perizinan')
					);
					$q = $this->detail_perizinan->insert($data);
		
					if($q){
						$result['result']=2;
						echo json_encode($result);
					}else{
						$result['result']=1;
						echo json_encode($result);
					}
				}
		
	}

	public function delete_foto_perizinan($id)
	{
		$data = array(
			'id'	=> $id
		);
		$this->detail_perizinan->delete($data);

		$result['result']=1;
		echo json_encode($result);
	}

	

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */