<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cr_locality_upd {

	var $version = '0.1';
	var $modname = 'Cr_locality';
	var $short_modname = 'cr_locality';
	
	function __construct()
	{
		$this->EE =& get_instance();
	}
	
	function install()
	{
		// Create Module
		$data = array(
			'module_name'			=> $this->modname,
			'module_version'		=> $this->version,
			'has_cp_backend'		=> 'y',
			'has_publish_fields'	=> 'n'
		);
		$this->EE->db->insert('modules',$data);
		
		// Create Actions
		$actions = array(
			'class'		=> $this->modname,
			'method'	=> 'get_geo'
		);
		$this->EE->db->insert('actions', $actions);
		
		return TRUE;
	}
	
	function update($current = '')
	{
		return FALSE;
	}
	
	function uninstall()
	{
		// Delete Actions
		$this->EE->db->where('class',$this->modname);
		$this->EE->db->delete('actions');
		
		// Delete Module
		$this->EE->db->select('module_id');
		$query = $this->EE->db->get_where('modules',array('module_name'=>$this->modname));
		$this->EE->db->where('module_id',$query->row('module_id'));
		$this->EE->db->delete('module_member_groups');
		$this->EE->db->where('module_name',$this->modname);
		$this->EE->db->delete('modules');
		
		return TRUE;
	}

}

// END