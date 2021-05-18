<?php
require('dbconn.php');
require('words.php');
$myusername=@$_COOKIE['email']; 
$mypassword1=@$_COOKIE['pass1'];
$mypassword2=@$_COOKIE['pass2']; 			//end check
if(@$_GET['admin']=='login')
{ 
if (!empty($myusername) || !empty($mypassword1) || !empty($mypassword2))
{
echo "<LINK rel=\"stylesheet\" href=\"userfiles/cssforreg.css\" type=\"text/css\" /><div class=\"warning\">You Have already Logged in to the system</div>";
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
   header("Location: index.php");
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
<LINK rel="stylesheet" href="store/mainstyler.css" type="text/css">
<LINK rel="stylesheet" href="css/login_bth.css" type="text/css">
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
}.textboxs_btn
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
.tryit
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
text-align:center;
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
.nepal{

}
body {
	background-color: #333333;
}
-->
</STYLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD><body>	<?php include('tpl/noscript.php'); ?>

<?php
$info=$err=$zzzz=$redir=NULL;
if($_GET)
{   
   if ($_GET['admin'] == 'login')
   {
      echo "<center>";
	  echo"<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"  style=\"background:url(images/e_log.gif); background-repeat:repeat;\"  class=\"nepal\">
	  <tr>
	  <td>";
       echo "<center><p class=\"title\" class=\"blue\"><img src=\"images/login_template.png\" alt=\"Log In\"><h1>Log in</h1></p></center>";
      echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">";
	  
	  ?>
	    <DIV align="center">
	      <TABLE width="256" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" align="center">
	        <TR>
	          <TD width="100%" nowrap="nowrap" ><IMG src="imp_img/username.png"  alt="<?php echo $email_lang; ?>" title="<?php echo $email_lang; ?>" width="16" height="16" /></TD>
              <TD width="100%" nowrap="nowrap"><DIV align="center" style="color:#FFFFFF; text-decoration:underline;"><STRONG><?php echo $email_lang; ?></STRONG> <BR />
                <INPUT name="email" type="text" class="let_us_epay_register_small"  size="60%" />
                </DIV></TD>
            </TR>
	        <TR>
	          <TD><IMG src="imp_img/password.png" alt="<?php echo $password1_lang; ?>" title="<?php echo $password1_lang; ?>" width="22" height="22" /></TD>
              <TD ><DIV align="center" style="color:#FFFFFF; text-decoration:underline;">
                <STRONG><?php echo $password1_lang; ?></STRONG><BR />
                <INPUT name="pass1" type="password" class="let_us_epay_register_small"  id="pass1" size="60%" />
                </DIV></TD>
            </TR>
	        <TR>
	          <TD><IMG src="imp_img/password.png"  alt="<?php echo $password2_lang; ?>" title="<?php echo $password2_lang; ?>" width="22" height="22" /></TD>
              <TD><DIV align="center" style="color:#FFFFFF; text-decoration:underline;"><STRONG><?php echo $password2_lang; ?></STRONG> <BR />
                <INPUT name="pass2" type="password" class="let_us_epay_register_small"  id="pass2" size="60%" />
                </DIV></TD>
            </TR>
          </TABLE>
</DIV>
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="14%">&nbsp;</td>
      <td width="23%"><input type="submit" value="<?php echo $login_lang; ?>" name="submit" class="let_us_epay_register"/></td>
      <td width="39%"><div align="center"><strong><?php echo $forgot_lang_desc; ?></strong></div></td>
      <td width="24%"><div align="center"><a href="forgot.php">
        <input name="Forgot" type="button" class="let_us_epay_register" id="Forgot" value="<?php echo $forgot_lang; ?>">
      </a></div></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="45%"><div align="center"></div></td>
      <td width="50%">&nbsp;</td>
      <td width="5%">&nbsp;</td>
    </tr>
    <tr>
      <td height="18"><div align="center"><?php echo $cook; ?></div></td>
      <td class="nepal">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p><br>
    </form></td>
    </tr>
    </table>
    <?php
   }
   else
{
echo '<DIV align="center"><SPAN style="font-size: 9pc; 	color: #FF0000; font-weight: bold;">ERROR<BR></SPAN><SPAN style="font-size: 3pc; 	color: #FF0000; font-weight: bold;">Unauthorised Access</span></DIV>';
}
}
//req
//<a href=\"http://".$_SERVER['SERVER_NAME']."\">http://".$_SERVER['SERVER_NAME']."</a>
?>
  </p>
  </DIV>
</div>
</body></html>