<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->library('template');
		$this->load->model('Identitas_model', 'identitas');
		$this->load->model('Kepalasekolah_model', 'kepalasekolah');
		$this->load->model('Album_model', 'album');
		$this->load->model('Blog_model', 'blog');
		$this->load->model('Jurusan_model', 'jurusan');
		$this->load->model('Gurustaf_model', 'gurustaf');
		$this->load->helper('tgl_indo');
	}
    
	public function load_sdm()
	{
		$kelompok = $this->input->post('kelompok');
		$limit = $this->input->post('limit');
		$data_gurustaf		=$this->gurustaf->list_load($kelompok,$limit)->result();
		foreach($data_gurustaf as $row_gurustaf){
		
		echo	"<div class='col-md-3 col-lg-3 mt-20 col-sm-6 col-xs-12 col wow fadeInUp' data-wow-delay='.2s'>
                    <div class='team-wrap2'>
                        <div class='team-img'>
                            <img src='public/image/upload/gurustaf/$row_gurustaf->foto_gurustaf' style='height: 300px;'/>
                        </div>
                        <div class='team-content'>
                            <h3>$row_gurustaf->nama</h3>
                            <p>jabatan</p>
                        </div>
                    </div>
                </div>";
		
		}
		
	}



	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */