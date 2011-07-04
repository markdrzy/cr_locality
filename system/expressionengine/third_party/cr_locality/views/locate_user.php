<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>
	// Load jquery.cookie (if not present)
	if (jQuery.cookie === undefined)
	{
		jQuery.cookie=function(key,value,options){if(arguments.length>1&&String(value)!=="[object Object]"){options=jQuery.extend({},options);if(value===null||value===undefined){options.expires=-1;}
	if(typeof options.expires==='number'){var days=options.expires,t=options.expires=new Date();t.setDate(t.getDate()+days);}
	value=String(value);return(document.cookie=[encodeURIComponent(key),'=',options.raw?value:encodeURIComponent(value),options.expires?'; expires='+options.expires.toUTCString():'',options.path?'; path='+options.path:'',options.domain?'; domain='+options.domain:'',options.secure?'; secure':''].join(''));}
	options=value||{};var result,decode=options.raw?function(s){return s;}:decodeURIComponent;return(result=new RegExp('(?:^|; )'+encodeURIComponent(key)+'=([^;]*)').exec(document.cookie))?decode(result[1]):null;};
	}
	
	
	
	function getGeo(p)
	{
		var c = p.coords;
		$.getJSON('/index.php?ACT=<?=$act_id?>&latlng=' + c.latitude + ',' + c.longitude,function(d){
			jQuery.cookie('cr_locality_zip',d.postal_code,0.25);
		});
		<? if(isset($callback_method)): ?><?=$callback_method?>;<? else: ?>// No Callback<? endif; ?><?=NL?>
	}
	
	function denyGeo()
	{
		
	}
	
	var crLocalityZip = jQuery.cookie('cr_locality_zip');
	
	if (navigator.geolocation && crLocalityZip == undefined)
	{
		navigator.geolocation.getCurrentPosition(getGeo,denyGeo);
	}
	else if (crLocalityZip !== undefined)
	{
		<? if(isset($callback_method)): ?><?=$callback_method?>;<? else: ?>// No Callback<? endif; ?><?=NL?>
	}

</script>