<?php 
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
require('tpl/class/merchant_info_single.php');
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
$captcha1=@$_REQUEST['captcha1'];
$captcha2=md5(@$_REQUEST['captcha2']);
if ($captcha2!==$captcha1)
{
require('tpl/css.php');
echo "<div class=\"warning\" align=\"middle\">Error in security Check</div>";
$failed='true';
die();
}
$msg_error=NULL;
$merid=@$_REQUEST['merid'];
if ($merid!=='')
 {
  require('tpl/class/merchant_info_single.php');
  require('tpl/class/checkbalance.php');
  $balance_obj= new mybalance();
  $price = $balance_obj->getmybalance($idname);
  $kiran_obj_merchant=new merchant_single();
  $array_merchant=$kiran_obj_merchant->information($merid);
  $amount=$array_merchant[3];
    if ($price>=$amount) 
	{  
	   $date_data=NULL;
	   $date_data=date("U");
	   require('tpl/class/invoiceadd_underprocess.php');
	   $invoiceid_obj=new  invoiceadd_underprocess();
	   $invoiceid=$invoiceid_obj->add_underprocess($got_data_verify,"External Payment",$array_merchant[0],$amount,$date_data);
	   if ($invoiceid=='yes')
	   {
	   //get invoice id
	   $table_name='invoice_underprocess';
       $sql="SELECT * FROM $table_name WHERE date=$date_data AND userid=$got_data_verify";
	   $result=mysql_query($sql);
	   $count=mysql_num_rows($result);
	   if($count==1)
	   {
	   $rows=mysql_fetch_array($result);
	   $invoice_id= $rows['id'];
	   header("Location: ".$array_merchant[4]."?invoiceid=$invoice_id&accesscode=".md5($array_merchant[7])."&x1=".base64_encode($date_data)."&x2=".md5($date_data)."&x3=".md5(rand('9999','999999'))."&x4=".strtoupper(base64_encode(rand('9999','999999'))));
       die();
	   }    
	   //end invoice id
	   }
	}
	else
	{
	require('tpl/css.php');
	echo "<div class=\"warning\">No sufficient balance in your account please Top Up your balance</div>";
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
}
-->
</STYLE>
<BODY>
<table width="100%" height="347" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" background="images/e.png">
  <tr>
    <td height="265"><div align="center" class="border">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><img src="images/epay.png" alt="E-Transfer" width="378" height="80" /></div></td>
        </tr>
        <tr>  <tr>
          <td><?php echo $msg_error; ?></td>
        </tr>
        <tr>
          <td><!--start table for submit -->
                <div align="center"><table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
                     <?php if($got_data_verify!=="NULL")
					   {
					   echo '<tr>
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
                          <table width="24" height="94" border="0" cellpadding="0" cellspacing="0" class="tryit_tbl">
                            <tr>
                              <td width="275"><div align="center"><span class="style2"><span class="name">Captcha</span><br />
                                <img src="userfiles/capctha.php?word='.base64_encode($capcha1wrd."+".$typewrd."+".$capcha2wrd).'" alt="Captha [Stop Scam]" />
                                <input name="captcha1" type="hidden" id="captcha1" value="'.md5($ctype).'" />
                                </span><br />                                
                                Number only (1,2,3....)
                                <input name="captcha2" type="text" class="tryit" id="captcha2" size="70%" onblur="setfocus(this.id)" onfocus="lostfocus(this.id)">                              
                              </div></td>
                            </tr>
                          </table>
                          <input name="merid" type="hidden" value="'.$merid.'" />
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><input name="pay" type="submit" class="tryit" id="pay" value="Confirm Pay" /></td>
                              <td><div align="right"><a href="'.'"/>                                
                                <input name="Cancel" type="button" class="tryit_red" id="Cancel" value="Cancel payment" />                            
                              </div></td>
                            </tr>
                          </table>
                        </form>';
						}
						else
						{
						echo '<form action="login.php" method="post" name="login"><table border="0" cellpadding="0" cellspacing="0" class="tryit_tbl">
                         <tr>
                           <td>Username</td>
                           <td><input name="email" type="text" class="tryit" id="user" /><br /></td>
                         </tr>
                         <tr>
                           <td>Password1</td>
                           <td><input name="pass1" type="password" class="tryit" id="pass1" /><br /></td>
                         </tr>
                         <tr>
                           <td>Password2</td>
                           <td><input name="pass2" type="password" class="tryit" id="pass2" /><br /></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><label>
                             <div align="right">
                               <input name="merid" type="hidden" id="merid" value="'.$merid.'" />
                               <input name="Submit" type="submit" class="tryit_login" value="Submit" />
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
</BODY>
</HTML>
