<?php
class verify_e
{
  function verified_e($email)
  {
   $login_id="NULL";
   require('dbconn.php');
   $tbl_name="members"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE email='$email'";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count==1){
   $rows=mysql_fetch_array($result);
   $login_id=$rows['id'];
   }
   return $login_id;
  }
}
?>