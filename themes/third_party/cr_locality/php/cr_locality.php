<?php

$ll = htmlentities(htmlspecialchars(strip_tags($_GET['latlng'])));

$g = 'http://maps.google.com/maps/api/geocode/xml?latlng='.$ll.'&sensor=true';
$x = simplexml_load_file($g);

foreach ($x->result->address_component as $c)
{
	switch ($c)
	{
		case 'street_address':
			$d['precise_address'] = $c->long_name;
		break;
		case 'natural_feature':
			$d['natural_feature'] = $c->long_name;
		break;
		case 'airport':
			$d['airport'] = $c->long_name;
		break;
		case 'park':
			$d['park'] = $c->long_name;
		break;
		case 'point_of_interest':
			$d['point_of_interest'] = $c->long_name;
		break;
		case 'premise':
			$d['named_location'] = $c->long_name;
		break;
		case 'street_number':
			$d['house_number'] = $c->long_name;
		break;
		case 'route':
			$d['street'] = $c->long_name;
		break;
		case 'locality':
			$d['town_city'] = $c->long_name;
		break;
		case 'administrative_area_level_3':
			$d['district_region'] = $c->long_name;
		break;
		case 'neighborhood':
			$d['neighborhood'] = $c->long_name;
		break;
		case 'colloquial_area':
			$d['locally_known_as'] = $c->long_name;
		break;
		case 'administrative_area_level_2':
			$d['county_state'] = $c->long_name;
		break;
		case 'postal_code':
			$d['postcode'] = $c->long_name;
		break;
		case 'country':
			$d['country'] = $c->long_name;
		break;
	}
}

list($lat,$lon) = explode(',',$ll);
$d['latitude'] = $lat;
$d['longitude'] = $lon;
$d['formatted_address'] = $x->result->formatted_address;
$d['accuracy'] = htmlentities(htmlspecialchars(strip_tags($_GET['accuracy'])));
$d['altitude'] = htmlentities(htmlspecialchars(strip_tags($_GET['altitude'])));
$d['altitude_accuracy'] = htmlentities(htmlspecialchars(strip_tags($_GET['altitude_accuracy'])));
$d['directional_heading'] = htmlentities(htmlspecialchars(strip_tags($_GET['heading'])));
$d['speed'] = htmlentities(htmlspecialchars(strip_tags($_GET['speed'])));
$d['google_api_src'] = $g;

print_r($d);