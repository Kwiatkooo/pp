<?php

include("includes/connect.laun.php");

?>
<HTML>
<head>
<STYLE>
body
{
background-image:url("http://wrt.xaa.pl/Launcher/news_feed_background.png");
background-repeat:no-repeat;
background-attachment:fixed;
border-style:none;
}
.tekst {
position: absolute;
top: 9px;
  left: 17px;
  font-size: 26;
  font-weight: 800;
  text-align: center;
}
</STYLE>

</head>
</HTML>

<? 
$User = "SELECT * FROM stats WHERE name='Admin'";
$Usergo = mysql_query($User) or die("Failed");
	while ($row= mysql_fetch_array($Usergo)) 
	{
		$Whyuser = $row["value"];
		
	}	


	

?>
<div class='tekst' style='color: rgb(255, 0, 10)'><b></b><? echo "$Whyuser"; ?></div>
</div>
</center>
<?

?>