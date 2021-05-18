<?php
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
$ButtonLabel = base64_decode(@$_GET['word']);
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
header("Content-type: image/jpeg");
imagejpeg($image);
?>