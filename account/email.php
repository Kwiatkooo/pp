<?php
	// Include database connection settings
	include('../includes/connect.inc.php');
	
	$domainname = 'panel.wrt.xaa.pl';
	$thetime = time();
if(isset($_POST['currentpass']) && isset($_POST['newpass1'])) {
if($_POST['newpass1'] == $_POST['currentpass']) {
header("Location: email.php?notmatch"); 
}
else
{
$IsNick = mysql_real_escape_string($_POST['currentpass']);
$IsEmail = mysql_real_escape_string($_POST['newpass1']);
}
$query = "UPDATE Players SET Email='$IsEmail' WHERE Nick='$userplayer' "; // EDIT HERE and specify your table and field names for the SQL query
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
?>
<?php
if($originalpwd!=$IsNick) {
$domainname = 'http://'.$_SERVER['HTTP_HOST'].'/pcp';
include("../footer.php");
?>