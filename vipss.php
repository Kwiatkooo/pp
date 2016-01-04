<?php
include('header.php');
include_once("includes/ago.inc.php");
$currenttime = time();

?>

	<head><title>Lista graczy online<? echo " - $webname"; ?></title></head>
<legend><h2>Lista graczy online</h2></legend>
            <div class="tabbable">
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
		$qadmins = "SELECT * FROM SavePlayer WHERE `Online` > '' ORDER BY `Exp`,`Kills`,`Deaths`,`Zlpor`,`Skin`,`ADlevel`,`BankMoney` DESC";
$resultx = mysql_query($qadmins) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["Nick"];		$skin = $row["Skin"];
		$vipday = $row["Deaths"];		$zl = $row["Zlpor"];
		$score = $row["Exp"];		$kills = $row["Kills"];		$admin = $row["ADlevel"];		$bank = $row["BankMoney"];				if ($admin=='0') {$ranga = "<font color='black'>Gracz</font>";}				if ($admin=='1') {$ranga = "<font color='#00FF00'>Moderator</font>";}		if ($admin=='2') {$ranga = "<font color='#FF8000'>Administrator</font>";}		if ($admin=='3') {$ranga = "<font color='#8b7256'>Junior-Administrator</font>";}		if ($admin=='4') {$ranga = "<font color='#1dbfc1'>Elite Administrator</font>";}				if ($admin=='5') {$ranga = "<font color='#d40000'>Head Administrator</font>";}				if ($admin=='99') {$ranga = "<font color='#FFFF00'>VIP</font>";}
echo "
<tr class='odd'>                        <ul class='commentlist'>                        <li style='text-align:center;'>						<div class='peoplelist'>							<div class='row-fluid'>				<div class='peoplewrapper'>																														<div class='thumbs'><img src='skins/Skin_$skin.png' alt=''></div>																																								<div class='peopleinfo'>											<h4>$banned <span class='on'><font color='grey'>$ranga</font></span></h4>											<ul>												<span>Exp:</span> $score<br>												<span>Zabójstw:</span> $kills<br>												<span>Zgonów:</span> $vipday<br>												<span>  Portfel:</span> $zl zł<br>											</ul>										</div><!--peopleinfo-->									</div>							</div><!--row-fluid-->						</div>                        </li></ul>";                        

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