<?php
if ($_GET)
{
  $add_data=$verified=NULL;
  $gotemail=$_GET['email'];
  if($gotemail!=='')
  {
  require('class/verifyemail.php');
  $verified_obj=new verify_e();
  $verified=$verified_obj->verified_e($gotemail);
    if ($verified!=='NULL')
	{
	  $add_data= "<?xml version=\"1.0\" ?><email><isvalid>404</isvalid></email>";
	}
	else
	{
	  $add_data= "<?xml version=\"1.0\" ?><email><isvalid>302</isvalid></email>";
	}
  }
  else
  {
	  $add_data= "";
  }
  echo $add_data;
}
?>