<?php
$hostname = 'mysql-fr1.ServerProject.pl';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
$dbname   = 'db_9646'; // Your database name.
$username = 'db_9646'; 
$password = '69c3839747ba'; 
                // Your database password. If your database has no password, leave it empty.
// Let's connect to host
mysql_connect($hostname, $username, $password) or die(mysql_errno() . ": " . mysql_error() . "\n");
// Select the database
mysql_select_db($dbname) or die(mysql_errno() . ": " . mysql_error() . "\n");
 
$domainname = 'http://panel.wrt.xaa.pl';

$webname = "WRT Team";

// DO NOT TOUCH BELOW!
$sessid = $_COOKIE['sessionID'];
if(isset($_COOKIE['sessionID'])) {
$sesidq = "SELECT * FROM sessions WHERE SessID='$sessid'";
$sesid = mysql_query($sesidq) or die(mysql_errno() . ": " . mysql_error() . "\n");
$works = mysql_num_rows($sesid);
  while ($row= mysql_fetch_array($sesid)) {
  $userplayer = $row['Username'];
  $pwdses = $row['Password'];
  }
$check1 = "SELECT * FROM SavePlayer WHERE Nick='$userplayer'";
$check2 = mysql_query($check1) or die(mysql_errno() . ": " . mysql_error() . "\n");;
  while ($row= mysql_fetch_array($check2)) {
  $pwdreal = $row['password'];
  }
if($works<1) {

}
if($pwdses!=$pwdreal) {

}
}


?>