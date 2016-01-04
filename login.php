<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");
$domain = $_SERVER['HTTP_HOST'];
if(isset($_COOKIE['sessionID']) && isset($_COOKIE['page'])) {
$cookiepage = $_COOKIE['page'];
header("Location: $cookiepage");
}
if(isset($_COOKIE['sessionID']) && !isset($_COOKIE['page'])) {
header("Location: index.php");

}



	if(isset($_POST['user']) && md5(isset($_POST['pass'])))
	{
		$test=mysql_query("SELECT * FROM Players WHERE Nick='".mysql_real_escape_string($_POST['user'])."'") or die(mysql_errno() . ": " . mysql_error() . "\n");
		if(mysql_num_rows($test)) {
		$a="SELECT * FROM Players WHERE Nick='".mysql_real_escape_string($_POST['user'])."' AND password='".(md5($_POST['pass']))."';";
		$q=mysql_query($a) or die(mysql_errno() . ": " . mysql_error() . "\n");
		if(mysql_num_rows($q))
		{
			$row= mysql_fetch_array($q);
	if(isset($_POST['rememberme'])) {
		$sesidx=uniqid(rand());
	$sesid=substr($sesidx, 0, 44);
$insertses = "INSERT INTO sessions VALUES (0, '$sesid', '".$row['Nick']."', '".$row['password']."')";
$insertexe = mysql_query($insertses) or die(mysql_errno() . ": " . mysql_error() . "\n");
            setcookie('sessionID', $sesid, time()+60*60*24*365, '/', ".$domain");
	}
	else
	{
		$sesidx=uniqid(rand());
	$sesid=substr($sesidx, 0, 44);
$insertses = "INSERT INTO sessions VALUES (0, '$sesid', '".$row['Nick']."', '".$row['password']."')";
$insertexe = mysql_query($insertses) or die(mysql_errno() . ": " . mysql_error() . "\n");
			setcookie('sessionID', $sesid, 0, '/', ".$domain");
	}
			
			$_POST['user']=$row['Nick'];
			$_POST['pass']=$row['password'];
			header("Location: index.php?good");
		} else header("Location: login.php?wrong_". md5($_POST['pass'])."");
		} else header("Location: login.php?failed");
	}
//specify database ** EDIT REQUIRED HERE **
$cookie = mysql_real_escape_string($_POST['user']);
$cookie2 = mysql_real_escape_string($_POST['pass']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<link rel="shortcut icon" href="images/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>WRT Team - Panel Gracza</title>
<link rel="stylesheet" href="css/style.defaultt.css" type="text/css" />
<link rel="stylesheet" href="css/login/style.shinyblue.css" type="text/css" />

<script type="text/javascript" src="js/login/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/login/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/login/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/login/modernizr.min.js"></script>
<script type="text/javascript" src="js/login/bootstrap.min.js"></script>
<script type="text/javascript" src="js/login/jquery.cookie.js"></script>
<script type="text/javascript" src="js/login/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>

</head>
<section id='content'>
    <div class='container-fluid'>
        <div class='row-fluid' id='content-wrapper'>
		<br>
	
<?php

if(isset($_GET["out"])) {
echo "	
	<center><div class='alert alert-success'>Zostałeś wylogowany!<div></center>";
 }
if(isset($_GET["in"])) {
echo "	
	<center><div class='alertt alert-success'>Zostałeś wylogowany!<div></center>";
 } 
if(isset($_GET["nolog"])) {
echo "
	<div style='float: right'>
		<div id='nolog_css'>
			<br><span style='font-size: 18px;'><span style='color:#FF33FF'>Nie jesteś zalogowany!</span></span>
		</div>
	</div>";

 }
 ?>
		
		<?php if(isset($_GET["wrong"])) { echo "
		<center><div class='alert alert-success'>Wprowadzone hasło jest nie prawidłowe!<div></center>";} ?>

		<?php if(isset($_GET["failed"])) { echo "
		<center><div class='alert alert-success'>Wprowadzony nick jest nie prawidłowy!<div></center>";} ?>"; 
				
		
<? echo "
    <div class='span4'>
	<div align='right'>	
		<form action='login.php' method='POST'>";
echo "
<body class='loginpage'>

<div class='loginpanel'>
    <div class='loginpanelinner'>
        <div class='logo animate0 bounceIn'><img src='images/logo4.png' alt='' /></div>
        <form id='login' action='dashboard.html' method='post'>
            <div class='inputwrapper login-alert'>
                <div class='alert alert-error'>Invalid username or password</div>
            </div>
            <div class='inputwrapper animate1 bounceIn'>
                <input type='text' name='user' id='inputIcon' placeholder='Wprować nick z serwera' />
            </div>
            <div class='inputwrapper animate2 bounceIn'>
                <input type='password' name='pass' id='inputIcon' placeholder='Wprować hasło z serwera' />
            </div>
            <div class='inputwrapper animate3 bounceIn'>
                <button name='submit'>Zaloguj sie</button>
            </div>
            <div class='inputwrapper animate4 bounceIn'>
			
				<a href='/account/newpass.php' style='margin-right: 120px;margin-bottom: 10px;color:#FFFFFF;text-decoration:none;'>Przypomnij haslo...</a>
                <label><input type='checkbox' class='remember' name='signin' /> Zapamiętaj mnie</label>
				
            </div>
            
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

</body>";	
echo "
		</form>
		</div>

</div>
</div>
</section>
</div>

</html>";

include("footer.php");
?>