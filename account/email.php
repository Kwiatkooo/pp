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
$IsEmail = mysql_real_escape_string($_POST['newpass1']);$thematch = "SELECT * FROM Players WHERE Nick='$userplayer'";$matching = mysql_query($thematch) or die('FAILED');  while ($row= mysql_fetch_array($matching)) {  $originalpwd = $row["Email"];
}if($originalpwd == $IsNick) {// Build SQL Query  
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
<center> <div class='alert alert-success' style='    padding: 8px 35px 8px 14px;       margin-bottom: 20px;       text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);       background-color: rgba(74, 255, 0, 0.25);       border: 1px solid #00FF34;       color: white;'>Twój adres e-mail został pomyślnie zmieniony!<div></div></div></center>
</body>
</html>";
}}
}

else
{?>							<?php if(isset($_GET['notmatch'])) echo '					<center><div class="alert alert-success" style="    padding: 8px 35px 8px 14px;            text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);       background-color: rgba(255, 0, 0, 0.25);       border: 1px solid #FF0000;       color: white;	">Nie możesz zmienić adres email na taki sam!<div></div></div></center>';?>					<?php if(isset($_GET['wrongpwd'])) echo '<center><div class="alert alert-success" style="    padding: 8px 35px 8px 14px;          text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);       background-color: rgba(255, 0, 0, 0.25);       border: 1px solid #FF0000;       color: white;	">Podany email jest niepoprawny!<div></div></div></center>';?><?php
echo "
<html>
	<head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
<head>

    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <style type='text/css'>
.inputz input {border: 0;  padding: 10px;  width: 300px;  background-color: rgba(0, 0, 0, 0.62);  color: white;  margin-top: 8px;  border: 1px solid rgba(0, 165, 255, 1);}.inputz button {  display: block;  border: 1px solid rgba(0, 165, 255, 1);  padding: 10px;  width: 250px;  color: #fff;  text-transform: uppercase;  background-color: rgba(0, 129, 255, 0.52);  margin: 0 auto;  margin-top: 7;}
</style>

</head>

<div id='dashboard-left' class='span8'>												                                                                                        	                                                                         <form action='' method='post'>            						<div class='inputz bounceIn'>               						<input type='text' name='currentpass' placeholder='Aktualny adres email'>            						</div>                                    <div class='inputz bounceIn'>               						<input type='text' name='newpass1' placeholder='Nowy adres email'>            						</div>                                             						<div class='inputz bounceIn'>               						<button name='submit'>Zmień email</button>            						</div>        						</form>                                                                                                          </div>

</html>";
}
?>
<?php
if($originalpwd!=$IsNick) {echo "<meta HTTP-EQUIV='REFRESH' content='0; url=http://$domainname/account/email.php?wrongpwd'>";}
$domainname = 'http://'.$_SERVER['HTTP_HOST'].'/pcp';
include("../footer.php");
?>