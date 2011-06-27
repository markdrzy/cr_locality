function getGeo(p)
{
	var c = p.coords;
	$.get('/themes/third_party/cr_locality/php/cr_locality.php?accuracy=' + c.accuracy + '&latlng=' + c.latitude + ',' + c.longitude + '&altitude=' + c.altitude + '&altitude_accuracy='+ c.altitudeAccuracy + '&heading='+ c.heading + '&speed=' + c.speed,function(d){
		console.log(d);
	});
}

function denyGeo()
{
	
}

if (navigator.geolocation)
{
	navigator.geolocation.getCurrentPosition(getGeo,denyGeo);
}