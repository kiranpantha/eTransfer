<?php 
$loggedin='false';
if (empty($_COOKIE['email']) && empty($_COOKIE['pass1']) && empty($_COOKIE['pass2']))
{
header("Location: err.php?err=reqlogin");
die();
}
else
{
//check
require('dbconn.php');
$tbl_name="members"; // Table name 
$myusername=$_COOKIE['email']; 
$mypassword1=$_COOKIE['pass1'];
$mypassword2=$_COOKIE['pass2'];
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' AND password1='$mypassword1' AND password2='$mypassword2'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
while($rows=mysql_fetch_array($result))
{
$login_id=$rows['id'];
$loggedin='true';
}
}
}
if ($loggedin=='false')
{
header("Location: err.php?err=fake");
die();
}
?>