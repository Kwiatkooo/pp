<?
include("../includes/connect.inc.php");
include('../includes/ass.inc.php');
?>
<html>
<head>

    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <style type='text/css'>
body {
background-color: rgb(245, 245, 245);
background: rgb(245, 245, 245);
}
</style>
</head>
<body>
<br>
<div class='content well well-small'>
<div class='container-fluid'>
<div class='row-fluid'>
<div class='span4 box box-bordered box-nomargin'>
        <div class='box-header muted-background'>
            <div class='title'>Set description</div>
        </div>
        <div class='box-content'>
<center>
<?
if(!isset($_COOKIE['sessionID'])) {
header("Location: login.php");
}
if(isset($_POST['color'])) {
$cul = mysql_real_escape_string($_POST['color']);
$query = "UPDATE Accounts SET TextColor='$cul' WHERE Name='$userplayer' ";
$result = mysql_query($query);
echo "<b> Default text color changed to <font color='$cul'>$cul</font></b>";
}
else
{
$q = "SELECT TextColor FROM Accounts WHERE Name='$userplayer'";
$r = mysql_query($q);
  while ($row= mysql_fetch_array($r)) {
  $color = $row["TextColor"];
}
echo "
<form action='textcolor.php' method='post'>
<legend>Chat color</legend>
<h4>Current color:<br><font color='$color'>$color</font></h4>
<div class='control-group'>
  <div class='controls'>
    <div class='input-prepend'>
      <span class='add-on'><i class='icon-bold'></i></span>
      <input class='span2' value='$color' name='color' id='inputIcon' type='text'>
    </div>
  </div>
</div>
 <button type='submit' class='btn'>Submit</button>
</form>";
}
?>
</b>
</center>
</html>