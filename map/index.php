<?php

	require_once('../includes/connect.inc.php');
	$json_pos = file_get_contents("http://awfesa.xaa.pl/Launcher/web/positions.json");





?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="699990" />
		<title>SA:MP live map</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <style type="text/css">
            #map-canvas { display: inline-block; height: 600px; width: 819px; margin-top: 18px;margin-left: -18px;}
            #map-legend { padding: 10px; background-color: rgba(141, 142, 127, 0.46);}
        </style>
	</head>

	<body>
        <div id="map-canvas"></div>
        <div id="map-legend">
        	<h2>Legend</h2>
        	<p><img src="https://wiki.sa-mp.com/wroot/images2/b/bc/Icon_58.gif" /> Gracze</p>
			<p><img src="https://wiki.sa-mp.com/wroot/images2/b/b6/Icon_31.gif" /> Wolne domy</p>
			<p><img src="https://wiki.sa-mp.com/wroot/images2/a/a9/Icon_32.gif" /> Zajęte domy</p>
			<p><img src="https://wiki.sa-mp.com/wroot/images2/5/58/Icon_55.gif" /> Prywatne pojazdy</p>
			<p><img src="https://wiki.sa-mp.com/wroot/images2/d/d8/Icon_53.gif" /> Prywatne wyścigi</p>
			<p><img src="https://wiki.sa-mp.com/wroot/images2/6/61/Icon_18.gif" /> Bazy gangów</p>
			<p><img src="/img/icons/colo.png" /> Strefy gangów</p>
			<p><img src="/img/icons/RedZone.png" /> Strefa anty DM</p>
        </div>

        <script src="js/SanMap.min.js"></script>
		<script type="text/javascript">

		


			var p_pos = <?php echo (empty($json_pos)) ? "" : $json_pos ?>;

			var mapType = new SanMapType(0, 1, function (zoom, x, y) {
		        return x == -1 && y == -1 
				? "images/tiles/map.outer.png" 
				: "images/tiles/map." + zoom + "." + x + "." + y + ".png";//Where the tiles are located
		    });
			
		    var satType = new SanMapType(0, 3, function (zoom, x, y) {
		        return x == -1 && y == -1 
				? null 
				: "images/tiles/sat." + zoom + "." + x + "." + y + ".png";//Where the tiles are located
		    });
			
		    var map = SanMap.createMap(document.getElementById('map-canvas'), 
				{'Map': mapType, 'Satellite': satType}, 2, SanMap.getLatLngFromPos(0,0), false, 'Satellite');

		    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(document.getElementById('map-legend'));

		<?
		$qban = "SELECT * FROM house ORDER BY id DESC ";
		$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



		while ($row= mysql_fetch_array($resultx))
		{
			$IDS = $row["id"];
			$Nick = $row["OwnerName"];
			$Time = $row["time"];
			$HouseName = $row["Name"];
			$Pos = $row["OutsidePos"];
			$Pozycja=explode(" ",$Pos);
			$vPosX = number_format($Pozycja[0], 0, ',', '');
			$vPosY = number_format($Pozycja[1], 0, ',', '');	


		    ?>	
				var p_windows<? echo "$IDS"; ?> = new google.maps.InfoWindow({
		    		content: "<p>Nazwa domu:<? echo "$HouseName"; ?><br>Właściciel:<? echo "$Nick"; ?></p>"
		    	});

		    	
		    		if(<? echo "$Time"; ?> != 0)
		    		{
		    			var p_marker<? echo "$IDS"; ?> = new google.maps.Marker({
		    			position: SanMap.getLatLngFromPos(<? echo "$vPosX"; ?>, <? echo "$vPosY"; ?>),
		    			map: map,
		    			icon: "https://wiki.sa-mp.com/wroot/images2/a/a9/Icon_32.gif"
		    			});
		    		}
		    		else
		    		{
		    			var p_marker<? echo "$IDS"; ?> = new google.maps.Marker({
		    			position: SanMap.getLatLngFromPos(<? echo "$vPosX"; ?>, <? echo "$vPosY"; ?>),
		    			map: map,
		    			icon: "https://wiki.sa-mp.com/wroot/images2/b/b6/Icon_31.gif"
		    			});
		    		}	
		    	

				google.maps.event.addListener(p_marker<? echo "$IDS"; ?>, 'click', function() {
					p_windows<? echo "$IDS"; ?>.open(map,p_marker<? echo "$IDS"; ?>)
				});
				
		<?				

		}
		?>

		<?
		$qban = "SELECT * FROM race_id ORDER BY id DESC ";
		$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



		while ($row= mysql_fetch_array($resultx))
		{
			$id = $row["id"];
			$name = $row["name"];
			
			
			
			$vPosX = $row["X"];
			$vPosY = $row["Y"];


		    ?>	
				var p_windowsPrRace<? echo "$id"; ?> = new google.maps.InfoWindow({
		    		content: "<p>Nazwa: <? echo "$name"; ?></p>"
		    	});	    	
		
		    		var p_markerPrRace<? echo "$id"; ?> = new google.maps.Marker({
		    		position: SanMap.getLatLngFromPos(<? echo "$vPosX"; ?>, <? echo "$vPosY"; ?>),
		    		map: map,
		    		icon: "https://wiki.sa-mp.com/wroot/images2/d/d8/Icon_53.gif"
		    		});
		    			
		    	

				google.maps.event.addListener(p_markerPrRace<? echo "$id"; ?>, 'click', function() {
					p_windowsPrRace<? echo "$id"; ?>.open(map,p_markerPrRace<? echo "$id"; ?>)
				});
				
		<?				

		}
		?>	



		<?
		$qban = "SELECT * FROM PrivCars ORDER BY vID DESC ";
		$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



		while ($row= mysql_fetch_array($resultx))
		{
			$IDS = $row["vID"];
			$Nick = $row["vOwner"];
			$Model = $row["vModel"];
			$Przebieg = $row["vPrzebieg"];
			
			
			$vPosX = $row["vPosX"];
			$vPosY = $row["vPosY"];


		    ?>	
				var p_windowsPrivCars<? echo "$IDS"; ?> = new google.maps.InfoWindow({
		    		content: "<p>Właściciel:<? echo "$Nick"; ?><br>Model:<? echo "$Model"; ?><br>Przebieg:<? echo "$Przebieg"; ?></p>"
		    	});	    	
		
		    		var p_markerPrivCars<? echo "$IDS"; ?> = new google.maps.Marker({
		    		position: SanMap.getLatLngFromPos(<? echo "$vPosX"; ?>, <? echo "$vPosY"; ?>),
		    		map: map,
		    		icon: "https://wiki.sa-mp.com/wroot/images2/5/58/Icon_55.gif"
		    		});
		    			
		    	

				google.maps.event.addListener(p_markerPrivCars<? echo "$IDS"; ?>, 'click', function() {
					p_windowsPrivCars<? echo "$IDS"; ?>.open(map,p_markerPrivCars<? echo "$IDS"; ?>)
				});
				
		<?				

		}
		?>		
		<?
		$qban = "SELECT * FROM FreeZone ORDER BY id DESC ";
		$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



		while ($row= mysql_fetch_array($resultx))
		{
			
			$ID = $row["id"];
			$Pos = $row["Zone"];
			$Pozycja=explode(" ",$Pos);
			$west = number_format($Pozycja[0], 0, ',', '');
			$south = number_format($Pozycja[1], 0, ',', '');

			$east = number_format($Pozycja[2], 0, ',', '');
			$north = number_format($Pozycja[3], 0, ',', '');	
				
			


 
			

		    ?>	
		    	
				var rectangle = new google.maps.Rectangle(
				{
	    			strokeColor: '#FF0000',
	    			strokeOpacity: 0.8,
				    strokeWeight: 2,
				    fillColor: '#FF0000',
				    fillOpacity: 0.35,
				    map: map,
				    bounds: 
				    {
				    	north: (((<? echo "$north"; ?>)*90)/3000),
				    	south: (((<? echo "$south"; ?>)*90)/3000),
				        east: (((<? echo "$east"; ?>)*90)/3000),
				        west: (((<? echo "$west"; ?>)*90)/3000)
	    			}
				});
				
				
		<?				

		}
		?>							
		<?
		$qban = "SELECT * FROM GangZone ORDER BY id DESC ";
		$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



		while ($row= mysql_fetch_array($resultx))
		{
			
			$ID = $row["id"];
			$Pos = $row["Zone"];
			$Pozycja=explode(" ",$Pos);
			$west = number_format($Pozycja[0], 0, ',', '');
			$south = number_format($Pozycja[1], 0, ',', '');

			$east = number_format($Pozycja[2], 0, ',', '');
			$north = number_format($Pozycja[3], 0, ',', '');	
				
			$Color = $row["ColorZone"]; 
			$XA = $row["X"];
			$YA = $row["Y"];
 			$Color = substr($Color, 0, -2);
			

		    ?>	
		    	var p_markerPrivCars<? echo "$ID"; ?> = new google.maps.Marker({
		    		position: SanMap.getLatLngFromPos(<? echo "$XA"; ?>, <? echo "$YA"; ?>),
		    		map: map,
		    		icon: "https://wiki.sa-mp.com/wroot/images2/6/61/Icon_18.gif"
		    		});

				var rectangle = new google.maps.Rectangle(
				{
	    			strokeColor: '#<? echo "$Color"; ?>',
	    			strokeOpacity: 0.0,
				    strokeWeight: 2,
				    fillColor: '#<? echo "$Color"; ?>',
				    fillOpacity: 0.35,
				    map: map,
				    bounds: 
				    {
				    	north: (((<? echo "$north"; ?>)*90)/3000),
				    	south: (((<? echo "$south"; ?>)*90)/3000),
				        east: (((<? echo "$east"; ?>)*90)/3000),
				        west: (((<? echo "$west"; ?>)*90)/3000)
	    			}
				});
				
		<?				

		}
		?>			

<?
		$qban = "SELECT * FROM GangWarZone ORDER BY id DESC ";
		$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



		while ($row= mysql_fetch_array($resultx))
		{
			
			$ID = $row["id"];
			$Pos = $row["Zone"];
			$Pozycja=explode(" ",$Pos);
			$west = number_format($Pozycja[0], 0, ',', '');
			$south = number_format($Pozycja[1], 0, ',', '');

			$east = number_format($Pozycja[2], 0, ',', '');
			$north = number_format($Pozycja[3], 0, ',', '');	
				
			$Color = $row["ColorZone"]; 
			
 			$Color = substr($Color, 0, -2);
			

		    ?>	
		    	
				var rectangle = new google.maps.Rectangle(
				{
	    			strokeColor: '#<? echo "$Color"; ?>',
	    			strokeOpacity: 0.0,
				    strokeWeight: 2,
				    fillColor: '#<? echo "$Color"; ?>',
				    fillOpacity: 0.40,
				    map: map,
				    bounds: 
				    {
				    	north: (((<? echo "$north"; ?>)*90)/3000),
				    	south: (((<? echo "$south"; ?>)*90)/3000),
				        east: (((<? echo "$east"; ?>)*90)/3000),
				        west: (((<? echo "$west"; ?>)*90)/3000)
	    			}
				});
				
		<?				

		}
		?>				


		</script>

	</body>
</html>