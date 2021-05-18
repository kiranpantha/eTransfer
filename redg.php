<?php 
$err='';
$error='';
$count='';
$birth='';
$captcha1='';
include('words.php');
// css
$css='<link rel="stylesheet" href="userfiles/cssforreg.css"/>';
//end css
//start
require('dbconn.php');
$sername=$_SERVER['SERVER_NAME'];
if ($_POST)
{
//get post data
$name=$_POST['name'];
$organization=$_POST['org'];
$address=$_POST['add'];
$phone=$_POST['phn'];
$email=strtolower($_POST['email']);
$birthday=$_POST['listday']."-".$_POST['listmonth']."-".$_POST['listyear'];
$gender=strtoupper($_POST['select_gender']);
$password1=md5($_POST['password1']);
$password2=md5($_POST['password2']);
$captcha2=$_POST['captcha'];
/*   captha  */
$ip_user=$_SERVER['REMOTE_ADDR'];
$sql = "SELECT * FROM `security_check` WHERE ip='$ip_user'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if ($count==1)
{
$rows=mysql_fetch_array($result);
$captcha1=$rows['code'];
}
/*   captha  */
/* del the data from the file */
$ip_user=$_SERVER['REMOTE_ADDR'];
$sql = "DELETE FROM `security_check` WHERE ip='$ip_user'";
$result=mysql_query($sql);
/* del the data from the file */
//validation of form
if(!preg_match("/([a-zA-Z0-9_-]+@([a-zA-Z0-9_-]+\\.)+[a-zA-Z09_]+)/",$email,$matches))
{
$err=1;
$error.="<li>E-mail Doesnot seem to be valid</li>";
}
if(!preg_match("/^9+([7-8_-][0-9_-][0-9_-][0-9_-][0-9_-][0-9_-][0-9_-][0-9_-][0-9_-])/",$phone,$matches))
{
$err=1;
$error.="<li>Phone Number doesnot seem to be valid</li>";
}
if (empty($name))
{
$err=1;
$error.="<li>Enter Name</li>";
}
if (empty($organization))
{
$organization="";
}
if (empty($address))
{
$err=1;
$error.="<li>Enter Address</li>";
}
if (empty($phone))
{
$err=1;
$error.="<li>Enter Phone Number</li>";
}
if (empty($email))
{
$err=1;
$error.="<li>Enter E-mail</li>";
}
if ($_POST['listday']=='Day' || $_POST['listday']=='दिन')
{
$err=1;
$error.="<li>Select Day</li>";
}
if ($_POST['listmonth']=='Month' || $_POST['listmonth']=='महिना')
{
$err=1;
$error.="<li>Select Month</li>";
}
if ($_POST['listyear']=='Year' || $_POST['listyear']=='बर्ष')
{
$err=1;
$error.="<li>Select Year</li>";
}
if (empty($gender))
{
$err=1;
$error.="<li>Select Gender</li>";
}
if (empty($captcha2))
{
$err=1;
$error.="<li>Enter Code in the security check Image</li>";
}
if ($password1==$password2)
{
$err=1;
$error.="<li>Both passkey 1 and passkey 2 can't have same value</li>";
}
if (strtolower($captcha1)!==strtolower($captcha2))
{
$err=1;
$error.="<li>The word in the text donot match with the code provided</li>";
}
if ($err==1)
{
echo '<title>ERROR!</title>'.$css.'<div class="warning" align=\"left\"><font color=\"red\">You have following errors Please Maintain<br /><ul>'.$error.'</ul></font></div>';
die();
}
else
{
            $tbl_name1='members';
			$sql1="SELECT * FROM $tbl_name1 WHERE email ='$email'";
            $result1=mysql_query($sql1);
			$count1=mysql_num_rows($result1);
			$tbl_name1='temp_members_db';
			$sql1="SELECT * FROM $tbl_name1 WHERE email ='$email'";
            $result1=mysql_query($sql1);
			$count2=mysql_num_rows($result1);	
			if ($count1 ==1 || $count2==1)
			{
			echo '<title>Registration Failed</title>'.$css.'<div class="warning"> <center><font color=\"red\">E-mail already regisered. Please recover Password or register using next email address</font><br /><a href="index.php">Goto Home!</a></center></div>';
			exit;
			}
		
			if ($count1!==1 && $count2!==1)
			{
			//write to db
			$tbl_name='temp_members_db';
            $sqlz="INSERT INTO $tbl_name(confirm_code,name,email,organization,password1,password2,address,phone,birthday,gender) VALUES('".md5($birth.$email)."', '$name', '$email', '$organization', '$password1', '$password2','$address', '$phone', '$birthday', '$gender')";
            $result=mysql_query($sqlz);
			if($result)
			{
			$pass_confirm=md5($birth.$email);
			$subject=$_SERVER['SERVER_NAME']." Registration [A nepali payment gateway]";
	        $from = "From: noreply@kiranpantha.com.np";
	        $sername=$_SERVER['SERVER_NAME'];
            require('tpl/class/sendmail.php');
			$send_mail_to=NULL;
			$send_mail_to=new wemail();
			$wemail=$send_mail_to->send($email,'redg',$pass_confirm,"NULL");
            $mailser=str_replace("@","",strstr($email,"@"));
            echo"<title>Registration Succeded</title>'.$css.'</head><BODY  bgcolor=\"#BDBDBD\"><CENTER><DIV class=\"atten\"><FONT color=\"navy\"><A href='http://mail.$mailser'><img src=\"imp_img/mail.png\" alt=\"Check Mail at  $mailser\" title=\"Check Mail at  $mailser\" width=\"111\" height=\"89\" /></A><BR/>You are now  registered to ".$_SERVER['SERVER_NAME']."<BR/>Please confirm this process by clicking the link in the email or follow the instruction<BR><img src=\"images/epay.png\"></FONT><BR><a href='confirm.php'>Click here to verify</a><br /><a href=\"index.php\">Goto Home!</a></DIV></CENTER></BODY></HTML>";	
			//end write to db			
			}
}
}
//stop validation
}
else
{
die('No direct access avilable');
}
?>