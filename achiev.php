<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");
if(!isset($_COOKIE['sessionID'])) 
if(isset($_POST['playerstats'])) {
$seenick = mysql_real_escape_string($_POST['playerstats']);?>
<meta http-equiv="refresh" content="0;URL='<? echo "$domainname"; ?>/index.php?player=<? echo "$userplayer"; ?>'">
<?
}
if(isset($_GET['player'])) {
include('header.php');
	$theplayer = mysql_real_escape_string($_GET['player']);
echo "<head>
<title>$theplayer - $webname</title>
</head>";
	$query = "SELECT * FROM Players WHERE Nick='$userplayer'";
	$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");
	$playerexists = mysql_num_rows($result);
if($playerexists == "0") {
?>
<meta http-equiv="refresh" content="0;URL='index.php?noexist'">
<?
}
else
{
	while ($row= mysql_fetch_array($result)) 
	{
		$name = $row["Nick"];
		
		$bank = $row["bank"];
		$level = $row["ADlevel"];
		$vip = $row["vip"];
		$matma = $row["mathematics"];
		$kody = $row["reaction"];
		$privcar = $row["privcar"];
		$visit = $row["visit"];
		$cash = $row["money"];
		$kills = $row["Kills"];
		$deaths = $row["deads"];
		$online = $row["timeplay"];
		$score = $row["score"];
		$registerdate = $row["date"];
		$laston = $row["lastdate"];
		$rpg = $row["a_rpg"];
		$oneshoot = $row["a_oneshoot"];
		$minigun = $row["a_minigun"];
		$jetpack = $row["a_jetpack"];
		$snajper = $row["a_snajper"];
		$figurki = $row["figurki"];
		$winpvp = $row["winpvp"];
		$lospvp = $row["lospvp"];
		$won_dd = $row["won_dd"];
		$won_ch = $row["won_ch"];
		$won_tr = $row["won_tr"];
		$won_hy = $row["won_hy"];
		$won_ss = $row["won_ss"];
		$won_wg = $row["won_wg"];
		$czas = $row['PanCzas'];
		
		
	
	}
$qhouse = "SELECT * FROM house WHERE owner='$userplayer'";
$houseres = mysql_query($qhouse) or die("Failed");
	while ($row= mysql_fetch_array($houseres)) 
	{
		$hid = $row["id"];
	}



	
				echo "
<body>
<div class='content well well-small'>
<div class='container-fluid'>
 <div class='row-fluid'>
 <div id='searchbox' style='visibility: hidden'>
<center>
<form action='index.php' method='post'>
<div class='control-group'>
  <div class='controls'>
    <div class='input-prepend'>
      <span class='add-on'><i class='icon-user'></i></span>
      <input class='span6' id='inputIcon' placeholder='Username' name='playerstats' type='text'>
    </div>
  </div>
</form>
</div>
</center>
</div>
					<center><p><font color='red'><b>$name [User ID: $userid].</b></font></center>
</div>
  <div class='row-fluid'>
    <div class='span7'>
		<div class='well news' style='width: 85%;'>
		
";

echo "<center>$theplayer's Statistics:</center><br>";?>
				<?php
				if ($level=='0') {
					echo "<b><font color='#FF9900'>Admin</font>: <img src='$domainname/img/0.gif'><br>";
					}
				if ($level>'5') {
					echo "<b><font color='#FF9900'>Admin</font>: <img src='$domainname/img/1.gif'> - Level $level<br>";
					}
				?>
				<?php
				if ( $vip == "0" ) {
					echo "<font color='#FF9900'><b>VIP</font>:</b> <img src='$domainname/img/0.gif'><br>";
					}
				if ( $vip>"99" ) {
					echo "<font color='#FF9900'><b>VIP</font>:</b> <img src='$domainname/img/1.gif'> - <font color ='#33AA33'>Level $vip</font><br>";
					}
				?>
				<?php echo "<font color='#FF9900'><b>Zabójstw</font>: $kills</b><br><font color='#FF9900'><b>Śmierci</font>: $deaths</b><br><font color='#FF9900'><b>KDR</font>: $kdr[0]</b><br><font color='#FF9900'><b>Kill streak</font>: $bestkill</b><br>";?>
				<?php echo "<font color='#FF9900'><b>Czas gry</font>: $online</b><br>";?>
				<?php echo "
<font color='#FF9900'><b>Kasa</font>: <font color = '#33AA33'>$$cash</font></b><br>
<font color='#FF9900'><b>EXP</font>: $score</b><br>
<br><br><br>"; ?>
				<? echo "</div>
</div>
	<div class='span5'>
		<div class='well news' style='width: 90%;'>
<div align='right' id='left' style='width: 14%;'>";
echo "<img src='$domainname/skins/Skin_$skin.png'>";
echo "</div>
<div id='right' style='width: 83%;'>";
echo "
<b>
";
				$qcar = "SELECT * FROM privcar WHERE Nick ='$userplayer'";
				$qresult = mysql_query($qcar) or die("$qcar". mysql_errno() . ": " . mysql_error() . "\n");
				if($privcar == 0) {
					echo "<font color = '#FF9900'><b>Gracz nie ma prywatnego pojazdu.<br>";
				}
				if($privcar > 1) {
				{
					$carid = $privcar;
				}
				}
				if($hashouse == "no")
				echo "<font color='red'><b>House: <img src='$domainname/img/0.gif'></font></b><br>";
				if($hashouse == "yes")
				echo "<font color='#FF9900'><b>House: <img src='$domainname/img/1.gif'</font></b><br>";
echo "
Registered on: $registerdate<br>
Last login: on $laston<br>
</div>
		</div>
    </div>
	</div>
</div>
</div>
</body>
				</html>";
}
}
else
{
//ASDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDd
	$ipaddress = $_SERVER["REMOTE_ADDR"];
	$currenttime = time();
	$qban = "SELECT * FROM Bans WHERE nick='$userplayer'";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["nick"];
		$admin = $row["admin"];
		$reason = $row["reason"];
		$bandate = $row["date"];
		$bannedip = $row["ip"];
		}
if(mysql_num_rows($resultx)>"0") {
include('header.php');
$age = time() - strtotime("$bandate $batime");
$minutes = $age/60;
$mins = explode(".", $minutes);
$hours = $minutes/60;
$hrs = explode(".", $hours);
$days = $hours/24;
$dayz = explode(".", $days);
$weeks = $days/7;
$weekz = explode(".", $weeks);
$months = $days/30;
$monthz = explode(".", $months);
$years = $months/12;
$yearz = explode(".", $years);
$ago = "";
if($age<60) {
$ago = "$age sekund";
}
if($age>59 && $age<3600) {
$ago = "$mins[0] minut";
}
if($age>3600 && $age<86400) {
$ago = "$hrs[0] godzin";
}
if($age>86400 && $age<604800) {
$ago = "$dayz[0] dni";
}
if($age>604800 && $age<2592000) {
$age = $age/24;
$ago = "$weekz[0] tygodni";
}
if($age>2592000 && $age<31104000) {
$age = $age/24;
$ago = "$monthz[0] miesięcy";
}
if($age>31104000) {
$age = $age/12;
$ago = "$yearz[0] lat";
}
$banexpire = round(($bandays - time()) / 86400);
			echo "
<head>
<title>Panel Gracza - Zostałeś zbanowany</title>
  <style type='text/css'>
    /* set the height so $(window).height() is accurate
    html, body {
      height: 100%;
    }
 
    /* prevent scrolling while during modal */
    body.modal-open {
      overflow: hidden;
    }
 
    /* optional: override bootstrap image gallery */
    .modal-gallery {
      margin-top: 0 !important;
    }
    @media (max-width: 767px) {
      .modal-gallery {
        margin-left: 0 !important;
      }
      .modal-fullscreen {
        left: 0 !important;
        right: 0 !important;
      }
    }
  </style>
</head>
<body>
<legend><center><h4>Zostałeś zbanowany</h4></center></legend>
<center><b><br>Ban Info:<br>Nick: <font color = '#33AA33'>$userplayer</font><br>
Zbanowany dnia: <font color = '#33AA33'>$bandate</font><br>
Admin: <font color ='#FF9900'>$admin</font><br>
Powód: <font color = '#33AA33'>$reason</font>.<br>
Zbanowane IP: <font color = '#33AA33'>$bannedip</font>.<br>
"; ?><?"</strong></center>
</b>
";
		}
			else
			{
include('header.php');
?>
<head>
<title>Twój profil - <? echo "$webname"; ?></title>
</head>
<br>
<div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span8">
												<h4 class="widgettitle">Profil > <a href="#statystyki"><? echo "$name"; ?></a> > Osiągniecia</h4>
												
									
    </div>
                        <div class="widgetcontent nopadding">
                            <ul class="commentlist">
                                <li style="text-align:center;">
																</h2>
	 

								 								 <table class="table table-bordered table-invoice">
								 
								 
						<tbody><tr>
                                <td class="width30"></td>
                                <td class="width70">
								<span>
									
								</td>
                            </tr> 	 
							
							
							<tr>
                                <td class="width30">Pierwsze wejście</td>
                                <td class="width70">
								
									<?php
				if ($visit<='0') {
					echo "<center><span class='label label-head'>Nie wykonano</span></center>";
					}
				if ($visit>='2') {
					echo "<center><span class='label label-green'>Wykonano</span></center>";
					}			
				?>
								

								</td>
                            </tr> 
								
                            <tr>
                                <td class="width30">Setne wejście</td>
                                <td class="width70">
									<?php
								if ($visit<='99') {
									echo "<center><span class='label label-head'>Nie wykonano</span></center>";
									}
								if ($visit>='100') {
									echo "<center><span class='label label-green'>Wykonano</span></center>";
									}			
								?>
								</td>
                            </tr> 
							<tr>
                                <td class="width30">Pierwszy prywatny pojazd</td>
                                <td class="width70">
									<?php
								if ($FirstCar<='0') {
									echo "<center><span class='label label-head'>Nie wykonano</span></center>";
									}
								if ($FirstCar>='1') {
									echo "<center><span class='label label-green'>Wykonano</span></center>";
									}			
								?>
								</td>
                            </tr> 							
							<tr>
                                <td class="width30">Pierwszy prywatny dom</td>
                                <td class="width70">
									<?php
								if ($FirstHouse<='0') {
									echo "<center><span class='label label-head'>Nie wykonano</span></center>";
									}
								if ($FirstHouse>='1') {
									echo "<center><span class='label label-green'>Wykonano</span></center>";
									}			
								?>
								</td>
                            </tr> 
							<tr>
                                <td class="width30">Pierwsza śmierć</td>
                                <td class="width70">
									<?php
								if ($deaths<='0') {
									echo "<center><span class='label label-head'>Nie wykonano</span></center>";
									}
								if ($deaths>='1') {
									echo "<center><span class='label label-green'>Wykonano</span></center>";
									}			
								?>
								</td>
                            </tr> 
							<tr>
                                <td class="width30">Pierwsze zabicie</td>
                                <td class="width70">
									<?php
								if ($kills <='0') {
									echo "<center><span class='label label-head'>Nie wykonano</span></center>";
									}
								if ($kills >='1') {
									echo "<center><span class='label label-green'>Wykonano</span></center>";
									}			
								?>
								</td>
                            </tr>
							</tbody></table>
							
			
							
							
								 
														
							 
							</tbody></table>	
							
			
							
								 
								
			
								 </li></ul></div>
								 								 
                            
                        
                        						</div><!--span8-->                  
                        <div id="dashboard-left" class="span4">
						<div class="leftmenu">						
                        <div class="leftmenu">        
						<ul class="nav nav-tabs nav-stacked">
                		<li style="background-color: rgba(8, 102, 198, 1); border-bottom: 1px solid #4d4d4d;"><a href="profile.php"><span class="iconfa-laptop"></span>Strona Główna</a></li>
						 <li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a href="achiev.php"><span class="iconfa-laptop"></span>Osiągniecia</a></li>
						<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a href="password.php"><span class="iconfa-laptop"></span>Zmień hasło</a></li>	
						<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a href="email.php"><span class="iconfa-laptop"></span>Zmień email</a></li>					 
                        </ul>
						</div>  					
                        <div class="divider15"></div>             
                        <div class="widgetbox">                        
                        
                        

						<?

}
?>
						                  
                        
                        <div class="divider15"></div>             
                                         
						</div><!--span4-->
						</div><!--leftmenu--> 
						</div><!--row-fluid-->  
						 
                        						
                    <div class="footer">
                    <div class="footer-left">
                        <span>© 2013 - 2015. FullGaming.pl. All Rights Reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed by: <a>ThemePixels</a><br>Code: <a href="gg:31326403">KaDe</a> &amp; <a href="gg:42120356">Virelox</a> </span>
                    </div>
                </div>
            </div>
        </div>                
                        						
												
	
<div class='profile-user-info visible-phone'>
																<div class='profile-info-row'>
																	<div class='profile-info-name'> Admin </div>

																	<div class='profile-info-value'>
																		<span>				<?php
				if ($level=='0') {
					echo "<img src='$domainname/img/0.gif'>";
					}
				if ($level=='1') {
					echo "<img src='$domainname/img/1.gif'> - Moderator";
					}
				if ($level=='2') {
					echo "<img src='$domainname/img/1.gif'> - Junior Administrator";
					}
				if ($level=='3') {
					echo "<img src='$domainname/img/1.gif'> - Administrator";
					}
				if ($level=='4') {
					echo "<img src='$domainname/img/1.gif'> - Elite Administrator";
					}
				if ($level=='5') {
					echo "<img src='$domainname/img/1.gif'> - Head Administrator";
					}	
					if ($level=='99') {
					echo "<img src='$domainname/img/0.gif'>";
					}				
				?></span>
																	</div>
																</div>

																<div class='profile-info-row'>
																	<div class='profile-info-name'> VIP </div>

																	<div class='profile-info-value'>
																	<span>				<?php
				if ($level=='0') {
					echo "<img src='$domainname/img/0.gif'>";
					}	
				if ($level=='99') {
					echo "<img src='$domainname/img/1.gif'> - VIP";
					}
				if ($level=='1') {
					echo "<img src='$domainname/img/0.gif'>";
					}
				if ($level=='2') {
					echo "<img src='$domainname/img/0.gif'>";
					}
				if ($level=='3') {
					echo "<img src='$domainname/img/0.gif'>";
					}
				if ($level=='4') {
					echo "<img src='$domainname/img/0.gif'>";
					}
				if ($level=='5') {
					echo "<img src='$domainname/img/0.gif'>";
					}
				?></span>
																	</div>
																</div>

																<div class='profile-info-row'>
																	<div class='profile-info-name'> Zabójstw </div>

																	<div class='profile-info-value'>
																	<i class="icon-screenshot"></i>
																		<span><? echo "$kills"; ?></span>
																	</div>
																</div>

																<div class='profile-info-row'>
																	<div class='profile-info-name'> Śmierci </div>
																	<div class='profile-info-value'>
																	<i class="icon-remove-circle"></i>
																		<span><? echo "$deaths"; ?></span>
																	</div>
																</div>
																<div class='profile-info-row'>
																	<div class='profile-info-name'> Czas gry </div>

																	<div class='profile-info-value'>
																	<i class="icon-time"></i>
																		<span><? echo "$czas"; ?></span>
																	</div>
																</div>
																<div class='profile-info-row'>
																	<div class='profile-info-name'> Kasa </div>

																	<div class='profile-info-value'>
																	<i class="icon-money"></i>
																		<span><? echo "<font color='green'>$$cash</font>"; ?></span>
																	</div>
																</div>
																<div class='profile-info-row'>
																	<div class='profile-info-name'> EXP </div>

																	<div class='profile-info-value'>
																	<i class="icon-certificate"></i>
																		<span><? echo "$score"; ?></span>
																	</div>
																</div>
																<div class='profile-info-row'>
																	<div class='profile-info-name'> Przepisane kody: </div>

																	<div class='profile-info-value'>
																	
																		<span><? echo "$kody"; ?></span>
																	</div>
																</div>
																<div class='profile-info-row'>
																	<div class='profile-info-name'> Quiz: </div>

																	<div class='profile-info-value'>
																	
																		<span><? echo "$matma"; ?></span>
																	</div>
																</div>
</div>
</div>
<div class="span4 box box-transparent box-nomargin">


    </div>

<div class="span3 box box-transparent box-nomargin">
       
        
<?

?>
        
    </div>
	<div class="span4 box box-transparent box-nomargin">


    </div>
	
<? echo "
</body>
				</html>";
			}
		
if(!isset($_COOKIE['sessionID'])) {
?>
<meta http-equiv="refresh" content="0;URL='login.php'">
<?
	}
	include("footer.php");
?>