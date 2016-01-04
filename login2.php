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
			header("Location: index.php");
		} else header("Location: login.php?wrong");
		} else header("Location: login.php?failed");
	}
//specify database ** EDIT REQUIRED HERE **
$cookie = mysql_real_escape_string($_POST['user']);
$cookie2 = mysql_real_escape_string($_POST['pass']);
?>
<body background="http://fsr.xaa.pl/panel/images/img-log/gta.jpg" bgproperties="fixed">...</body>
<!DOCTYPE html>
<html lang="pl">
<head>
	  <title>Developerski.com | Postrona logowania</title>
	  <meta charset='utf-8' />
	  <link rel='stylesheet' href='styles.css' type='text/css' media='screen' />
	

</head>




    <div class='container-fluid'>
        <div class='row-fluid' id='content-wrapper'>
		<br>
	
<?php
if(isset($_GET["sesexp"])) {
echo "<div class='alert alert-info'><i class='icon-info-sign'></i> Twoja sesja wygasła, spróbuj ponownie!</div>";
 }
if(isset($_GET["out"])) {
echo "	
	<div style='float: right'>
		<div id='out_css'>
			<br><span style='font-size: 18px;'><span style='color:lime'>Zostałeś wylogowany.</span></span>
		</div>
	</div>";
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
		<div style='float: right'>
			<div id='error_css'>
				<span style='font-size: 18px;' style='color:red'>Błędne Hasło<br> Jeżeli zapomniałeś hasła to napisz do administracji.</span>
			</div>
		</div>"; } ?>

		<?php if(isset($_GET["failed"])) { echo "
		<div style='float: right'>
			<div id='error_css'>
				<span style='font-size: 18px;' style='color:red'>Błędne Nick<br>Sprawdź jak napisałeś swój nick.</span>
			</div>
		</div>"; } ?>		
		
<? echo "

<div id='content'>
	<h1>Full Server Rozrywki</h1>
		<form id='loginForm' action='login.php' method='POST'>'";

echo "
<body>
  <div id='dot-texture'></div>
  <header>
   <div class='line-texture'></div>
   <h1 title='Developerski.com - podstrona logowania w stylu flat'>
    <a href='http://developerski.com'><img src='images/logotype.png' alt='kodowanie stron, jak zacząć kodować, poradniki html, html5, poradniki css, poradniki php' /></a>
   </h1>
   <nav>
    <ul>
     <li><a href='http://developerski.com'>Strona główna</a></li>
     <li><a href='http://developerski.com/category/grafika/'>Grafika</a></li>
     <li><a href='http://developerski.com/category/programowanie/'>Programowanie</a></li>
     <li><a href='http://developerski.com/category/seo/'>SEO</a></li>
     <li><a href='http://developerski.com/category/pobieralnia/'>Pobieralnia</a></li>
    </ul>
   </nav>
  </header>
  <section>
   <article>
    <form method='post' action='#'>
     <input type='text' placeholder='Nazwa użytkownika' />
     <input type='password' placeholder='Hasło' />
     <input type='submit' value='Zaloguj się!' />
    </form>
   </article>
  </section>
  <footer>
   Projekt graficzny i realizacja: <a href='http://developerski.com'>Developerski.com</a><br />
   Copyright &copy; 2014 <a href='http://developerski.com'>Developerski.com</a><br />
   All Rights Reserved!
  </footer>
 </body>";	
echo "	
</div>	
</div>
</div>
</div>
</div>
<body>


	</form>
</div>
</body>

</html>";
include("footer.php");
?>