<?php
require('loggedin.php');
$loggedin_obj=new user();
if($_POST)
{
$userid_post=@$_COOKIE['users'];
$passid_post=@$_COOKIE['passs'];
$loggedin=$loggedin_obj->getusers($userid_post,$passid_post);

if ($loggedin==1) //if logged in
{
$userid_p=@$_POST['emailid'];
require('dbconn.php');
$tbl_name='temp_members_db';
$sql="DELETE FROM $tbl_name WHERE email='$userid_p'";
$result=mysql_query($sql);
if($result)
{
  echo "<body style=\"background-color: #CCCCCC;\">DELETED</body>";
  die();
}
}
}
if ($_GET)
{
$userid_post=@$_COOKIE['users'];
$passid_post=@$_COOKIE['passs'];
$loggedin_obj=new user();
$loggedin=$loggedin_obj->getusers($userid_post,$passid_post);
if ($loggedin==1) //if logged in
{
$userid=$email=@$_GET['emailid'];
if(!empty($userid))
{
require('dbconn.php');
$tbl_name='temp_members_db';
$sql="SELECT * FROM $tbl_name WHERE email='$email'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1)
{
echo '<form method="post" action="tempuser_action_data.php"><input type="hidden" value="'.$userid.'" name="emailid">
      <input type="submit" value="Delete"  style="background-color:#666666; color:#FFFFFF; border:#00FF66;"/></form>';
die(); 
}       //end it
}
}
}
?>