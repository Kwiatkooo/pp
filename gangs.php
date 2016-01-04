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
	$query = "SELECT * FROM `Gangs` WHERE `id` = $theplayer";
	$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");
	$playerexists = mysql_num_rows($result);
if($playerexists == "0") {
?>
<meta http-equiv="refresh" content="0;URL='gangs.php'">
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
		$Lider = $row["Lider"];
		$Lider2 = $row["Lider2"];
		$vLider = $row["vLider"];
		$vLider2 = $row["vLider2"];
		$gMem = $row["gMem"];
		$gRsp = $row["gRsp"];
		$Tag = $row["Tag"];
		$gKill = $row["gKill"];
		$gDeath = $row["gDeath"];
		
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
						
 <div class="pagination pagination-large">
	<ul>
		<li class="disabled"><a href="?id=<? echo "$LastP"; ?>">«</a></li>									
		<li class="active"><a href="/gangs.php"><? echo "$theplayer"; ?></a></li>									
		<li class="disabled"><a href="?id=<? echo "$NextP"; ?>">»</a></li>									
	</ul>
</div>                       <div class="widgetcontent nopadding">





                            <ul class="commentlist">
                                <li>
                                    
									<div class="comment-info">
									<p style="margin: 5px 0;">Nazwa:  <span style="color:#00BBFF"><? echo "$Nazwa"; ?> (<? echo "$Tag"; ?>)</span></p>
									<p style="margin: 5px 0;">ID:  <span style="color:#00BBFF"><? echo "$ID"; ?></span></p>
									<p style="margin: 5px 0;">Lider | Lider2:  <span style="color:#00BBFF"><? echo "$Lider"; ?></span> <span style="color:#ffffff">|</span> <span style="color:#00BBFF"><? echo "$Lider2"; ?></span></p>
									<p style="margin: 5px 0;">vLider | vLider2:  <span style="color:#00BBFF"><? echo "$vLider"; ?></span> <span style="color:#ffffff">|</span> <span style="color:#00BBFF"><? echo "$vLider2"; ?></span></p>
									<p style="margin: 3px 0;">Czlonkow:  <span style="color:#00BBFF"><? echo "$gMem"; ?></span></p>
									<p style="margin: 3px 0;">Respekt:  <span style="color:#00BBFF"><? echo "$gRsp"; ?></span></p>
									<p style="margin: 3px 0;">Zabić | Śmierci:  <span style="color:#00BBFF"><? echo "$gKill"; ?></span> <span style="color:#ffffff">|</span> <span style="color:#00BBFF"><? echo "$gDeath"; ?></span></p>
									
									
									 </div>			 
												 
                                </li>

                            </ul>
                        </div>
                          
                    </div>  
                <br>  <br>  <br> 
            <iframe src="/map/gangsmap.php?id=<? echo "$theplayer"; ?>" width="391" height="210" frameborder="0" scrolling="no" allowtransparency="true" style="    border: 2px solid #0866c6; margin-top: 8px;margin-left: 20px;"></iframe>
	   




<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped " style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-sort="ascending" style="width: 50px;">ID</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Exp</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Zabić</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Śmierci</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"  style="width: 454px;">Ostawnia wizyta</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?

		$qban = "SELECT * FROM Gangs WHERE `id` = $theplayer";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	
	while ($row= mysql_fetch_array($resultx))
	{
		for($i = 0; $i <$gMem; $i++)
		{
		
			$Nazwa = $row['cz'.$i];
			
			$qban2 = "SELECT * FROM Players WHERE Nick='$Nazwa'";
			$resultx2 = mysql_query($qban2) or die(mysql_errno() . ": " . mysql_error() . "\n");
	
			while ($row2= mysql_fetch_array($resultx2))
			{

				$Exp = $row2['Exp'];
				$Kills = $row2['Kills'];
				$Deaths = $row2['Deaths'];
				$Lastdate = $row2['Lastdate'];

				


echo "
<tr class='odd'>
    <td class=' '>$i</td>
    <td class=' '>$Nazwa</a></td>
    <td class=' '>$Exp</td>
    <td class=' '>$Kills</td>
    <td class=' '>$Deaths</td>
    <td class=' '>$Lastdate</td>
</tr>
";
			}
		}
	}	
?>
</tbody></table>

</div>
</div>
</div>
</div>





	   
        
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


<table class="table table-bordered table-striped " style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 50px;">ID</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nazwa</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Lider</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Czlonkow</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Respekt</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?

		$qban = "SELECT * FROM Gangs ORDER BY id";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	 
		$ID = $row["id"];
		$Nazwa = $row["Name"];
		$Lider = $row["Lider"];
		$gMem = $row["gMem"];
		$gRsp = $row["gRsp"];
		


echo "
<tr class='odd'>
    <td class=' '>$ID</td>
    <td class=' '><a href='/gangs.php?id=$ID'>$Nazwa</a></td>
    <td class=' '>$Lider</td>
    <td class=' '>$gMem</td>
    <td class=' '>$gRsp</td>
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