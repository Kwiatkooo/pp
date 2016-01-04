<?
	include('header.php');
	include_once("includes/ago.inc.php");

$num_rec_per_page=10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 


if(isset($_GET['post'])) {
		$getban1 = "SELECT * FROM bans WHERE Name='$userplayer'";
$printban1 = mysql_query($getban1) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($printban1))
	{
		$banned = $row["nick"];
		$admin = $row["admin"];
		$reason = $row["reason"];
		$bandate = $row["date"];
		$bannedip = $row["ip"];
	}
}
else
{
	?>
	<head><title>Lista banów <? echo " - $webname"; ?></title></head>
<br>

<div class="pagination pagination-large">
	<ul>
		<li class="disabled"><a href="?page=<? echo "$page"-1; ?>">«</a></li>									
		<li class="active"><a href="/public.php"><? echo "$page"; ?></a></li>									
		<li class="disabled"><a href="?page=<? echo "$page"+1; ?>">»</a></li>									
	</ul>
</div>                      
                <div class="tab-content">
                       <p>
                    <div class="tab-pane active" id="tabsimple1">
                        <p>
<div class="responsive-table">

<table class="table table-bordered table-striped " style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Data zbanowania</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">Banujący</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">Powód</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">Na ile dni</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
	


		$qban = "SELECT * FROM `bans` ORDER BY `id` DESC LIMIT $start_from, $num_rec_per_page;";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["nick"];
		$id = $row["id"];
		$admin = $row["admin"];
		$reason = $row["reason"];
		$date = $row["date"];
		
		$dni = $row['dni'];
		$BanCzas = $dni - Time();			
		while($BanCzas >= 86400)
		{
			$Days = $BanCzas / 86400;
			$BanCzas = $BanCzas - ($Days * 86400);
		}
		$cena=number_format($Days, 0, ',', '');
      
		 if($cena > '0') {
            {$dni = "<span class='label label-head'>$cena dni</span>";}
        }
        if($cena == 0) {
            {$dni = "<span class='label label-green'>$cena dni</span>";}
        }
		
echo "
<tr class='odd'>
    <td class=' '>$banned</td>
	<td class=' '>$date</td>
    <td class=' '>$admin</td>
    <td class=' '>$reason</td>
	<td class=' '>$dni</td>"; 
echo "
</tr>
";
		}
?>
</tbody></table>

</div>
</div>
</div>
<div class="pagination pagination-large" style="    margin-top: 5px;">
	<ul>
		<li class="disabled"><a href="?page=<? echo "$page"-1; ?>">«</a></li>									
		<li class="active"><a href="/public.php"><? echo "$page"; ?></a></li>									
		<li class="disabled"><a href="?page=<? echo "$page"+1; ?>">»</a></li>									
	</ul>
</div>    
						</p>
<?
echo "
						</p>";
}
include("footer.php");
?>