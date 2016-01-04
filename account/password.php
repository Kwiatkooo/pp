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
  $originalpwd = $row["password"];  $originalpwd = mb_convert_case($originalpwd, MB_CASE_LOWER, "UTF-8");  	
}if($originalpwd == $hashedpwd) {

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
<center> <div class='alert alert-success' style='    padding: 8px 35px 8px 14px;       margin-bottom: 20px;       text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);       background-color: rgba(74, 255, 0, 0.25);       border: 1px solid #00FF34;       color: white;'>Twoje hasło zostało pomyślnie zmienione!<div></div></div></center>
</body>
</html>";
}
}}

else
{?>							<?php if(isset($_GET['notmatch'])) echo '					<center><div class="alert alert-success" style="    padding: 8px 35px 8px 14px;            text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);       background-color: rgba(255, 0, 0, 0.25);       border: 1px solid #FF0000;       color: white;	">Wpisane hasła się nie zgadzają!!<div></div></div></center>';?>					<?php if(isset($_GET['wrongpwd'])) echo '<center><div class="alert alert-success" style="    padding: 8px 35px 8px 14px;          text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);       background-color: rgba(255, 0, 0, 0.25);       border: 1px solid #FF0000;       color: white;	">Podane hasło jest niepoprawne!<div></div></div></center>';?><?php
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

<div id='dashboard-left' class='span8'>												                                                                                        	                                                                         <form action='' method='post'>            						<div class='inputz bounceIn'>               						<input type='password' name='currentpass' placeholder='Aktualne hasło'>            						</div>                                    <div class='inputz bounceIn'>               						<input type='password' name='newpass1' placeholder='Nowe hasło'>            						</div>                                    <div class='inputz bounceIn'>               						<input type='password' name='newpass2' placeholder='Powtórz nowe hasło'>            						</div>            						<div class='inputz bounceIn'>               						<button name='submit'>Zmień hasło</button>            						</div>        						</form>                                                                                                          </div>

</html>";
}
if($originalpwd != $hashedpwd) {echo header("Location: password.php?wrongpwd"); }

$domainname = 'http://'.$_SERVER['HTTP_HOST'].'/pcp';
include("../footer.php");
?>