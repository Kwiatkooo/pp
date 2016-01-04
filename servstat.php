<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");
include('header.php');
?>
<head>
<title>Statystyki serwera - <? echo "$webname"; ?></title>
</head>
<br>
<center><b>Statystyki serwera</b>
<br>
<br>
<? 
$qstats = "SELECT * FROM stats";
$hstatses = mysql_query($qstats) or die("Failed");
	while ($row= mysql_fetch_array($hstatses)) 
	{
		if($row['name'] == 'ban') $name = "Łącznie banów: ";
		if($row['name'] == 'kick') $name = "Łącznie kicków: ";	
		if($row['name'] == 'rekord') $name = "Rekord graczy: ";
		if($row['name'] == 'privatemsg') $name = "Wysłanych PM'ów: ";
		if($row['name'] == 'vips') $name = "<br />Kupionych kont VIP ogółem: ";
		if($row['name'] == 'visit') $name = "<br />Łącznie wizyt: ";
		if($row['name'] == 'players') $name = "Zarejestrowanych graczy: ";
		if($row['name'] == 'los') $name = "<br />Losowań: ";
		if($row['name'] == 'walizka') $name = "<br />Znalezionych walizek: ";
		if($row['name'] == 'figurka') $name = "Znalezionych figurek: ";
		if($row['name'] == 'winrace') $name = "<br />Wygranych wyścigów: ";
		if($row['name'] == 'reaction') $name = "Przepisane kody: ";
		if($row['name'] == 'mathematics') $name = "Wykonane dzialania matematyczne: ";
		if($row['name'] == 'rWG') $name = "<br />Rekord graczy na WG: ";
		if($row['name'] == 'rCH') $name = "Rekord graczy na Chowanym: ";
		if($row['name'] == 'rSS') $name = "Rekord graczy na Skokach: ";
		if($row['name'] == 'rTW') $name = "Rekord graczy na Tower: ";
		if($row['name'] == 'rHY') $name = "Rekord graczy na Hay: ";
		if($row['name'] == 'rDD') $name = "Rekord graczy na Derbach: ";
		if($row['name'] == 'cCH') $name = "Łącznie zabaw 'Chowany': ";
		if($row['name'] == 'cWG') $name = "Łącznie zabaw 'Wojny Gangów': ";
		if($row['name'] == 'cSS') $name = "Łącznie zabaw 'Skoki Spadochronowe': ";
		if($row['name'] == 'cHY') $name = "Łącznie zabaw 'Hay': ";
		if($row['name'] == 'cTW') $name = "Łącznie zabaw 'Tower': ";
		if($row['name'] == 'cDD') $name = "Łącznie zabaw 'Derby': ";
		if($row['name'] == 'pvp') $name = "Rozegranych PvP: ";
		
		$show = "<div class='profile-user-info span10'><div class='profile-info-value'><b>{$name}</b><span class='label pad-green'>{$row['value']}</span></div></div>";
		echo "$show";
	} 
	
echo "$sbans"
?>

</div>
</center>
<?
	include("footer.php");
?>