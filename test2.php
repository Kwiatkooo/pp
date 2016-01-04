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
				
                    <div class="tab-pane active" id="echo "$nick"">
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
    <td class=' '>$nick</td>
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
                		<li style="background-color: rgba(0, 0, 0, 0.54); border-bottom: 1px solid #4d4d4d;"><a data-toggle="tab" href="#echo "$nick""><span class="iconfa-laptop"></span>Top Exp</a></li>
					
				</ul>
						</div>     


</div></div></div>
<?


include("footer.php");
?>