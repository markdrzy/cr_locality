function getGeo(p)
{
	var c = p.coords;
	$.get('/themes/third_party/cr_locality/php/cr_locality.php?accuracy=' + c.accuracy + '&latlng=' + c.latitude + ',' + c.longitude + '&altitude=' + c.altitude + '&altitude_accuracy='+ c.altitudeAccuracy + '&heading='+ c.heading + '&speed=' + c.speed,function(d){
		console.log(cr_locality);
		//$.cookie('cr_locality','active',{ expires:cr_locality_settings.expires, path:'/', domain:cr_locality_settings.domain });
		//$.cookie('cr_locality_data',d,{ expires:cr_locality_settings.expires, path:'/', domain:cr_locality_settings.domain });
	});
}

function denyGeo()
{
	
}

if (navigator.geolocation)
{
	navigator.geolocation.getCurrentPosition(getGeo,denyGeo);
}