<?php 
require('words.php');
if ($_POST)
{
$err_msg=false;
$money=false;
$email=false;
$email=$_POST['email'];
$money=$_POST['amount'];
if (empty($money))
{
$err_msg.='Please type amount that you want to transfer funds';
}
if (empty($email))
{
$err_msg.='<br />Please type email of friend to whom you want to transfer funds';
}
else
{
if ($money==0)
{
$err_msg.='<br />Please type value greater than zero to transfer funds';
$money='';
}
}
if (!empty($email) && !empty($money))
{  
//db open
$email_my=$_COOKIE['email'];
$pass1=$_COOKIE['pass1'];
$pass2=$_COOKIE['pass2'];
if ($email_my==$email)
{
echo '<LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="warning">You cannot transfer funds from your account to your account</div>';
die();
}
require("tpl/class/verifylogin.php");
$gotoo=new verify();
$gotooo=$gotoo->verified($email_my,$pass1,$pass2); //p+
if ($gotooo!=="NULL")
{         
          //is registered
		  require("tpl/class/verifyemail.php");
          $is_valid=new verify_e();
          $returned=$is_valid->verified_e($email); //p+
		  if ($returned!=='NULL')
		  { 
		 //check balance
		  require("tpl/class/checkbalance.php");
          $gotbalance=new mybalance();
		  $returned_b=$gotbalance->getmybalance($gotooo);
		  if ($returned_b!=='NULL')
		  {
		  if ($returned_b>=$money)
		  {
		  //deductbalance
		  require('tpl/class/fundaddsub.php');
		  $data_b=new add_del();
		  $is_paid=$data_b->information($gotooo,$returned,$returned_b,$money);
		  //end deduction
		  if($is_paid=='yes')
		  { 
		  require('tpl/class/invoiceadd.php');
          $add_new=new invoiceadd();
          $add_new->add($gotooo,$returned,'0','0',$money,'NULL');
		 //start msg
          $subject=$_SERVER['SERVER_NAME']." Notification";
	      $sername=$_SERVER['SERVER_NAME'];
	      require("tpl/class/sendmail.php");
		  $sendmail=new wemail();
		  $goto=$sendmail->send($email,"noti","NULL","$email transfered NRS $money to you on $email_my");
          echo '<LINK rel="stylesheet" href="userfiles/cssforreg.css"/></head><body><center><br /><br /><br /><br /><br /><br /><br /><div class="atten"><font color="green">'.strtoupper($goto).' ! fund has been sent to '.$email.' <br />* The mail is sent to your friend.</font></div><br /></center></body></html>';
           exit;   
		   }  
		   }
		   else
		   {
		   echo '<LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="warning">No Sufficient Balance</div>';
		   }
		  }
         // end msg
         }
		 else
		 {
		 echo '<LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="warning">'.$failed_transfer.'</div>';
         die();
         }
//end
}
else
		   {
		   echo '<LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="warning">Fake Login</div>';
		   @setcookie('email','');
		   @setcookie('pass1','');
		   @setcookie('pass2','');
		   }
}
else
{
echo '<LINK rel="stylesheet" href="userfiles/cssforreg.css"/><div class="warning">'.$err_msg.'</div>';
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><HEAD>
<META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Forgot - <?php echo $sitetitle; ?></TITLE>
<META name="keywords" content="" />
<META name="description" content="" />
<?php include("userfiles/favicon.php"); ?>
<LINK href="style.css" rel="stylesheet" type="text/css" media="screen" />
<LINK rel="stylesheet" href="userfiles/trybth.php" />
<LINK rel="stylesheet" href="css/login_bth.css" type="text/css"><LINK rel="stylesheet" href="store/mainstyler.css" type="text/css">
<STYLE type="text/css">
<!--
.Msg {
	color: #FF0000;
	font-size: 16px;
}
-->
</STYLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<STYLE type="text/css">
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
.e-m {
	color: #00FF00;
	font-weight: bold;
	font-size: 18px;
}
.style2 {font-size: 14px}
-->
</STYLE>
<BODY>
<DIV align="center"> <BR />
   <BR />
     <BR />
     <BR />
                               <BR />
                                 <BR />
                                 <STRONG class="Msg"><?php echo $typefriendsname; ?></STRONG>
                                 <TABLE width="53%" border="0">
     <FORM action="" method="POST">
       <TR>
         <TD>&nbsp;</TD>
         <td width="55%"><div align="left"><span class="e-m"><?php echo $email_lang; ?></span></div></td>
         <TD class="e-m style2"><?php echo $mahasul."[".$nrs."]"; ?></TD>
         <TD>&nbsp;</TD>
       </TR>
       <TR>
         <TD width="1%">&nbsp;</TD>
         <TD width="55%"><input name="email" type="text" class="blue" id="email" size="40%" onkeyup="return CheckInput(this);"/></TD>
         <TD width="22%"><input name="amount" type="text" class="blue" id="amount" size="10%" onkeyup="return CheckInput(this);"/></TD>
         <TD width="22%"><INPUT name="Proceed" type="submit" class="blue" id="Proceed" value="<?php echo $transfer_lang; ?>" /></TD>
       </TR>
      </FORM>
  </TABLE>
                                 <div align="center"><IMG src="<?php echo $urlveri; ?>" alt="Verified and 100% secure" width="126" height="62" /></div>
</DIV>
</BODY>
</HTML>
