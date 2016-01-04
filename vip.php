<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");
if(isset($_POST['vipcode'])) {
$sms_code = mysql_real_escape_string($_POST['vipcode']);
include("header.php");
$apikey = "e4b1571e0a9c1778cdc40883b";
$sms_amount = "4";

$contents = file_get_contents("http://admin.serverproject.pl/api/smsapi.php?key=$apikey&amount=$sms_amount&code=$sms_code");
 
if ($contents)
{
    $contents = json_decode($contents);
	$czas=date("H:i");
	$data=Time()+24*60*60*31;
    if ($contents->error)
    {   
        echo "<br><center>Nieprawidłowy kod zwrotny. Spróbuj ponownie!</center>";


    }
    else
    {
        if ($contents->status == 'ok')
        {
            echo '<br><center>Kod poprawny. VIP został zakupiony na 31 dni.</center>';
			
			$query = "INSERT INTO Vipy(`Nick`, `Czas`) VALUES ('$userplayer', '$data')";
			$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");;

			$resultstat = mysql_query($querystat) or die(mysql_errno() . ": " . mysql_error() . "\n");;
        }
        else
        {
            echo 'Nieznany błąd';
        }
		
    }
}
else
{
    echo "Błąd.";
}
}
else
{
include("header.php");
?>
            <form action="vip.php" method="post">
<br><center>
<b>Komendy dla VIP'ów:</b><br>
<b>/vkolor</b> - Zmieniasz sobie kolor.<br>
<b>/vcolor</b> - Otrzymujesz specjalny kolor dla VIP'ów.<br>
<b>/vjetpack</b> - Dostajesz jetpack'a.<br>
<b>/vczas</b> - Zmieniasz sobie godzine.<br>
<b>/vpogoda</b> - Zmieniasz sobie pogodę.<br>
<b>/vtele</b> - Włączasz/Wyłączasz teleport za pomoc mapy.<br>
<b>/vbronie</b> - Ustawiasz zestaw<br>
<b>/vdotacja</b> - otrzymujesz 1 mln $<br>
<b>/vpozostalo</b> - sprawdzasz ważność vipa<BR><br>
<b>Dodatkowo otrzymujesz:</b><br>
- Kamizelka na spawnie.<br>
- O połowę zmniejszony czas oczekiwania na /zycie oraz /pancerz.<br>
- Range w chacie<br>
- Dodatkowe +2 exp za zabicie.<br>
- Dodatkowe 10000$ na spawnie.<br>
- Dwukrotnie powiększony limit maksymalnego pingu.<br>
- Brak straty exp'a przy samobójstwie.<br>
- Teleportowanie się w dowolne miejsce zaznaczone na mapie.<br>
- Powiekszone zycie pojazdu do 120.<br>
- Własny zestaw bronii na spawnie.<br>
------------------------------------------------------------------
<br>
<div class="visible-phone visible-tablet visible-desktop">
<center>Aby zakupić VIP'a (okres 30 dni) na serwerze wyślij SMS o treści <b>AA.SP</b> pod numerem <b>7455</b> Koszt: 4,92zł brutto<br>
Otrzymany kod zwrotny wpisz w poniższe pole. </center><BR>
<div class='control-group'>
  <div class='controls'>
    <div class='input-prepend'>
      <span class='add-on'><i class='icon-barcode'></i></span>
<input type='text' name='vipcode' id='inputIcon' data-provide="typeahead">    
	</div>
  </div>
</div>

                <button class="btn" name="button" type="submit"><i class="icon-shopping-cart"></i> Kup vipa!</button>
            </form>
</div>
</center>;
<? echo "
</body>
				</html>";
			}
if(!isset($_COOKIE['sessionID'])) {
?>
<meta http-equiv="refresh" content="0;URL='login.php?nolog'">
<?
	}
	include("footer.php");
?>