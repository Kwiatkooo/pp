<?
include('header.php');
include_once("includes/connect.inc.php");
?>

	<head><title>Toplisty <? echo " - $webname"; ?></title></head>
<br><br>
                
					
					
					
			    

<div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    	
					
					
					
				<div id="dashboard-left" class="span8">			
                <div class="tab-content">
				
                    <div class="tab-pane" id="Deaths">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Śmierci</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM Players ORDER BY Deaths DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	    $pos1 = $pos1 + 1;
		$Deaths = $row["Deaths"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$pos1</td>
    <td class=' '><a href='/find.php?player=$nick'>$nick</a></td>
    <td class=' '>$Deaths</td>
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
                    </div>					
                
                     <div class="tab-pane" id="BankMoney">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Pieniędzy</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM Players ORDER BY BankMoney DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	    $pos2 = $pos2 + 1;
		$BankMoney = $row["BankMoney"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$pos2</td>
    <td class=' '><a href='/find.php?player=$nick'>$nick</a></td>
    <td class=' '>$BankMoney</td>
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
                    </div>
	
                    <div class="tab-pane" id="Visits">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Odwiedziń</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM Players ORDER BY Visits DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	    $pos3 = $pos3 + 1;
		$Visits = $row["Visits"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$pos3</td>
    <td class=' '><a href='/find.php?player=$nick'>$nick</a></td>
    <td class=' '>$Visits</td>
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
                    </div>

	
	                    <div class="tab-pane" id="DriftPkt">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Punktów</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM Players ORDER BY DriftPkt DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	    $pos4 = $pos4 + 1;
		$DriftPkt = $row["DriftPkt"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$pos4</td>
    <td class=' '><a href='/find.php?player=$nick'>$nick</a></td>
    <td class=' '>$DriftPkt</td>
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
                    </div>
	
	
	                    <div class="tab-pane" id="Szafir">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Szafirów</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM Players ORDER BY Szafir DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	    $pos5 = $pos5 + 1;
		$Szafir = $row["Szafir"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$pos5</td>
    <td class=' '><a href='/find.php?player=$nick'>$nick</a></td>
    <td class=' '>$Szafir</td>
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
                    </div>	
	
	
	
	
                    <div class="tab-pane" id="KM">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Przebieg</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM PrivCars ORDER BY vPrzebieg DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	    $pos6 = $pos6 + 1;
		$Przebieg = $row["vPrzebieg"];
		$nick = $row["vOwner"];
		$KM = $Przebieg / 1000;
echo "
<tr class='odd'>
    <td class=' '>$pos6</td>
    <td class=' '><a href='/find.php?player=$nick'>$nick</a></td>
    <td class=' '>$KM</td>
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
                    </div>	
	
	
	
                    <div class="tab-pane" id="Kills">
                       <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">

<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 212px;">Zabić</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
$now = time();
		$qban = "SELECT * FROM Players ORDER BY Kills DESC LIMIT 10";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
	    $pos7 = $pos7 + 1;
		$money = $row["Kills"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$pos7</td>
    <td class=' '><a href='/find.php?player=$nick'>$nick</a></td>
    <td class=' '>$money</td>
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
                    </div>
					
					
                    <div class="tab-pane active" id="Home">
                       <p>
<div id="dashboard-left" class="span11">
												
                        <h4 class="widgettitle">Strona Główna </h4>
                        <div class="widgetcontent nopadding">
                            <ul class="commentlist">
								<center><img src="http://www.millvalleytrophies.com/images/trophy4.png" style="width: 340px;margin-top: 10px;">
								
								
								
								
								</center>
                                <li style="text-align:center;">
									
                                   	W tym miejscu znajdziesz top liste dziesięciu graczy z danej kategorji którą możesz wybrać z menu po prawej stronie.
                                </li>
                            </ul>
                        </div>
						
                        						</div>
						</p>
                    </div>					


                    <div class="tab-pane" id="Exp">
                        <p>
<div class="row-fluid">
<div class="span12 box bordered-box orange-border" style="margin-bottom:0; width: 100%;">

<div class="box-content box-no-padding">
<div class="responsive-table">
<table class="table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
<tr role="row">
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 50px;">Pozycja</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 454px;">Nick</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="width: 212px;">Exp</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?
		$qban = "SELECT * FROM Players ORDER BY Exp DESC LIMIT 10 ";
$resultx = mysql_query($qban) or die(mysql_errno() . ": " . mysql_error() . "\n");
	while ($row= mysql_fetch_array($resultx))
	{
		$poss = $poss + 1;
		$score = $row["Exp"];
		$nick = $row["Nick"];
echo "
<tr class='odd'>
    <td class=' '>$poss</td>
    <td class=' '><a href='/find.php?player=$nick'>$nick</a></td>
    <td class=' '>$score</td>
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
</p>



		<div id="dashboard-right" class="span4" >
						<div class="leftmenu">						
                             
						<ul class="nav nav-tabs nav-stacked">
						<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#Home"><span class="iconfa-laptop"></span>Strona Główna </a></li>
                		<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#Exp"><span class="iconfa-laptop"></span>Top Exp</a></li>
						 <li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#Kills"><span class="iconfa-laptop"></span>Top Zabójstw </a></li>
						<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#Deaths"><span class="iconfa-laptop"></span>Top Śmierci</a></li>
						<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#BankMoney"><span class="iconfa-laptop"></span>Top Pieniedzy</a></li>

                		<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#Visits"><span class="iconfa-laptop"></span>Top Odwiedzin</a></li>
						 <li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#DriftPkt"><span class="iconfa-laptop"></span>Top Punktów Driftu </a></li>
						<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#Szafir"><span class="iconfa-laptop"></span>Top Szafirów</a></li>
						<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#KM"><span class="iconfa-laptop"></span>Top Przebiegu w PrivCar</a></li>
						
				</ul>
						</div>     


</div></div></div>
<?


include("footer.php");
?>