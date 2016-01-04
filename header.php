<?php
include("includes/connect.inc.php");


//Here comes the home description


$h2 = "Panel gracza - WRT Team"; //description title
$small = "Witaj w panelu gracza WRT Team! Aby uzyskać uzyskać możliwe opcje, zaloguj się!"; //here is a description for the description title [hehe]
$homedesc = "Panel Gracza nie jest jeszcze na 100% przystosowany do Gamemodu a więc może pare funkcji nie działać.";
if(isset($_POST['currentpass'])) 
{
$seenick = $_POST['currentpass'];?>
<?
header("Location: $domainname/find.php?player=$seenick");
}

//Here goes all the variables
	$query = "SELECT * FROM Players WHERE Nick='$userplayer' ";
	$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");

	while ($row= mysql_fetch_array($result)) 
	{
		$userid = $row["id"];
		$name = $row["Nick"];
		$emailx = $row["Email"];
		$matma = $row["QuizWin"];
		$kody = $row["KodWin"];
		$skin = $row["Skin"];
	
		$bank = $row["BankMoney"];
	
		
		$visit = $row["Visits"];
		
		$FirstCar = $row["FirstCar"];
		$FirstHouse = $row["FirstHouse"];
		
		$kills = $row["Kills"];
		$deaths = $row["Deaths"];
		$online = $row["timeplay"];
		$score = $row["Exp"];
		$registerdate = $row["DriftPkt"];
		$laston = $row["PaczWin"];
		$rpg = $row["a_rpg"];
		$oneshoot = $row["a_oneshoot"];
		$minigun = $row["a_minigun"];
		$jetpack = $row["a_jetpack"];
		$snajper = $row["a_snajper"];
		$figurki = $row["figurki"];
		$winpvp = $row["winpvp"];
		$lospvp = $row["lospvp"];
		$won_dd = $row["FrgDe"];
		$won_ch = $row["FrgWA"];
		$won_tr = $row["FrgMI"];
		$won_hy = $row["FrgSN"];
		$won_ss = $row["FrgSO"];
		$won_wg = $row["FrgRpg"];
		$won_dm = $row["FrgDM"];
		$Szafir = $row["Szafir"];
		$czass = $row["PlayingTime"];
		
		$Hours = $czass/3600;
		$cena=number_format($Hours, 0, ',', '');
		$Godzin = $cena - 1;
		$Minutes = ($czass%3600)/60;
		$Minut=number_format($Minutes, 0, ',', '');

		
		$quiz = $row['QuizWin'];
		$paczki = $row['PaczWin'];
		$widomo = $row['Messages'];
		$kodwin = $row['KodWin'];
		$idplay = $row['id'];
		$UserId = $row['UserId'];
		
	}
	
$Race = "SELECT `id`, `Nick`, `recordtime`, `Nazwa`, `CarModels`, `IsFoot` FROM `WS_Records`  WHERE `Nick` = '$userplayer' GROUP BY `Nazwa` ORDER BY `Nazwa` ASC";





$RaceX = mysql_query($Race) or die(mysql_errno() . ": " . mysql_error() . "\n");
	
	
	$PPOnline = mysql_num_rows(mysql_query('SELECT * FROM Online'));
$qhouse = "SELECT * FROM house WHERE OwnerName='$userplayer'";
$houseres = mysql_query($qhouse) or die("Failed");
	while ($row= mysql_fetch_array($houseres)) 
	{
		$hid = $row["OwnerName"];
		$NameH = $row["Name"];
	}
$qOnline = "SELECT * FROM Online WHERE Nick='$userplayer'";
$Onlines = mysql_query($qOnline) or die("Failed");
	while ($row= mysql_fetch_array($Onlines)) 
	{
		$hids = $row["Nick"];
	}	
$qpriv = "SELECT * FROM PrivCars WHERE vOwner='$userplayer'";
$prives = mysql_query($qpriv) or die("Failed");
	while ($row= mysql_fetch_array($prives)) 
	{
		$privcar = $row["vModel"];
		$privkm2 = $row["vPrzebieg"];
		$privkm = $privkm2 / 1000;
		
	}	
$Level1 = "SELECT * FROM Admins WHERE Nick='$userplayer'";
$LVL = mysql_query($Level1) or die("Failed");
	while ($row= mysql_fetch_array($LVL)) 
	{
		$level = $row["Ranga"];
		
	}	
?>	
<!DOCTYPE html>
<html>

<head>

<script language="javascript">
function showHide(co)
{
 if(document.getElementById(co).style.display=="none")
  document.getElementById(co).style.display="inline";
 else

  document.getElementById(co).style.display="none";
  }
</script>



    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!--[if lt IE 9]>
    <script src='<? echo "$domainname"; ?>/assets/javascripts/html5shiv.js' type='text/javascript'>
	
	

	
	
	
	</script>
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
   <link href='<? echo "$domainname"; ?>/css/style.defaultt.css' media='all' rel='stylesheet' type='text/css' />   <!-- / flatty theme -->
	<link href='<? echo "$domainname"; ?>/css/style.default.css' media='all' rel='stylesheet' type='text/css' />   <!-- / flatty theme -->



	
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/light-theme.css' id='color-settings-body-color' media='all' rel='stylesheet' type='text/css' />
	<!-- / gallery -->

    <link href='<? echo "$domainname"; ?>/assets/stylesheets/plugins/lightbox/lightbox.css' id='color-settings-body-color' media='all' rel='stylesheet' type='text/css' />
    <!-- / demo -->
    <link href='<? echo "$domainname"; ?>/assets/stylesheets/demo.css' media='all' rel='stylesheet' type='text/css' />
	<link href='<? echo "$domainname"; ?>/css/ikon.css' media='all' rel='stylesheet' type='text/css' />

	

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class='fixed-header fixed-navigation contrast-fb'>




<header>
    <div class='navbar navbar-fixed-top'>
        <div class='navbar-inner' style="height: 100px;">
            <div class='container-fluid'>
                <a class='brand' href='index.php'>
                    
					<div class='visible-desktop'>
					<div id="logok">
					
					<img src="http://panel.awfesa.xaa.pl/images/play_gaming.png" width="200" height="50" style="margin-left: 13px;">	
					</div>
					

				<ul class="headmenu">
					<li class="odd">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <span class="count"><? echo "$PPOnline"; ?></span>
	                        <span class="headmenu-label">Graczy</span>
	                    </a>
	                    <ul class="dropdown-menu">
	                        <li class="nav-header">Lista graczy online</li>
<?
$inos3 = "SELECT * FROM Online ORDER BY id";
$inosn3 = mysql_query($inos3) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($inosn3))
		{
	
		$Nick = $row["Nick"];	
		$Play = $row["Play"];	



?>

	                        <li><a href="find.php?player=<? echo "$Nick"; ?>"><span class="icon-user"></span><strong> <? echo "$Nick"; ?></strong> <small class="muted"> - Gra <? echo "$Play"; ?></small></a></li>
	        

<?;}?>


	                        <li class="viewmore"><a href="online.php">Wiecej informacji</a></li>
	                    </ul>
	               </li>
	            </ul>    	


					</div>
					
					<div class='visible-phone visible-tablet'>
					<div id="logok">
					<img src="http://panel.awfesa.xaa.pl/images/play_gaming.png" width="100" height="50" >	
					</div>

					</div>
					
                </a>
				
				
				
				
			<div class='visible-desktop'>			
				<ul class="nav pull-right">
				<? if(isset($_COOKIE['sessionID'])) { ?>	
                    <li class="right">
						<div class="userloggedinfo">
						
							<img src="<? echo "$domainname/skins/Skin_$skin.png"; ?>" alt="" >
							<div class="userinfo">
								<h5><? echo "$userplayer"; ?> <small>- <? echo "$emailx"; ?></small></h5>
								<ul>
									<li><a href="profile.php">Twój profil</a></li>
									<li><a href="#" onClick="showHide('jeden');">Szukaj gracza</a> </li>
									<li><a href="/logout.php">Wyloguj</a></li>
								</ul>
							</div>
						</div>
					</li>
					<?}	
					
					if(!isset($_COOKIE['sessionID'])) {
					?>
					<li class="light only-icon">
                        <a href="<? echo "$domainname"; ?>/login.php">
                            <i class="icon-unlock-alt"></i> Zaloguj się
                        </a>
                    </li>
					<?
					}
					?>
				 </ul>
				 
				 


	<br><br>
	
	<div id="jeden" style="display:none">
	<form action="find.php" method="post">
	<div class="inputz bounceIn" style="margin-left: 815px; margin-top: -10px;" >
										<input class="inputwrapper animate2 bounceInLeft" type="text" name="currentpass" placeholder="Szukaj Gracza" style="background-color: rgba(0, 0, 0, 0.6);border-color: #0866C6;color: white;padding: 8px 10px;width: 220px;" autocomplete="off" data-items="4" data-provide="typeahead" data-source="[
<?
$names = mysql_query("SELECT * FROM `Players`");
	while ($row= mysql_fetch_array($names)) 
	{
	$nick = $row["Nick"];
	echo "&quot;$nick&quot;,";
	}
?>
&quot;&quot;]">
										
										</div>
	</form>
	</span>

</div>
			</div>	
		
      <div class='visible-phone visible-tablet'>          
                <ul class='nav pull-right'>
<? if(isset($_COOKIE['sessionID'])) { 
include_once("includes/ago.inc.php");
?>
                    <li class='dropdown dark user-menu'>
						<a class="dropdown-toggle" data-toggle="dropdown" style="height: 27px;" href="#">
							<img width="23" height="23" alt="<? echo "$skin"; ?>" src="<? echo "$domainname/40skin/$skin.png"; ?>">
                             <span class="user-name hidden-phone"><? echo "$userplayer"; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href=' <? echo "$domainname"; ?>/profile.php'>
                                    <i class='icon-user'></i>
                                    Profil
                                </a>
                            </li>
                            <li>
                                <a href='<? echo "$domainname"; ?>/account/'>
                                    <i class='icon-cog'></i>
                                    Ustawienia
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href='<? echo "$domainname"; ?>/logout.php'>
                                    <i class='icon-signout'></i>
                                    Wyloguj
                                </a>
                            </li>
                        </ul>
                    </li>
					<?
					}
					?>
					<?
					if(!isset($_COOKIE['sessionID'])) {
					?>
					<li class="light only-icon">
                        <a href="<? echo "$domainname"; ?>/login.php">
                            <i class="icon-unlock-alt"></i> Zaloguj się
                        </a>
                    </li>
					<?
					}
					?>
                </ul> </div>
                </form>
            </div>
        </div>
    </div>
</header>
<div id='wrapper'>
<div id="main-nav-bg" style="margin-top: 60px;">
<div id="copy" class="visible-phone">

</div>
<div id="copy" class="hidden-phone">


</div>
</div>
<nav class='main-nav-fixed' id='main-nav' style="top: 100px;">
<div class='navigation'>
<ul class='nav nav-stacked'>
<li class='active'>
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
<?
if(isset($_COOKIE['sessionID'])) {
?>
<li class=''>
    <a class='dropdown-collapse' href='#'>
        <i class='icon-shopping-cart'></i>
        <span>Sklep</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='<? echo "$domainname"; ?>/buyexp.php'>
                <i class='icon-caret-right'></i>
                <span>Kup Exp</span>
            </a>
        </li>
    </ul>
</li>
<?
}
?>
				<?php
				if ( $level >= 7 )
				{
				?>
<li class=''>
    <a class='dropdown-collapse' href='#'>
        <i class='icon-globe'></i>
        <span>Admin</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
        <li class=''>
            <a href='<? echo "$domainname"; ?>/admin/setarea'>
                <i class='icon-caret-right'></i>
                <span>Ustawienia graczy</span>
            </a>
        </li>
    </ul>
</li>
<?
}
?>

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
    <a href='<? echo "$domainname"; ?>/house.php'>
        <i class='icon-home'></i>
        <span>Domy</span>
    </a>
</li>
<li class=''>
    <a href='<? echo "$domainname"; ?>/race.php'>
        <i class='icon-truck'></i>
        <span>Wyścigi</span>
    </a>
</li>
<li class=''>
    <a href='<? echo "$domainname"; ?>/gangi.php'>
        <i class='icon-group'></i>
        <span>Gangi</span>
    </a>
</li>
<li class=''>
    <a href='<? echo "$domainname"; ?>/toplist.php'>
        <i class='icon-list'></i>
        <span>TOP</span>
    </a>
</li>
<li class=''>
    <a href='<? echo "$domainname"; ?>/public.php'>
        <i class='icon-ban-circle'></i>
        <span>Bany</span>
    </a>
</li>
<li class=''>
    <a class='dropdown-collapse' href='#'>
        <i class='icon-globe'></i>
        <span>Inne</span>
        <i class='icon-angle-down angle-down'></i>
    </a>
    <ul class='nav nav-stacked'>
		<li class=''>
            <a href='<? echo "$domainname"; ?>/vips.php'>
                <i class='icon-caret-right'></i>
                <span>Lista VIP'ów</span>
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
		<br><br>