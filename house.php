<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");
if(isset($_POST['findplayer'])) {
$seenick = mysql_real_escape_string($_POST['findplayer']);?>
<?
header("Location: $domainname/salon.php?id=$seenick");
}
if(isset($_GET['id'])) {
include('header.php');
	$theplayer = mysql_real_escape_string($_GET['id']);
echo "<head>
<title>$theplayer - $webname</title>
</head>";
	$query = "SELECT * FROM `house` WHERE `id` = $theplayer";
	$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");
	$playerexists = mysql_num_rows($result);
if($playerexists == "0") {
?>
<meta http-equiv="refresh" content="0;URL='house.php'">
<br><center>
<div class='alert alert-error'><i class='icon-info-sign'></i>Nie ma więcej domu!</div></center>
<?
}
else
{
	while ($row= mysql_fetch_array($result)) 
	{
		$ID = $row["id"];
		$Nazwa = $row["Name"];
		$Wlasciciel = $row["OwnerName"];
		$Price = $row["Price"];
		$Max_Players = $row["Max_Players"];
		$Dystans = $row["Dystans"];
		$haslo = $row["Password"];

		if($Wlasciciel > '' ) {
		
			{$OwnerName = "<a href='/find.php?player=$Wlasciciel'>$Wlasciciel</a>";}
		}	
		if($Wlasciciel == 'null') {
            {$OwnerName = "Brak";}
        }
		if($haslo > '' ) {
		
			{$pass = "Tak";}
		}	
		if($haslo == 'null') {
            {$pass = "Nie";}
        }
		
	}

	$NextP = $theplayer + 1;
	$LastP = $theplayer - 1;

	?>
<head>
<title>Twój profil - <? echo "$webname"; ?></title>
</head>
<br>



	 <div id="dashboard-left" class="span7">
						                      
					  	<br>
						
                        <div class="widgetcontent nopadding">


<div class="pagination pagination-large" style="margin-bottom: -71px;    margin-left: 73%;">
	<ul>
		<li class="disabled"><a href="?id=<? echo "$LastP"; ?>">«</a></li>									
		<li class="active"><a href="/house.php"><? echo "$theplayer"; ?></a></li>									
		<li class="disabled"><a href="?id=<? echo "$NextP"; ?>">»</a></li>									
	</ul>
</div>


                            <ul class="commentlist">
                                <li>
                                    
									<div class="comment-info">
                                    <p>ID:  <span style="color:#00BBFF"><? echo "$ID"; ?></span></p>
									<p>Nazwa:  <span style="color:#00BBFF"><? echo "$Nazwa"; ?></span></p>
									<p>Właściciel:  <span style="color:#00BBFF"><? echo "$OwnerName"; ?></span></p>
									<p>Cena:  <span style="color:#00BBFF"><? echo "$Price"; ?><span style="color:#00A700">$</span></span></p>
									<p>Hasło:  <span style="color:#00BBFF"><? echo "$pass"; ?></span></p>
									
									
									 </div>			 
												 
                                </li>

                            </ul>
                        </div>
                          
                    </div>  
                <br> 
            <iframe src="/map/housemap.php?id=<? echo "$theplayer"; ?>" width="391" height="210" frameborder="0" scrolling="no" allowtransparency="true" style="    border: 2px solid #0866c6; margin-top: 0px;margin-left: 20px;"></iframe>
	   
	   
        
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


<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 50px;">ID</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nazwa</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Właściciel</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Stan</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?

		$qban = "SELECT * FROM house ORDER BY id";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	 
		$ID = $row["id"];
		$Nazwa = $row["Name"];
		$Wlasciciel = $row["OwnerName"];
		$time = $row["time"];
		if($time == 0)
		{
			$time = "<a style='color: #00ff00; width: 20%; height: 20px; line-height: 20px;'>Wolny</a>";

		}else{
			$time = "<a style='color: #ff0000; width: 20%; height: 20px; line-height: 20px;'>Zajęty</a>";
		}	
		if($Wlasciciel > '' ) {
		
			{$owner = "<a href='/find.php?player=$Wlasciciel'>$Wlasciciel</a>";}
		}	
		if($Wlasciciel == 'null') {
            {$owner = "Brak";}
        }
echo "
<tr class='odd'>
    <td class=' '>$ID</td>
    <td class=' '><a href='/house.php?id=$ID'>$Nazwa</a></td>
    <td class=' '>$owner</td>
    <td class=' '>$time</td>
</tr>
";
		}
?>
</tbody></table>

</div>
</div>
</div>
</div>

        
            </form>

</div>
</center>
<?
}
	include("footer.php");
?>