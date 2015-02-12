<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'dashboard.php';
class Admin extends Dashboard {
	private $theme;
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->theme = 'twitter-bootstrap';
		$this->load->library('grocery_CRUD');
	}
	
	public function _example_output($output = null)
	{	
		$this->db->where('isRead', '0');
		$query = $this->db->get('message');
		if($query->num_rows() > 0){
			$ret = $query->result_array();
			$output->count_order = count($ret);
		}
		$this->load->view('admin.php',$output);
	}


	public function index()
	{
		$this->home();
	}
	
	public function blog_posts()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme($this->theme);
			$crud->set_table('blog_posts');
			$crud->set_subject('блог');
			$crud->required_fields('post_title', 'post_content');
			$crud->display_as('post_title', 'Заглавие');
			$crud->display_as('post_meta_title', 'Пояснително заглавие');
			$crud->display_as('post_meta_keywords', 'Ключови думи');
			$crud->display_as('post_meta_description', 'Кратко описание');
			$crud->display_as('isActive', 'Активна');
			$crud->display_as('post_url', 'Оптимизиран адрес');
			$crud->display_as('post_content', 'Съдържание');
			$crud->field_type('isActive','true_false');
			$crud->unset_columns('post_content');
			$crud->unset_read();
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	public function home(){
			$crud = new grocery_CRUD();

			$crud->set_theme($this->theme);
			$crud->set_table('home');
			$crud->set_subject('Главна страница');
			$crud->display_as('home_title', 'Заглавие');
			$crud->display_as('home_meta_title', 'Пояснително заглавие');
			$crud->display_as('home_meta_keywords', 'Ключови думи');
			$crud->display_as('home_meta_description', 'Кратко описание');
			$crud->display_as('home_content', 'Съдържание');
			$crud->unset_columns('home_content');
			//$crud->set_field_upload('file_url','assets/uploads/files');
			$crud->unset_add();
			$crud->unset_delete();
			$crud->unset_read();
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	public function message(){
		
			if($this->uri->segment(3) == "read"){
				$this->db->where('msg_id', $this->uri->segment(4));
				$data = array(
					'isRead' => '1'
				);
				$this->db->update('message', $data);
			}
			$crud = new grocery_CRUD();

			$crud->set_theme($this->theme);
			$crud->set_table('message');
			$crud->set_subject('Съобщения');
			$crud->display_as('msg_name', 'Три Имена');
			$crud->display_as('msg_email', 'Email');
			$crud->display_as('msg_content', 'Заглавие');
			$crud->display_as('isRead', 'Прочетено');
			$crud->display_as('msg', 'Съдържание');
			$crud->field_type('isRead', 'hidden');
			$crud->unset_columns('msg' ,'isRead');
			$crud->unset_edit();
			$output = $crud->render();
			$this->_example_output($output);
	}
	
	public function password(){
			$crud = new grocery_CRUD();
			$crud->set_theme($this->theme);
			$crud->set_table('users');
			$crud->set_subject('Парола');
			$crud->unset_columns('password');
			$crud->field_type('username', 'readonly');
			$crud->field_type('password', 'password');
			$crud->display_as('password', 'Нова парола');
			$crud->display_as('username', 'Потребител');
			$crud->callback_before_insert(array($this,'encrypt_password_callback'));
			$crud->callback_before_update(array($this,'encrypt_password_callback'));
			$crud->callback_edit_field('password',array($this,'decrypt_password_callback'));
			$crud->unset_add();
			$crud->unset_read();
			$crud->unset_delete();
			$output = $crud->render();

			$this->_example_output($output);
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