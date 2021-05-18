<?php 
require('words.php');
include("userfiles/favicon.php");
//post for request via email
if ($_GET)
{
if (empty($code) || empty($email))
{
echo '
</head><body><center><LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="warning"><font color="green">Please click the link in your Email</font></div></center></body></html>';
}
}
//post for request vi browser
if ($_POST)
{
$email=$_POST['email'];
if (!empty($email))
{  
$random=rand(123456789,999999999);
//db open
require('dbconn.php');
$tbl_name1="members";
$sql1="SELECT * FROM $tbl_name1 WHERE email='$email'";
$result1=mysql_query($sql1);
$count1=mysql_num_rows($result1);
if($count1==1)
{
//check for previous
$tbl_name2="forgot";
$sql2a="SELECT * FROM $tbl_name2 WHERE email='$email'";
$result2a=mysql_query($sql2a);
$count2=mysql_num_rows($result2a);
 //if yes
 if ($count2==1)
 {
 //if found
 $tbl_name2="forgot";
 $sqlv="UPDATE `$tbl_name2` SET `random` = '$random' ";
 $resultv=mysql_query($sqlv);
 if ($resultv)
 {
          $subject=$_SERVER['SERVER_NAME']." Notification";
	      $from = "From: noreply@kiranpantha.com.np";
	      $sername=$_SERVER['SERVER_NAME'];
	      $messagee="
		         Dear Customer
	             
				 You have requested the password recovery from us
				 
				 Click the link below
				 http://$sername/reset.php?id=$email&encrypted=$random				 
				 
				 Online Payment Solution
				 Shankarnagar-5
				 Rupandehi Nepal";		        
           @mail($email, $subject, $messagee, $from);
  echo '<LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class=\"atten\"><font color=\"green\">Password has been sent to $email so goto inbox to click the mail <br />* The mail may be placed in spam folder Please check it if it is not found in Inbox<br />Your old reset code will not work now please check your mail again</font></div>';
 }
//finish if found
 }
 else
 {
 //write to db
$tbl_name2="forgot";
$sqlz="INSERT INTO $tbl_name2(email,random) VALUES( '$email', '$random')";
$resultz=mysql_query($sqlz);
if ($resultz)
{
          $subject=$_SERVER['SERVER_NAME']." Notification";
	      $from = "From: noreply@kiranpantha.com.np";
	      $sername=$_SERVER['SERVER_NAME'];
	      $messagee="
		         Dear Customer
	             
				 You have requested the password recovery from us
				 
				 Click the link below
				 http://$sername/reset.php?id=$email&encrypted=$random				 
				 
				 Online Payment Solution
				 Shankarnagar-5
				 Rupandehi Nepal";		        
           @mail($email, $subject, $messagee, $from);
           echo '
</head><body><center><LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="atten"><font color="green">Password has been sent to '.$email.' so goto inbox to click the mail <br />
* The mail may be placed in spam folder Please check it if it is not found in Inbox</font></div><br /></center></body></html>';
exit;
//end
}
 }
 //end
//end check
}
else
{
echo '<LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="warning"><center><h1>त्रुटी</h1><br />तपाईले दिनुभएको ईमेल हामीसँग दर्ता गरीएको छैन।<center></div>';
}
//end $_POST['email']
}
else
{
echo '
</head><body><center><LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="warning"><font color="green">कृपया '.$email_lang.' लेख्नुहोस्</font></div></center></body></html>';
}
//end $_POST
}
else
{
echo '
</head><body><center><LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="atten"><font color="green">'.$start_for_pass.'</font></div></center></body></html>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Forgot - <?php echo $sitetitle; ?></TITLE>
<META name="keywords" content="" />
<META name="description" content="" />
<LINK href="style.css" rel="stylesheet" type="text/css" media="screen" />
<LINK rel="stylesheet" href="userfiles/trybth.php" />
<LINK rel="stylesheet" href="css/login_bth.css" type="text/css"><LINK rel="stylesheet" href="store/mainstyler.css" type="text/css">
<STYLE type="text/css">
<!--
.style2 {font-size: 18px}
.Msg {
	color: #FF0000;
	font-size: 16px;
}
.blue{
border-right:2px solid #6600CC;
border-left:2px solid #6600CC; 
border-top:2px solid #6600CC; 
border-bottom:2px solid #6600CC;
padding:0; font-size:12pt;
color:#6600CC;
background:#FFFFFF;
}
.style1 {
	color: #00FF00;
	font-weight: bold;
	font-size: 18px;
}
.style4 {
	font-size: 16px;
	font-weight: bold;
}
body {
	background-color: #333333;
}
-->
</STYLE>

<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<BODY>
<DIV align="center"> <BR /><BR /><BR /><BR /><BR /><BR /><?php echo $start_for_pass; ?>
    <TABLE width="100%" border="0">
     <FORM action="" method="POST" onsubmit="MM_validateForm('email','','RisEmail');return document.MM_returnValue">
       <TR>
         <TD>&nbsp;</TD>
         <TD>&nbsp;</TD>
         <TD>&nbsp;</TD>
         <TD>&nbsp;</TD>
       </TR>
       <TR>
         <TD width="2%">&nbsp;</TD>
         <TD width="20%"><SPAN class="style1"><?php echo $email_lang; ?></SPAN></TD>
         <TD width="38%"><INPUT autocomplete="off" name="email" type="text" class="let_us_epay_register_select_small" id="email" size="35" onKeyUp="return CheckInput(this);"/></TD>
         <TD width="40%"><INPUT name="Proceed" type="submit" class="let_us_epay_register_select_small" id="Proceed" value="<?php echo $procced_lang; ?>" /></TD>
       </TR>
      </FORM>
   </TABLE>
    <DIV align="right"><IMG src="<?php echo $urlveri; ?>" alt="Verified and 100% secure" width="126" height="62" /></DIV>
</DIV>
</BODY>
</HTML>
