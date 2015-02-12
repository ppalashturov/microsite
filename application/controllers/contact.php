<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Contact extends CI_Controller{	
	
	function __construct(){		
		parent::__construct();
	}
	
	public function index(){
	
		$this->load->helper('email');
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->model('base');
		$this->load->helper('captcha');
		$data['title'] = "Свържете се с мен";
		$data['meta_title'] = "Свържете се с мен";
		$data['meta_keywords'] = "";
		$data['meta_description'] = "Свържете се с мен";
		$data['title_prefix'] = 'MICRO';
		$this->form_validation->set_rules('msg_name', 'Име и фамилия', 'required');
		$this->form_validation->set_rules('msg_email', 'Email адресът', 'required|valid_email');
		$this->form_validation->set_rules('msg_content', 'Относно', 'required');
		$this->form_validation->set_rules('msg_message', 'Съобщението', 'required');
		$this->form_validation->set_rules('captcha', 'Код', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$vals = array(
			'img_path' => './assets/captcha/',
			'img_url' => base_url() . '/assets/captcha/',
			);

			$cap = create_captcha($vals);
			$this->session->set_userdata('captcha', $cap['word']);
			$data['image'] = $cap['image'];
		}
		else
		{
			if($this->input->post('captcha') == $this->session->userdata('captcha')){
			$insert = array(
				"msg_name" => $this->input->post('msg_name'),
				"msg_content" => $this->input->post('msg_content'),
				"msg_email" => $this->input->post('msg_email'),
				"msg" => $this->input->post('msg_message'),
				"isRead" => 0
			);
			
				$html  = '<h2>Контакти и запитване</h2>';
				$html .= '<table cellpadding="5" cellspacing="0" style="border:1px solid #ccc">';
				$html .= '<tr><td style="background:#eee; border-bottom:1px solid #ccc">Име</td><td style="border-bottom:1px solid #ccc">' . $this->input->post('msg_name') . '</td></tr>';
				$html .= '<tr><td style="background:#eee; border-bottom:1px solid #ccc">Относно</td><td style="border-bottom:1px solid #ccc">' . $this->input->post('msg_content') . '</td></tr>';
				$html .= '<tr><td style="background:#eee; border-bottom:1px solid #ccc">Email</td><td style="border-bottom:1px solid #ccc">' . $this->input->post('msg_email') . '</td></tr>';
				$html .= '<tr><td style="background:#eee; border-bottom:1px solid #ccc">Съобщение</td><td style="border-bottom:1px solid #ccc">' .$this->input->post('msg_message') . '</td></tr>';
				$html .= '</table>';

				$config['charset'] = 'utf-8';
				$config['protocol'] = 'sendmail';
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				
				$this->email->from('webmaster@p2a-bg.net', 'Pavel Palashturov');
				$this->email->to('webmaster@p2a-bg.net');
				
				$this->email->subject('Нова запитване от контакти на MicroSite');
				$this->email->message($html);

				$this->email->send();
			
				
				$vals = array(
				'img_path' => './assets/captcha/',
				'img_url' => base_url() . '/assets/captcha/',
				);

				$cap = create_captcha($vals);
				$this->session->set_userdata('captcha', $cap['word']);
				$data['image'] = $cap['image'];
				
				
				$this->base->insertMsg($insert);
				$data['succes'] = "Съобщението изпратено успешно!";
				
			}else{
				$vals = array(
					'img_path' => './assets/captcha/',
					'img_url' => base_url() . '/assets/captcha/',
				);

				$cap = create_captcha($vals);
				$this->session->set_userdata('captcha', $cap['word']);
				$data['image'] = $cap['image'];
				$data['error'] = 'Грешен код! Моля опитайте отново!';
			}
		}
		$this->load->view('contact_view', $data);
	}
	
} 
?>