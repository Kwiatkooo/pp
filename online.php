<?php
include('header.php');
include_once("includes/ago.inc.php");
$currenttime = time();

?>

	<head><title>Lista graczy online<? echo " - $webname"; ?></title></head>
<h4 class="widgettitle">Lista graczy online</h4>
                <div class="tab-content">
                       <p>
                    <div class="tab-pane active" id="tabsimple1">
                        <p>
<br>
<div class="responsive-table">

<table class="table table-bordered table-striped " style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>

</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$resultx = mysql_query($qadmins) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["Nick"];
		$vipday = $row["Deaths"];
		$score = $row["Exp"];
echo "
<tr class='odd'>

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
include("footer.php");
?>