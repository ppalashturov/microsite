<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'dashboard2.php';
class Admin2 extends Dashboard2 {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
	}


	public function index()
	{
		$this->db->where('isRead', '0');
		$query = $this->db->get('message');
		if($query->num_rows() > 0){
			$ret = $query->result_array();
			$data['count_order'] = count($ret);
		}		

		$this->load->model('home_model');
		$homeData = $this->home_model->homeData();
		$data['title'] = $homeData->home_title;
		$dаta['meta_title'] = $homeData->home_meta_title;
		$data['meta_keywords'] = $homeData->home_meta_keywords;
		$data['meta_description'] = $homeData->home_meta_description;
		$data['content'] = $homeData->home_content;
		
		//var_dump($data['title']);	
		
		$data['info'] = '
		<div class="span12">
		<table class="table table-bordered tablesorter table-striped">
			<thead>
			<tr>
				<th>
					<div rel="home_title" class="text-left field-sorting ">Заглавие</div>
				</th>
				<th>
					<div rel="home_meta_title" class="text-left field-sorting ">Пояснително заглавие</div>
				</th>
				<th>
					<div rel="home_meta_keywords" class="text-left field-sorting ">Ключови думи</div>
				</th>
				<th>
					<div rel="home_meta_description" class="text-left field-sorting ">Кратко описание</div>
				</th>
				<th class="no-sorter">Действие</th>
			</tr>
		</thead>
			<tbody>
					<tr class="">
					<td class="">
						<div class="text-left">'.$homeData->home_title.'</div>
					</td>
									<td class="">
						<div class="text-left">'.$homeData->home_meta_title.'</div>
					</td>
									<td class="">
						<div class="text-left">'.$homeData->home_meta_keywords.'</div>
					</td>
									<td class="">
						<div class="text-left">'.$homeData->home_meta_description.'</div>
					</td>
					<td align="left">
					<div class="tools">
						
							<a href="'. base_url() .'admin2/homeedit">Редактирай</a>
					</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
		';
		
	$this->load->view('admin2.php', $data);		

	}
	
	public function homeedit()
	{
		$this->db->where('isRead', '0');
		$query = $this->db->get('message');
		if($query->num_rows() > 0){
			$ret = $query->result_array();
			$data['count_order'] = count($ret);
		}		
		$this->load->model('admin');
		$this->load->model('home_model');
		$homeData = $this->home_model->homeData();
		$data['title'] = $homeData->home_title;
		$data['meta_title'] = $homeData->home_meta_title;
		$data['meta_keywords'] = $homeData->home_meta_keywords;
		$data['meta_description'] = $homeData->home_meta_description;
		$data['content'] = $homeData->home_content;
		
		
		if(isset($_POST['submit'])) {
			
			$update = array(
				"home_title" => $this->input->post('home_title'),
				"home_content" => $this->input->post('home_content'),
				"home_meta_title" => $this->input->post('home_meta_title'),
				"home_meta_keywords" => $this->input->post('home_meta_keywords'),
				"home_meta_description" => $this->input->post('home_meta_description')
			);
			
			$this->admin->updateHome($update);
			
			$data['succes'] = 'Информацията беше успешно запазена.';
			redirect('admin2');	
		}

		$this->load->view('admin2/home/edit.php', $data);		
	}
	
	
	public function blog_posts()
	{
				$this->db->where('isRead', '0');
				$query = $this->db->get('message');
				if($query->num_rows() > 0){
					$ret = $query->result_array();
					$data['count_order'] = count($ret);
				}
				
		$this->load->model('admin');
		$blogData = $this->admin->blogData();
				
			$data['info'] = '<div class="span12">
		<table class="table table-bordered tablesorter table-striped">
			<thead>
			<tr>
				<th>
					<div rel="home_title" class="text-left field-sorting ">Заглавие</div>
				</th>
				<th>
					<div rel="home_meta_title" class="text-left field-sorting ">Ключови думи</div>
				</th>
				<th>
					<div rel="home_meta_keywords" class="text-left field-sorting ">Мета заглавие</div>
				</th>
				<th>
					<div rel="home_meta_description" class="text-left field-sorting ">Кратко описание</div>
				</th>
				<th class="no-sorter">Действие</th>
			</tr>
			
		</thead>';
		
		foreach ($blogData as $blg) {
				
			$data['info'] .= '
		
			<tbody>
					<tr class="">
					<td class="">
						<div class="text-left">'.$blg['post_title'].'</div>
					</td>
									<td class="">
						<div class="text-left">'.$blg['post_meta_keywords'].'</div>
					</td>
									<td class="">
						<div class="text-left">'.$blg['post_meta_title'].'</div>
					</td>
									<td class="">
						<div class="text-left">'.$blg['post_meta_description'].'</div>
					</td>
					<td align="left">
					<div class="tools">
						
							<a href="'. base_url() .'admin2/blogedit/'.$blg['post_id'].'">редактирай</a> / <a href="'. base_url() .'admin2/blogdel/'.$blg['post_id'].'">изтрий</a>
					</div>
					</td>
				</tr>
			</tbody>
		
		';
		}
		$data['info'] .= '</table>
	</div>';
	
		$this->load->view('admin2.php', $data);		
	
	}
	
	public function blogdel() {
		

	if((int)$this->uri->segment(3)) {		
			
		$post_id = $this->uri->segment(3);
			
		$this->db->where('post_id', $post_id);
		$this->db->delete('blog_posts');
		
		redirect('admin2/blog_posts');	
	}	
	}
	
	public function blogedit() {
		

	if((int)$this->uri->segment(3)) {		
			
		$post_id = $this->uri->segment(3);
		$this->db->where('post_id', $post_id);
		$query = $this->db->get('blog_posts');
		$ret = $query->row();
		
		$this->load->model('admin');

		$data['post_title'] = $ret->post_title;
		$data['post_content'] = $ret->post_content;
		$data['post_meta_keywords'] = $ret->post_meta_keywords;
		$data['post_meta_description'] = $ret->post_meta_description;
		$data['isActive'] = $ret->isActive;
		$data['post_meta_title'] = $ret->post_meta_title;
		$data['post_url'] = $ret->post_url;
		
		//var_dump($ret->post_title);
		if(isset($_POST['submit'])) {
			
			$update = array(
				"post_title" => $this->input->post('post_title'),
				"post_content" => $this->input->post('post_content'),
				"post_meta_keywords" => $this->input->post('post_meta_keywords'),
				"post_meta_description" => $this->input->post('post_meta_description'),
				"isActive" => $this->input->post('isActive'),
				"post_meta_title" => $this->input->post('post_meta_title'),
				"post_url" => $this->input->post('post_url')
			);
			
			$this->admin->updateBlog($update, $post_id);
			
			$data['succes'] = 'Информацията беше успешно запазена.';
			redirect('admin2/blog_posts');	
		}

		$this->load->view('admin2/blog/edit.php', $data);	
		
	}	
	}
	
	public function message(){
			
				$this->db->where('isRead', '0');
				$query = $this->db->get('message');
				if($query->num_rows() > 0){
					$ret = $query->result_array();
					$data['count_order'] = count($ret);
				}
			
			if($this->uri->segment(2) == "message"){
				$data = array(
					'isRead' => '1'
				);
				$this->db->update('message', $data);
			}
		
		$this->load->model('admin');
		$msgData = $this->admin->getMsg();

		
		$data['info'] = '<div class="span12">
		<table class="table table-bordered tablesorter table-striped">
			<thead>
			<tr>
				<th>
					<div rel="home_title" class="text-left field-sorting ">Три Имена</div>
				</th>
				<th>
					<div rel="home_meta_title" class="text-left field-sorting ">Заглавие</div>
				</th>
				<th>
					<div rel="home_meta_keywords" class="text-left field-sorting ">Имейл</div>
				</th>
				<th>
					<div rel="home_meta_description" class="text-left field-sorting ">Описание</div>
				</th>
			</tr>
		</thead>';
		
		foreach ($msgData as $msg) {
				
			$data['info'] .= '
		
			<tbody>
					<tr class="">
					<td class="">
						<div class="text-left">'.$msg['msg_name'].'</div>
					</td>
									<td class="">
						<div class="text-left">'.$msg['msg_content'].'</div>
					</td>
									<td class="">
						<div class="text-left">'.$msg['msg_email'].'</div>
					</td>
									<td class="">
						<div class="text-left">'.$msg['msg'].'</div>
					</td>
				</tr>
			</tbody>
		
		';
		}
		$data['info'] .= '</table>
	</div>';
			$this->load->view('admin2.php', $data);		
	}
	
	public function password(){
			$this->load->view('admin2.php', $data);		
	}
	
	function encrypt_password_callback($post_array, $primary_key = null)
	{
	 
		$post_array['password'] = md5($post_array['password']);
		return $post_array;
	}
	 
	function decrypt_password_callback($value)
	{
		return "<input type='password' name='password' value='' />";
	}

}