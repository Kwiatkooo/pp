<?php
include("includes/connect.php");
$domain = $_SERVER['HTTP_HOST'];
$sessid = $_COOKIE['sessionID'];
$page = $_COOKIE['page'];
$delete = mysql_query("DELETE FROM sessions WHERE SessID='$sessid'");
setcookie('sessionID', $sessid, time()-60*60*24*365, '/', ".$domain");
setcookie('page', $page, time()-60*60*24*365, '/', ".$domain");
header("Location: login.php?out");
?>