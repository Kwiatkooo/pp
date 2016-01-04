<?php
include("includes/connect.inc.php");
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
$accounts = mysql_num_rows(mysql_query('SELECT * FROM Players'));
$houses = mysql_num_rows(mysql_query('SELECT * FROM house'));
$privcares = mysql_num_rows(mysql_query('SELECT * FROM PrivCars WHERE vID > 0'));



$figurki = mysql_num_rows(mysql_query('SELECT * FROM Bans'));
$inos = "SELECT * FROM Players ORDER BY Lastdate DESC LIMIT 5";

$Updateser = "SELECT * FROM UpdatedServer ORDER BY Lastdate DESC LIMIT 5";
$inosn = mysql_query($inos) or die(mysql_errno() . ": " . mysql_error() . "\n");

$inos2 = "SELECT * FROM Bans ORDER BY Date DESC LIMIT 5";
$inosn2 = mysql_query($inos2) or die(mysql_errno() . ": " . mysql_error() . "\n");

$inos3 = "SELECT * FROM PrivCars ORDER BY PrivPrice ASC LIMIT 5";
$inosn3 = mysql_query($inos3) or die(mysql_errno() . ": " . mysql_error() . "\n");
echo "
<head>
<title>Panel - WRT Team - $webname</title>
</head>
<br>
<!-- Desktop -->

<div class='visible-desktop'>
<div class='maincontent'>
            <div class='maincontentinner'>
                <div class='row-fluid'>
                    <div id='dashboard-left' class='span8'>
						                      
					  	<br>
						
                        <div class='widgetcontent nopadding'>
                            <ul class='commentlist'>
                                <li>
                                   
                                    
									             

				
								";
								mysql_query('SET NAMES utf8');
	$qban = "SELECT * FROM UpdatedServer ORDER BY Id DESC LIMIT 10";
	$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
		{
	
		$poilte = $poilte + 1;
		$Tytul = $row["Tytul"];
		$Tresc = $row["Tresc"];
		$Data = $row["Data"];				


		
		$zdanie=explode(" ",$visit);		
										
											
								echo "
									<div class='comment-info'>
								    	<h4>#$poilte. <u>$Tytul</u></h4>
								    	<h5>Data: $Data</h5>	
																	
									<p>$Tresc</p>
									</div><br>




								";				
																 
										}						 
								 
echo "												 
                                </li>

                            </ul>
                        </div>
                        <br>   
                    </div><!--span8-->    

			<div id='dashboard-right' class='span4'>                       
                        <h5 class='subtitle'></h5>                       
                        <div class='divider15'></div> 


					<ul class='nav nav-tabs' style='margin-bottom: 0px; background-color: #0866C6;'>
                            <li class='active' style='width: 50px;'><a style='border-right: 1px solid #448CD6;' data-toggle='tab' href='#Zmien_'><center><i class='icon-ban-circle'></center></i></a></li>
                            <li style='width: 50px; '><a style='border-right: 1px solid #448CD6;' data-toggle='tab' href='#Zmien_Email' ><center><i class='icon-user'></center></i></a></li>
                            <li style='width: 50px; '><a style='border-right: 1px solid #448CD6;' data-toggle='tab' href='#Zmien_Email2' ><center><i class='icon-truck'></center></i></a></li>
                        </ul>	

						
		<div class='tab-content'>				
<div class='tab-pane' id='Zmien_Email'>
							
							<div id='tabs-1' class='nopadding ui-tabs-panel ui-widget-content ui-corner-bottom' aria-labelledby='ui-id-1' role='tabpanel' aria-expanded='true' aria-hidden='false' style='display: block;'>
                                <h5 class='tabtitle'>Ostatnio zalogowani</h5>
                                <ul class='userlist'>						
				
				
				
";
								 
				



	while ($row= mysql_fetch_array($inosn))
		{
	
		$poilte = $poilte + 1;
		$skin = $row["Skin"];
		$visit = $row["Lastdate"];
		$nick = $row["Nick"];				


		
		$zdanie=explode(" ",$visit);		
echo "
<li>
	<div>
		<img width='23' height='23' alt='$skin' src='http://panel.awfesa.xaa.pl/40skin/$skin.png' class='pull-left'>
		<div class='uinfo' style='margin-left: 60px;'>
			<h5>$nick</h5>
			<span class='pos'>$zdanie[1]</span>
			<span>$zdanie[0]</span>
		</div>
	</div>
</li>




";				
								 
		}						 
								 
echo "								 
								 
								 
								 </ul></div>	</div>			


								 

<div class='tab-pane' id='Zmien_Email2'>
							
							<div id='tabs-1' class='nopadding ui-tabs-panel ui-widget-content ui-corner-bottom' aria-labelledby='ui-id-1' role='tabpanel' aria-expanded='true' aria-hidden='false' style='display: block;'>
                                <h5 class='tabtitle'>Najtańsze samochody do kupienia</h5>
                                <ul class='userlist'>						
				
				
				
";
								 
				



	while ($row= mysql_fetch_array($inosn3))
		{
	
		$poilte = $poilte + 1;
		$vModel = $row["vModel"];
		$vPrzebiegs = $row["vPrzebieg"];
		$nickpr = $row["vOwner"];				
		$PrivPrice = $row["PrivPrice"];

		
if($PrivPrice != 0)			
{	
echo "
<li>
	<div>
		<img width='23' height='23' alt='$skin' src='http://weedarr.wdfiles.com/local--files/veh/$vModel.png' class='pull-left'>
		<div class='uinfo' style='margin-left: 60px;'>
			<h5>$nickpr</h5>
			<span class='pos'>Przebieg:$vPrzebiegs</span>
			<span>Cena:$PrivPrice</span>
		</div>
	</div>
</li>




";				
}							 
		}						 
								 
echo "								 
								 
								 
								 </ul></div>	</div>		

								 
								 
<div class='tab-pane active' id='Zmien_'>
							
						<div id='tabs-1' class='nopadding ui-tabs-panel ui-widget-content ui-corner-bottom' aria-labelledby='ui-id-1' role='tabpanel' aria-expanded='true' aria-hidden='false' style='display: block;'>
                                <h5 class='tabtitle'>Ostatnie bany</h5>
                                <ul class='userlist'>
															

";
								 
				



	while ($row= mysql_fetch_array($inosn2))

		{


		$poilte = $poilte + 1;
		
		$visit2 = $row["date"];
		$nick2 = $row["nick"];				
		$admis2 = $row["admin"];
		$powod2 = $row["reason"];		
		
echo "
<li>
	<div>
		<img width='23' height='23' alt='ban' src='http://ecigone.com/wp-content/uploads/2012/10/European-Union-E-Cigarette-Ban.png' class='pull-left' style='margin-top: 10px;'>
		<div class='uinfo' style='margin-left: 60px;'>
			<h5>$nick2</h5>
			<span class='pos'>$visit2</span>
			<span>$admis2</span>
			<span style='color:red'>$powod2</span>
		</div>
	</div>
</li>




";				
								 
		}						 
								 
echo "								 
								 
								 
								 </ul></div>	</div>		



                        <div class='divider15'></div>             


						
                    </div>					
					
					
					
				<br>
				<br>

                <div class='footer'>
                    <div class='footer-left'>
                        
                    </div>
					
					
					
                    <div class='footer-right'>
                      </div>
                </div><!--footer-->  
            </div><!--maincontentinner-->
        </div>
	 </div>	
</div>

 

	
<!-- Phone -->
<div class='visible-phone'>

<div class='maincontent'>
            <div class='maincontentinner'>
                <div class='row-fluid'>
                    <div id='dashboard-left' class='span11'>
						                       
					  	<br>
						
                        <div class='widgetcontent nopadding'>
                            <ul class='commentlist'>
                                <li>
									<center>
                                    <div class='comment-info-phone'>
                                    <h4>#1. <u>Panel gracza po edycji</u></h4><h5>napisane przez <a href=>Kwiatkooo</a></h5>
									<p>Drodzy gracze ostatnio z nudów postanowiłem edytować panel gracza i teraz proszę was o przesyłanie informacji czy są jakieś błędy.</p>
									             </div><br>
									<div class='comment-info-phone'>
                                    <h4>#2. <u>Dodano</u></h4><h5>napisane przez <a href=>Kwiatkooo</a></h5>
									<p>Dodano możliwość kupna exp poprzez sms'a i dodano więcej danych w statystykach serwera.</p>
									             </div>			 
									</center>			 
                                </li>

                            </ul</div></div><!--span8-->         
				
							<center>
					<div class='span15-phone1'>
					<div class='box-content box-statistic green-background'>
                    <h3 class='title text-success'>$accounts</h3>
                    <small>Konta</small>
                    <div class='text-success icon-user align-right'></div>
					</div>
					</div>	
					</center>
					<center>
					<div class='span15-phone1'>
					<div class='box-content box-statistic blue-background'>
                    <h3 class='title text-success'>$houses</h3>
                    <small>Domy</small>
                    <div class='text-success icon-home align-right'></div>
					</div>
					</div>
					</center>
					<center>
					<div class='span15-phone1'>
					<div class='box-content box-statistic red-background'>
                    <h3 class='title text-success'>$privcares</h3>
                    <small>Prywatne pojazdy</small>
                    <div class='text-success icon-car align-right'></div>	
					</div>
					</div>					
					</center>
					
					
					<center>
					<div class='span15-phone1'>
					<div class='box-content box-statistic dark-orange-background'>
                    <h3 class='title text-success'>$figurki / 50</h3>
                    <small>Figurki</small>
                    <div class='text-success icon-play align-right'></div>
					</div>
					</div>					
					</center>					
							
                        
                        <br>   
                    
				<br>

                <div class='footer'>
                    <div class='footer-left'>
                        
                    </div>
					
					
					
                    <div class='footer-right'>
                      </div>
                </div><!--footer-->  
            </div><!--maincontentinner-->
        </div>
	 </div>	

</div>
</div>
<!-- Tablet -->
<div class='visible-tablet'>
<center>





<div class='maincontent'>
            <div class='maincontentinner'>
                <div class='row-fluid'>
                    <div id='dashboard-left' class='span13'>
						                        
					  	<br>
						
                        <div class='widgetcontent nopadding'>
                            <ul class='commentlist'>
                                <li>
                                    <div class='comment-info-tablet'>
                                    <h4>#1. <u>Panel gracza po edycji</u></h4><h5>napisane przez <a href=>Kwiatkooo</a></h5>
									<p>Drodzy gracze ostatnio z nudów postanowiłem edytować panel gracza i teraz proszę was o przesyłanie informacji czy są jakieś błędy.</p>
									             </div><br>
									<div class='comment-info-tablet'>
                                    <h4>#2. <u>Dodano</u></h4><h5>napisane przez <a href=>Kwiatkooo</a></h5>
									<p>Dodano możliwość kupna exp poprzez sms'a i dodano więcej danych w statystykach serwera.</p>
									             </div>			 
												 
                                </li>

                            </ul> </div></div><!--span8-->   
                        <center>
						<div class='span15-phone'>
					<div class='box-content box-statistic green-background'>
                    <h3 class='title text-success'>$accounts</h3>
                    <small>Konta</small>
                    <div class='text-success icon-user align-right'></div>
					</div>
					</div>
				 </center>	 <center>
					
					<div class='span15-phone'>
					<div class='box-content box-statistic blue-background'>
                    <h3 class='title text-success'>$houses</h3>
                    <small>Domy</small>
                    <div class='text-success icon-home align-right'></div>
</div>
</div>
		 </center> <center>

					<div class='span15-phone'>
					<div class='box-content box-statistic red-background'>
                    <h3 class='title text-success'>$privcares</h3>
                    <small>Prywatne pojazdy</small>
                    <div class='text-success icon-play align-right'></div>
</div>
</div>
 </center> <center>
		<div class='span15-phone'>
<div class='box-content box-statistic dark-orange-background'>
                    <h3 class='title text-success'>$figurki / 50</h3>
                    <small>Figurki</small>
                    <div class='text-success icon-play align-right'></div>
</div>
</div>
	 </center>				</div>
                        <br>   
                    </div><!--span8-->         
				<br>
				<br>

                <div class='footer'>
                    <div class='footer-left'>
                        
                    </div>
					
					
					
                    <div class='footer-right'>
                      </div>
                </div><!--footer-->  
            </div><!--maincontentinner-->
        </div>
	 </div>	

















</center>
</div>
";
			}
include("footer.php");
?>