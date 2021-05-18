<?php 
include('dbconn.php');
$err='';
$error='';
$count='';
$birth='';
include('words.php');
// css
echo'<link rel="stylesheet" href="userfiles/cssforreg.css"/>';
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
$email=$_POST['email'];
$birthday=$_POST['listday']."-".$_POST['listmonth']."-".$_POST['listyear'];
$gender=strtoupper($_POST['select_gender']);
$password1=md5($_POST['password1']);
$password2=md5($_POST['password2']);
$captcha1=$_POST['captcha1'];
$captcha2=md5($_POST['captcha2']);
//validation of form
if (empty($name))
{
$err=1;
$error.="<li>Name</li>";
}
if (empty($organization))
{
$organization="";
}
if (empty($address))
{
$err=1;
$error.="<li>Address</li>";
}
if (empty($phone))
{
$err=1;
$error.="<li>Phone Number</li>";
}
if (empty($email))
{
$err=1;
$error.="<li>E-mail</li>";
}
if ($_POST['listday']=='Day')
{
$err=1;
$error.="<li>Day</li>";
}
if ($_POST['listmonth']=='Month')
{
$err=1;
$error.="<li>Month</li>";
}
if ($_POST['listyear']=='Year (Birth)')
{
$err=1;
$error.="<li>Year</li>";
}
if (empty($gender))
{
$err=1;
$error.="<li>Gender</li>";
}
if (empty($captcha2))
{
$err=1;
$error.="<li>Security Check</li>";
}
if ($password1==$password2)
{
$err=1;
$error.="<li>Both passkey 1 and passkey 2 can't have same value</li>";
}
if ($captcha1!==$captcha2)
{
$err=1;
$error.="<li>And Security check failed</li>";
}
if ($err==1)
{
echo '<title>ERROR!</title><div class="warning"><font color=\"red\">You have following errors Please Maintain<br /><ul>'.$error.'</ul></font></div>';
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
			echo '<title>Registration Failed</title><div class="warning"> <center><font color=\"red\">E-mail already regisered. Please recover Password or register using next email address</font><br /><a href="index.php">Goto Home!</a></center></div>';
			exit;
			}
		
			if ($count!==1 && $count2!==1)
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
            echo"<title>Registration Succeded</title></head><BODY  bgcolor=\"#BDBDBD\"><CENTER><DIV class=\"atten\"><FONT color=\"navy\"><A href='http://mail.$mailser'><img src=\"imp_img/mail.png\" alt=\"Check Mail at  $mailser\" title=\"Check Mail at  $mailser\" width=\"111\" height=\"89\" /></A><BR/>You are now  registered to ".$_SERVER['SERVER_NAME']."<BR/>Please confirm this process by clicking the link in the email or follow the instruction<BR><img src=\"images/epay.png\"></FONT><BR><a href='confirm.php'>Click here to verify</a><br /><a href=\"index.php\">Goto Home!</a></DIV></CENTER></BODY></HTML>";	
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