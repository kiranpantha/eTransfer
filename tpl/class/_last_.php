<?php
class _last_
{
  function _info_()
  {
   $last_login_last= $last_login_ip= $last_login_browser=$new_login_last=$new_login_ip=$new_login_browser=$rows_lastloggin=NULL;
   require('dbconn.php');
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
    $login_id="NULL";
   require('dbconn.php');
   $tbl_name="members"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE email='$myusername' AND password1='$mypassword1' AND password2='$mypassword2'";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count==1)
   {
   $rows=mysql_fetch_array($result);
   $login_id=$loggedin=$rows['id'];
   }
   if($loggedin!=='NULL')
   {
	$sql_lastlogindata='SELECT * FROM lastinfo WHERE id='.$loggedin;
	$result_lastloggin=mysql_query($sql_lastlogindata);
	 if($result_lastloggin)
	 {
	  $count_data=mysql_num_rows($result_lastloggin);
	  if($count_data==1)
	  {
	     $rows_lastloggin=mysql_fetch_array($result_lastloggin);
		 $last_login_last=$rows_lastloggin['last'];
		 $last_login_ip=$rows_lastloggin['ip'];
		 $last_login_browser=$rows_lastloggin['browser'];
		 //now add new data to that DB
		 $returned_value=$this->write_to_db('OLD',$loggedin);
		 return array($last_login_last,$last_login_ip,$last_login_browser);
	  }
	  else
	  {
	     $new_login_last=date('U');
		 $new_login_ip=$_SERVER['REMOTE_ADDR'];
		 $new_login_browser='MYBROWSER';
		 $returned_value_new=$this->write_to_db('NEW',$loggedin);
		 return array( $new_login_last,$new_login_ip,$new_login_browser);
	  }
	 }
   } 
  }
   //end function
  }
  private function write_to_db($time,$loginid)
   {    
  require('dbconn.php');
         $new_login_last=date('U');
		 $new_login_ip=$_SERVER['REMOTE_ADDR'];
	 $b= strtolower($_SERVER['HTTP_USER_AGENT']);
	 if (strstr($b,"opera"))
	 {
	 $browserinfo= "Opera browser";
	 } 
	 elseif (strstr($b,"chrome") && strstr($b,"mozilla"))
	 {
	 $browserinfo= "Chrome browser";
	 }
	 elseif (strstr($b,"mozilla"))
	 {
	 $browserinfo= "Mozilla Firefox";
	 }
	 elseif (strstr($b,"msie"))
	 {
	 $browserinfo= "Microsoft Internet Explorer";
	 }
	 elseif (strstr($b,"safari"))
	 {
	 $browserinfo= "Safari browser";
	 }
	  elseif (strstr($b,"uc"))
	 {
	 $browserinfo= "UC browser";
	 }
	 elseif (strstr($b,"netfront"))
	 {
	 $browserinfo= "NetFront browser";
	 }
	 else
	 {
	 $browserinfo= "Unknown Browser";
	 }
   $new_login_browser=$browserinfo;
   if($time=='OLD')
   {
          $sql_old="UPDATE  `$db_name`.`lastinfo` SET `last` =  '$new_login_last', `ip` =  '$new_login_ip', `browser` =  '$new_login_browser' WHERE  `lastinfo`.`id` =$loginid";
   }
   else
   {
          $sql_old="INSERT INTO `$db_name`.`lastinfo` (`id`, `last`, `ip`, `browser`) VALUES ('$loginid', 'new_login_last', 'new_login_ip', 'new_login_browser');";      
		 
   }
   $result_old=mysql_query($sql_old);
   }
//end class
}
?>