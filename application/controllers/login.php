<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');/* Author: Jorge Torres * Description: Login controller class */

class Login extends CI_Controller{
		function __construct(){
			parent::__construct();	
		}		
		
		public function index($msg = NULL){			
			if($this->session->userdata('validated')){			
				redirect('dashboard');		
			}
		
			$data['msg'] = $msg;		
			$this->load->view('admin/login_view', $data);
		}		
		public function process(){				
			$this->load->model('login_model');	
			$result = $this->login_model->validate();			
			if(! $result){			
				$msg = '<font color=red>Грешно потребителско име и/или парола!.</font><br />';			
				$this->index($msg);		
			}else{				
				redirect('dashboard');	
			}			
		}
}
?>