<?php
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: text/html");
mb_http_input("utf-8");
mb_http_output("utf-8");
//url
$url='';
//image
$image1="images/e-ani.gif";
//$image2="images/npflagg.gif";
$image2="images/nplogo.png";
$image3=$urlveri="images/verisign_trans.png";
//text
$lang=@$_COOKIE['lang'];
$lang_check=$lang;
if($lang=='np')
{
require('userfiles/np.php');
}
else
{
require('userfiles/en.php');
}
?>