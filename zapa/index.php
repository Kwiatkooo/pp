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
                                    <div class='comment-info'>
                                    <h4>#1. <u>Panel gracza po edycji</u></h4><h5>napisane przez <a href=>Kwiatkooo</a></h5>
									<p>Drodzy gracze ostatnio z nudów postanowiłem edytować panel gracza i teraz proszę was o przesyłanie informacji czy są jakieś błędy.</p>
									             </div><br>
									<div class='comment-info'>
                                    <h4>#2. <u>Dodano</u></h4><h5>napisane przez <a href=>Kwiatkooo</a></h5>
									<p>Dodano możliwość kupna exp poprzez sms'a i dodano więcej danych w statystykach serwera.</p>
									             </div>			 
												 
                                </li>

                            </ul>
                        </div>
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