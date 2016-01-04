<?php
include('header.php');
include_once("includes/ago.inc.php");

?>

	<head><title>Administracja<? echo " - $webname"; ?></title></head>
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
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 5px;">Lp.</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 454px;">Ranga</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 250px;">Ostatnia wizyta</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
	


$now = time();
		$qadmins = "SELECT * FROM Admins WHERE `Ranga` > '0' ORDER BY Ranga DESC ";
$resultx = mysql_query($qadmins) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$poss = $poss + 1;
		$banned = $row["Nick"];
		$admin = $row["Ranga"];
		$lastdata = $row["Lastdate"];
		if ($admin=='1') {$ranga = "<span class='label label-mod'>Moderator</span>";}
		if ($admin=='2') {$ranga = "<span class='label label-admin'>Administrator</span>";}
		if ($admin=='3') {$ranga = "<span class='label label-vice'>Junior-Administrator</span>";}
		if ($admin=='4') {$ranga = "<span class='label label-elite'>Elite Administrator</span>";}
		if ($admin=='7') {$ranga = "<span class='label label-head'>Head Administrator</span>";}
		
		
		
		echo "
<tr class='odd'>



    <td class=' '>$poss</td>
    <td class=' '><a href='http://panel.wrt.xaa.pl/find.php?player=$banned'>$banned</a></td>
    <td class=' '>$ranga</td>
    <td class=' '>$lastdata</td>

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
						</p>
<?
echo "
						</p>";
include("footer.php");
?>