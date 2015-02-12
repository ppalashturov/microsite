<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blog_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function allBlog($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->where('isActive', '1');
		$this->db->order_by('post_id', 'asc');
		$query = $this->db->get('blog_posts');
		if($query->num_rows() > 0){
			$ret = $query->result_array();
			return $ret;
		}else{
			return false;
		}
	}
	
	function getRows(){
		$query = $this->db->get('blog_posts');
		if($query->num_rows() > 0){
			return $query->num_rows();
		}else{
			return false;
		}
	}
	
	public function getLast(){
		$this->db->select('post_title, post_content, post_url, post_meta_description');
		$this->db->where('isActive', '1');
		$this->db->order_by('post_id', 'asc');
		$query = $this->db->get('blog_posts', '3,0');
		if($query->num_rows() > 0){
			$ret = $query->result_array();
			return $ret;
		}else{
			return false;
		}
	}
	
	public function fetchByURL($post_url){
		$this->db->where('isActive', '1');
		$this->db->where('post_url', $post_url);
		$query = $this->db->get('blog_posts');
		if($query->num_rows() > 0){
			$ret = $query->row();
			return $ret;
		}else{
			return false;
		}
	}
}
?>