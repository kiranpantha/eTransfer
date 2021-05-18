<?php
require('dbconn.php');
$myusername=@$_COOKIE['email']; 
$mypassword1=@$_COOKIE['pass1'];
$mypassword2=@$_COOKIE['pass2']; 			//end check
if(@$_GET['admin']=='login')
{ 
if (!empty($myusername) || !empty($mypassword1) || !empty($mypassword2))
{
header("Location: err.php?err=0X2425");
die();
}
}
//function Logged in
function login($name,$pass1,$pass2)
{
$tbl_name="members"; // Table name 
$myusername=$name; 
$mypassword1=md5($pass1);
$mypassword2=md5($pass2);
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' AND password1='$mypassword1' AND password2='$mypassword2'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
setcookie("email",$myusername);
setcookie("pass1",$mypassword1);
setcookie("pass2",$mypassword2);
//echo '<DIV align="center"><SPAN style="font-size: 9pc; 	color: #FF0000; font-weight: bold;">Log in Successful</SPAN></DIV>';
return "true";
}
else
{
return "false";
}
}
//end function logged in
if ($_GET)
{
   if ($_GET['admin'] == 'logout')
   {
   setcookie('email', '');
   setcookie('pass1', '');
   setcookie('pass2', '');
          if($_GET['post'])
	      {
	      $loc=$_GET['post'];
	      }
		  else
		  {
		  $loc="index.php";
		  }
   header("Location: ".$loc);
   die();
   } 
 }
if($_POST)
{
$name=$_POST['email'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$status=login($name,$pass1,$pass2);
if ($status=='false')
{
echo "<LINK rel=\"stylesheet\" href=\"userfiles/cssforreg.css\" type=\"text/css\" /><div class=\"warning\">FAILED TO LOG IN TO THE SITE<BR>PLEASE RELOGIN WITH CORRECT EMAIL AND PASSWORDS</div>";
}
else
{
$merid=@$_POST['merid'];
if (!empty($merid))
{
header("Location: transfer.php?id=".$merid);
die();
}
else
{
echo "<LINK rel=\"stylesheet\" href=\"userfiles/cssforreg.css\" type=\"text/css\" /><div class=\"atten\"><center><h1>Success</h1></CENTER><BR>Login to the e-transfer site has been succeeded.Now you can purchase good's products and others.<BR>
E-transfer Team</div>";
}
}
}
?>
<HTML>
<HEAD>
<TITLE>Log in [<?php echo $website; ?>]</TITLE>
<?php include('userfiles/favicon.php'); ?>
<LINK rel="stylesheet" href="userfiles/cssforreg.css" type="text/css" />
<STYLE type="text/css">
<!--
.textboxs
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
width:200px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}
.tryit
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}
.stylediv{
background-color:#999999;
color:#FFFFFF;
}
.blue{
border-bottom-style:double;
border-bottom-color:#666666;
}
.green{
border-right:0px solid #FFFFFF;
border-left:0px solid #FFFFFF;
border-top:0px solid #FFFFFF;
border-bottom:0px solid #FFFFFF;
padding:0; font-size:12pt;
background:#999999;
color:#FFFFFF;
}
.style1 {
	color: #00FF00;
	font-weight: bold;
}
.nepal{

}
.style9 {
	font-size: 9pc;
	color: #FF0000;
	font-weight: bold;
}
-->
</STYLE>
</HEAD>
<?php
$info="";
$err="";
$zzzz=0;
$redir="";
if($_GET)
{   
   if ($_GET['admin'] == 'login')
   {
    $cook= "<font color=\"red\">* Cookies must be enabled</font>";
      echo "<center>";
	  echo"<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"  style=\"background:url(images/e_log.gif); background-repeat:repeat;\"  class=\"nepal\">
	  <tr>
	  <td>";
       echo "<center><p class=\"title\" class=\"blue\"><img src=\"imp_img/secure.png\" alt=\"Log In\">Log in  </p></center>";
      echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">";
	  
	  ?>
	    <DIV align="center">
	      <TABLE width="256" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" align="center">
	        <TR>
	          <TD width="100%" nowrap="nowrap" title="E-mail" ><IMG src="imp_img/username.png" alt="Username" width="16" height="16" /></TD>
              <TD width="100%" nowrap="nowrap"><DIV align="center" style="color:#FFFFFF; text-decoration:underline;"><STRONG>E-mail</STRONG> <BR />
                <INPUT name="email" type="text" class="textboxs" size="100%" />
                </DIV></TD>
            </TR>
	        <TR>
	          <TD  title="Passkey"><IMG src="imp_img/password.png" alt="Password" width="22" height="22" /></TD>
              <TD ><DIV align="center" style="color:#FFFFFF; text-decoration:underline;">
                <STRONG>Passkey 1</STRONG><BR />
                <INPUT name="pass1" type="password" class="textboxs" id="pass1" size="100%" />
                </DIV></TD>
            </TR>
	        <TR>
	          <TD  title="Passkey"><IMG src="imp_img/password.png" alt="Password" width="22" height="22" /></TD>
              <TD><DIV align="center" style="color:#FFFFFF; text-decoration:underline;"><STRONG> Passkey 2</STRONG> <BR />
                <INPUT name="pass2" type="password" class="textboxs" id="pass2" size="100%" />
                </DIV></TD>
            </TR>
          </TABLE>
</DIV>
	      <DIV align="center">
	        <?php
	  if($_GET['post'])
	  {
	  echo"<input type=\"hidden\" name=\"post\" value=\"".$_GET['post']."\" />";
	  }
	  echo "<center><BR><input type=\"submit\" value=\"Log In\" name=\"submit\" class=\"tryit\"/></center></p></form>\n";
      echo "<BR><BR><CENTER>
<STRONG>Forgetting password is common in our system<BR><a href=\"forgot.php\">";
echo '<INPUT name="Forgot" type="button" class="tryit" id="Forgot" value="Forgot Passwords">';
echo"</a></STRONG><BR></center>\n";
	  echo" <br>$cook<BR>
</td>  </tr> </table>";
	  die();
   }
   else
{
echo '<DIV align="center"><SPAN style="font-size: 9pc; 	color: #FF0000; font-weight: bold;">ERROR<BR></SPAN><SPAN style="font-size: 3pc; 	color: #FF0000; font-weight: bold;">Unauthorised Access</span></DIV>';
}
}
//req
//<a href=\"http://".$_SERVER['SERVER_NAME']."\">http://".$_SERVER['SERVER_NAME']."</a>
?>
	        </DIV>
          </DIV>
