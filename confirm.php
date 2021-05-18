<?php require('words.php');
if ($_GET)
{
$email=@$_GET['Email'];
$conr=@$_GET['ConfirmCode'];
$passkey=$conr;
require('dbconn.php');
$tbl_name1="temp_members_db";
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey' and email='$email'";
$result1=mysql_query($sql1);
if($result1){
$count=mysql_num_rows($result1);
if($count==1){
$rows=mysql_fetch_array($result1);
$name=$rows['name'];
$organization=$rows['organization'];
$email=$rows['email'];
$password1=$rows['password1'];
$password2=$rows['password2'];
$phone=$rows['phone'];
$birthday=$rows['birthday'];
$gender=$rows['gender'];
$address=$rows['address']; 
$tbl_name2="members";
$sqlz="INSERT INTO $tbl_name2(name,email,organization,password1,password2,address,phone,birthday,gender) VALUES( '$name', '$email', '$organization', '$password1', '$password2','$address', '$phone', '$birthday', '$gender')";
$result2=mysql_query($sqlz);
if ($result2){ echo "[["; }
//get user id
require('tpl/class/verifylogin.php');
$my_data_class=new verify();
$id_np=$my_data_class->verified($email,$password1,$password2);
//
$tbl_name3='balance';
$sql_balance="INSERT INTO $tbl_name3(id,ab,rb) VALUES( '$id_np', '0', '0')";
$result2=mysql_query($sql_balance);
if ($result2){ echo "]]"; }
}
else {
  echo '
<link rel="stylesheet" href="userfiles/cssforreg.css"/><title>Confirm failed</title><div class="warning"> Error in Username and Confirmation code combination .Please try to enter again.<br>OR<br> You might have refreshed the browser after confirmation<br />Go Back!</div>';	
die();
   }
if($result2){
	      $sername=$_SERVER['SERVER_NAME'];
	      require('tpl/class/sendmail.php');
		  $sendmail=new wemail();
		  $sendmail->send($email,'confirm',"NULL","NULL");
           echo '<link rel="stylesheet" href="userfiles/cssforreg.css"/><title>Confirm Success</title></head><body bgcolor="#BDBDBD"><center><div class="atten"><font color="green">You have successfully completed registration process of '.$_SERVER['SERVER_NAME'].'<br/>You can now do varieties of activities in this site using the code <br>e-transfer</font><br /><a href="index.php">Goto Home!</a></div></center></body></html>';
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey' and name='$name'";
$result3=mysql_query($sql3);
//enter value
// new value
die();
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Confirm - <?php echo $sitetitle; ?></title>
<?php include("userfiles/favicon.php"); ?>
<meta name="description" content="Confirm your Email at e-transfer&trade;" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

<style type="text/css">
<!--
.style2 {font-size: 18px}
-->
</style>
<LINK rel="stylesheet" href="userfiles/trybth.php" />
<style type="text/css">
<!--
.Msg {
	color: #FF0000;
	font-size: 16px;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.blue{
border-right:2px solid #6600CC;
border-left:2px solid #6600CC; 
border-top:2px solid #6600CC; 
border-bottom:2px solid #6600CC;
padding:0; font-size:12pt;
color:#6600CC;
background:#FFFFFF;
}
.label_text {
	color: #00FF00;
	font-weight: bold;
	font-size: 18px;
}
.top_text {
	font-size: 14px;
	font-weight: bold;
}
.lang {	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
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
</head>
<body>
<div id="wrapper">
	<div id="logo">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="80%"> <font face="Georgia, Times New Roman, Times, serif"> 
     <?php echo $sitename;?></font></td>
          <td width="20%">A gateway for Nepali transactions</td>
        </tr>
        <tr>
          <td><pre class="style2"><?php echo $sitewelcome;?></pre></td>
          <td><div align="center"><span class="lang">Language:</span>
            <table width="43%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="21%" height="39"   style="background-color:#CCCCCC;"><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><img src="images/nplogo_small.png" alt="Nepali" width="37" height="39" /></a></td>
                <td width="10%"   style="background-color:#CCCCCC;"><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>">
                    <?php if($lang_check=='np') { ?>
                    <img src="imp_img/check.gif" alt="√" width="15" height="15" />
                    <?php } ?>
                  </a></td>
                <td width="21%">&nbsp;</td>
                <td width="21%"   style="background-color:#CCCCCC;"><a href="lang.php?set=EN&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><img src="images/uslogo_small.png" alt="Nepali" width="38" height="38" /></a></td>
                <td width="48%"   style="background-color:#CCCCCC;"><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>">
                    <?php if($lang_check=='en') { ?>
                    </a><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><img src="imp_img/check.gif" alt="√" width="15" height="15" />
                    <?php } ?>
                  </a></td>
              </tr>
                            </table>
          </div></td>
        </tr>
      </table>
   
    
  </div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
	<?php echo $sitemenu; ?>
    </div>
	</div>
	<div id="page">
	<div id="page-bgtop">
		<div id="content">
		  <div class="post">
				
			  <h2 class="title"><?php echo $sitewelcome;?></h2>
							<div class="entry">
					
            <p> <span class="Msg">Each transaction is viewed and order is placed by human so it is 100% secure </span></p>
			</div><br />
			<hr />
			<br />
			<span class="top_text"><?php echo $info_top_confirm; ?></span><br />
			<table width="100%" border="0">
  <form action="confirm.php" method="get" onsubmit="MM_validateForm('Email','','RisEmail','ConfirmCode','','R');return document.MM_returnValue">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="23%"><span class="label_text"><?php echo $email_lang; ?>:</span></td>
    <td width="38%"><input name="Email" type="text" class="tryit_tbl" id="Email" size="35" onkeyup="return CheckInput(this);"/></td>
    <td width="33%">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td><span class="label_text"><?php echo $confirmcode; ?> : </span></td>
    <td><input name="ConfirmCode" type="text" class="tryit_tbl" id="ConfirmCode" size="35" onkeyup="return CheckInput(this);"/></td>
    <td><label>
      <input name="Proceed" type="submit" class="tryit" id="Proceed" value="<?php echo $confirmsubmit; ?>" />
    </label></td>
  </form>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table><br />
			<hr /></div>
		  <div class="post">
			  <h2 class="title"><a></a>The most secure Gateway that a Nepali can trust </h2>
		  </div>
			<div class="post"><div class="entry">
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="81%">We accept bank transfer and after confirmation of your recharge request we will recharge your Account and we will withdraw within 24 hours to your bank account on the case of withdrawl request.<br />
You can also get a recharge coupon from any Merchants of our Pay site. <br /></td>
                        <td width="19%"><img src="<?php echo $urlveri; ?>" alt="Verified and 100% secure" width="126" height="62" /></td>
                      </tr>
              </table>
			  </div>
			</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			
        <ul>
          <h2>
            <!-- end #sidebar -->
            <img src="<?php echo $image1; ?>" alt="Welcome !" width="173" height="195" />
          </h2>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		  <?php
		require("tpl/login_plug.php");
?>
          </ul>
	  </div>
      <div style="clear: both;"><?php echo $social; ?>&nbsp;</div>
	</div>
	</div>
	<!-- end #page -->
	<div id="footer-bgcontent">
	<div id="footer">
		
      <p><?php echo $sitebase; ?> </a></p>
	</div>
	</div>
	<!-- end #footer -->
</div>
</body>
</html>
