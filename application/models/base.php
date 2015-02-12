<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getSettings(){
		$query = $this->db->get('settings');
		if($query->num_rows() > 0){
			$ret = $query->row();
			return $ret;
		}else{
			return false;
		}
	}
	
	function getNav(){
		$this->db->select('page_title, page_url, page_id');
		$this->db->where('isActive', '1');
		$query = $this->db->get('pages');
		if($query->num_rows() > 0){
			$ret = $query->result_array();
			return $ret;
		}else{
			return false;
		}
	}
	
	function insertMsg($data){
		$this->db->insert('message', $data);
	}
}

?>