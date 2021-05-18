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
$userid_p=@$_POST['userid'];
require('dbconn.php');
$tbl_name='members';
$sql="DELETE FROM $tbl_name WHERE id=$userid_p";
$result=mysql_query($sql);
if($result)
{
  $tbl_name1='balance';
  $sql1="DELETE FROM $tbl_name1 WHERE id=$userid_p";
  $result1=mysql_query($sql1);
  if($result1)
  {
  echo "<body style=\"background-color: #CCCCCC;\">DELETED</body>";
  die();
  }
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
$userid=@$_GET['userid'];
if(!empty($userid))
{
require('dbconn.php');
$tbl_name='members';
$sql="SELECT * FROM $tbl_name WHERE id=$userid";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1)
{
echo '<form method="post" action="user_action_data.php"><input type="hidden" value="'.$userid.'" name="userid">
      <input type="submit" value="Delete"  style="background-color:#666666; color:#FFFFFF; border:#00FF66;"/></form>'; 
}       //end it
}
}
}
?>