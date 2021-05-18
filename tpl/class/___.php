<?php
class _
{
  function __()
  {
   $loggedin_data='false';
   $loggedin=false;
   $myusername=@$_COOKIE['email']; 
   $mypassword1=@$_COOKIE['pass1'];
   $mypassword2=@$_COOKIE['pass2']; 
   //end check
   if (empty($myusername) || empty($mypassword1) || empty($mypassword2))
   {
   return 'NULL';
   }
   else
   {
   //check
   require('verifylogin.php');
   $login_obj=new verify();
   $loggedin=$login_obj->verified($myusername,$mypassword1,$mypassword2);
   return $loggedin;
   }
  }
}
?>