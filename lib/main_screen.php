<?php
$loggedin_data='false';
$loggedin=false;
require('words.php');
$myusername=@$_COOKIE['email']; 
$mypassword1=@$_COOKIE['pass1'];
$mypassword2=@$_COOKIE['pass2']; 			//end check
if (empty($myusername) || empty($mypassword1) || empty($mypassword2))
{
header("Location: err.php?err=reqlogin");
die();
}
else
{
//check
require('tpl/class/verifylogin.php');
$login_obj=new verify();
$loggedin=$login_obj->verified($myusername,$mypassword1,$mypassword2);
if ($loggedin!=='NULL')
{
$loggedin_data='true';
}
}
if ($loggedin_data=='false')
{
header("Location: err.php?err=fake");
die();
}
?>