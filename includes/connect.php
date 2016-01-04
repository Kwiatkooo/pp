<?php
$hostname = 'awfesa.xaa.pl';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
$dbname   = 'awfesa_samp'; // Your database name.
$username = 'awfesa_priv'; 
$password = 'Kwiatek14';          // Your database password. If your database has no password, leave it empty.

// Let's connect to host
mysql_connect($hostname, $username, $password) or die(mysql_errno() . ": " . mysql_error() . "\n");
// Select the database
mysql_select_db($dbname) or DIE('Database name is not available!');
//LEAVE IT LIKE THIS!
error_reporting(0);

$domainname = ''.$_SERVER['HTTP_HOST'].'';

$webname = "Panel gracza";

?>