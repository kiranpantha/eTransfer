<?php
if($_GET)
{
  $merchantid=$_GET['merid'];
  $invoiceid=$_GET['invoiceid'];
  $secret=$_GET['s_c'];
  if (empty($merchantid) || empty($secret) || empty($invoiceid))
  {
   echo "INVALID";
  }
  elseif(!empty($merchantid) && !empty($secret) && !empty($invoiceid))
  {
    //validate the information as a valid merchant
	require('class/merchant_verify.php');
	$merchant_verify_obj= new merchant_verify();
	$is_valid_merchant=$merchant_verify_obj->information($secret,$merchantid);
	if ($is_valid_merchant=="NULL")
	{
	echo "MER_ERR";
	}
	else
	{
	 //verified merchant verified
	 require('class/getinvoice.php');
	 $get_invoice_obj=new  invoice();
	 $get_in=$get_invoice_obj->information($invoiceid);
	  if ($get_in=="NULL")
	  {
	   echo "ALREADYPAID";
	  }
	  else
	  {
	    //need to deduce balance
		  require('class/checkbalance.php');
		  $balance_obj=new mybalance_api();
		  $mybalance=  $balance_obj->getmybalance($get_in[1]);
		  if(($mybalance!=='NULL') && ($mybalance>=$get_in[4]))
		  {
 		  require('class/fundaddsub.php');
		  $deduce_balance=new add_del();
		  $balance_paid=$deduce_balance->information($get_in[3],$get_in[1],$mybalance,$get_in[4]);
		   if ($balance_paid=='yes')
		   {
		  //invoice if valid: Validated result valid
		    require('class/invoiceadd.php');
		    $add_invoice_obj=new  invoiceadd();
		    $add_in=$add_invoice_obj->add($get_in[1],$get_in[3],$get_in[4],$get_in[5]);
			if($add_in=="yes")
			{
		        require('class/invoicedel.php');
				$del_invoice_obj=new  invoicedel();
				$del_data=$del_invoice_obj->del($invoiceid);
				if ($del_data=='yes')
				{
				echo "TRANSFEROK";
				}
			}
		  }
		  else
		  {
		  echo "INVALID";
          }
		}
	  }
	 }
   }
 }
?>