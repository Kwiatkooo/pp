<?
header("Content-type: image/png");
putenv('GDFONTPATH=' . realpath('.'));

$db_host = "awfesa.xaa.pl"; # -- Host mysql
$db_user = "awfesa_priv"; # -- Użytkownik mysql
$db_name = "awfesa_samp"; # -- Nazwa bazy danych
$db_pass = "Kwiatek14"; # -- Hasło bazy danych

$image = imagecreatefrompng("player.png");
$colorobr = ImageColorAllocate($image, 255, 255, 255); 
$color = ImageColorAllocate($image, 255,255,255);
$color2 = ImageColorAllocate($image, 255, 255, 255);
$color3 = ImageColorAllocate($image, 255, 255, 255);
$font = "whitrabt.ttf";
$wielkoscfont = "9";
mysql_connect($db_host, $db_user, $db_pass);
	mysql_select_db($db_name);


$accounts = mysql_num_rows(mysql_query('SELECT * FROM bans'));





$largeur_source = imagesx($image); 
$hauteur_source = imagesy($image); 
$police = 25; 
$angle = 0;  


$coord = imagettfbbox($police, $angle, $font, $a); 
$c=$coord[4] - $coord[6];  
$d=$coord[3] - $coord[5]; 
$y=($hauteur_source - $d)/2;  
$x=($largeur_source - $c)/2;  




imagettftext($image, $police, $angle, $x, $y, $colorobr, $font, $accounts);


imagettftext($image, $wielkoscfont, 0, 2, 60, $colorobr, $font, "Graczay online");
imagettftext($image, $wielkoscfont, 0, 2, 60, $colorobr, $font, "Graczay online");
imagettftext($image, $wielkoscfont, 0, 2, 60, $colorobr, $font, "Graczay online");
imagettftext($image, $wielkoscfont, 0, 2, 60, $colorobr, $font, "Graczay online ");
imagettftext($image, $wielkoscfont, 0, 2, 60, $color2, $font, "Graczay online ");
	 






imagealphablending($image, false);
imagesavealpha($image, true);
imagepng($image);
ImageDestroy($image);
?>