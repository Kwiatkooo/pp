<?php
include('header.php');
include_once("includes/ago.inc.php");
$currenttime = time();

?>

	<head><title>Lista domów<? echo " - $webname"; ?></title></head>
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
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Nazwa domu</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Stan</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Właściciel</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Cena</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 374px;">Hasło</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
		$qadmins = "SELECT * FROM house WHERE `Name` > '' ORDER BY `Name` DESC";
$resultx = mysql_query($qadmins) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["Name"];		$Wlasciciel = $row["OwnerName"];		$Cena = $row["Price"];		$haslo = $row["Password"];	        if($Wlasciciel > '' ) {					{$ranga = "<a href='http://panel.wrt.xaa.pl/find.php?player=$Wlasciciel'>$Wlasciciel</a>";}		}	
		if($Wlasciciel == 'null') {            {$ranga = "Brak";}        }        if($Wlasciciel > '' ) {					{$stan = "<a style='color: #ff0000; width: 20%; height: 20px; line-height: 20px;'>Zajęty</a>";}		}			if($Wlasciciel == 'null') {            {$stan = "<a style='color: #00ff00; width: 20%; height: 20px; line-height: 20px;'>Wolny</a>";}        }        if($haslo > '' ) {					{$pass = "Tak";}		}			if($haslo == 'null') {            {$pass = "Nie";}        }								
echo "
<tr class='odd'>
    <td class=' '>$banned</td>	<td class=' '>$stan</td>	<td class=' '>$ranga</td>	<td class=' '>$Cena</td>	<td class=' '>$pass</td>";
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