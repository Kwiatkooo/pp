<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");
if(isset($_POST['findplayer'])) {
$seenick = mysql_real_escape_string($_POST['findplayer']);?>
<?
header("Location: $domainname/find.php?player=$seenick");
}
if(isset($_GET['player'])) {
include('header.php');
	$theplayer = mysql_real_escape_string($_GET['player']);
echo "<head>
<title>$theplayer - $webname</title>
</head>";
	$query = "SELECT * FROM Players	WHERE Nick='$theplayer'";
	$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");
	$playerexists = mysql_num_rows($result);
if($playerexists == "0") {
?>
<meta http-equiv="refresh" content="0;URL='find.php?noexist'">
<br><br><center>
<div class='alert alert-error'><i class='icon-info-sign'></i>Nie ma takiego gracza!</div></center>
<?
}
else
{
	while ($row= mysql_fetch_array($result)) 
	{
		$userid = $row["id"];
		$name = $row["Nick"];
		$emailx = $row["email"];
		$matma = $row["QuizWin"];
		$kody = $row["KodWin"];
		$skinp = $row["Skin"];
		$ongame = $row['Online'];
		$bank = $row["BankMoney"];
	
		
		$visit = $row["Visits"];
		
		$kills = $row["Kills"];
		$deaths = $row["Deaths"];
		$czasp = $row["PlayingTime"];
		
		$Hoursp = $czasp/3600;
		$cenap=number_format($Hoursp, 0, ',', '');
		$Godzinp = $cenap - 0;
		$Minutesp = ($czasp%3600)/60;
		$Minutp=number_format($Minutesp, 0, ',', '');
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
		$Szafirp = $row["Szafir"];
		$czas = $row['PanCzas'];
		
		$quiz = $row['QuizWin'];
		$paczki = $row['PaczWin'];
		$widomo = $row['Messages'];
		$kodwin = $row['KodWin'];
		$idplay = $row['id'];
		$UserId = $row['UserId'];
	}
$qOnline = "SELECT * FROM Online WHERE Nick='$userplayer'";
$Onlines = mysql_query($qOnline) or die("Failed");
	while ($row= mysql_fetch_array($Onlines)) 
	{
		$hids = $row["Nick"];
	}		
$qhouse = "SELECT * FROM house WHERE OwnerName='$theplayer'";
$houseres = mysql_query($qhouse) or die("Failed H");
	while ($row= mysql_fetch_array($houseres)) 
	{
		$hid = $row["OwnerName"];
	}
$qpriv = "SELECT * FROM PrivCars WHERE vOwner='$theplayer'";
$prives = mysql_query($qpriv) or die("Failed P");
	while ($row= mysql_fetch_array($prives)) 
	{
		$theprivcar = $row["vModel"];
		$theprivkm = $row["vPrzebieg"];
		
	}
$Level1 = "SELECT * FROM Admins WHERE Nick='$theplayer'";
$LVL = mysql_query($Level1) or die("Failed R");
	while ($row= mysql_fetch_array($LVL)) 
	{
		$thelevel = $row["Ranga"];
		
	}	
	?>
<head>
<title>Twój profil - <? echo "$webname"; ?></title>
</head>
<br>
<div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span8">
												<h4 class="widgettitle"><a href='http://panel.wrt.xaa.pl/find.php?player=$Wlasciciel'>Szukaj gracza</a>  <i class="icon-angle-right angle-down"></i>  <? echo "$name"; ?></h4>
                        <div class="widgetcontent nopadding">
                            <ul class="commentlist">
                                <li style="text-align:center;">
																<img alt="<? echo "$skin"; ?>" src="<? echo "$domainname/bskin/$skinp.png"; ?>"><br><br><h2><? echo "$name" ?><br></h2>
																<table class="table table-bordered table-invoice">
								 
								 
						<tbody><tr>
                                <td class="width30">Online:</td>
                                <td class="width70">
								<span>
									<?php
							if(mysql_num_rows($Onlines) == 0) 
							{
								echo "<span style='color:red'>OFFLINE</span>";
							}
							else
							{
								echo "<span style='color:lime'>ONLINE</span>";
							}
							
							?>
								</td>
                            </tr>  
							
							
							<tr>
                                <td class="width30">Ranga:</td>
                                <td class="width70">
								
									<?php
									if(mysql_num_rows($LVL) == 0) 
									{
										echo "Gracz";
									}
									else	
									{	
										
										if ($level=='1') 
										{
											echo "Moderator";
										}
										if ($level=='2') 
										{
											echo "Junior Administrator";
										}
										if ($level=='3') 
										{
											echo "Administrator";
										}
										if ($level=='4') 
										{
											echo "Elite Administrator";
										}
										if ($level=='5') 
										{
											echo "Head Administrator";
										}
										if ($level=='6') 
										{
											echo "Head Administrator";
										}
										if ($level=='7') 
										{
											echo "Head Administrator";
										}				
									}						
									?>
								
								
								
								
								
								
								
								
								
								</td>
                            </tr> 
								
                            <tr>
                                <td class="width30">Przegranych godzin:</td>
                                <td class="width70"><? echo "$Godzinp Godzin $Minutp Minut"; ?></td>
                            </tr>
							
							<tr>
                                <<td class="width30">Szafirów:</td>
                                <td class="width70"><? echo "$Szafirp"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">Odwiedzin na serwerze:</td>
                                <td class="width70"><? echo "$visit"; ?></td>
                            </tr>
							
							
							<tr>
                                <td class="width30">EXP:</td>
                                <td class="width70"><? echo "$score"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">Kasy w banku:</td>
                                <td class="width70"><? echo "$bank"; ?>$</td>
                            </tr>
							
							<tr>
                                <td class="width30">Punkty drift:</td>
                                <td class="width70"><? echo "$registerdate"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">ID:</td>
                                <td class="width70"><? echo "$UserId"; ?>  /  <? echo "$idplay"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">Zabójstw:</td>
                                <td class="width70"><? echo "$kills"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">Śmierci:</td>
                                <td class="width70"><? echo "$deaths"; ?></td>
                            </tr>
							

							
							<tr>
                                <td class="width30">Zebranych paczek:</td>
                                <td class="width70"><? echo "$paczki"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">Przepisanych kodów:</td>
                                <td class="width70"><? echo "$kodwin"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">Wygrane quizy:</td>
                                <td class="width70"><? echo "$quiz"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">Napisane wiadomości:</td>
                                <td class="width70"><? echo "$widomo"; ?></td>
                            </tr>
							</tbody></table>
							
			
							
							<h3>Areny</h3><br><table class="table table-bordered table-invoice">
								 
                            <tbody><tr>
                                <td class="width30">Onede:</td>
                                <td class="width70"><? echo "$won_dd"; ?></td>
                            </tr>
							
							 <tr>
                                <td class="width30">WAR:</td>
                                <td class="width70"><? echo "$won_ch"; ?></td>
                            </tr>
							
							 <tr>
                                <td class="width30">SH:</td>
                                <td class="width70"><? echo "$won_ss"; ?></td>
                            </tr>
							
							 <tr>
                                <td class="width30">RPG:</td>
                                <td class="width70"><? echo "$won_wg"; ?></td>
                            </tr>
							
							 <tr>
                                <td class="width30">Minigun:</td>
                                <td class="width70"><? echo "$won_tr"; ?></td>
                            </tr>
							
							 <tr>
                                <td class="width30">DM:</td>
                                <td class="width70"><? echo "$won_dm"; ?></td>
                            </tr>
							
							<tr>
                                <td class="width30">Sniper:</td>
                                <td class="width70"><? echo "$won_hy"; ?></td>
                            </tr>
							</tbody></table>
								 
														
							 
							</tbody></table>	
							
			
							
								 
								
			
								 </li></ul></div>
								 								 
                            
                        
                        						</div><!--span8-->                  
                        <div id="dashboard-left" class="span4">
						<div class="leftmenu">						
                        <div class="divider15"></div>             
                        <div class="widgetbox">                        
                        <h4 class="widgettitle">Dodatkowe informacje</h4>
                        <div class="widgetcontent"><center>
						<?
        if($theprivcar == 0) {
            echo "<img src='$domainname/images/noncar.png' /><br>Gracz nie ma prywatnego pojazdu.";
        }
        if($theprivcar > 1) {
		{
			$thecarid = $theprivcar;
		}
echo "<img src='http://weedarr.wdfiles.com/local--files/veh/$thecarid.png' /><br><p><b>(ID:$thecarid)</b> Przebieg:$theprivkm km</p>";
        }
?><br><br>
						<?
if(mysql_num_rows($houseres) == 0) {
echo "<img src='$domainname/images/home2.png' /><br>Gracz nie jest w posiadaniu żadnego domu.";
}
else
{
echo "<img src='$domainname/images/home1.png' /><br>Gracz ma dom!";
}

?>
						</center></div><!--span4-->                     
                        <br>   
                        <div class="divider15"></div>             
                                         
						</div><!--span4-->
						</div><!--leftmenu--> 
						</div><!--row-fluid-->  
						 
                        						
                    <div class="footer">
                   
                    
                </div>
            </div>
        </div>       
<div class="span4 box box-transparent box-nomargin">
        


	
	<div class="span4 box box-transparent box-nomargin">
       <div class="box-header">

        
<?
echo "";
        }
?>
       
    </div>
<? echo "
</body>
				</html>";
}
else
{
include("header.php");
?>
            <form action="find.php" method="post">
<br><center>
<div class="visible-phone visible-tablet visible-desktop">
<b>Wyszukaj gracza</b>
<div class='control-group'>
  <div class='controls'>
    <div class='input-prepend'>
      <span class='add-on'><i class='icon-user'></i></span>
<input type='text' name='findplayer' id='inputIcon' autocomplete="off" class="form-control span10" data-items="4" data-provide="typeahead" data-source="[
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
  </div>
</div>
                <button class="btn" name="button" type="submit"><i class="icon-search"></i> Szukaj</button>
            </form>

</div>
</center>
<?
}
	include("footer.php");
?>