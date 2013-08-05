<?php
class Main extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('dec');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('add_data_model');
		$this->load->model('get_data_model');
		// Загружаем модели, хелперы и библиотеки
		$str = "Око Саурона"; 
		$title = iconv("CP1251", "UTF-8//IGNORE", $str);
		$str = "Главная"; 
		$heading = iconv("CP1251", "UTF-8//IGNORE", $str);
		$this->head = array('title'=>$title, 'heading'=>$heading); 
	}
	
	function get_date($date, $time)
	{
		$res['year'] = substr($date, 0, 4);
		$res['mon'] = substr($date, 5, 2);
		$res['day'] = substr($date, 8, 2);
		$res['hour'] = substr($time, 0, 2);
		$res['min'] = substr($time, 3, 2);
		$res['sec'] = substr($time, 6, 2);
		$res['uni'] = mktime($res['hour'], $res['min'], $res['sec'], $res['mon'], $res['day'], $res['year']);
		
		return $res;
	}
	
	// Основная функция (с неё начинается вполнение контроллера)
	function index()
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}
		else
		{
			$data['o_list'] = $this->get_data_model->get_objects();
			$this->load->view('header');
			$this->load->view('mainmview');
			$this->load->view('mainview', $data);
			$this->load->view('footer');
		}
	}

	function add_sacrifice()
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}
		else
		{
			if ($this->input->post('name') != '')
			{
				$this->add_data_model->insert_object($this->input->post('name'), 1);
				
				$id = mysql_insert_id();
				
				echo $id;
				
				if ($this->input->post('galaxy1') != '')
				{
					if ($this->input->post('moon1'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main1') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy1'), $this->input->post('system1'), $this->input->post('planet1'), $moon, $main);
				}
				if ($this->input->post('galaxy2') != '')
				{
					if ($this->input->post('moon2'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main2') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy2'), $this->input->post('system2'), $this->input->post('planet2'), $moon, $main);
				}
				if ($this->input->post('galaxy3') != '')
				{
					if ($this->input->post('moon3'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main3') != '')
						$main = 1;
					else
						$main = 0;	
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy3'), $this->input->post('system3'), $this->input->post('planet3'), $moon, $main);
				}
				if ($this->input->post('galaxy4') != '')
				{
					if ($this->input->post('moon4'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main4') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy4'), $this->input->post('system4'), $this->input->post('planet4'), $moon, $main);
				}
				if ($this->input->post('galaxy5') != '')
				{
					if ($this->input->post('moon5'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main5') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy5'), $this->input->post('system5'), $this->input->post('planet5'), $moon, $main);
				}
				if ($this->input->post('galaxy6') != '')
				{
					if ($this->input->post('moon6'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main6') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy6'), $this->input->post('system6'), $this->input->post('planet6'), $moon, $main);
				}
				if ($this->input->post('galaxy7') != '')
				{
					if ($this->input->post('moon7'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main7') != '')
						$main = 1;
					else
						$main = 0;
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy7'), $this->input->post('system7'), $this->input->post('planet7'), $moon, $main);
				}
				if ($this->input->post('galaxy8') != '')
				{
					if ($this->input->post('moon8'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main8') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy8'), $this->input->post('system8'), $this->input->post('planet8'), $moon, $main);
				}
				if ($this->input->post('galaxy9') != '')
				{
					if ($this->input->post('moon9'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main9') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy9'), $this->input->post('system9'), $this->input->post('planet9'), $moon, $main);
				}
				if ($this->input->post('galaxy10') != '')
				{
					if ($this->input->post('moon10'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main10') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy10'), $this->input->post('system10'), $this->input->post('planet10'), $moon, $main);
				}
				if ($this->input->post('galaxy11') != '')
				{
					if ($this->input->post('moon11'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main11') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy11'), $this->input->post('system11'), $this->input->post('planet11'), $moon, $main);
				}
				if ($this->input->post('galaxy12') != '')
				{
					if ($this->input->post('moon12'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main12') != '')
						$main = 1;
					else
						$main = 0;
					
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy12'), $this->input->post('system12'), $this->input->post('planet12'), $moon, $main);
				}
				if ($this->input->post('galaxy13') != '')
				{
					if ($this->input->post('moon13'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main13') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy13'), $this->input->post('system13'), $this->input->post('planet13'), $moon, $main);
				}
				if ($this->input->post('galaxy14') != '')
				{
					if ($this->input->post('moon14'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main14') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy14'), $this->input->post('system14'), $this->input->post('planet14'), $moon, $main);
				}
				if ($this->input->post('galaxy15') != '')
				{
					if ($this->input->post('moon15'))
						$moon = 1;
					else
						$moon = 0;
						
					if ($this->input->post('main15') != '')
						$main = 1;
					else
						$main = 0;
						
					$this->add_data_model->insert_planet($id, $this->input->post('galaxy15'), $this->input->post('system15'), $this->input->post('planet15'), $moon, $main);
				}
				redirect('main');
			}
			else
			{
				$this->load->view('header');
				$this->load->view('mainmview');
				$this->load->view('addsview');
				$this->load->view('footer');
			}
		}
	}
	
	// Передаём данные для редактирования
	function edt_object($id)
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}

		$res = $this->get_data_model->get_objects($id);
		$data['o_id'] = $id;
		$data['name'] = $res->row();
		$data['planets'] = $this->get_data_model->get_all_planets($id);
		$this->load->view('header');
		$this->load->view('mainmview');
		$this->load->view('edtsview', $data);
		$this->load->view('footer');
	}
	
	function show_activity($oid = '', $full = '')
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}

		$this->load->view('header');
		$this->load->view('mainmview');
		
		if ($oid == '')
			$oid = $this->input->post('id');
		
		// Если не заполнено какое-то из полей - выводим по умолчанию 3 дня
		if (($this->input->post('start') == '') | ($this->input->post('stop') == ''))
		{
			$start = date("Y-m-d", time()-60*60*24*7);
			$stop = date("Y-m-d");
		}
		// Если хотят получить информацию из будущего - подставляем текущее число как крайнюю дату
		elseif ($this->input->post('stop') > date("Y-m-d"))
		{
			$stop = date("Y-m-d"); 
		}
		// Если перепутали местами начало и конец - меняем местами
		elseif ($this->input->post('stop') < $this->input->post('start'))
		{
			$start = $this->input->post('stop');
			$stop = $this->input->post('start');
		}
		// Если три проверки выше пройдены - подставляем данные как есть
		else
		{
			$start = $this->input->post('start');
			$stop = $this->input->post('stop');
		}
		
		$work = $this->get_data_model->activity_info($oid, $start, $stop);
		$data['o_list'] = $work;
		$coor = $this->get_data_model->get_all_planets($oid);
		$data['coords'] = $coor;
		$data['id'] = $oid;
		$name = $this->get_data_model->get_name($oid);
		$data['name'] = $name->row_array();
		
		$cur_coor = '1:1:1';
		
		for ($i = 1; $i < 15; $i++)
			$coord[$i] = false;
			
		$i = 0;
		foreach($work->result_array() as $row)
		{
			if ($cur_coor != $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'])
			{
				$date = $this->get_date($row['activity_date'], $row['activity_time']);
				if (isset($prev_time))
				{
					if (abs($prev_time['uni'] - $date['uni']) > 300)
						for ($j = $i; $j > 0; $j--)
							$coord[$j] = true;
				}
				$cur_coor = $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'];
				$i++;
				$prev_time = $date;
			}
		}
		
		$data['coord'] = $coord;

		/*if ($full == 'full')
			$this->load->view('fulllistobjectinfoview', $data);
		elseif ($full == 'old')*/
		// $this->load->view('oldlistobjectinfoview', $data);
		/*else */
	    $this->load->view('listobjectinfoview', $data);
		$this->load->view('footer');
	}
	
	function edt_name($o_id)
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		} 

		$res = $this->get_data_model->get_objects($o_id);
		$data['o_id'] = $o_id;
		$data['name'] = $res->row();	
		
		$this->load->view('header');
		$this->load->view('mainmview');
		$this->load->view('edtname', $data);
		$this->load->view('footer');
	}
	
	// Обновляем имя
	function updt_name()
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		} 
		
		$this->add_data_model->update_object($this->input->post('id'), $this->input->post('name'));
		redirect('main/edt_object/' . $this->input->post('id'));
	}
	
	function add_planet($o_id)
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}  	

		$data['ob_id'] = $o_id;
		
		$this->load->view('header');
		$this->load->view('mainmview');
		$this->load->view('addcoord', $data);
		$this->load->view('footer');
	}
	
	function edt_coord($p_id, $o_id)
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}  	

		$planet = $this->get_data_model->get_planet($p_id);
		$data['planet'] = $planet->row();
		
		$this->load->view('header');
		$this->load->view('mainmview');
		$this->load->view('edtcoord', $data);
		$this->load->view('footer');
	}
	
	function add_coord()
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}  	

		if ($this->input->post('moon'))
			$moon = 1;
		else
			$moon = 0;
			
		if ($this->input->post('main') != '')
			$main = 1;
		else
			$main = 0;
			
		$this->add_data_model->insert_planet($this->input->post('ob_id'), $this->input->post('galaxy'), $this->input->post('system'), $this->input->post('planet'), $moon, $main);
		redirect('main/edt_object/' . $this->input->post('ob_id'));
	}
	
	function updt_coord()
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}  	

		if ($this->input->post('moon'))
			$moon = 1;
		else
			$moon = 0;
			
		if ($this->input->post('main') != '')
			$main = 1;
		else
			$main = 0;
			
		$this->add_data_model->update_planet($this->input->post('p_id'), $this->input->post('galaxy'), $this->input->post('system'), $this->input->post('planet'), $moon, $main);
		redirect('main/edt_object/' . $this->input->post('ob_id'));
	}
	
	function del_coord($p_id, $o_id)
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}  
		
		$this->add_data_model->remove_planet($p_id);
		redirect('main/edt_object/' . $o_id);
	}
	
	function get_over()
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}  
		
		$login = 'Fesq';
		$pass = 'shlalala';
		
		$header[] = "Accept: text/html;q=0.9, text/plain;q=0.8, image/png, */*;q=0.5" ; 
		$header[] = "Accept_charset: windows-1251, utf-8, utf-16;q=0.6, *;q=0.1"; 
		$header[] = "Accept_encoding: identity"; 
		$header[] = "Accept_language: en-us,en;q=0.5"; 
		$header[] = "Connection: close"; 
		$header[] = "Cache-Control: no-store, no-cache, must-revalidate"; 
		$header[] = "Keep_alive: 300"; 
		
		$curl = curl_init(); // инициализируем cURL
		//Дальше устанавливаем опции запроса в любом порядке
		//устанавливаем наш вариат клиента (браузера) и вид ОС
		curl_setopt($curl, CURLOPT_USERAGENT, "Opera/10.00 (Windows NT 5.1; U; ru) Presto/2.2.0");
		//Здесь устанавливаем URL к которому нужно обращаться
		curl_setopt($curl, CURLOPT_URL, 'http://uni1.ogame.ru/game/reg/login2.php');
		//Настойка опций cookie
		curl_setopt($curl, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT']. '/secret/private/tmp/cook.txt');//сохранить куки в файл
		//curl_setopt($curl, CURLOPT_COOKIEFILE, '/tmp/cook.txt');//считать куки из файла
		//Возвращаем код в переменную, а не в поток
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt ($curl , CURLOPT_HTTPHEADER , $header);
		//Установите эту опцию в ненулевое значение, если вы хотите, чтобы PHP завершал работу скрыто, если возвращаемый HTTP-код имеет значение выше 300. По умолчанию страница возвращается нормально с игнорированием кода.
		curl_setopt($curl, CURLOPT_FAILONERROR, 1);
		//Устанавливаем значение referer - адрес последней активной страницы
		curl_setopt($curl, CURLOPT_REFERER, 'http://www.ogame.ru/');
		//Максимальное время в секундах, которое вы отводите для работы CURL-функций.
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_POST, 1); // устанавливаем метод POST
		//ответственный момент здесь мы передаем наши переменные
		curl_setopt($curl, CURLOPT_POSTFIELDS, 'kid=&uni=uni1.ogame.ruv=2&is_utf8=0&uni_url=uni1.ogame.ru&login=' . $login . '&pass=' . $pass);
		//Установите эту опцию в ненулевое значение, если вы хотите, чтобы шапка/header ответа включалась в вывод.
		curl_setopt($curl, CURLOPT_HEADER, 1);
		//Внимание, важный момент, сертификатов, естественно, у нас нет, так что все отключаем
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
		curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);// разрешаем редиректы
		/* curl_setopt($curl, CURLOPT_PROXYPORT, '8080');
		curl_setopt($curl, CURLOPT_PROXYTYPE, 'HTTP');
		curl_setopt($curl, CURLOPT_PROXY, 'ru2.proxik.net');
		curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'ru206155'.':'.'hGyc8fnuOH'); */
		$this->load->view('header');
		if( $html = curl_exec($curl) ) // выполняем запрос и записываем в переменную
		{				
			$data['html'] = $html;
			$this->load->view('showover.php', $data);
		}
		curl_close($curl); // заканчиваем работу curl
		//$this->load->view('mainmview');
		$this->load->view('footer');
	}
	
	function state($act, $oid)
	{
		// Проверяем, вошёл ли пользователь
		if ($this->session->userdata('logon') !== 'Yes') 
		{
			$data['logon'] = $this->session->userdata('logon');
			redirect('main/login');
		}
		else
		{
			if ($act == 'activate')
				$this->add_data_model->update_state($oid, '1');
			elseif ($act == 'deactivate')
				$this->add_data_model->update_state($oid, '0');
			redirect('main');
		}
	}
}