function getGeo(p)
{
	$.get('/themes/third_party/cr_locality.php?accuracy=' + position.coords.accuracy + '&latlng=' + position.coords.latitude + ',' + position.coords.longitude + '&altitude=' + position.coords.altitude + '&altitude_accuracy='+ position.coords.altitudeAccuracy + '&heading='+ position.coords.heading + '&speed=' + position.coords.speed,function(d){
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