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

}

// END