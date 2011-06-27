<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Include cr_locality Core Mod
 */
require_once PATH_THIRD.'cr_locality/mod.cr_locality.php';

class Cr_locality_mcp {

	var $cr_locality;

	function __construct()
	{
		$this->EE =& get_instance();
		$this->cr_locality = new Cr_locality();
	}
	
	function index()
	{
		$this->EE->load->library('javascript');
		$this->EE->load->library('table');
		$this->EE->load->helper('form');
		
		$this->EE->cp->set_variable('cp_page_title',$this->EE->lang->line('cr_locality_module_name'));
		
		$data = array();
		
		$this->EE->load->view('index',$data,TRUE);
	}

}

// END