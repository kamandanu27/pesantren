<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rt extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rt_model', 'rt');
		$this->load->model('Desa_model', 'desa');
		$this->auth_a->cek();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$data = array(
			'title'				=> 'Admin - RT',
			'data' 				=> $this->rt->tabel(),
			'list_desa' 		=> $this->desa->tabel(),
			'content'			=> 'admin/rt/v_content',
			'ajax'	 			=> 'admin/rt/v_ajax'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function edit($id)
	{
		$cek = $this->rt->detail($id);
		if($cek == null){

		}else{
			$data_rt = $this->rt->detail($id);
			$list_desa = $this->desa->tabel();
			//var_dump($coba);
			$edit_rt = 
			"<div class='form-group'>
				<label>Desa</label>
				<select class='form-control' name='e_id_desa' id='e_id_desa' required>
					<option value='".$data_rt->id_desa."'>".$data_rt->nama_desa."</option>
					<option value=''>- Pilih desa -</option>";
					foreach($list_desa as $row){
						$edit_rt .= "<option value='".$row->id_desa."'>".$row->nama_desa."</option>";
					}
				$edit_rt .="</select>
			</div>
			<div class='form-group'>
            	<label class='control-label'>Nama RT</label>
            	<input class='form-control' type='text' id='e_nama_rt' name='e_nama_rt' value='".$data_rt->nama_rt."' required>
            	<input class='form-control' type='hidden' id='e_id_rt' name='e_id_rt' value='".$data_rt->id_rt."' required>
          	</div>
          	<div class='form-group'>
            	<label class='control-label'>Nomor Urutan</label>
            	<input class='form-control' type='text' id='e_nomor_urutan' name='e_nomor_urutan' value='".$data_rt->nomor_urutan."' required>
          	</div>";

			$data = array('edit' => $edit_rt);
			echo json_encode($data);
		}

	
	}


	public function insert()
	{
		$valid = $this->form_validation;

		$data = array(
			'nama_rt'			=> $this->input->post('nama_rt'),
			'id_desa'			=> $this->input->post('id_desa'),
			'nomor_urutan'		=> $this->input->post('nomor_urutan')
		);
		$q = $this->rt->insert($data);

		$this->session->set_flashdata('flash', 'Insert Berhasil');
		redirect(base_url('admin/rt'),'refresh');

		
	}

	public function update()
	{
		$valid = $this->form_validation;

			$id	= $this->input->post('id');
			$data = array(
				'id_rt'				=> $this->input->post('e_id_rt'),
				'nama_rt'			=> $this->input->post('e_nama_rt'),
				'id_desa'			=> $this->input->post('e_id_desa'),
				'nomor_urutan'		=> $this->input->post('e_nomor_urutan')
			);
			
			$this->rt->update($data);
	
			$this->session->set_flashdata('flash', 'Update Berhasil');
			redirect(base_url('admin/rt'),'refresh');
		
			
	}

	public function delete($id)
	{
		$cek = $this->rt->detail($id);
		if($cek == null){
			$this->session->set_flashdata('flash', 'Eror Tidak ada');
			redirect(base_url('admin/rt'),'refresh');
		}else{

			$data = array(
				'id'	=> $id
			);
			
			$this->rt->delete($data);
			
			$this->session->set_flashdata('flash', 'Hapus Berhasil');
			redirect(base_url('admin/rt'),'refresh');
		}
		
	}

	public function crop()
	{
		$data = $_POST['image'];
     
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
     
        $data = base64_decode($data);
        $imageName = time().'.png';
		$name_crop = $imageName;
        file_put_contents('./public/vali/images/'.$name_crop, $data);
		
		$url = base_url();
		$output = "
		<img src='".$url."public/vali/images/".$name_crop."' />
	   ";

	   $data = array('output' => $output);
	   echo json_encode($data);
	//    unlink('1615397980.png');
		
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/Guru.php */