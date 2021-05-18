<?php 
require('tpl/class/merchant_info_single.php');
$userid_post=$pass1id_post=$pass2id_post=$msg=$msg_error=false;
require('dbconn.php');
require('words.php');
function getbalance($idname)
{
require('tpl/class/checkbalance.php');
$balance_obj=new mybalance();
return  $balance_obj->getmybalance($idname);
}
$failed='true';
$got_data_verify='NULL';
$idname=$got_data_verify;
//captha

//verify login
require('tpl/class/verifylogin.php');
$array_merchant=NULL;
$userid_post=@$_COOKIE['email'];
$pass1id_post=@$_COOKIE['pass1'];
$pass2id_post=@$_COOKIE['pass2'];
$kiran_obj_valid=new verify();
$got_data_verify=$kiran_obj_valid->verified($userid_post,$pass1id_post,$pass2id_post);
if ($got_data_verify=='NULL')
{
//donothing
if ($_GET)
{
$merid=@$_GET['id'];
if($merid=='')
{
header("Location: err.php?err=0x0403");
die();
}
}
}
else
{
//captcha
$idname=$got_data_verify;
//start function
if ($_GET)
{
$merid=@$_GET['id'];
if($merid=='')
{
header("Location: err.php?err=0x0403");
}
if (!empty($merid))
{
$kiran_obj_merchant=new merchant_single();
$array_merchant=$kiran_obj_merchant->information($merid);
}
else
{
echo "<center><b>No Direct Access Avialable</b></center>";
die();
}
}
//end function
elseif($_POST)
{
/*   captha  */
$merid=@$_REQUEST['merid'];
$kiran_obj_merchant=new merchant_single();
$array_merchant=$kiran_obj_merchant->information($merid);
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
$captcha2=@$_REQUEST['captcha'];
if (strtolower($captcha2)!==strtolower(@$captcha1))
{
require('tpl/css.php');
echo "<div class=\"warning\"><h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<font color=\"#ff0000\">Error in security Check</font></h1></div>";
$failed='true';
}
else
{
$kiran_obj_merchant=new merchant_single();
$array_merchant=$kiran_obj_merchant->information($merid);

/* del the data from the file */
$ip_user=$_SERVER['REMOTE_ADDR'];
$sql = "DELETE FROM `security_check` WHERE ip='$ip_user'";
$result=mysql_query($sql);
/* del the data from the file */
$msg_error=NULL;
$merid=@$_REQUEST['merid'];
if ($merid!=='')
 {
  require('tpl/class/checkbalance.php');
  $balance_obj= new mybalance();
  $price = $balance_obj->getmybalance($idname);
  $kiran_obj_merchant=new merchant_single();
  $array_merchant=$kiran_obj_merchant->information($merid);
  $amount=$array_merchant[3];
  $to_mer=$array_merchant[6];
    if ($price>=$amount) 
	{  
	   $date_data=NULL;
	   $date_data=date("U");
	   require('tpl/class/invoiceadd_underprocess.php');
	   $invoiceid_obj=new  invoiceadd_underprocess();
	   $invoiceid=$invoiceid_obj->add_underprocess($got_data_verify,$to_mer,'1',$merid,$amount,'NULL',$date_data);
	   if ($invoiceid=='yes')
	   {
	   //get invoice id
	   $table_name='invoice_underprocess';
       $sql="SELECT * FROM $table_name WHERE `date`=$date_data AND `from`=$got_data_verify";
	   $result=mysql_query($sql);
	   $count=mysql_num_rows($result);
	   if($count==1)
	   {
	   $rows=mysql_fetch_array($result);
	   $invoice_id= $rows['id'];
	   $random_data=md5(rand(100,10000));
	   $hash_filename=md5(rand(10,99999))."_".sha1(rand(10,99999));
	   $array_et=$invoice_id."\n".md5($array_merchant[7])."\n".$random_data."\n".md5($random_data)."\n".sha1($random_data);
       $kiran_open=fopen('temp_data_merchant_listit/'.$hash_filename,'w');
	   fputs($kiran_open,$array_et);
	   fclose($kiran_open);
	   header("Location: ".$array_merchant[4]."?hash=".$hash_filename);
       die();
	   }    
	   //end invoice id
	   }
	}
	else
	{
	require('tpl/css.php');
	echo "<div class=\"warning\">No sufficient balance in your account.Please Top Up your balance</div>";
	}
  } 
 }
}
else
{
echo "<center><b>No Direct Access Avialable</b></center>";
die();
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<?php  include("userfiles/favicon.php"); ?>
<META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE><?php echo 'Pay for '.$array_merchant[0]."- | $sitetitle |";?></TITLE>
<LINK rel="stylesheet" href="userfiles/cssforreg.css"/>
<LINK href="style.css" rel="stylesheet" type="text/css" media="screen" />
<LINK rel="stylesheet" href="userfiles/trybth.php" />
<LINK rel="stylesheet" href="css/login_bth.css" type="text/css">
<LINK rel="stylesheet" href="store/mainstyler.css" type="text/css">
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
.style1 {
	color: #00FF00;
	font-weight: bold;
	font-size: 18px;
}
body,td,th {
	font-family: comic Sans MS;
}
body {
	margin-top: 1in;
	background-image: url(images/e_menu.png);
	background-color: #333333;
}
-->
</STYLE>
<script type="text/javascript">
<!---
function reload_security_check()
{
document.getElementById("et_security").src = "nospam/?" + Math.floor(Math.random() * 100);}
-->
</script>
</HEAD>
<BODY>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" class="border">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><img src="images/epay.png" alt="e-Transfer" width="378" height="80" /></div></td>
        </tr>
        <tr>  <tr>
          <td><?php echo $msg_error; ?></td>
        </tr>
        <tr>
          <td><!--start table for submit -->
                <div align="center"><table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
                     <?php if($got_data_verify!=="NULL")
					   {
					   echo '
					   <tr>
                    <td class="style1"><div align="center">Are You sure that you want to pay for '.$array_merchant[0].' by '.$array_merchant[1].'</div></td>
                  </tr>
                  <tr>
                    <td class="style1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="50%"><div align="left">Price :</div></td>
                          <td width="50%"><div align="right"><span class="blue">RS '.$array_merchant[3].'</span></div></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="35" class="style1"><div align="center"><form id="pay" method="post" action="transfer.php">
                          <table border="0" cellpadding="0" cellspacing="0" class="let_us_epay_register_select_small" >
                            <tr>
                              <td width="275"><div align="center"><span class="style2"><span class="name">Captcha</span><br />
                                <img src="nospam/?rand='.rand(1,10000).'" alt="Captha [Stop Scam]" id="et_security" onclick="reload_security_check();"/>                            
                                </span><br />If Image not loaded please click the above image<br />
                                <input name="captcha" type="text"  class="let_us_epay_register_select_small" id="captcha" autocomplete="off">                              
                              </div></td>
                            </tr>
                          </table>
                          <input name="merid" type="hidden" value="'.$merid.'" />
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><input name="pay" type="submit" class="let_us_epay_register" id="pay" value="Confirm Pay" /></td>
                              <td><div align="right"><a href="'.$array_merchant[5].'"/>                                
                                <input name="Cancel" type="button" class="let_us_epay_register" id="Cancel" value="Cancel payment" />                            
                              </div></td>
                            </tr>
                          </table>
                        </form>';
						}
						else
						{
						echo '<form action="login.php" method="post" name="login"><table border="0" cellpadding="0" cellspacing="0" class="let_us_epay_register_select_small" >
                         <tr>
                           <td>Username</td>
                           <td><input name="email" type="text" id="user"  class="let_us_epay_register_select_small" /><br /></td>
                         </tr>
                         <tr>
                           <td>Password1</td>
                           <td><input name="pass1" type="password" id="pass1" class="let_us_epay_register_select_small"  /><br /></td>
                         </tr>
                         <tr>
                           <td>Password2</td>
                           <td><input name="pass2" type="password" id="pass2"  class="let_us_epay_register_select_small" /><br /></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><label>
                             <div align="right">
                               <input name="merid" type="hidden" id="merid" value="'.$merid.'" />
                               <input name="Submit" type="submit"  class="let_us_epay_register_select_small"  value="Submit" />
                             </div>
                           </label></td>
                         </tr>
                       </table></form>';

						}					
						?>
                    </td>
                  </tr>
                </table></div>
            <!--end table for submit-->          </td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="54%">Pay with e-transfer&trade; Nepal</td>
    <td width="46%"> <div align="right">It is totally secure to pay via e-transfer&trade;</div></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center" class="errorMsg">Please be careful while paying because the payment to whom you are about to make made may be scam or a fraud . e-transfer&trade; takes no responsiblities of those payments.So please confirm wheater the merchant is a valid merchant</div></td>
  </tr>
  <tr>
    <td><div align="center">Thanks for using our services . e-transfer&trade;</div></td>
  </tr>
</table>
</BODY>
</HTML>
