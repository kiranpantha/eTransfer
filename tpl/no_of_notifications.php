<?php
  $add_data=NULL;
  header('Content-Type: text/xml');
  require('dbconn.php');
  require('class/verifylogin.php');
  $logged_obj=new verify();
  $user=@$_COOKIE['email'];
  $pass1=@$_COOKIE['pass1'];
  $pass2=@$_COOKIE['pass2'];
  $logged_stat=$logged_obj->verified($user,$pass1,$pass2);
  if ($logged_stat!=='NULL')
  {
  $tbl_name="invoice"; // Table name 
  $sql="SELECT * FROM $tbl_name WHERE `type`=0 AND `notified`='no' AND `to`=$logged_stat";
  $result=mysql_query($sql);
  if($result)
  {
  $verified=mysql_num_rows($result);
  if($verified!==0)
  {
  $add_data= "<?xml version=\"1.0\" ?><email><num>$verified</num></email>";
  }
  else
  {
  $add_data= "<?xml version=\"1.0\" ?><email><num>0</num></email>";
  }
  }
  }
  else
  {
  $add_data= "<?xml version=\"1.0\" ?><email><num>REQLOGIN</num></email>";
  }
echo $add_data;
?>