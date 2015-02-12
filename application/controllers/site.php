<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Site extends CI_Controller{	
	
	function __construct(){		
		parent::__construct();
	}
	
	public function index(){
		$this->viewPage();
	}

	public function viewPage(){

			$this->load->model('home_model');
			$homeData = $this->home_model->homeData();
			$data['title'] = $homeData->home_title;
			$data['meta_title'] = $homeData->home_meta_title;
			$data['meta_keywords'] = $homeData->home_meta_keywords;
			$data['meta_description'] = $homeData->home_meta_description;
			$data['content'] = $homeData->home_content;
			$this->load->model('blog_model');
			$data['last'] = $this->blog_model->getLast();
			$data['page'] = 'home';

		$data['title_prefix'] = 'MICRO';		
        $this->load->view('site', $data);
	}
} 
?>