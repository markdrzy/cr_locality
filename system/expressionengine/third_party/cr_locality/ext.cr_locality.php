<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cr_locality_ext {
	
	var $settings		= array();
	var $name			= 'CR Locality';
	var $version		= '1.0';
	var $description	= 'Stores settings for the CR Locality Module. Really.';
	var $settings_exist	= 'y';
	var $docs_url		= '';
	
	function __construct($s=array())
	{
		$this->EE =& get_instance();
		$this->settings = $s;
	}
	
	function activate_extension()
	{
		$this->settings = array(
			'def_zip'		=> '57103',
			'cook_domain'	=> '',
			'cook_expires'	=> '0.25'
		);
		
		$data = array(
			'class'		=> __CLASS__,
			'method'	=> '',
			'hook'		=> '',
			'settings'	=> serialize($this->settings),
			'priority'	=> 10,
			'version'	=> $this->version,
			'enabled'	=> 'y'
		);
		
		$this->EE->db->insert('extensions',$data);
	}
	
	function update_extension($c='')
	{
		if ($c == '' OR $c == $this->version)
		{
			return FALSE;
		}
		
		return FALSE;
	}
	
	function disable_extension()
	{
		$this->EE->db->where('class',__CLASS__);
		$this->EE->db->delete('extensions');
	}
	
	function settings()
	{
		$settings = array();
		
		$settings['def_zip']		= array('i','','57103');
		$settings['cook_domain']	= array('i','','');
		$settings['cook_expire']	= array('i','','0.25');
		
		return $settings;
	}
}

// END