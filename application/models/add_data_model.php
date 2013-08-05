<?php
class Add_data_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function insert_object($name, $is_active)
	{
		$arr = array('name'=>$name, 'is_active'=>$is_active);
		$this->db->insert('objects', $arr);
	}
	
	function update_object($id, $name)
	{
		$arr = array('name'=>$name);
		$this->db->where('id', $id);
		$this->db->update('objects', $arr);
	}
	
	function insert_planet($obj_id, $galaxy, $system, $planet, $moon, $main)
	{
		$arr = array('ob_id'=>$obj_id, 'galaxy'=>$galaxy, 'system'=>$system, 'planet'=>$planet, 'moon'=>$moon, 'is_main'=>$main);
		$this->db->insert('planets', $arr);
	}
	
	function update_planet($plan_id, $galaxy, $system, $planet, $moon, $main)
	{
		$arr = array('galaxy'=>$galaxy, 'system'=>$system, 'planet'=>$planet, 'moon'=>$moon, 'is_main'=>$main);
		$this->db->where('p_id', $plan_id);
		$this->db->update('planets', $arr);
	}
	
	function update_state($id, $state)
	{
		$arr = array('is_active'=>$state);
		$this->db->where('id', $id);
		$this->db->update('objects', $arr);
	}
	
	function remove_planet($p_id)
	{
		$this->db->where('planet_id', $p_id);
		$this->db->delete('activity');
		$this->db->where('p_id', $p_id);
		$this->db->delete('planets');
	}
}