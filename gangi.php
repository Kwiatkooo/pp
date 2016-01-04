<?php
include('header.php');
include_once("includes/ago.inc.php");
$currenttime = time();

?>

	<head><title>Lista gangów<? echo " - $webname"; ?></title></head>
<br>
                <div class="tab-content">
                       <p>
                    <div class="tab-pane active" id="tabsimple1">
                        <p>
<br>
<div class="responsive-table">
<table class="table table-bordered table-striped " style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Nazwa Gangu</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Lider</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Lider2</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">ViceLider</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">ViceLider2</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Członków</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Respekt</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Śmierci</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Zabić</th></tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
		$qadmins = "SELECT * FROM Gangs WHERE `Name` > '' ORDER BY `Name` DESC";
$resultx = mysql_query($qadmins) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["Name"];		$lider = $row["Lider"];		$Wlasciciel = $row["Lider2"];		$respa = $row["gRsp"];		$vLider = $row["vLider"];		$vLider2 = $row["vLider2"];		$gMem = $row["gMem"];		$gDeath = $row["gDeath"];		$gKill = $row["gKill"];	
echo "
<tr class='odd'>
    <td class=' '>$banned</td>	<td class=' '><a href='http://panel.wrt.xaa.pl/find.php?player=$lider'>$lider</a></td>	<td class=' '><a href='http://panel.wrt.xaa.pl/find.php?player=$Wlasciciel'>$Wlasciciel</a></td>	<td class=' '><a href='http://panel.wrt.xaa.pl/find.php?player=$vLider'>$vLider</a></td>	<td class=' '><a href='http://panel.wrt.xaa.pl/find.php?player=$vLider2'>$vLider2</a></td>	<td class=' '>$gMem</td>	<td class=' '>$respa</td>	<td class=' '>$gDeath</td>	<td class=' '>$gKill</td>		";
echo "
</tr>
";
		}
?>
</tbody></table>
</div>

</div>
</div>

						</p>
<?
echo "
						</p>";
include("footer.php");
?>