<?php
$email=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
require('class/verifylogin_special.php');
$verify_obj=new verify_atnow();
$admin_what=$verify_obj->verified($email,$pass1,$pass2);
if ($admin_what=="NULL")
{
$lang=@$_COOKIE['lang'];
if($lang=='np')
{
$info1="<a class=\"modal-button\" title=\"Log in\" href=\"login.php?admin=login&post=".$_SERVER['PHP_SELF']." \" rel=\"{handler:'iframe', size: {x: 680, y: 560}, overlayOpacity: 0.7}\"><input type=\"button\" value=\"भित्रिनुहोस\" class=\"tryit\"></a>";
$info2="<br /><a href=\"register.php\"><input type=\"button\" value=\"नयाँ दर्ता\" class=\"tryit\"></a>";
}
else
{
$info1="<a class=\"modal-button\" title=\"Log in\" href=\"login.php?admin=login&post=".$_SERVER['PHP_SELF']." \" rel=\"{handler:'iframe', size: {x: 680, y: 560}, overlayOpacity: 0.7}\"><input type=\"button\" value=\"Login\" class=\"tryit\"></a>";
$info2="<br /><a href=\"register.php\"><input type=\"button\" value=\"Register\" class=\"tryit\"></a>";

}
}
else
{
  if($lang=='np')
  {
  $info1="<font color=\"red\" size=\"-1\">स्वागतम <br /> <b>$email</b></font>";
  $info2="<a href=\"login.php?admin=logout&post=".$_SERVER['PHP_SELF']."\"  class=\"tryit\">बाहिरिनुहोस्</a>";
  }
  else
  {
  $info1="<font color=\"red\" size=\"-1\">Welcome<br /> <b>$email</b></font>";
  $info2="<a href=\"login.php?admin=logout&post=".$_SERVER['PHP_SELF']."\"  class=\"tryit\">Want to sign out</a>";
  }
}
echo $info1;
echo $info2;
?>
