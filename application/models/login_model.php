<?php
class Login_model extends CI_Model {

	function getLoginInfo($login)
	{
		return $this->db->get_where('users', array('u_name'=>$login));
	}
}