<?php
$title=NULL;
$email_my=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
require("class/verifylogin.php");
$gotoo=new verify();
$mydata=$gotoo->verified($email_my,$pass1,$pass2);
if ($mydata!=="NULL")
{
$idname=$mydata;
}
else
{
include('css.php');
echo  $css.'<div class="warning">ERROR</div>';
//header("Location: ../err.php?errid=reqlogin");
die();
}
//end check
if ($idname!=='NULL')
{
 if ($_POST)
 {
 $mer_name=@$_POST['mer_name'];
 $mer_company=@$_POST['mer_company'];
 $mer_uri=@$_POST['mer_uri'];
 $mer_ifyes=@$_POST['mer_ifyes'];
 $mer_ifno=@$_POST['mer_ifno'];
 $mer_price=@$_POST['mer_price'];
   if (!empty($mer_name) && !empty($mer_company) && !empty($mer_uri) && !empty($mer_ifyes) && !empty($mer_ifno) && !empty($mer_price))
   {
    //get the data to the 
	$rand_data=rand(9999,99999);
    $rand_base64=md5(base64_encode($rand_data));
    $s_c= substr(strtoupper($rand_base64),0,15);
	require('class/merchant_add.php');
	$add_mer_obj=new merchant_add();
	$add_mer=$add_mer_obj->information($idname,$mer_name,$mer_company,$mer_uri,$s_c,$mer_price,$mer_ifyes,$mer_ifno);
	if($add_mer=='yes')
	{
	 include('css.php');
	 echo '<title>Merchant Step1 >> Complete</title><div class="attention" align="center" style="color:#00FF00;"><h1>Merchant details  has been forwaded to Systemadmin</h1>We will contact you shortly after verification of the data</div>';
	}
	else
	{
	include('css.php');
	 echo '<title>Merchant Step1 >> OVER</title><div class="warning" align="center" style="color:#FF0000;"><h1>Unknown Error</h1></div>';
	}
   }
   else
   {
   $css=NULL;
   include('css.php');
   echo '<title>Failed</title><div class="warning" align="center" style="color:#FF0000;"><h1>Please type all the values in the form.</h1>It seems as there is something missing</div>';
   }
 }
}
?>