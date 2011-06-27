<?php

$ll = htmlentities(htmlspecialchars(strip_tags($_GET['latlng'])));

$g = 'http://maps.google.com/maps/api/geocode/xml?latlng='.$ll.'&sensor=true';
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
$d['accuracy'] = htmlentities(htmlspecialchars(strip_tags($_GET['accuracy'])));
$d['altitude'] = htmlentities(htmlspecialchars(strip_tags($_GET['altitude'])));
$d['altitude_accuracy'] = htmlentities(htmlspecialchars(strip_tags($_GET['altitude_accuracy'])));
$d['directional_heading'] = htmlentities(htmlspecialchars(strip_tags($_GET['heading'])));
$d['speed'] = htmlentities(htmlspecialchars(strip_tags($_GET['speed'])));
$d['google_api_src'] = $g;

print_r($d);