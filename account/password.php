<?php
	// Include database connection settings
	include('../includes/connect.inc.php');
	
	$domainname = 'panel.wrt.xaa.pl';
	$thetime = time();
if(isset($_POST['currentpass']) && isset($_POST['newpass1']) && isset($_POST['newpass2'])) {
if($_POST['newpass1'] != $_POST['newpass2']) {
header("Location: password.php?notmatch"); 
}
else
{
$parolainitiala = mysql_real_escape_string($_POST['currentpass']);
$hashedpwd = md5($parolainitiala);
$pwd = mysql_real_escape_string($_POST['newpass1']);
$thematch = "SELECT * FROM Players WHERE Nick='$userplayer'";
$matching = mysql_query($thematch) or die('FAILED');
  while ($row= mysql_fetch_array($matching)) {
  $originalpwd = $row["password"];
}

// Build SQL Query  
$query = "UPDATE Players SET password=md5('$pwd') WHERE Nick='$userplayer' "; // EDIT HERE and specify your table and field names for the SQL query
$session = "UPDATE sessions SET Password='$pwd' WHERE SessID='$sessid'";
$executesession = mysql_query($session);
		$sesidxx=uniqid(rand());
	$rand=substr($sesidxx, 0, 44);
$insertses = "UPDATE sessions SET SessID='$rand' WHERE SessID='$sessid'";
$insertexe = mysql_query($insertses);
			
			
$result = mysql_query($query);
echo "<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
        <link rel='stylesheet' href='setlevel.css' />
		<link type='text/css' href='$domainname/css/bootstrap-responsive.css?";?><?php echo date('l jS \of F Y h:i:s A'); ?><? echo "' rel='stylesheet' />
<link type='text/css' href='$domainname/css/bootstrap-responsive.min.css?";?><?php echo date('l jS \of F Y h:i:s A'); ?><? echo "' rel='stylesheet' />
<link type='text/css' href='$domainname/css/bootstrap.css?";?><?php echo date('l jS \of F Y h:i:s A'); ?><? echo "' rel='stylesheet' />
<link type='text/css' href='$domainname/css/bootstrap.min.css?";?><?php echo date('l jS \of F Y h:i:s A'); ?><? echo "' rel='stylesheet' />
<script type='text/javascript' src='http://code.jquery.com/jquery-1.5.2.js'></script>
</head>
<body>
<center> <div class='alert alert-success' style='
</body>
</html>";
}
}

else
{
echo "
<html>
	<head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
<head>

    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <style type='text/css'>

</style>

</head>

<div id='dashboard-left' class='span8'>

</html>";
}


$domainname = 'http://'.$_SERVER['HTTP_HOST'].'/pcp';
include("../footer.php");
?>