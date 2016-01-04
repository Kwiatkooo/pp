<?
header("Content-type: image/png");
putenv('GDFONTPATH=' . realpath('.'));

$db_host = "mysql-fr1.ServerProject.pl"; # -- Host mysql
$db_user = "db_7023"; # -- Użytkownik mysql
$db_name = "db_7023"; # -- Nazwa bazy danych
$db_pass = "92f198cc360b"; # -- Hasło bazy danych

$image = imagecreatefrompng("night.png");
$colorobr = ImageColorAllocate($image, 0, 0, 0);
$font_color = ImageColorAllocate($image, 255,255,255);

$mod_color = ImageColorAllocate($image, 204,0,204);
$admin_color = ImageColorAllocate($image, 0,123,255);
$jun_color = ImageColorAllocate($image, 139,114,86);
$elite_color = ImageColorAllocate($image, 255,128,0);
$head_color = ImageColorAllocate($image, 212,0,0);
$vip_color = ImageColorAllocate($image, 255,255,32);

$color2 = ImageColorAllocate($image, 217, 166, 85);
$font_colorr = ImageColorAllocate($image,$font_rgb['white'],$font_rgb['white'],$font_rgb['white']) ;
$font_size  	= 11 ;
$font = "stencilia-bold.ttf";

	mysql_connect($db_host, $db_user, $db_pass);
	mysql_select_db($db_name);

	$privcares = mysql_num_rows(mysql_query('SELECT * FROM privcar WHERE privcar > 0'));
	


imagettftext($image, 15, 0, 120,  25, $font_color, $font, $privcares);



imagealphablending($image, false);
imagesavealpha($image, true);
imagepng($image);
ImageDestroy($image);
imagepng($skinImg);
?>