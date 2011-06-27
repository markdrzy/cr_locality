<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cr_locality {

	var $return_data = '';
	
	function __construct()
	{
		$this->EE =& get_instance();
	}
	
	function locate_user()
	{
		return '<script src="/cr/js/cr_locality.js"></script>';
	}

}

// END