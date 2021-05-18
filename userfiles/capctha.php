<?php
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
$ButtonFont = 5;
}
//create image and colors
$image = imagecreate($ButtonWidth, $ButtonHeight);
$colorBody = imagecolorallocate($image, 0xFF,
0x00, 0x00);
$colorShadow = imagecolorallocate($image, 0x00,
0x00, 0x00);
$colorHighlight = imagecolorallocate($image, 0xCC,
0xCC, 0xCC);
//create body of button
imagefilledrectangle($image,
1, 1, $ButtonWidth-2, $ButtonHeight-2,
$colorBody);
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
$ButtonLabelWidth = imagefontwidth($ButtonFont) *
strlen($ButtonLabel);
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
//output image
header("Content-type: image/jpeg");
imagejpeg($image);
?>