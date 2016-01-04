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
<title>Wyścig - ID:$theplayer</title>
</head>";
	$query = "SELECT * FROM `WS` WHERE `ID` = $theplayer";
	$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");
	$playerexists = mysql_num_rows($result);
if($playerexists == "0") {
?>
<meta http-equiv="refresh" content="0;URL='race.php'">
<br><center>
<div class='alert alert-error'><i class='icon-info-sign'></i>Nie ma takiego wyścigu!</div></center>
<?
}
else
{
	while ($row= mysql_fetch_array($result)) 
	{
		$ID = $row["ID"];
		$Nazwa = $row["Nazwa"];
		$Model = $row["Model"];
		$CP_LICZBA = $row["CP_LICZBA"];
		$Max_Players = $row["Max_Players"];
		$Dystans = $row["Dystans"];
		
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
		<li class="active"><a href="/race.php"><? echo "$theplayer"; ?></a></li>									
		<li class="disabled"><a href="?id=<? echo "$NextP"; ?>">»</a></li>									
	</ul>
</div>


                            <ul class="commentlist">
                                <li>
                                    
									<div class="comment-info">
                                    <p>ID:  <span style="color:#00BBFF"><? echo "$ID"; ?></span></p>
									<p>Nazwa:  <span style="color:#00BBFF"><? echo "$Nazwa"; ?></span></p>
									<p>Model:  <span style="color:#00BBFF"><? echo "$Model"; ?></span></p>
									<p>Liczba checkpointów:  <span style="color:#00BBFF"><? echo "$CP_LICZBA"; ?></span></p>
									<p>Maksymalna liczba graczy:  <span style="color:#00BBFF"><? echo "$Max_Players"; ?></span></p>
									<p>Odległość:  <span style="color:#00BBFF"><? echo "$Dystans"; ?>km</span></p>
									
									 </div>			 
												 
                                </li>

                            </ul>
                        </div>
                          
                    </div>  
                <br> 
            <iframe src="/map/racemap.php?id=<? echo "$theplayer"; ?>" width="391" height="210" frameborder="0" scrolling="no" allowtransparency="true" style="    border: 2px solid #0866c6; margin-top: 0px;margin-left: 20px;"></iframe>
	   
	   
        
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
<br>
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
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Odległość</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Checkpoint</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?

		$qban = "SELECT * FROM WS ORDER BY ID";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	 
		$ID = $row["ID"];
		$Nazwa = $row["Nazwa"];
		$Model = $row["Model"];
		$CP_LICZBA = $row["CP_LICZBA"];
		$Max_Players = $row["Max_Players"];
		$Dystans = $row["Dystans"];
echo "
<tr class='odd'>
    <td class=' '>$ID</td>
    <td class=' '><a href='/race.php?id=$ID'>$Nazwa</a></td>
    <td class=' '>$Dystans</td>
    <td class=' '>$CP_LICZBA</td>
</tr>
";
		}
?>
</tbody></table>

</div>
</div>
</div>
</div></div>

        
            </form>



<?
}
	include("footer.php");
?>