<?php

	// Include database connection settings
	include('header.php');
// rows to return
$limit=1; 
if (isset($_COOKIE['sessionID'])) {
echo "
	<head>
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
		<title>Sygnatura - $webname</title>
	</head>
<div class='content well well-small'>
<div class='container-fluid'>
  <div class='row-fluid'>
<br><center><legend><h1>Sygnatura</h1></legend>
<img src='$domainname/signatures/s.php?nick=$userplayer'><br>";?>
<br><input class="span6" name="link" type="text" class="large" size="65" value="[img]<? echo "$domainname"; ?>/signatures/s.php?nick=<? echo "$userplayer"; ?>[/img]" /><br>
<? echo "<br><center><legend><h1>Sygnatura 2</h1></legend>
<img src='$domainname/signatures/s2.php?nick=$userplayer'><br>";?>
<br><input class="span6" name="link" type="text" class="large" size="65" value="[img]<? echo "$domainname"; ?>/signatures/s2.php?nick=<? echo "$userplayer"; ?>[/img]" /><br>
<? echo "
			</div>			
			</div>			
			</div>			
</html>";
}
else
{
header("Location: $domainname/login.php");
}
if(!isset($_COOKIE['sessionID'])) {
?>
<meta http-equiv="refresh" content="0;URL='<? echo "$domainname/login.php?nolog"; ?>'" />    
<?
}
include("footer.php");
?>