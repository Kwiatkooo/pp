<?php
include('header.php');
include_once("includes/ago.inc.php");
$currenttime = time();

?>

	<head><title>Lista vipów<? echo " - $webname"; ?></title></head>
<br>
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
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Nick</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Okres</th>

</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
		$qadmins = "SELECT * FROM Vipy WHERE `Nick` > '' ORDER BY `Nick` DESC";
$resultx = mysql_query($qadmins) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["Nick"];
		$dni = $row['Czas'];		$BanCzas = $dni - Time();					while($BanCzas >= 86400)		{			$Days = $BanCzas / 86400;			$BanCzas = $BanCzas - ($Days * 86400);		}		$cena=number_format($Days, 0, ',', '');
echo "
<tr class='odd'>
    <td class=' '>$banned</td>	<td class=' '>Pozostało <span class='label pad-yellow'>$cena</span> dni</td>";
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

						</p>
<?
echo "
						</p>";
include("footer.php");
?>