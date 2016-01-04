<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");
if(isset($_POST['findplayer'])) {
$seenick = mysql_real_escape_string($_POST['findplayer']);?>
<?
header("Location: $domainname/salon.php?sell=$seenick");
}
if(isset($_GET['sell'])) {
include('header.php');
	$theplayer = mysql_real_escape_string($_GET['sell']);
echo "<head>
<title>$theplayer - $webname</title>
</head>";
	$query = "SELECT * FROM PrivCars WHERE vID='$theplayer'";
	$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");
	$playerexists = mysql_num_rows($result);
if($playerexists == "0") {
?>
<meta http-equiv="refresh" content="0;URL='salon.php?noexist'">
<br><br><center>
<div class='alert alert-error'><i class='icon-info-sign'></i>Nie ma takiego gracza!</div></center>
<?
}
else
{
	while ($row= mysql_fetch_array($result)) 
	{
		$PrivId = $row["vID"];
		$PrivWlas = $row["vOwner"];
		$PrivCena = $row["PrivPrice"];
		$PrivPrzeieg = $row["vPrzebieg"];
		$PrivModel = $row["vModel"];
		$PrivPrzeieg = $PrivPrzeieg / 1000.0;
		$PrivCena = $PrivCena / 1000.0;
	}

	?>
<head>
<title>Twój profil - <? echo "$webname"; ?></title>
</head>
<br>


	   
	 <div id="dashboard-left" class="span8">
						                      
					  	<br>
						
                        <div class="widgetcontent nopadding">
                            <ul class="commentlist">
                                <li>
                                    
									<div class="comment-info">
                                    <p>UID:  <span style="color:#00BBFF"><? echo "$PrivId"; ?></span></p>
									<p>Nick właściciela:  <span style="color:#00BBFF"><? echo "$PrivWlas"; ?></span></p>
									<p>Model:  <span style="color:#00BBFF"><? echo "$PrivModel"; ?></span></p>
									<p>Cena:  <span style="color:#00BBFF"><? echo "$PrivCena"; ?></span><span style="color:#00A700">$</span></p>
									<p>Przebieg:  <span style="color:#00BBFF"><? echo "$PrivPrzeieg"; ?></span></p>
									
									 </div>			 
												 
                                </li>

                            </ul>
                        </div>
                        <br>   
                    </div>  <img width="175" height="23" alt="299" src="http://weedarr.wdfiles.com/local--files/veh/<? echo "$PrivModel"; ?>.png" style="margin-top: 65px; margin-left: -224px;">
	   
	   
        
<?
echo "";
        }
?>
       
    
<? echo "
</body>
				</html>";
}
else
{
include("header.php");
?>
            <form action="salon.php" method="post">
<br><center>
<div class="visible-phone visible-tablet visible-desktop">


<div id="dashboard-left">
						                     
                        <div class="widgetcontent nopadding">
 
 
<ul class="shortcuts">

<?
$now = time();
		$qban = "SELECT * FROM PrivCars ORDER BY vID DESC ";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");



	while ($row= mysql_fetch_array($resultx))
	{
		$IDS = $row["vID"];
		$nick = $row["vOwner"];
		$CarID = $row["vModel"];
		$PrivPrice = $row["PrivPrice"];

		
	
		
		if($PrivPrice != 0)
		{		
				$IsFlse = $IsFlse + 1;
				?>

									<center>		
									<li class="events">
										<a href="?sell=<? echo "$IDS"; ?>">
											<img width="123" height="23" alt="299" src="http://weedarr.wdfiles.com/local--files/veh/<? echo "$CarID"; ?>.png" style="margin-top: 10px; opacity: 0.50;">
											<span class="shortcuts-label"><? echo "$nick"; ?></span>
										</a>
									</li>
									
									</center>
								
				<?
		}
	}


if(IsFlse == "0")
{
?><center><div class='alert alert-error'><i class='icon-info-sign'></i>Nie ma takiego gracza!</div></center><?
	
}

			

	
			?>           
                        </ul>
   
  </div></div>

        
            </form>

</div>
</center>
<?
}
	include("footer.php");
?>