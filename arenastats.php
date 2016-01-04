<?
include('header.php');
include_once("includes/connect.inc.php");
?>

	<head><title>TOP Areny <? echo " - $webname"; ?></title></head>
<br>
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-simple">
                    <li class="active">
                        <a data-toggle="tab" href="#tabsimple1">
                            <i class="icon-edit text-red"></i>
                            TOP RPG
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple2">
                            <i class="icon-indent-left"></i>
                            TOP Minigun
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple3">
                            <i class="icon-indent-left"></i>
                            TOP Oneshoot
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple4">
                            <i class="icon-indent-left"></i>
                            TOP Snajper
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple5">
                            <i class="icon-indent-left"></i>
                            TOP WAR
                        </a>
                    </li>
					
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tabsimple2">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Arena minigun</div>
    <div class="actions">
        <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
        </a>
    </div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Punkty</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM SavePlayer ORDER BY FrgMI DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	    $pos = $pos + 1;
		$minigun = $row["FrgMI"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$pos</td>
    <td class=' '>$nick</td>
    <td class=' '>$minigun</td>
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
                    </div>
                    <div class="tab-pane" id="tabsimple3">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Arena oneshoot</div>
    <div class="actions">
        <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
        </a>
    </div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Punkty</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM SavePlayer ORDER BY FrgDe DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$posittt = $posittt + 1;
		$oneshoot = $row["FrgDe"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$posittt</td>
    <td class=' '>$nick</td>
    <td class=' '>$oneshoot</td>
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
                    </div>
                    <div class="tab-pane" id="tabsimple5">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Arena WAR</div>
    <div class="actions">
        <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
        </a>
    </div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Punkty</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM SavePlayer ORDER BY FrgWA DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$poite = $poite + 1;
		$jetpack = $row["FrgWA"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$poite</td>
    <td class=' '>$nick</td>
    <td class=' '>$jetpack</td>
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
                    </div>
                    <div class="tab-pane" id="tabsimple4">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Arena snajper</div>
    <div class="actions">
        <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
        </a>
    </div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Punkty</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM SavePlayer ORDER BY FrgSN DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$poitee = $poitee + 1;
		$snajper = $row["FrgSN"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$poitee</td>
    <td class=' '>$nick</td>
    <td class=' '>$snajper</td>
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
                    </div>
                    <div class="tab-pane active" id="tabsimple1">
                        <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Arena RPG</div>
    <div class="actions">
        <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
        </a>
    </div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 212px;">Punkty</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
		$qban = "SELECT * FROM SavePlayer ORDER BY FrgRpg DESC LIMIT 10 ";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$poss = $poss + 1;
		$rpg = $row["FrgRpg"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$poss</td>
    <td class=' '>$nick</td>
    <td class=' '>$rpg</td>
";
		}
?>
</tbody></table>
</div>
</div>
</div>
</div>
</div>
</div>
            </div>
</div>
</p>
<?


include("footer.php");
?>