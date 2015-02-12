<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function homeData(){
		$this->db->where('home_id', '1');
		$query = $this->db->get('home');
		if($query->num_rows() > 0){
			$ret = $query->row();
			return $ret;
		}
	}
}

?>