<?php
	
	require_once('../includes/connect.inc.php');
	$json_pos = file_get_contents("http://awfesa.xaa.pl/Launcher/web/positions.json");

$theplayer = mysql_real_escape_string($_GET['id']);


$qban = "SELECT * FROM `house` WHERE `id` = $theplayer";
		$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



		while ($row= mysql_fetch_array($resultx))
		{
			$Wlasciciel = $row['OwnerName'];
			$time = $row['time'];	
			$Name = $row['Name'];	
			$Pozycja = explode(" ",$row['OutsidePos']);
			$vPosXstart = number_format($Pozycja[0], 0, ',', '');
			$vPosYstart = number_format($Pozycja[1], 0, ',', '');			


		}
					
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
            #map-canvas { display: inline-block; height: 210px; width: 391px; margin-top: -8px;    margin-left: -8px;}
            #map-legend { padding: 10px; background-color: rgba(141, 142, 127, 0.46);}
        </style>
	</head>

	<body>
        <div id="map-canvas" style="background-color: rgb(61, 80, 84);"></div>
        <div id="map-legend">
        	<h2>Legenda</h2>
        	<p><img src="https://wiki.sa-mp.com/wroot/images2/b/b6/Icon_31.gif" /> Wolny dom</p>
        	<p><img src="https://wiki.sa-mp.com/wroot/images2/a/a9/Icon_32.gif" /> Zajęty dom</p>
        </div>

        <script src="js/SanMap.min.js"></script>
		<script type="text/javascript">

		


			var p_pos = <?php echo (empty($json_pos)) ? "" : $json_pos ?>;

			var mapType = new SanMapType(0, 0, function (zoom, x, y) {
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
				{'Map': mapType, 'Satellite': satType}, 1, SanMap.getLatLngFromPos(<? echo "$vPosXstart"; ?>,<? echo "$vPosYstart"; ?>), false, 'Satellite');

		    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(document.getElementById('map-legend'));




	
			

						if(<? echo "$time"; ?> != 0)
						{
							var p_windowsRace<? echo "$i"; ?> = new google.maps.InfoWindow({
				    		content: "<p>Właściciel: <? echo "$Wlasciciel"; ?><br>Nazwa domu: <? echo "$Name"; ?></p>"
				    		});

							var p_markerRace<? echo "$i"; ?> = new google.maps.Marker({
			    			position: SanMap.getLatLngFromPos(<? echo "$vPosXstart"; ?>, <? echo "$vPosYstart"; ?>),
			    			map: map,
			    			icon: "https://wiki.sa-mp.com/wroot/images2/a/a9/Icon_32.gif"
			    			});


							google.maps.event.addListener(p_markerRace<? echo "$i"; ?>, 'click', function() {
							p_windowsRace<? echo "$i"; ?>.open(map,p_markerRace<? echo "$i"; ?>)
							});
						}
						else
						{	
							

							var p_windowsRace<? echo "$i"; ?> = new google.maps.InfoWindow({
				    		content: "<p>Właściciel: BRAK<br>Nazwa domu: <? echo "$Name"; ?></p>"
				    		});

							var p_markerRace<? echo "$i"; ?> = new google.maps.Marker({
			    			position: SanMap.getLatLngFromPos(<? echo "$vPosXstart"; ?>, <? echo "$vPosYstart"; ?>),
			    			map: map,
			    			icon: "https://wiki.sa-mp.com/wroot/images2/b/b6/Icon_31.gif"
			    			});


							google.maps.event.addListener(p_markerRace<? echo "$i"; ?>, 'click', function() {
							p_windowsRace<? echo "$i"; ?>.open(map,p_markerRace<? echo "$i"; ?>)
							});
						}

		</script>

	</body>
</html>