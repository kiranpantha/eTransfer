<?php
class verify
{
  function verified($email,$password1,$password2)
  {
   $login_id="NULL";
   require('dbconn.php');
   $tbl_name="members"; // Table name 
   $myusername=$email; 
   $mypassword1=$password1;
   $mypassword2=$password2;
   $sql="SELECT * FROM $tbl_name WHERE email='$myusername' AND password1='$mypassword1' AND password2='$mypassword2'";
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