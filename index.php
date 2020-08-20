<?php
function getip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    
    if(is_array($ip)){
    $ip = explode(",",$ip);
    $ip_address = $ip[0];
    return $ip_address;
    }else{
        return $ip;
    }
    
}

function gettime(){
	$data = json_decode(get_details(),true);
	date_default_timezone_set($data['timezone']);
	$time = time();
	return date("d-M-Y l g:i A", $time);
}
	
	function get_details(){
	 $geoip = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.getip().''));
	 $data['ip_address'] = getip(); 
	 $data['city'] = $geoip['geoplugin_city'];
	 $data['region'] = $geoip['geoplugin_region'];
	 $data['region_code'] = $geoip['geoplugin_regionCode'];
	 $data['region_name'] = $geoip['geoplugin_regionName'];
	 $data['country_code'] = $geoip['geoplugin_countryCode'];
	 $data['country_name'] = $geoip['geoplugin_countryName'];
	 $data['continent_code'] = $geoip['geoplugin_continentCode'];
	 $data['continent_name'] = $geoip['geoplugin_continentName'];
	 $data['latitude'] = $geoip['geoplugin_latitude'];
	 $data['longitude'] = $geoip['geoplugin_longitude'];
	 $data['timezone'] = $geoip['geoplugin_timezone'];
	 $data['currency_code'] = $geoip['geoplugin_currencyCode'];
	 $data['currency_symbol'] = $geoip['geoplugin_currencySymbol'];
	 $data['currency_symbol_UTF8'] = $geoip['geoplugin_currencySymbol_UTF8'];
	 $data['currency_symbol'] = $geoip['geoplugin_currencySymbol'];
	 $data = json_encode($data);
		
	 return $data;
	} 
	
	

?>
<html>
     <head>
  <meta charset="UTF-8">
  <title>HackerRahul | Get User Details!</title>
  <meta name="description" content="HackerRahul Test Website">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="HackerRahul.com">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> 
<body>
    <?php
    	$data = json_decode(get_details());
    	echo "<pre>";
    	print_r($data);
    	
    	echo "<b>User Time and Date according to Timezone: </b>".gettime();
        // echo time according to timezone.
    ?>
</body>
</html>
