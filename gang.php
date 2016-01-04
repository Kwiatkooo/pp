<?
	include('header.php');
	include_once("includes/ago.inc.php");
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
	<head><title>Lista gangów <? echo " - $webname"; ?></title></head>
<br>
<h4 class="widgettitle">Lista gangów</h4>
                        <div class="widgetcontent nopadding">
                <div class="tab-content">
                       <p>
                    <div class="tab-pane active" id="tabsimple1">
                        <p>
<br>
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped " style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Nazwa</th>

<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">Lider</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">Lider2</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">vLider</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">vLider2</th>

<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">Respect</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">Zabójstw</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182px;">Śmierci</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM Gangs ORDER BY Name DESC LIMIT 50";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["Name"];
		$id = $row["Lider"];
		$admin = $row["Lider2"];
		$reason = $row["vLider"];
		$date = $row["vLider2"];
		
		$rsp = $row["gRsp"];
		$kill = $row["gKill"];
		$deat = $row["gDeath"];
		
		
echo "
<tr class='odd'>
    <td class=' '>$banned</td>

    <td class=' '>$id</td>
    <td class=' '>$admin</td>
	<td class=' '>$reason</td>
	<td class=' '>$date</td>
	
	<td class=' '>$rsp</td>
	<td class=' '>$kill</td>
	<td class=' '>$deat</td>
	
	"; 
echo "
</tr>
";
		}
?>
</tbody></table>
</div>
</div>
</div>
</div>
</div>
						</p>
<?
echo "
						</p>";
}
include("footer.php");
?>