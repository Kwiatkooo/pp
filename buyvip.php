<?php
include_once("includes/ago.inc.php");
include("includes/connect.inc.php");

include("header.php");$czas=date("H:i");$data=date("Y-m-d");
?>
	<br><br>
	<center>
	<b>Kupno expa:</b>
	<form action="buyvip.php" method="get"><br />
	<input name="nazwa" value="$userplayer" size="20" style="width: 100px;" type="hidden">
	Ilość: <select name="t">
	<option value="1">450 EXP - 2.46 zł z VAT</option>
	<option value="2">850 EXP - 4.92 zł z VAT</option>
	<option value="3">1250 EXP - 7.38 zł z VAT</option>
	<option value="4">1500 EXP - 11.07 zł z VAT</option>
	<option value="5">4500 EXP - 23.37 zł z VAT.</option>
	<option value="6">7000 EXP - 30.75 zł z VAT.</option>
	</select>
	
	<br />
	<button class="btn" name="button" type="submit"><i class="icon-shopping-cart"></i> Przejdź do płatności</button>
	</form>
	<br />
	</center>
	
<?
					$apikey = "e4b1571e0a9c1778cdc40883b";				
					if($_GET['kod']) {
					$sms_code = mysql_real_escape_string($_GET['kod']);
					$expile = $expilosc[$_GET['t']];
					$contents = file_get_contents("http://admin.serverproject.pl/api/smsapi.php?key=$apikey&amount=$amont&code=$sms_code");

					if ($contents)
					{
					$contents = json_decode($contents);
 
					if ($contents->error)
					{   
					echo '<br><center>Nieprawidłowy kod zwrotny. Spróbuj ponownie!</center>';					$query = "INSERT INTO Vipy(`Nick`, `Czas`) VALUES ('$userplayer', 'Time()+24*60*60*31')";
					}
					else
					{
					if ($contents->status == 'ok')
					{
					echo '<br><center>Kod poprawny. EXP został zakupiony</center>';
					$query = "UPDATE Vipy SET Exp = Exp + '$expile' Nick='$userplayer' LIMIT 1";
					$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");;
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
						
if(isset($_GET['nazwa']) && isset($_GET['t']))
	{
		if($_GET['t'] < 9)
		{
		$numer = array(-1,7255,7455,7636,7936,91955,92555);
		$expilosc = array(0,gettime()+24*60*60*31,850,1250,1500,4500,7000);
		$cena = array(0,2.46,4.92,7.38,11.07,23.37,30.75);
		$amount = array(0,1,2,3,4,9,12);
		$amont = $amount[$_GET['t']];
		
		if(!isset($_GET['kod']))
		{
		?>
		
						<?php
						echo "<center>Wyślij SMS o treści AA.SP na numer {$numer[$_GET['t']]}<br />Kod zwrotny wpisz poniżej<br /><br />Twój nick: {$data}<br />Wybrana ilość: {$expilosc[$_GET['t']]} expa<br />Cena: {$cena[$_GET['t']]} zł z VAT";
						echo "<br /><br />";
						echo "<form action=\"buyexp.php\" method=\"get\"><br /><br />
							<input type=\"hidden\" name=\"t\" value=\"{$_GET['t']}\" />
							<input type=\"hidden\" name=\"nick\" value=\"$userplayer\" />
							Kod: <input name=\"kod\" value=\"\" size=\"20\" style=\"width: 100px;\" type=\"text\"><br /><br />	
							<br /><br />
							<input name=\"generuj\" value=\"Sprawdź kod\" type=\"submit\">
							</form></center>";
						?>
						<br /><br />
						<?php
					}
					}
	}

	
if(!isset($_COOKIE['sessionID'])) {
?>
<meta http-equiv="refresh" content="0;URL='login.php?nolog'">
<?
	}
	include("footer.php");
?>