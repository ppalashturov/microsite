<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getMsg(){
		$query = $this->db->get('message');
		if($query->num_rows() > 0){
			$ret = $query->result_array();
			return $ret;
		}else{
			return false;
		}
	}
	
	public function blogData(){
		$query = $this->db->get('blog_posts');
		if($query->num_rows() > 0){
			$ret = $query->result_array();
			return $ret;
		}else{
			return false;
		}
	}
	
	function updateBlog($data, $post_id){
		$this->db->where('post_id', $post_id);
		$this->db->update('blog_posts', $data);
	}
	
	function updateHome($data){
		$this->db->update('home', $data);
	}
}
?>