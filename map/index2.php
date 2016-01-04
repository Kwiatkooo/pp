<?php
require_once('config.inc.php');

require_once('../includes/connect.inc.php');
global $config;





?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>DracoBlue's SAMP DMap 0.4</title>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=<?=$config['api key']?>&sensor=false"></script>
<style type="text/css">
html, body, #map-canvas { height: 100%; margin: 0; }
</style>
<script type="text/javascript">
// Note: this value is exact as the map projects a full 360 degrees of longitude
var GALL_PETERS_RANGE_X = 256;

// Note: this value is inexact as the map is cut off at ~ +/- 83 degrees.
// However, the polar regions produce very little increase in Y range, so
// we will use the tile size.
var GALL_PETERS_RANGE_Y = 256;

function degreesToRadians(deg) {
	return deg * (Math.PI / 180);
}

function radiansToDegrees(rad) {
	return rad / (Math.PI / 180);
}

/**
* @constructor
* @implements {google.maps.Projection}
*/
function GallPetersProjection() {
	
	// Using the base map tile, denote the lat/lon of the equatorial origin.
	this.worldOrigin_ = new google.maps.Point(GALL_PETERS_RANGE_X * 400 / 800,
	GALL_PETERS_RANGE_Y / 2);
	
	// This projection has equidistant meridians, so each longitude degree is a linear
	// mapping.
	this.worldCoordinatePerLonDegree_ = GALL_PETERS_RANGE_X / 360;
	
	// This constant merely reflects that latitudes vary from +90 to -90 degrees.
	this.worldCoordinateLatRange = GALL_PETERS_RANGE_Y / 2;
};

GallPetersProjection.prototype.fromLatLngToPoint = function(latLng) {
	
	var origin = this.worldOrigin_;
	var x = origin.x + this.worldCoordinatePerLonDegree_ * latLng.lng();
	
	// Note that latitude is measured from the world coordinate origin
	// at the top left of the map.
	var latRadians = degreesToRadians(latLng.lat());
	var y = origin.y - this.worldCoordinateLatRange * Math.sin(latRadians);
	
	return new google.maps.Point(x, y);
};

GallPetersProjection.prototype.fromPointToLatLng = function(point, noWrap) {
	
	var y = point.y;
	var x = point.x;
	
	if (y < 0) {
		y = 0;
	}
	if (y >= GALL_PETERS_RANGE_Y) {
		y = GALL_PETERS_RANGE_Y;
	}
	
	var origin = this.worldOrigin_;
	var lng = (x - origin.x) / this.worldCoordinatePerLonDegree_;
	var latRadians = Math.asin((origin.y - y) / this.worldCoordinateLatRange);
	var lat = radiansToDegrees(latRadians);
	return new google.maps.LatLng(lat, lng, noWrap);
};

function initialize() {
	
	var gallPetersMap;
	
	var gallPetersMapType = new google.maps.ImageMapType({
		getTileUrl: function(coord, zoom) {
			var numTiles = 1 << zoom;
			
			// Don't wrap tiles vertically.
			if (coord.y < 0 || coord.y >= numTiles) {
				return null;
			}
			
			// Wrap tiles horizontally.
			var x = ((coord.x % numTiles) + numTiles) % numTiles;
			
			// For simplicity, we use a tileset consisting of 1 tile at zoom level 0
			// and 4 tiles at zoom level 1. Note that we set the base URL to a
			// relative directory.
			var baseURL = 'http://awfesa.xaa.pl/livemap/map/';
			baseURL += '' + x + 'x' + coord.y + '-' +(6-zoom)+ '.jpg';
			return baseURL;
		},
		tileSize: new google.maps.Size(256, 256),
		isPng: true,
		minZoom: 2,
		maxZoom: 4,
		name: 'Gall-Peters'
	});
	
	gallPetersMapType.projection = new GallPetersProjection();
	
	var mapOptions = {
		zoom: 3,
		center: new google.maps.LatLng(-33.3536147483593, 96.15234375),
		streetViewControl: false,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'gallPetersMap']
		}
	};
	gallPetersMap = new google.maps.Map(document.getElementById('map-canvas'),
	mapOptions);
	
	gallPetersMap.mapTypes.set('gallPetersMap', gallPetersMapType);
	gallPetersMap.setMapTypeId('gallPetersMap');
	var map = gallPetersMap;
	var load = new XMLHttpRequest();
	load.open("GET", "<?=$config['default script']?>", false);
	load.send(null);
	var data = JSON.parse(load.responseText);

<?php



	$inos2 = "SELECT * FROM house WHERE `Name` > '' ORDER BY `Name` DESC";
	$inosn2 = mysql_query($inos2) or die(mysql_errno() . ": " . mysql_error() . "\n");

	while ($row= mysql_fetch_array($inosn2))
	
	{
		$NameW = $row["Name"];
		$Pos = $row["OutsidePos"];
		$Pozycja=explode(" ",$Pos);
		$PossAll[0]=number_format($Pozycja[0], 0, ',', '');
		$PossAll[1]=number_format($Pozycja[1], 0, ',', '');
	
?>


		for (id in data.items) 
		{
			
			
			var item = data.items[id];
			var point = new google.maps.LatLng((((<?=$PossAll[0]?>*90)/3000)-8), ((<?=$PossAll[1]?>*90)/1500));
			function buildInfoWindow(marker,map,point){
				var contentString = '<div id="content">'+
				'<div id="siteNotice">'+
				'</div>'+
				'<h1 id="firstHeading" class="firstHeading"><?=$PossAll[0]?> </h1>'+
				'<div id="bodyContent">'+
				'<p><?=$NameW?></p>'+
				'</div>'+
				'</div>';
				
				var infowindow = new google.maps.InfoWindow(
				{
					content: contentString
				});
				google.maps.event.addListener(marker, 'click', function() 
				{
					infowindow.open(map,marker);
					console.log(marker);
				});
			}
			
			var marker = new google.maps.Marker(
			{
				position: point,
				map: gallPetersMap,
				title: item.name,
				icon: 'http://panel.awfesa.xaa.pl/img/icons/Icon_41.gif',
				zIndex: 1000
			});
			buildInfoWindow(marker,map,point);
			
		}
<?php
}
?>
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<div id="map-canvas"></div>
</body>
</html>