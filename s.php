<?
header("Content-type: image/png");
putenv('GDFONTPATH=' . realpath('.'));

$db_host = "46.4.177.235"; # -- Host mysql
$db_user = "MYSQL"; # -- Użytkownik mysql
$db_name = "MYSQL"; # -- Nazwa bazy danych
$db_pass = "kwiatek14"; # -- Hasło bazy danych

$image = imagecreatefrompng("gta4zl.png");
$colorobr = ImageColorAllocate($image, 0, 0, 0);
$color = ImageColorAllocate($image, 255,255,255);
$color2 = ImageColorAllocate($image, 217, 166, 85);
$font = "Sansation_Regular.ttf";
if(isset($_GET['nick']))
{
	mysql_connect($db_host, $db_user, $db_pass);
	mysql_select_db($db_name);
	
	$nick = mysql_real_escape_string($_GET['nick']);
	$ra = mysql_query("SELECT * FROM `players` WHERE `nick` = '{$_GET['nick']}'");
	$row = mysql_fetch_array($ra);
	$textnick = $row['nick'];
	$textmoney = $row['money'];
	$textscore = $row['score'];
	$textvisit = $row['visit'];
	$textkills = $row['kills'];
	$textdeads = $row['deads'];
	$texttime = $row['timeplay'];
	$vip = $row['vip'];
}
		
imagettftext($image, 14, 0, 19, 24, $colorobr, $font, $textnick);
imagettftext($image, 14, 0, 21, 24, $colorobr, $font, $textnick);
imagettftext($image, 14, 0, 20, 23, $colorobr, $font, $textnick);
imagettftext($image, 14, 0, 20, 25, $colorobr, $font, $textnick);
imagettftext($image, 14, 0, 20, 24, $color, $font, $textnick);

imagettftext($image, 10, 0, 24, 42, $colorobr, $font, "Kasa: ". $textmoney."$");
imagettftext($image, 10, 0, 26, 42, $colorobr, $font, "Kasa: ". $textmoney."$");
imagettftext($image, 10, 0, 25, 43, $colorobr, $font, "Kasa: ". $textmoney."$");
imagettftext($image, 10, 0, 25, 41, $colorobr, $font, "Kasa: ". $textmoney."$");
imagettftext($image, 10, 0, 25, 41, $color2, $font, "Kasa: ". $textmoney."$");
	 
imagettftext($image, 10, 0, 26, 58, $colorobr, $font, "Exp: ". $textscore);
imagettftext($image, 10, 0, 24, 58, $colorobr, $font, "Exp: ". $textscore);
imagettftext($image, 10, 0, 25, 57, $colorobr, $font, "Exp: ". $textscore);
imagettftext($image, 10, 0, 25, 59, $colorobr, $font, "Exp: ". $textscore);
imagettftext($image, 10, 0, 25, 58, $color2, $font, "Exp: ". $textscore);

imagettftext($image, 10, 0, 26, 73, $colorobr, $font, "<img src='http://panel.gold-game.xaa.pl/img/1.gif'> ");
imagettftext($image, 10, 0, 24, 73, $colorobr, $font, "Wizyt: ". $textvisit);
imagettftext($image, 10, 0, 25, 74, $colorobr, $font, "Wizyt: ". $textvisit);	
imagettftext($image, 10, 0, 25, 72, $colorobr, $font, "Wizyt: ". $textvisit);
imagettftext($image, 10, 0, 25, 73, $color2, $font, "Wizyt: ". $textvisit);

imagettftext($image, 10, 0, 179, 42, $colorobr, $font, "Zabojstw: ". $textkills);
imagettftext($image, 10, 0, 181, 42, $colorobr, $font, "Zabojstw: ". $textkills);
imagettftext($image, 10, 0, 180, 41, $colorobr, $font, "Zabojstw: ". $textkills);
imagettftext($image, 10, 0, 180, 43, $colorobr, $font, "Zabojstw: ". $textkills);
imagettftext($image, 10, 0, 180, 42, $color2, $font, "Zabojstw: ". $textkills);

imagettftext($image, 10, 0, 179, 58, $colorobr, $font, "Smierci: ". $textdeads);
imagettftext($image, 10, 0, 181, 58, $colorobr, $font, "Smierci: ". $textdeads);
imagettftext($image, 10, 0, 180, 57, $colorobr, $font, "Smierci: ". $textdeads);
imagettftext($image, 10, 0, 180, 59, $colorobr, $font, "Smierci: ". $textdeads);
imagettftext($image, 10, 0, 180, 58, $color2, $font, "Smierci: ". $textdeads);

$tp = round(intval($texttime) / 60);
$m = $row['timeplay'];
$h = 0;
while($m >= 60)
{
	$h = $h + 1;
	$m = $m - 60;
}
imagettftext($image, 10, 0, 179, 73, $colorobr, $font, "Czas gry: ". $h ."h ". $m ."min");
imagettftext($image, 10, 0, 181, 73, $colorobr, $font, "Czas gry: ". $h ."h ". $m ."min");
imagettftext($image, 10, 0, 180, 72, $colorobr, $font, "Czas gry: ". $h ."h ". $m ."min");
imagettftext($image, 10, 0, 180, 74, $colorobr, $font, "Czas gry: ". $h ."h ". $m ."min");
imagettftext($image, 10, 0, 180, 73, $color2, $font, "Czas gry: ". $h ."h ". $m ."min");

if($vip != 0)
{
	imagettftext($image, 11, 10, 310, 38, ImageColorAllocate($image, 255, 240, 0), $font, "VIP");
}

imagealphablending($image, false);
imagesavealpha($image, true);
imagepng($image);
ImageDestroy($image);
?>