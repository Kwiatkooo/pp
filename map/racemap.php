<?php
	
	require_once('../includes/connect.inc.php');


$theplayer = mysql_real_escape_string($_GET['id']);


$qban = "SELECT * FROM `WS` WHERE `ID` = $theplayer";
		$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



		while ($row= mysql_fetch_array($resultx))
		{

			$Pozycja = explode(",",$row['CP_5']);
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
        

        <script src="js/SanMap.min.js"></script>
		<script type="text/javascript">

		

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




	
			var flightPlanCoordinates = [

			<?php
				$query = "SELECT * FROM `WS` WHERE `ID` = $theplayer";
				$result = mysql_query($query) or die();
				while($row = mysql_fetch_array($result))
				{

					$ID = $row['ID'];
					$MAX_CP = $row['CP_LICZBA'];	

					

					for($i = 0; $i <$MAX_CP; $i++)
					{
						

						$Pozycja = explode(",",$row['CP_'.$i]);
						$vPosX = number_format($Pozycja[0], 1, '.', '');
						$vPosY = number_format($Pozycja[1], 1, '.', '');
						

						?>
							
							new google.maps.LatLng((((<? echo "$vPosY"; ?>)*90)/3000), ((parseFloat(<? echo "$vPosX"; ?>)*45)/1500)),
														
						<?				
					}
				}
			?>
			];
var flightPath = new google.maps.Polyline({
path: flightPlanCoordinates,
geodesic: true,
strokeColor: '#0866C6',
strokeOpacity: 1.0,
strokeWeight: 10
});
flightPath.setMap(map);

		</script>

	</body>
</html>