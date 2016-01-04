<?php	
  $var = @$_GET['q'] ;
  $pic = @$_GET['pic'] ;
  $trimmed = trim($var);
  $pictype = trim($pic); //trim whitespace from the stored variable
// rows to return
$limit=1; 



// check for an empty string and display a message.
if ($trimmed == "")
  {
		fatal_error('No username found in URL') ;
  }
// check for a search parameter
if (!isset($var))
  {
  echo "<p>We dont seem to have a search parameter!</p>";
  exit;
  }

//connect to your database ** EDIT REQUIRED HERE **
mysql_connect("localhost","root","hahalera123"); //(host, username, password)

//specify database ** EDIT REQUIRED HERE **
mysql_select_db("samp") or die("Unable to select database"); //select which database we're using

// Build SQL Query  
$query = "select * from Accounts where Name='$trimmed'  "; // EDIT HERE and specify your table and field names for the SQL query
$query1 = "select * from Props where pOwner='$trimmed'  "; // EDIT HERE and specify your table and field names for the SQL query


 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);

// If we have no results, offer a google search as an alternative

if ($numrows == 0)
  {
		fatal_error('User was not found in our database') ;
  }

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }

// get results
  $query .= " limit $s,$limit";
  $result = mysql_query($query) or die("Couldn't execute query");
  $result1 = mysql_query($query1) or die("Couldn't execute query");

    while ($row= mysql_fetch_array($result1)) {
	$prop_ = $row["pName"];
	}

if($prop_ == "") {
$prop = "None";
}
else
{
$prop = $prop_;
}
	
// now you can display the results returned
  while ($row= mysql_fetch_array($result)) {
  $nume = $row["Name"];
  $level = $row["Level"];
  $sadmin_ = $row['SAdmin'];
  $vip_ = $row["Vip"];
  $cash = $row["Cash"];
  $rvip_ = $row["rVip"];
  $kills = $row["Kills"];
  $deaths = $row["Deaths"];
  $online = $row["Online"];
  $positive = $row["Positive"];
  $negative = $row["Negative"];
  $score = $row["Score"];
  $coins = $row["Coins"];
}
// Build SQL Query  
$query1 = "SELECT * FROM Houses WHERE Name='$nume'  ";  // EDIT HERE and specify your table and field names for the SQL query
  $result1 = mysql_query($query1) ;
  $hashouse = mysql_num_rows($result1);
  if($hashouse == "1") {
  $house = "Yes";
  }
  if($hashouse == "0") {
  $house = "No";
  }
	  if ( $vip_ == 1 )
	  {
		$vip = "Yes";
	  }
	  else
	  {
		$vip = "No";
	  }
	  if ( $rvip_ == 1 )
	  {
		$rvip = "Yes";
	  }
	  else
	  {
		$rvip = "No";
	  }
  $respect = "+ {$positive} / - {$negative}";

	// customizable variables
	$font_file 		= 'cf.ttf';
	$font_size  	= 9 ; // font size in pts
	$font_color 	= '#FFFFFF' ;
	$image_file 	= 'bk1.png';
	  if ( $pic == "" )
	  {
		$image_file = "bk1.png";
	  }
	  if ( $pic == "1" )
	  {
		$image_file = "bk2.png";
	  }
	  if ( $pic == "" )
	  {
		$font_color = "#FFFFFF";
	  }
	  if ( $pic == "1" )
	  {
		$font_color = "#0065ff";
	  }


	// trust me for now...in PNG out PNG
	$mime_type 			= 'image/png' ;
	$extension 			= '.png' ;
	$s_end_buffer_size 	= 4096 ;

	// check for GD support
	if(!function_exists('ImageCreate'))
		fatal_error('Error: Server does not support PHP image generation') ;
	
	// check font availability;
	if(!is_readable($font_file)) {
		fatal_error('Error: The server is missing the specified font.') ;
	}

	// create and measure the text
	$font_rgb = hex_to_rgb($font_color) ;
	$box = @ImageTTFBBox($font_size,0,$font_file,$nume) ;
	$box = @ImageTTFBBox($font_size,0,$font_file,$dep) ;
	
	$nume_width = abs($box[2]-$box[0]);
	$nume_height = abs($box[5]-$box[3]);
	$level_width = abs($box[2]-$box[0]);
	$level_height = abs($box[5]-$box[3]);
	$sadmin_width = abs($box[2]-$box[0]);
	$sadmin_height = abs($box[5]-$box[3]);
	$prop_width = abs($box[2]-$box[0]);
	$prop_height = abs($box[5]-$box[3]);
	$vip_width = abs($box[2]-$box[0]);
	$vip_height = abs($box[5]-$box[3]);
	$rvip_width = abs($box[2]-$box[0]);
	$rvip_height = abs($box[5]-$box[3]);
	$kills_width = abs($box[2]-$box[0]);
	$kills_height = abs($box[5]-$box[3]);
	$deaths_width = abs($box[2]-$box[0]);
	$deaths_height = abs($box[5]-$box[3]);
	$online_width = abs($box[2]-$box[0]);
	$online_height = abs($box[5]-$box[3]);
	$gang_width = abs($box[2]-$box[0]);
	$gang_height = abs($box[5]-$box[3]);
	$respect_width = abs($box[2]-$box[0]);
	$respect_height = abs($box[5]-$box[3]);
	$score_width = abs($box[2]-$box[0]);
	$score_height = abs($box[5]-$box[3]);
	$coins_width = abs($box[2]-$box[0]);
	$coins_height = abs($box[5]-$box[3]);
	
	$image =  imagecreatefrompng($image_file);
	
	if(!$image || !$box)
	{
		fatal_error('Error: The server could not create this image.') ;
	}
	
	// allocate colors and measure final text position
	$font_color = ImageColorAllocate($image,$font_rgb['red'],$font_rgb['green'],$font_rgb['blue']) ;
	
	$image_width = imagesx($image);
	
//Place names
imagettftext($image, $font_size, 0, "140",  "77", $font_color, $font_file, "Level:");
imagettftext($image, $font_size, 0, "140",  "90", $font_color, $font_file, "VIP:");
imagettftext($image, $font_size, 0, "140",  "103", $font_color, $font_file, "Hours:");
imagettftext($image, $font_size, 0, "140",  "116", $font_color, $font_file, "Coins:");
imagettftext($image, $font_size, 0, "358",  "36", $font_color, $font_file, "Cash: $");
imagettftext($image, $font_size, 0, "358",  "49", $font_color, $font_file, "Kills:");
imagettftext($image, $font_size, 0, "358",  "62", $font_color, $font_file, "Deaths:");
imagettftext($image, $font_size, 0, "358",  "75", $font_color, $font_file, "Score:");
imagettftext($image, $font_size, 0, "358",  "88", $font_color, $font_file, "Respect:");
imagettftext($image, $font_size, 0, "358",  "101", $font_color, $font_file, "Owns a house:");
imagettftext($image, $font_size, 0, "358",  "114", $font_color, $font_file, "Property:");

	
	  if ( $pic == "" )
	  {
	$put_text_x =141;
	$put_text_y =45;
	$put_text_xlevel = 178;
	$put_text_ylevel =77;
	$put_text_xcash =407;
	$put_text_ycash =36;
	$put_text_xsadmin =260;
	$put_text_ysadmin =82;
	$put_text_xprop =420;
	$put_text_yprop =114;
	$put_text_xvip =167;
	$put_text_yvip =90;
	$put_text_xrvip =238;
	$put_text_yrvip =100;
	$put_text_xkills =393;
	$put_text_ykills =49;
	$put_text_xdeaths =406;
	$put_text_ydeaths =62;
	$put_text_xonline =182;
	$put_text_yonline =103;
	$put_text_xrespect =415;
	$put_text_yrespect =88;
	$put_text_xscore =399;
	$put_text_yscore =75;
	$put_text_xcoins =180;
	$put_text_ycoins =116;
	$put_text_xhouse =451;
	$put_text_yhouse =101;
	   }
	  if ( $pic == "1" )
	  {
	$put_text_x =141;
	$put_text_y =45;
	$put_text_xlevel = 178;
	$put_text_ylevel =77;
	$put_text_xcash =407;
	$put_text_ycash =36;
	$put_text_xsadmin =260;
	$put_text_ysadmin =82;
	$put_text_xprop =420;
	$put_text_yprop =114;
	$put_text_xvip =167;
	$put_text_yvip =90;
	$put_text_xrvip =238;
	$put_text_yrvip =100;
	$put_text_xkills =393;
	$put_text_ykills =49;
	$put_text_xdeaths =406;
	$put_text_ydeaths =62;
	$put_text_xonline =182;
	$put_text_yonline =103;
	$put_text_xrespect =415;
	$put_text_yrespect =88;
	$put_text_xscore =399;
	$put_text_yscore =75;
	$put_text_xcoins =180;
	$put_text_ycoins =116;
	$put_text_xhouse =451;
	$put_text_yhouse =101;
	  }
	// Write the text
	imagettftext($image, "13", 0, $put_text_x,  $put_text_y, $font_color, $font_file, $nume);
	imagettftext($image, $font_size, 0, $put_text_xlevel,  $put_text_ylevel, $font_color, $font_file, $level);
	imagettftext($image, $font_size, 0, $put_text_xcash,  $put_text_ycash, $font_color, $font_file, $cash);
	imagettftext($image, $font_size, 0, $put_text_xprop,  $put_text_yprop, $font_color, $font_file, $prop);
	imagettftext($image, $font_size, 0, $put_text_xvip,  $put_text_yvip, $font_color, $font_file, $vip);
	imagettftext($image, $font_size, 0, $put_text_xkills,  $put_text_ykills, $font_color, $font_file, $kills);
	imagettftext($image, $font_size, 0, $put_text_xdeaths,  $put_text_ydeaths, $font_color, $font_file, $deaths);
	imagettftext($image, $font_size, 0, $put_text_xonline,  $put_text_yonline, $font_color, $font_file, $online);
	imagettftext($image, $font_size, 0, $put_text_xrespect,  $put_text_yrespect, $font_color, $font_file, $respect);
	imagettftext($image, $font_size, 0, $put_text_xscore,  $put_text_yscore, $font_color, $font_file, $score);
	imagettftext($image, $font_size, 0, $put_text_xcoins,  $put_text_ycoins, $font_color, $font_file, $coins);
	imagettftext($image, $font_size, 0, $put_text_xhouse,  $put_text_yhouse, $font_color, $font_file, $house);
	
	header('Content-type: ' . $mime_type) ;
	ImagePNG($image) ;

	ImageDestroy($image) ;
	exit ;

	
	/*
		attempt to create an image containing the error message given. 
		if this works, the image is sent to the browser. if not, an error
		is logged, and passed back to the browser as a 500 code instead.
	*/
	function fatal_error($message)
	{
		// send an image
		if(function_exists('ImageCreate'))
		{
			$width = ImageFontWidth(5) * strlen($message) + 10 ;
			$height = ImageFontHeight(5) + 10 ;
			if($image = ImageCreate($width,$height))
			{
				$background = ImageColorAllocate($image,255,255,255) ;
				$nume_color = ImageColorAllocate($image,0,0,0) ;
				$dep_color = ImageColorAllocate($image,0,0,0) ;
				ImageString($image,5,5,5,$message,$nume_color) ;    
				ImageString($image,5,5,5,$message,$dep_color) ;    
				header('Content-type: image/png') ;
				ImagePNG($image) ;
				ImageDestroy($image) ;
				exit ;
			}
		}
	
		// send 500 code
		header("HTTP/1.0 500 Internal Server Error") ;
		print($message) ;
		exit ;
	}
	
	
	/* 
		decode an HTML hex-code into an array of R,G, and B values.
		accepts these formats: (case insensitive) #ffffff, ffffff, #fff, fff 
	*/    
	function hex_to_rgb($hex) {
		// remove '#'
		if(substr($hex,0,1) == '#')
			$hex = substr($hex,1) ;
	
		// expand short form ('fff') color to long form ('ffffff')
		if(strlen($hex) == 3) {
			$hex = substr($hex,0,1) . substr($hex,0,1) .
				   substr($hex,1,1) . substr($hex,1,1) .
				   substr($hex,2,1) . substr($hex,2,1) ;
		}
	
		if(strlen($hex) != 6)
			fatal_error('Error: Invalid color "'.$hex.'"') ;
	
		// convert from hexidecimal number systems
		$rgb['red'] = hexdec(substr($hex,0,2)) ;
		$rgb['green'] = hexdec(substr($hex,2,2)) ;
		$rgb['blue'] = hexdec(substr($hex,4,2)) ;
	
		return $rgb ;
	}
?>