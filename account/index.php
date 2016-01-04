<?php
	include('../header.php');
	
	$ipaddress = $_SERVER["REMOTE_ADDR"];
	$currenttime = time();
	$qban = "SELECT * FROM Bans WHERE nick='$userplayer'";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["nick"];
		$admin = $row["admin"];
		$reason = $row["reason"];
		$bandate = $row["date"];
		$bannedip = $row["ip"];
		}
if(mysql_num_rows($resultx)>"0") {
include('header.php');
$age = time() - strtotime("$bandate $batime");
$minutes = $age/60;
$mins = explode(".", $minutes);
$hours = $minutes/60;
$hrs = explode(".", $hours);
$days = $hours/24;
$dayz = explode(".", $days);
$weeks = $days/7;
$weekz = explode(".", $weeks);
$months = $days/30;
$monthz = explode(".", $months);
$years = $months/12;
$yearz = explode(".", $years);
$ago = "";
if($age<60) {
$ago = "$age sekund";
}
if($age>59 && $age<3600) {
$ago = "$mins[0] minut";
}
if($age>3600 && $age<86400) {
$ago = "$hrs[0] godzin";
}
if($age>86400 && $age<604800) {
$ago = "$dayz[0] dni";
}
if($age>604800 && $age<2592000) {
$age = $age/24;
$ago = "$weekz[0] tygodni";
}
if($age>2592000 && $age<31104000) {
$age = $age/24;
$ago = "$monthz[0] miesięcy";
}
if($age>31104000) {
$age = $age/12;
$ago = "$yearz[0] lat";
}
$banexpire = round(($bandays - time()) / 86400);
			echo "
<head>
<title>Panel Gracza - Zostałeś zbanowany</title>
  <style type='text/css'>
    /* set the height so $(window).height() is accurate
    html, body {
      height: 100%;
    }
 
    /* prevent scrolling while during modal */
    body.modal-open {
      overflow: hidden;
    }
 
    /* optional: override bootstrap image gallery */
    .modal-gallery {
      margin-top: 0 !important;
    }
    @media (max-width: 767px) {
      .modal-gallery {
        margin-left: 0 !important;
      }
      .modal-fullscreen {
        left: 0 !important;
        right: 0 !important;
      }
    }
  </style>
</head>
<body>
<legend><center><h4>Zostałeś zbanowany</h4></center></legend>
<center><b><br>Ban Info:<br>Nick: <font color = '#33AA33'>$userplayer</font><br>
Zbanowany dnia: <font color = '#33AA33'>$bandate</font><br>
Admin: <font color ='#FF9900'>$admin</font><br>
Powód: <font color = '#33AA33'>$reason</font>.<br>
Zbanowane IP: <font color = '#33AA33'>$bannedip</font>.<br>
"; ?><?"</strong></center>
</b>
";
		}
else
{
// Build SQL Query  
$query = "SELECT * FROM Players WHERE Nick='$userplayer';"; 
  $result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");

// now you can display the results returned
  while ($row= mysql_fetch_array($result)) {
  $level = $row["admin"];
  $vip = $row["vip"];
}


echo "
	<head>
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
		<title>Moje konto - $webname</title>
<style type='text/css'>
@media handheld {
#right {
margin-left: auto;
margin-right: auto;
display: block;
}
#left {
float:left;
margin-left: auto;
margin-right: auto;
display: block;
}
}
@media screen {
#right {
float:right;
	text-align: right;
	display: block;
}
#left {
float:left;
	width: 400px;
	display: block;
}
}
</style>
	</head>
	<body>
	<div class='content well well-small'>
<div class='container-fluid'>
  <div class='row-fluid'>
<center><legend><h1>Moje konto</h1></legend></center>
<div class='visible-desktop'>
    <div id='center'><br>
<div align='center'>
<iframe src='skin.php' width='315' height='245' frameborder='0' scrolling='no' allowtransparency='true' ></iframe><iframe src='password.php' width='315' height='245' frameborder='0' scrolling='no' allowtransparency='true' ></iframe>
</div>
</div>
		<div id='center'>
<br>
</div>";
echo "
</div>
<div class='hidden-desktop'>
<iframe src='skin.php' width='315' height='245' frameborder='0' scrolling='no' allowtransparency='true' ></iframe>
</div>
</div>
</div>
</div>";
}
if(!isset($_COOKIE['sessionID'])) {
?>
<meta http-equiv="refresh" content="0;URL='<? echo "$domainname/login.php?nolog"; ?>'" />    
<?
}
include("../footer.php");
?>