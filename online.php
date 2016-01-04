<?php
include('header.php');
include_once("includes/ago.inc.php");
$currenttime = time();

?>

	<head><title>Lista graczy online<? echo " - $webname"; ?></title></head><br>
<h4 class="widgettitle">Lista graczy online</h4>                        <div class="widgetcontent nopadding">
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
<?		$qadmins = "SELECT * FROM SavePlayer WHERE `Online` > '' ORDER BY `Exp`,`Kills`,`Deaths`,`Zlpor`,`Skin`,`BankMoney` DESC";
$resultx = mysql_query($qadmins) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$banned = $row["Nick"];		$skin = $row["Skin"];
		$vipday = $row["Deaths"];		$zl = $row["Zlpor"];
		$score = $row["Exp"];		$kills = $row["Kills"];				$bank = $row["BankMoney"];$poss = $poss + 1;
echo "
<tr class='odd'>                        <ul class='commentlist'>                        <li style='text-align:center;'>						<div class='peoplelist'>							<div class='row-fluid'>				<div class='peoplewrapper'>																														<div class='thumbs'><img src='skins/Skin_$skin.png' alt=''></div>																																								<div class='peopleinfo'>											<h4>$poss. $banned<span class='on'><font color='grey'></font></span></h4>											<ul>												<span>Exp:</span> $score<br>												<span>Zabójstw:</span> $kills<br>												<span>Zgonów:</span> $vipday<br>												<span><a href='http://panel.wrt.xaa.pl/find.php?player=$banned'><u>PROFIL</u></a></span><br>											</ul>										</div><!--peopleinfo-->									</div>							</div><!--row-fluid-->						</div>                        </li></ul>";                        

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