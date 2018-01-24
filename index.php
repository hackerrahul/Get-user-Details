<?php
include 'getip.php';
	$timezone = "https://ipapi.co/".getip()."/json"; // change $output['ip'] to getip() for online server.
	$out = json_decode(file_get_contents($timezone),true);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Get user's Details in PHP - HackerRahul</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <div class="w3-center w3-container w3-blue">
      <h1>Get user's Details in PHP</h1>
    </div><br>

		<div class="w3-margin">
    <div class="w3-content">

      <h4><b>IP Address</b> - <?php echo getip(); ?></h4>
      <h4><b>City</b> - <?php echo $out['city']; ?></h4>
      <h4><b>Region</b> - <?php echo $out['region']; ?>, <?php echo $out['region_code']; ?></h4>
      <h4><b>Country</b> - <?php echo $out['country_name']; ?>, <?php echo $out['country']; ?></h4>
      <h4><b>Latitude</b> - <?php echo $out['latitude']; ?></h4>
      <h4><b>Longitude</b> - <?php echo $out['longitude']; ?></h4>
      <h4><b>Timezone</b> - <?php echo $out['timezone']; ?></h4>
      <h4><b>Asn</b> - <?php echo $out['asn']; ?></h4>
      <h4><b>Org</b> - <?php echo $out['org']; ?></h4>
			<h4><b>Map of </b> - <?php echo $out['city']; ?>, <?php echo $out['country_name']; ?></h4>
   
    <?php
	$key = "YOUR_GOOGLE_STATIC_MAP_API_KEY";
 $url = "https://maps.googleapis.com/maps/api/staticmap?center=".$out['latitude'].",+".$out['longitude']."&zoom=13&scale=1&size=600x300&maptype=roadmap&key=".$key."&format=png&visual_refresh=true";
    
    echo "<img width='600' class='w3-image' src='$url' title='Google Map of ".$out['city'].", ".$out['country_name']."' alt='Google Map of ".$out['city'].", ".$out['country_name']."'>";
    ?>
    

		  </div>
		</div>
		
  </body>
</html>
