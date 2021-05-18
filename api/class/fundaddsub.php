<?php
class add_del
{
  function information($fromuserid,$touserid,$mybalance,$amount)
  {
    require('dbconn.php');
	$msg_re=0;
 //   if ($process=='ADD')
 //   {
	  //get balance
	  $subbalance=$mybalance-$amount;
	  //write to db
	  $tbl_name2="balance";
      $sqlv="UPDATE `$tbl_name2` SET `ab` = '$subbalance'  WHERE id='$fromuserid'";
      $resultv=mysql_query($sqlv);
      if ($resultv)
      { 
      $msg_re=1;
	  }  else
	  {
	   $msg_re=0;
	  }
  // }
  //if ($process=='SUB')
	 //{
	  //get balance
	 require('checkbalance2.php');
	 $balance_get_new= new mybalance_2();
	 $got_balance_sub=$balance_get_new->getmybalance_2($touserid);
	 $addedbalance=$got_balance_sub+$amount;
	 //write to db
	$tbl_name2="balance";
     $sqlv="UPDATE `$tbl_name2` SET `ab` = '$addedbalance'  WHERE id='$touserid'";
     $resultv=mysql_query($sqlv);
     if ($resultv)
      { 
	 $msg_re=1;
	 }
	 else
	{
	  $msg_re=0;
	}
	  if ($msg_re==1)
	  {
	  return "yes";
	  }
	 //}
 // }
  }
}
?>