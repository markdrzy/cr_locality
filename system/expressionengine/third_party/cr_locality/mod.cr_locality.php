<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cr_locality {

	var $return_data = '';
	var $settings = array(
		'expires'	=> '1',
		'domain'	=> 'igrow.clickrain.com'
		);
	var $modname		= 'Cr_locality';
	var $short_modname	= 'cr_locality';
	
	function __construct()
	{
		$this->EE =& get_instance();
	}
	
	function get_geo()
	{
		$ll = htmlentities(htmlspecialchars(strip_tags($_GET['latlng'])));
		
		$g = 'http://maps.google.com/maps/api/geocode/xml?latlng='.$ll.'&sensor=false';
		$x = simplexml_load_file($g);
		
		foreach ($x->result->address_component as $c)
		{
			$c = (array) $c;
			$k = (is_array($c['type']))? $c['type'][0]: $c['type'];
			$d[$k] = $c['long_name'];
		}
		
		list($lat,$lon) = explode(',',$ll);
		$d['latitude'] = $lat;
		$d['longitude'] = $lon;
		$d['formatted_address'] = (string) $x->result->formatted_address;
		$d['google_api_src'] = $g;
		
		exit(json_encode($d));
	}
	
	function locate_user()
	{
		// Get get_geo() action id
		$this->EE->db->select('action_id');
		$aq = $this->EE->db->get_where('actions',array('class'=>$this->modname,'method'=>'get_geo'));
		
		$data = array(
			'act_id'	=> $aq->row('action_id')
		);
		return $this->EE->load->view('locate_user',$data,TRUE);
	}

}

// END