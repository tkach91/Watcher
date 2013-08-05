<?php
class Get_data_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function activity_info($oid, $start, $stop)
	{
		$this->db->join('planets', 'planets.p_id=activity.planet_id', 'left');
		$this->db->join('objects', 'objects.id=activity.obj_id', 'right');
		$this->db->where('obj_id', $oid);
		$this->db->where('activity_date >=', $start);
		$this->db->where('activity_date <=', $stop);
		$this->db->order_by('activity_date', 'asc'); 
		$this->db->order_by('activity_time', 'asc'); 
		return $this->db->get_where('activity');
	}
	
	function get_objects($oid = '')
	{
		if ($oid === '')
			return $this->db->get('objects');
		else
			return $this->db->get_where('objects', array('id'=>$oid));
	}
	
	function get_all_planets($oid)
	{
		return $this->db->get_where('planets', array('ob_id'=>$oid));
	}
	
	function get_planet($pid)
	{
		return $this->db->get_where('planets', array('p_id'=>$pid));
	}
	
	function get_name($oid)
	{
		return $this->db->get_where('objects', array('id'=>$oid));
	}
}