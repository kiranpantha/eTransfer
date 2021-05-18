<?php
function gotthedata()
{
$random_data=rand('0','41');
$data_words=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','.','P','Q','R','S','T','U','V','W','X','Y','Z','!','@','#','$','&','*','1','2','3','4','5','6','7','8','9',':');
return $data_words[$random_data];
}

function totalcaptcha()
{
   $result_1=$result_2=NULL;
   $i=1;
   $a_c=NULL;
   for ($i;$i<=9;$i++)
   {
     $a_c[$i]=gotthedata(0);
   }
   //
   $i=1;
   for($i;$i<=9;$i++)
   {
      $result_1.=$a_c[$i];
      $result_2.=$a_c[$i].' ';
   }
return array($result_1,$result_2);
}
/** Compare closest color to real color**/
//attempt to open image, suppress error messages
$image = @imagecreatefrompng("png_captcha_background.png");
//find index of color closest to pure magenta
//$magentaIndex = imagecolorclosest($image, 255, 0, 255);
//get RGB values
//$colorArray = imagecolorsforindex($image, $magentaIndex);
//allocate closest color
//$colorMagenta = imagecolorallocate($image,
//$colorArray["red"],
//$colorArray["green"],
//$colorArray["blue"]);
/*
** JPEG button
** Creates a graphical button based
** on form variables.
*/
//set parameters if not given
if(!isset($ButtonWidth))
{
$ButtonWidth = 200;
}
if(!isset($ButtonHeight))
{
$ButtonHeight = 30;
}
if(!isset($ButtonLabel))
{
$captcha=totalcaptcha();
$ButtonLabel =$captcha[1];
;
}
if(!isset($ButtonFont))
{
$ButtonFont = 14;
}
//create image and colors
$image = @imagecreatefrompng("png_captcha_background.png");

$colorBody = imagecolorallocate($image, 0xFF,
0x00, 0x00);
$colorShadow = imagecolorallocate($image, 0x00,
0x00, 0x00);
$colorHighlight = imagecolorallocate($image, 0xCC,
0xCC, 0xCC);
//draw bottom shadow
imageline($image,
0, $ButtonHeight-1,
$ButtonWidth-1, $ButtonHeight-1,
$colorShadow);
//draw right shadow
imageline($image,
$ButtonWidth-1, 1,
$ButtonWidth-1, $ButtonHeight-1,
$colorShadow);
//draw top highlight
imageline($image,
0, 0,
$ButtonWidth-1, 0,
$colorHighlight);
//draw left highlight
imageline($image,
0, 0,
0, $ButtonHeight-2,
$colorHighlight);
//determine label size
$ButtonLabelHeight = imagefontheight($ButtonFont);
$ButtonLabelWidth = imagefontwidth($ButtonFont) * strlen($ButtonLabel);
//determine label upper left corner
$ButtonLabelX = ($ButtonWidth -
$ButtonLabelWidth)/2;
$ButtonLabelY = ($ButtonHeight -
$ButtonLabelHeight)/2;
//draw label shadow
imagestring($image,
$ButtonFont,
$ButtonLabelX+1,
$ButtonLabelY+1,
$ButtonLabel,
$colorShadow);
//draw label
imagestring($image,
$ButtonFont,
$ButtonLabelX,
$ButtonLabelY,
$ButtonLabel,
$colorHighlight);
//send image
//write the current status to the browser
require('../dbconn.php');
$browseripaddress=$_SERVER['REMOTE_ADDR'];
$sql_check="SELECT * FROM `security_check` WHERE ip='$browseripaddress'";
$result_check=mysql_query($sql_check);
$count=mysql_num_rows($result_check);
$security=$captcha[0];
if($count==0)
{
$sql = "INSERT INTO `$db_name`.`security_check` (`ip`, `code`) VALUES ('$browseripaddress', '$security');";
$result=mysql_query($sql);
}
else
{
$sql = "UPDATE `$db_name`.`security_check` SET `code` = '$security' WHERE `security_check`.`ip` = '$browseripaddress';";
$result=mysql_query($sql);
}
header("Content-type: image/png");
imagepng($image);
?>