// Load jquery.cookie (if not present)
if (jQuery.cookie === null)
{
	jQuery.cookie=function(key,value,options){if(arguments.length>1&&String(value)!=="[object Object]"){options=jQuery.extend({},options);if(value===null||value===undefined){options.expires=-1;}
if(typeof options.expires==='number'){var days=options.expires,t=options.expires=new Date();t.setDate(t.getDate()+days);}
value=String(value);return(document.cookie=[encodeURIComponent(key),'=',options.raw?value:encodeURIComponent(value),options.expires?'; expires='+options.expires.toUTCString():'',options.path?'; path='+options.path:'',options.domain?'; domain='+options.domain:'',options.secure?'; secure':''].join(''));}
options=value||{};var result,decode=options.raw?function(s){return s;}:decodeURIComponent;return(result=new RegExp('(?:^|; )'+encodeURIComponent(key)+'=([^;]*)').exec(document.cookie))?decode(result[1]):null;};
}



function getGeo(p)
{
	var c = p.coords;
	$.get('/themes/third_party/cr_locality/php/cr_locality.php?accuracy=' + c.accuracy + '&latlng=' + c.latitude + ',' + c.longitude + '&altitude=' + c.altitude + '&altitude_accuracy='+ c.altitudeAccuracy + '&heading='+ c.heading + '&speed=' + c.speed,function(d){
		$.cookie('cr_locality','active',{ expires:cr_locality_settings.expires, path:'/', domain:cr_locality_settings.domain });
		$.cookie('cr_locality_zip',d.postal_code,{ expires:cr_locality_settings.expires, path:'/', domain:cr_locality_settings.domain });
	});
}

function denyGeo()
{
	
}

function setGeo()
{
	
}

var cr_locality_zip = $.cookie('cr_locality_zip');
console.log(cr_locality_zip);

if (navigator.geolocation && cr_locality_zip === null)
{
	navigator.geolocation.getCurrentPosition(getGeo,denyGeo);
}






