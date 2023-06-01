<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}	

	public function tabel_artikel($status)
	{
		if($this->session->userdata('level_user') == 'Admin'){
			if($status == 'Request'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Artikel');
				$this->db->order_by('request_date', 'Desc');
				return $query = $this->db->get();
	
			}elseif($status == 'Publish'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Artikel');
				$this->db->order_by('tbl_blog.publish_date', 'Desc');
				return $query = $this->db->get();
	
			}elseif($status == 'Reject'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Artikel');
				$this->db->order_by('tbl_blog.request_date', 'Desc');
				return $query = $this->db->get();
				
			}else{
	
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Artikel');
				$this->db->order_by('tbl_blog.blog_id', 'Desc');
				return $query = $this->db->get();
			}

		}else{
			$id_user = $this->session->userdata('id_user');
			if($status == 'Request'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Artikel');
				$this->db->where('tbl_blog.id_user', $id_user);
				$this->db->order_by('request_date', 'Desc');
				return $query = $this->db->get();
	
			}elseif($status == 'Publish'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Artikel');
				$this->db->where('tbl_blog.id_user', $id_user);
				$this->db->order_by('tbl_blog.publish_date', 'Desc');
				return $query = $this->db->get();
	
			}elseif($status == 'Reject'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Artikel');
				$this->db->where('tbl_blog.id_user', $id_user);
				$this->db->order_by('tbl_blog.request_date', 'Desc');
				return $query = $this->db->get();
				
			}else{
	
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Artikel');
				$this->db->where('tbl_blog.id_user', $id_user);
				$this->db->order_by('tbl_blog.blog_id', 'Desc');
				return $query = $this->db->get();
			}
		}
	}

	public function count_artikel($status)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->select('count(*) as count');
		$this->db->from('tbl_blog');
		$this->db->where('tbl_blog.blog_kategori', 'Artikel');
		$this->db->where('tbl_blog.id_user', $id_user);
		$this->db->where('blog_status', $status);
		$query = $this->db->get();
		return $query;
	}

	public function topten($kategori)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
		$this->db->where('tbl_blog.is_deleted', 0);
		$this->db->where('tbl_blog.blog_status', 'Publish');
		$this->db->where('tbl_blog.blog_kategori', 'Artikel');
		$this->db->where('tbl_blog.id_user', $id_user);
		$this->db->order_by('tbl_blog.blog_views', 'Desc');
		$this->db->limit(10);
		return $query = $this->db->get();
	}

	public function front_home_artikel($limit)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
		$this->db->where('tbl_blog.is_deleted', 0);
		$this->db->where('tbl_blog.blog_status', 'Publish');
		$this->db->where('tbl_blog.blog_kategori', 'Artikel');
		$this->db->order_by('tbl_blog.publish_date', 'Desc');
		$this->db->limit($limit);
		return $query = $this->db->get();
	}

	public function front_home_berita($limit)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
		$this->db->where('tbl_blog.is_deleted', 0);
		$this->db->where('tbl_blog.blog_status', 'Publish');
		$this->db->where('tbl_blog.blog_kategori', 'Berita');
		$this->db->order_by('tbl_blog.publish_date', 'Desc');
		$this->db->limit($limit);
		return $query = $this->db->get();
	}

	public function front_populer($kategori,$limit)
	{
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
		$this->db->where('tbl_blog.is_deleted', 0);
		$this->db->where('tbl_blog.blog_status', 'Publish');
		$this->db->where('tbl_blog.blog_kategori', $kategori);
		$this->db->order_by('tbl_blog.blog_views', 'Desc');
		$this->db->limit($limit);
		return $query = $this->db->get();
	}

	public function front_terbaru($kategori,$limit)
	{
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
		$this->db->where('tbl_blog.is_deleted', 0);
		$this->db->where('tbl_blog.blog_status', 'Publish');
		$this->db->where('tbl_blog.blog_kategori', $kategori);
		$this->db->order_by('tbl_blog.publish_date', 'Desc');
		$this->db->limit($limit);
		return $query = $this->db->get();
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->where('blog_id', $id);
		$query = $this->db->get();
		return $query;
	}

	public function front_detail($blog_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
		$this->db->where('tbl_blog.is_deleted', 0);
		$this->db->where('tbl_blog.blog_status', 'Publish');
		$this->db->where('tbl_blog.blog_id', $blog_id);
		return $query = $this->db->get();
	}

	public function cek_slug_artikel($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->where('blog_slug', $slug);
		$this->db->where('blog_kategori', 'Artikel');
		$this->db->where('is_deleted', 0);
		$this->db->where('blog_status', 'Publish');
		$query = $this->db->get();
		return $query;
	}

	public function cek_slug_berita($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_blog');
		$this->db->where('blog_slug', $slug);
		$this->db->where('blog_kategori', 'Berita');
		$this->db->where('is_deleted', 0);
		$this->db->where('blog_status', 'Publish');
		$query = $this->db->get();
		return $query;
	}

	public function insert($data)
	{
		$this->db->insert('tbl_blog', $data);
	}

	public function update($data)
	{
		$this->db->where('blog_id', $data['blog_id']);
		$this->db->update('tbl_blog', $data);
	}

	public function delete($data)
	{
		$this->db->where('blog_id', $data['id']);
		$this->db->delete('tbl_blog');
	}

	public function tabel_berita($status)
	{
		if($this->session->userdata('level_user') == 'Admin'){
			if($status == 'Request'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Berita');
				$this->db->order_by('request_date', 'Desc');
				return $query = $this->db->get();
	
			}elseif($status == 'Publish'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Berita');
				$this->db->order_by('tbl_blog.publish_date', 'Desc');
				return $query = $this->db->get();
	
			}elseif($status == 'Reject'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Berita');
				$this->db->order_by('tbl_blog.request_date', 'Desc');
				return $query = $this->db->get();
				
			}else{
	
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Berita');
				$this->db->order_by('tbl_blog.blog_id', 'Desc');
				return $query = $this->db->get();
			}

		}else{
			$id_user = $this->session->userdata('id_user');
			if($status == 'Request'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Berita');
				$this->db->where('tbl_blog.id_user', $id_user);
				$this->db->order_by('request_date', 'Desc');
				return $query = $this->db->get();
	
			}elseif($status == 'Publish'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Berita');
				$this->db->where('tbl_blog.id_user', $id_user);
				$this->db->order_by('tbl_blog.publish_date', 'Desc');
				return $query = $this->db->get();
	
			}elseif($status == 'Reject'){
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Berita');
				$this->db->where('tbl_blog.id_user', $id_user);
				$this->db->order_by('tbl_blog.request_date', 'Desc');
				return $query = $this->db->get();
				
			}else{
	
				$this->db->select('*');
				$this->db->from('tbl_blog');
				$this->db->join('tbl_user','tbl_blog.id_user = tbl_user.id_user', 'inner');
				$this->db->where('tbl_blog.is_deleted', 0);
				$this->db->where('tbl_blog.blog_status', $status);
				$this->db->where('tbl_blog.blog_kategori', 'Berita');
				$this->db->where('tbl_blog.id_user', $id_user);
				$this->db->order_by('tbl_blog.blog_id', 'Desc');
				return $query = $this->db->get();
			}
		}
	}



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */