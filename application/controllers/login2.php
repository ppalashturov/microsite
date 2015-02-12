<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');/* Author: Jorge Torres * Description: Login controller class */

class Login2 extends CI_Controller{
		function __construct(){
			parent::__construct();	
		}		
		
		public function index($msg = NULL){			
			if($this->session->userdata('validated')){			
				redirect('dashboard2');		
			}
		
			$data['msg'] = $msg;		
			$this->load->view('admin2/login_view2', $data);
		}		
		public function process(){				
			$this->load->model('login_model');	
			$result = $this->login_model->validate();			
			if(! $result){			
				$msg = '<font color=red>Грешно потребителско име и/или парола!.</font><br />';			
				$this->index($msg);		
			}else{				
				redirect('dashboard2');	
			}			
		}
}
?>