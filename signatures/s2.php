<?
header("Content-type: image/png");
putenv('GDFONTPATH=' . realpath('.'));

$db_host = "awfesa.xaa.pl"; # -- Host mysql
$db_user = "awfesa_priv"; # -- Użytkownik mysql
$db_name = "awfesa_samp"; # -- Nazwa bazy danych
$db_pass = "Kwiatek14"; # -- Hasło bazy danych

$image = imagecreatefrompng("gta15.png");
$colorobr = ImageColorAllocate($image, 255, 255, 255); 
$color = ImageColorAllocate($image, 255,255,255);
$color2 = ImageColorAllocate($image, 255, 255, 255);
$color3 = ImageColorAllocate($image, 255, 255, 255);
$font = "whitrabt.ttf";
$wielkoscfont = "10";
if(isset($_GET['nick']))
{
	
	
	
	mysql_connect($db_host, $db_user, $db_pass);
	mysql_select_db($db_name);
	
	$nick = mysql_real_escape_string($_GET['nick']);
	$ra = mysql_query("SELECT * FROM `Players` WHERE `Nick` = '{$_GET['nick']}'");
	$row = mysql_fetch_array($ra);
	$textnick = $row['Nick'];
	$textmoney = $row['BankMoney'];
	$textscore = $row['Exp'];
	$textvisit = $row['Visits'];
	$textkills = $row['Kills'];
	$textdeads = $row['Deaths'];
	$textSzafir = $row['Szafir'];
	$textBonusy = $row['Bonusy'];
	$textTags = $row['Tags'];
	$textsky2 = $row['SkyP2'];
	$textsky1 = $row['SkyP1'];
	$textSkin = $row['Skin'];
	$czass = $row["PlayingTime"];	
	$Hours = $czass/3600;
	$cena=number_format($Hours, 0, ',', '');
	$Godzin = $cena - 1;
	$Minutes = ($czass%3600)/60;
	$Minut=number_format($Minutes, 0, ',', '');
	$src = imagecreatefrompng("../skins/Skin_". $textSkin.".png");
	

	
	$level = 0;
	
	$Level1 = "SELECT * FROM Vipy WHERE Nick='{$_GET['nick']}'";
	$LVL = mysql_query($Level1) or die("Failed");
	if($LVL != 0)
	{
		while ($row= mysql_fetch_array($LVL)) 
		{
			$Czas = $row["Czas"];
			if($Czas != '0')
			{
				$ranga = "   Vip";
				$level = 99;
			}
		}
	}		
	
	$Level1 = "SELECT * FROM Admins WHERE Nick='{$_GET['nick']}'";
	$LVL = mysql_query($Level1) or die("Failed");
	if($LVL != 0)
	{
		while ($row= mysql_fetch_array($LVL)) 
		{
			$level = $row["Ranga"];
			
			if ($level=='1') 
			{
				$ranga = "J.Moderator";
			}else
			if ($level=='2') 
			{
				$ranga = "Moderator";
			}else
			if ($level=='3') 
			{
				$ranga = "J.Admin";
			}else
			if ($level=='4') 
			{
				$ranga = "Admin";
			}else
			if ($level=='5') 
			{
				$ranga = "Elite Admin";
			}else
			if ($level=='6') 
			{
				$ranga = "J.Head Admin";
			}else
			if ($level=='7') 
			{
				$ranga = "Head Admin";
			}				
			
		}	
	}
	if ($level=='0')
	{
		$ranga = "  Gracz";
	}
	
	
	
	
	
	
}
	imagecopymerge($image, $src, 35, 40, 0, 0, 55, 100, 100);	
imagettftext($image, 14, 0, 10, 17, $colorobr, $font, $textnick);
imagettftext($image, 14, 0, 10, 17, $colorobr, $font, $textnick);
imagettftext($image, 14, 0, 10, 17, $colorobr, $font, $textnick);
imagettftext($image, 14, 0, 10, 17, $colorobr, $font, $textnick);
imagettftext($image, 14, 0, 10, 17, $color, $font, $textnick);

imagettftext($image, $wielkoscfont, 0, 140, 57, $colorobr, $font, "Kasa: ". $textmoney."$");
imagettftext($image, $wielkoscfont, 0, 140, 57, $colorobr, $font, "Kasa: ". $textmoney."$");
imagettftext($image, $wielkoscfont, 0, 140, 57, $colorobr, $font, "Kasa: ". $textmoney."$");
imagettftext($image, $wielkoscfont, 0, 140, 57, $colorobr, $font, "Kasa: ". $textmoney."$");
imagettftext($image, $wielkoscfont, 0, 140, 57, $color2, $font, "Kasa: ". $textmoney."$");
	 
imagettftext($image, $wielkoscfont, 0, 140, 72, $colorobr, $font, "Exp: ". $textscore);
imagettftext($image, $wielkoscfont, 0, 140, 72, $colorobr, $font, "Exp: ". $textscore);
imagettftext($image, $wielkoscfont, 0, 140, 72, $colorobr, $font, "Exp: ". $textscore);
imagettftext($image, $wielkoscfont, 0, 140, 72, $colorobr, $font, "Exp: ". $textscore);
imagettftext($image, $wielkoscfont, 0, 140, 72, $color2, $font, "Exp: ". $textscore);

imagettftext($image, $wielkoscfont, 0, 140, 87, $colorobr, $font, "Wizyt: ". $textvisit);
imagettftext($image, $wielkoscfont, 0, 140, 87, $colorobr, $font, "Wizyt: ". $textvisit);
imagettftext($image, $wielkoscfont, 0, 140, 87, $colorobr, $font, "Wizyt: ". $textvisit);	
imagettftext($image, $wielkoscfont, 0, 140, 87, $colorobr, $font, "Wizyt: ". $textvisit);
imagettftext($image, $wielkoscfont, 0, 140, 87, $color2, $font, "Wizyt: ". $textvisit);

imagettftext($image, $wielkoscfont, 0, 140, 102, $colorobr, $font, "Zabic: ". $textkills);
imagettftext($image, $wielkoscfont, 0, 140, 102, $colorobr, $font, "Zabic: ". $textkills);
imagettftext($image, $wielkoscfont, 0, 140, 102, $colorobr, $font, "Zabic: ". $textkills);	
imagettftext($image, $wielkoscfont, 0, 140, 102, $colorobr, $font, "Zabic: ". $textkills);
imagettftext($image, $wielkoscfont, 0, 140, 102, $color2, $font, "Zabic: ". $textkills);

imagettftext($image, $wielkoscfont, 0, 140, 117, $colorobr, $font, "Smierci: ". $textdeads);
imagettftext($image, $wielkoscfont, 0, 140, 117, $colorobr, $font, "Smierci: ". $textdeads);
imagettftext($image, $wielkoscfont, 0, 140, 117, $colorobr, $font, "Smierci: ". $textdeads);	
imagettftext($image, $wielkoscfont, 0, 140, 117, $colorobr, $font, "Smierci: ". $textdeads);
imagettftext($image, $wielkoscfont, 0, 140, 117, $color2, $font, "Smierci: ". $textdeads);



imagettftext($image, $wielkoscfont, 0, 140, 132, $colorobr, $font, "Czas:". $Godzin .":" . $Minut);
imagettftext($image, $wielkoscfont, 0, 140, 132, $colorobr, $font, "Czas:". $Godzin .":" . $Minut);
imagettftext($image, $wielkoscfont, 0, 140, 132, $colorobr, $font, "Czas:". $Godzin .":" . $Minut);	
imagettftext($image, $wielkoscfont, 0, 140, 132, $colorobr, $font, "Czas:". $Godzin .":" . $Minut);
imagettftext($image, $wielkoscfont, 0, 140, 132, $color2, $font, "Czas:". $Godzin .":" . $Minut);




imagettftext($image, $wielkoscfont, 0, 280, 80, $colorobr, $font, "Bonusy: ". $textdeads);
imagettftext($image, $wielkoscfont, 0, 280, 80, $colorobr, $font, "Bonusy: ". $textdeads);
imagettftext($image, $wielkoscfont, 0, 280, 80, $colorobr, $font, "Bonusy: ". $textdeads);	
imagettftext($image, $wielkoscfont, 0, 280, 80, $colorobr, $font, "Bonusy: ". $textdeads);
imagettftext($image, $wielkoscfont, 0, 280, 80, $color2, $font, "Bonusy: ". $textdeads);

imagettftext($image, $wielkoscfont, 0, 280, 95, $colorobr, $font, "Safirow: ". $textSzafir);
imagettftext($image, $wielkoscfont, 0, 280, 95, $colorobr, $font, "Safirow: ". $textSzafir);
imagettftext($image, $wielkoscfont, 0, 280, 95, $colorobr, $font, "Safirow: ". $textSzafir);	
imagettftext($image, $wielkoscfont, 0, 280, 95, $colorobr, $font, "Safirow: ". $textSzafir);
imagettftext($image, $wielkoscfont, 0, 280, 95, $color2, $font, "Safirow: ". $textSzafir);

imagettftext($image, $wielkoscfont, 0, 280, 110, $colorobr, $font, "Tagi: ". $textTags);
imagettftext($image, $wielkoscfont, 0, 280, 110, $colorobr, $font, "Tagi: ". $textTags);
imagettftext($image, $wielkoscfont, 0, 280, 110, $colorobr, $font, "Tagi: ". $textTags);	
imagettftext($image, $wielkoscfont, 0, 280, 110, $colorobr, $font, "Tagi: ". $textTags);
imagettftext($image, $wielkoscfont, 0, 280, 110, $color2, $font, "Tagi: ". $textTags);

imagettftext($image, $wielkoscfont, 0, 280, 125, $colorobr, $font, "Sky1: ". $textsky1);
imagettftext($image, $wielkoscfont, 0, 280, 125, $colorobr, $font, "Sky1: ". $textsky1);
imagettftext($image, $wielkoscfont, 0, 280, 125, $colorobr, $font, "Sky1: ". $textsky1);	
imagettftext($image, $wielkoscfont, 0, 280, 125, $colorobr, $font, "Sky1: ". $textsky1);
imagettftext($image, $wielkoscfont, 0, 280, 125, $color2, $font, "Sky1: ". $textsky1);

imagettftext($image, $wielkoscfont, 0, 280, 140, $colorobr, $font, "Sky2: ". $textsky2);
imagettftext($image, $wielkoscfont, 0, 280, 140, $colorobr, $font, "Sky2: ". $textsky2);
imagettftext($image, $wielkoscfont, 0, 280, 140, $colorobr, $font, "Sky2: ". $textsky2);	
imagettftext($image, $wielkoscfont, 0, 280, 140, $colorobr, $font, "Sky2: ". $textsky2);
imagettftext($image, $wielkoscfont, 0, 280, 140, $color2, $font, "Sky2: ". $textsky2);

imagettftext($image, $wielkoscfont, 0, 310, 15, $colorobr, $font, $ranga);
imagettftext($image, $wielkoscfont, 0, 310, 15, $colorobr, $font, $ranga);
imagettftext($image, $wielkoscfont, 0, 310, 15, $colorobr, $font, $ranga);	
imagettftext($image, $wielkoscfont, 0, 310, 15, $colorobr, $font, $ranga);
imagettftext($image, $wielkoscfont, 0, 310, 15, $color2, $font, $ranga);


if($vip != 0)
{
	imagettftext($image, 13, 10, 310, 87, ImageColorAllocate($image, 255, 240, 0), $font, "VIP");
}

imagealphablending($image, false);
imagesavealpha($image, true);
imagepng($image);
ImageDestroy($image);
?>