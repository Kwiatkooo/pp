<?
include('header.php');
include_once("includes/connect.inc.php");
?>

	<head><title>Wyścigi <? echo " - $webname"; ?></title></head>
<legend><h2>Wyscigi</h2></legend>
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-simple">
                    <li class="active">
                        <a class="green-border" data-toggle="tab" href="#tabsimple1">
                            <i class="icon-indent-left"></i>
                            Around LV
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple2">
                            <i class="icon-indent-left"></i>
                            GS to Molo
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple3">
                            <i class="icon-indent-left"></i>
                            Amazing Dumper!
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple4">
                            <i class="icon-indent-left"></i>
                            Tor Race
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple5">
                            <i class="icon-indent-left"></i>
                            Tor 2 Race
                        </a>
                    </li>
                     <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple6">
                            <i class="icon-indent-left"></i>
                            Fast SF
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple7">
                            <i class="icon-indent-left"></i>
                            Rusler Air
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple8">
                            <i class="icon-indent-left"></i>
                            Bigest LV
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple9">
                            <i class="icon-indent-left"></i>
                            NRG Los Santos
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple10">
                            <i class="icon-indent-left"></i>
                            Infernus Race
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple11">
                            <i class="icon-indent-left"></i>
                            NRG Tor Race
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple12">
                            <i class="icon-indent-left"></i>
                            Cross Tereno
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple13">
                            <i class="icon-indent-left"></i>
                            Kart Racing SF
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple14">
                            <i class="icon-indent-left"></i>
                            Infernus Race 2
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple15">
                            <i class="icon-indent-left"></i>
                            Hard NRG
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple16">
                            <i class="icon-indent-left"></i>
                            Sandking Race
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple17">
                            <i class="icon-indent-left"></i>
                            Classic Car
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple18">
                            <i class="icon-indent-left"></i>
                            LV to LS
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple19">
                            <i class="icon-indent-left"></i>
                            Around SF
                        </a>
                    </li>
                    <li>
                        <a class="green-border" data-toggle="tab" href="#tabsimple20">
                            <i class="icon-indent-left"></i>
                            Kart Racing LV
                        </a>
                    </li>
                </ul><br>
                <div class="tab-content">
                    <div class="tab-pane" id="tabsimple2">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - GS to Molo</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '2' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos = $pos + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
    <div class="title">TOP 10 - Amazing Dumper!</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '3' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos3 = $pos3 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos3</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos3</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
    <div class="title">TOP 10 - Tor Race</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '4' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos4 = $pos4 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos4</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos4</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
    <div class="title">TOP 10 - Tor 2 Race</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '5' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos5 = $pos5 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos5</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos5</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple6">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Fast SF</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '6' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos6 = $pos6 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos6</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos6</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple7">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Rusler Air</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '7' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos7 = $pos7 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos7</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos7</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple8">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Bigest LV</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '8' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos8 = $pos8 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos8</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos8</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple9">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - NRG Los Santos</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '9' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos9 = $pos9 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos9</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos9</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple10">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Infernus Race</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '13' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos10 = $pos10 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos10</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos10</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple11">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - NRG Tor Race</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '11' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos11 = $pos11 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos11</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos11</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple12">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Cross Tereno</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '12' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos12 = $pos12 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos12</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos12</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple13">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Kart Racing SF</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '14' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos13 = $pos13 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos13</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos13</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple14">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Infernus Race 2</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '15' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos14 = $pos14 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos14</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos14</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple15">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Hard NRG</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '16' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos15 = $pos15 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos15</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos15</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple16">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Sandking Race</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '17' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos16 = $pos16 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos16</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos16</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple17">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Classic Car</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '18' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos17 = $pos17 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos17</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos17</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple18">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - LV to LS</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '21' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos18 = $pos18 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos18</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos18</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple19">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Around SF</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '22' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos19 = $pos19 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos19</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos19</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
<div class="tab-pane" id="tabsimple20">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 95%;">
<div class="box-header orange-background">
    <div class="title">TOP 10 - Kart Racing LV</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '23' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos20 = $pos20 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos20</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos20</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
    <div class="title">TOP 10 - Around LV</div>
</div>
<div class="box-content box-no-padding">
<div class="responsive-table">
<div class="scrollable-area">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Czas</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM race_record WHERE `race_id` = '1' ORDER BY time ASC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	$m = $row['time'];
	$h = 0;
	while($m >= 60)
	{
		$h = $h + 1;
		$m = $m - 60;
	}
	$pos1 = $pos1 + 1;
	$nick = $row["nick"];
if($m > 9)
		{
			echo "
<tr class='odd'>
    <td class=' '>$pos1</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:$m</td>
</tr>
";
		}else echo "
<tr class='odd'>
    <td class=' '>$pos1</td>
    <td class=' '>$nick</td>	
    <td class=' '>$h:0$m</td>
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
</div>
            </div>
</div>
</p>
<?


include("footer.php");
?>