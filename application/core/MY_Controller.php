<?php
if (!defined('BASEPATH')) exit('Нет доступа к скрипту'); 

class MY_Controller extends CI_Controller {

	private $head; 
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('dec');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('get_data_model');
		$str = "Система управления проектами"; 
		$title = iconv("CP1251", "UTF-8//IGNORE", $str);
		$str = "Вход"; 
		$heading = iconv("CP1251", "UTF-8//IGNORE", $str);
		$this->head = array('title'=>$title, 'heading'=>$heading); 
	}
	
	// Вход
	function login()
    {
		// Пользователь уже вошёл
		if ($this->session->userdata('logon') === 'Yes')
		{
			redirect('main');
		}
		else
		{
			// Проверяем наличие пароля
			if ($this->input->post('password') != '')
			{	
				$data = $this->login_model->getLoginInfo($_POST['login']);
				$row = $data->row_array();
				// Проверяем корректность пароля и логина           
				if (sha1($this->input->post('password')) === $row['u_pass'])
					if ($this->input->post('login') === $row['u_name'])
					{
						// Записываем в сессию признак логона
						$session_data = array('logon'=>'Yes', 'id'=>$row['user_id']); 
						$this->session->set_userdata($session_data);
						redirect(''); // редирект на главную страницу
					}
			}
			$this->load->view('header', $this->head);
			$this->load->view('login');
			$this->load->view('footer');
		}
    }
	
	// Выход
	function logout()
    { 
		$this->session->sess_destroy();  // обнуляем сессию
        redirect('main'); // редирект на главную страницу
    }
}