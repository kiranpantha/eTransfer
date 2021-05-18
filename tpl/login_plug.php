<?php
$text_to_print=NULL;
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
$info1="<a class=\"modal-button\" title=\"Log in\" href=\"login.php?admin=login&post=".$_SERVER['PHP_SELF']." \" rel=\"{handler:'iframe', size: {x: 680, y: 560}, overlayOpacity: 0.7}\"><input type=\"button\" value=\"भित्रिनुहोस\"  class=\"let_us_epay_register\" ></a>";
$info2="<br /><a href=\"register.php\"><input type=\"button\" value=\"नयाँ दर्ता\" class=\"let_us_epay_register\"></a>";
}
else
{
$info1="<a class=\"modal-button\" title=\"Log in\" href=\"login.php?admin=login&post=".$_SERVER['PHP_SELF']." \" rel=\"{handler:'iframe', size: {x: 680, y: 560}, overlayOpacity: 0.7}\"><input type=\"button\" value=\"Login\" class=\"let_us_epay_register\"></a>";
$info2="<br /><a href=\"register.php\" onclick=\"register.php\"><input type=\"button\" value=\"Register\" class=\"let_us_epay_register\"></a>";

}
}
else
{
$date1=$date2=NULL;
require('class/_last_.php');
require('date_diff.php');
$et_logindata=new _last_();
$got_array=$et_logindata->_info_();
$date1=$got_array[0];
$date2=date('U');
echo '
<script type="text/javascript">
<!--
document.getElementById(\'lastloggedin\').innerHTML="Last activity : <br>'.getthediff($date1,$date2).'";
-->
</script>';
$text_to_print='
<style type="text/css">
<!--
.timeago {color: #00FF00; font-size:12px;}
.viaIP {color: #0000FF; font-size:12px;}
.browser {color: #8000FF; font-size:12px;}
.left {color: #CCCCCC; font-size:12px;}
-->
</style>
<table border="1" cellpadding="0" cellspacing="0"><tr><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="style8">Last</span></td>
    <td><span class="style8">&nbsp;activity</span></td>
  </tr>
  <tr>
    <td class="left"><span class="style8">Date : </span></td>
    <td><span class="timeago">'.date('Y/m/d',$got_array[0]).'</span></td>
  </tr>
  <tr>
    <td class="left"><span class="style8">Time</span></td>
    <td><span class="timeago">'.date("h:i:s A",$got_array[0]).' GMT</span></td>
  </tr>
  <tr>
    <td class="left"><span class="style8">IP : </span></td>
    <td><span class="viaIP">'.$got_array[1].'</span></td>
  </tr>
  <tr>
    <td class="left"><span class="style8">via :</span></td>
    <td><span class="browser">'.$got_array[2].'</span></td>
  </tr>
</table></td></tr></table>';
  if($lang=='np')
  {
  $info1="<div class=\"let_us_epay_register_select_small\" align=\"center\"><font color=\"red\" size=\"-1\">स्वागतम <br /> <b>$email</b></font>";
  $info2="<br /><a href=\"login.php?admin=logout&post=".$_SERVER['PHP_SELF']."\" class=\"let_us_epay_register_select_small\">बाहिरिनुहोस्</a></div>";
  }
  else
  {
  $info1="<div class=\"let_us_epay_register_select_small\" align=\"center\"><font color=\"red\" size=\"-1\">Welcome<br /> <b>$email</b></font>";
  $info2="<a href=\"login.php?admin=logout&post=".$_SERVER['PHP_SELF']."\"  class=\"let_us_epay_register_select_small\">Want to sign out</a></div>";
  }
}
echo $text_to_print.$info1.$info2;
?>
