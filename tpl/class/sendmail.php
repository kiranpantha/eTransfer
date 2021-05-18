<?php
class wemail
{
  function send($email,$type,$encoded_data,$notification)
  {
   //type of msg
   $server=$_SERVER['SERVER_NAME'];
   if ($type=='redg')
   {
   $subject="e-transfer | Payment gateway Registration";
   $message="You have been registered to the e-transfer payment gateway
             Please verify that you have done it.To verify click the 
			 link below:
			 http://$server/confirm.php?con=$encoded_data&email=$email&mediun=mail&hash=".base64_encode("KIRANSOFT")."
			 If you have not done the registration please do nothing";
   }
   elseif($type=="confirm")
   {
   $subject="e-transfer | Payment gateway verification Confirmed";
   $message="Thank's for your confirmation .We have verified this email as yours";
   }
   elseif($type=="noti")
   {
  $subject="e-transfer | Notification";
   $message=$notification;
   }
   $kiran_msg='<style type="text/css">
<!--
.a {
	color: #FFFFFF;
	font-size: large;
	font-weight: bold;
}
.b {color: #FFFFFF}
-->
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#666666">
  <tr>
    <td width="21%" ><img src="http://'.$server.'/images/epay.png" alt="e-transfer" width="207" height="58" /></td>
    <td width="79%"><span class="a">The totally secured payment gateway </span></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td>'.$message.'</td>
  </tr>
  <tr>
    <td ><p class="b">Thanks<br />
    e-transfer Pvt. Ltd. <br />
      Shankarnagar-5 Rupandehi
</p>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>';
$from = "From: noreply@kiranpantha.com.np";
@mail($email,$subject,$kiran_msg,$from);
return "yes";
  }
}
?>
