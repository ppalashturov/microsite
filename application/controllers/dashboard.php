<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Dashboard extends CI_Controller{	

	function __construct(){		
		parent::__construct();		
		$this->check_isvalidated();	
	}		

	public function index(){
		redirect('admin');
	}	
	
	private function check_isvalidated(){
		if(! $this->session->userdata('validated')){			
			redirect('login');		
		}	
	}
		
	public function logout(){		
		$this->session->sess_destroy();		
		redirect('login');
	} 
} 
?>