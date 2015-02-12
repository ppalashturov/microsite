<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Blog extends CI_Controller{	
	
	function __construct(){		
		parent::__construct();
	}
	
	public function index(){
		$this->load->model('blog_model');

			$this->load->library('pagination');
			$page = (int)$this->input->get('page', TRUE);
			//echo var_dump($page);
			$config['base_url'] = base_url() . 'новини.html?s=1';
			$config['total_rows'] = $this->blog_model->getRows();
			$config['page_query_string'] = true;
			$config['query_string_segment'] = "page";
			$config['per_page'] = 6;
			$config['full_tag_open'] = '<ul class="pager">';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['first_link'] = 'Първа';
			$config['last_link'] = 'Последна';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Следваща';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = 'Предишна';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$this->pagination->initialize($config);

			$data['blog'] = $this->blog_model->allBlog($config['per_page'], $page);
			
		$data['title'] = "Новини";
		$data['meta_title'] = "Новини";
		$data['meta_keywords'] = "Новини";
		$data['meta_description'] = "Новини";
		
			
		$data['title_prefix'] = 'MICRO';
        $this->load->view('blog', $data);
	}
	
	public function viewBlog(){
		$this->load->model('blog_model');
		$post_url = $this->uri->segment(1);
		if($post_url === false){
			redirect(base_url());
		}
		$post_url = str_replace("новина-", "", $post_url);
		$post_url = str_replace(".html", "", $post_url);
		$postData = $this->blog_model->fetchByURL($post_url);
		$data['title'] = $postData->post_title;
		$data['meta_title'] = $postData->post_meta_title;
		$data['meta_keywords'] = $postData->post_meta_keywords;
		$data['meta_description'] = $postData->post_meta_description;
		$data['content'] = $postData->post_content;
		$data['page'] = "page";
		$data['title_prefix'] = 'MICRO';
        $this->load->view('site', $data);
	}
	
	
} 
?>