<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");
$domain = $_SERVER['HTTP_HOST'];
if(isset($_COOKIE['sessionID']) && isset($_COOKIE['page'])) {
$cookiepage = $_COOKIE['page'];
header("Location: $cookiepage");
}
if(!isset($_GET['sesexp']) && isset($_COOKIE['sessionID']) && !isset($_COOKIE['page'])) {
header("Location: index.php");
}



	if(isset($_POST['user']) && isset($_POST['pass']))
	{
		$test=mysql_query("SELECT * FROM SavePlayer WHERE Nick='".mysql_real_escape_string($_POST['user'])."'") or die(mysql_errno() . ": " . mysql_error() . "\n");
		if(mysql_num_rows($test)) {
		$a="SELECT * FROM SavePlayer WHERE Nick='".mysql_real_escape_string($_POST['user'])."' AND password='".($_POST['pass'])."';";
		$q=mysql_query($a) or die(mysql_errno() . ": " . mysql_error() . "\n");
		if(mysql_num_rows($q))
		{
			$row= mysql_fetch_array($q);
	if(isset($_POST['rememberme'])) {
		$sesidx=uniqid(rand());
	$sesid=substr($sesidx, 0, 44);
$insertses = "INSERT INTO sessions VALUES (0, '$sesid', '".$row['nick']."', '".$row['password']."')";
$insertexe = mysql_query($insertses) or die(mysql_errno() . ": " . mysql_error() . "\n");
            setcookie('sessionID', $sesid, time()+60*60*24*365, '/', ".$domain");
	}
	else
	{
		$sesidx=uniqid(rand());
	$sesid=substr($sesidx, 0, 44);
$insertses = "INSERT INTO sessions VALUES (0, '$sesid', '".$row['nick']."', '".$row['password']."')";
$insertexe = mysql_query($insertses) or die(mysql_errno() . ": " . mysql_error() . "\n");
			setcookie('sessionID', $sesid, 0, '/', ".$domain");
	}
			
			$_POST['user']=$row['nick'];
			$_POST['pass']=$row['password'];
			header("Location: index.php");
		} else header("Location: loginn.php?wrong");
		} else header("Location: loginn.php?failed");
	}
//specify database ** EDIT REQUIRED HERE **
$cookie = mysql_real_escape_string($_POST['user']);
$cookie2 = mysql_real_escape_string($_POST['pass']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
    
    <!--[if lt IE 9]>
    <script src='<? echo "$domainname"; ?>/assets/javascripts/html5shiv.js' type='text/javascript'></script>
    <![endif]-->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/bootstrap/bootstrap.css' media='all' rel='stylesheet' type='text/css' />
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/bootstrap/bootstrap-responsive.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery ui -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/jquery_ui/jquery-ui-1.10.0.custom.css' media='all' rel='stylesheet' type='text/css' />
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/jquery_ui/jquery.ui.1.10.0.ie.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / switch buttons -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/bootstrap_switch/bootstrap-switch.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / xeditable -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/xeditable/bootstrap-editable.css' media='all' rel='stylesheet' type='text/css' />
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/common/bootstrap-wysihtml5.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / wysihtml5 (wysywig) -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/common/bootstrap-wysihtml5.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery file upload -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/jquery_fileupload/jquery.fileupload-ui.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / full calendar -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/fullcalendar/fullcalendar.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / select2 -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/select2/select2.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / mention -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/mention/mention.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / tabdrop (responsive tabs) -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/tabdrop/tabdrop.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jgrowl notifications -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/jgrowl/jquery.jgrowl.min.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / datatables -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/datatables/bootstrap-datatable.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / dynatrees (file trees) -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/dynatree/ui.dynatree.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / color picker -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/bootstrap_colorpicker/bootstrap-colorpicker.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / datetime picker -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / daterange picker) -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / flags (country flags) -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/flags/flags.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / slider nav (address book) -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/slider_nav/slidernav.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / fuelux (wizard) -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/fuelux/wizard.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / flatty theme -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/light-theme.css' id='color-settings-body-color' media='all' rel='stylesheet' type='text/css' />
    <!-- / demo -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/demo.css' media='all' rel='stylesheet' type='text/css' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class='fixed-header fixed-navigation contrast-fb'>
<header>
    <div class='navbar navbar-fixed-top'>
        <div class='navbar-inner'>
            <div class='container-fluid'>
                <a class='brand' href='index.php'>
                    <img src='http://wrt.xaa.pl/images/gameswithgold.png' width='100' height='50'/>
                </a>
                <a class='toggle-nav btn pull-left' href='#'>
                    <i class='icon-reorder'></i>
                </a>
            </div>
        </div>
    </div>
</header>
<div id='wrapper'>
<div id='main-nav-bg'></div>
<nav class='main-nav-fixed' id='main-nav'>
<div class='navigation'>
<ul class='nav nav-stacked'>
<li class=''>
    <a href='<? echo "$domainname"; ?>/index.php'>
        <i class='icon-home'></i>
        <span>Strona główna</span>
    </a>
</li>
<li class=''>
    <a href='http://www.wrt.xaa.pl/index.php'>
        <i class='icon-home'></i>
        <span>Forum</span>
    </a>
</li>
<li class=''>
    <a href='<? echo "$domainname"; ?>/find.php'>
        <i class='icon-search'></i>
        <span>Wyszukaj gracza</span>
    </a>
</li>
<li class=''>
    <a href='<? echo "$domainname"; ?>/servstat.php'>
        <i class='icon-leaf'></i>
        <span>Statystyki serwera</span>
    </a>
</li>
<li class=''>
    <a href='<? echo "$domainname"; ?>/admins.php'>
        <i class='icon-book'></i>
        <span>Administracja</span>
    </a>
</li>
<li class=''>
    <a class='dropdown-collapse' href='#'>
        <i class='icon-list'></i>
        <span>TOP'ki</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='<? echo "$domainname"; ?>/toplist.php'>
                <i class='icon-list'></i>
                <span>TOP Listy</span>
            </a>
        </li>
		<li class=''>
            <a href='<? echo "$domainname"; ?>/arenastats.php'>
                <i class='icon-group'></i>
                <span>TOP Areny</span>
            </a>
        </li>
        <li class=''>
            <a href='<? echo "$domainname"; ?>/races.php'>
                <i class='icon-road'></i>
                <span>Wyścigi</span>
            </a>
        </li>
    </ul>
</li>
<li class=''>
    <a class='dropdown-collapse' href='#'>
        <i class='icon-globe'></i>
        <span>Inne</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='<? echo "$domainname"; ?>/public.php'>
                <i class='icon-caret-right'></i>
                <span>Lista banów</span>
            </a>
        </li>
		<li class=''>
            <a href='<? echo "$domainname"; ?>/vips.php'>
                <i class='icon-caret-right'></i>
                <span>Lista vipów</span>
            </a>
        </li>
        <li class=''>
            <a href='<? echo "$domainname"; ?>/signature.php'>
                <i class='icon-caret-right'></i>
                <span>Sygnatury</span>
            </a>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>
<section id='content'>
    <div class='container-fluid'>
        <div class='row-fluid' id='content-wrapper'>
		<br>
<?php
if(isset($_GET["sesexp"])) {
echo "<div class='alert alert-info'><i class='icon-info-sign'></i> Twoja sesja wygasła, spróbuj ponownie!</div>";
 }
if(isset($_GET["out"])) {
echo "<div class='alert alert-info'><i class='icon-info-sign'></i> Zostałeś wylogowany.</div>";
 }
if(isset($_GET["nolog"])) {
echo "<div class='alert alert-info'><i class='icon-info-sign'></i> Nie jesteś zalogowany!</div>";
 }
 ?>
		<?php if(isset($_GET["wrong"])) { echo "<div class='alert alert-error'><i class='icon-remove-sign'></i> Błędne hasło!</div>"; } ?>
		<?php if(isset($_GET["failed"])) { echo "<div class='alert alert-error'><i class='icon-remove-sign'></i> Błędny nick!</div>"; } ?>
<? echo "
    <div class='span4'>
	<div align='right'>	
		<form action='loginn.php' method='POST'>";
echo "<div class='control-group'>
  <div class='controls'>
    <div class='input-prepend'>
      <span class='add-on'><i class='icon-user'></i></span>
<input type='text' name='user' class='span8' id='inputIcon' placeholder='Nick' />
    </div>
  </div>
</div>
<div class='control-group'>
  <div class='controls'>
    <div class='input-prepend'>
      <span class='add-on'><i class='icon-check'></i></span>
<input type='password' name='pass' class='span8' id='inputIcon' placeholder='Hasło' />
    </div>
  </div>
</div>
		Zapamiętaj mnie: <input type='checkbox' name='rememberme' value='1'><br><br>
		<input type='submit' value='Zaloguj!' class='btn btn-success tm_style_3' /><br></div>";
echo "
		</form>
		</div>
		<div class='span5'>
<div align='left'><br>Witaj w panelu <b>$webname</b>. Tutaj możesz zmodyfikować swoje konto.<br>Aby się zalogować użyj nicku i hasła z gry.<br><br><br><br><center><img src='images/samplogo.png'></center></div>
	</div>
</div>
</div>
</section>
</div>
</html>";
include("footer.php");
?>