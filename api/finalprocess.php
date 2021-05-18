<?php
if($_GET)
{
  $merchantid=@$_GET['merid'];
  $invoiceid=@$_GET['invoiceid'];
  $secret=@$_GET['s_c'];
  $hash_got_data=@$_GET['hash'];
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
     $id_got=$get_in[0];
	 $from_got=$get_in[1];
	 $to_got=$get_in[2];
	 $type_got=$get_in[3];
	 $p_to=$get_in[4];	
	 $price_got=$get_in[5];	
     $date_got=$get_in[6];
	 $code_got=$get_in[7];
	 $null_got=$get_in[8];

		  require('class/checkbalance.php');
		  $balance_obj=new mybalance_api();
		  $mybalance=  $balance_obj->getmybalance($from_got);
		  if(($mybalance!=='NULL') && ($mybalance>=$price_got))
		  {
 		  require('class/fundaddsub.php');
		  $deduce_balance=new add_del();
		  $balance_paid=$deduce_balance->information($from_got,$to_got,$mybalance,$price_got);
		   if ($balance_paid=='yes')
		   {
		  //invoice if valid: Validated result valid
		    require('class/invoiceadd.php');
		    $add_invoice_obj=new  invoiceadd();
		    $add_in=$add_invoice_obj->add($from_got,$to_got, $type_got,'1',$price_got,$date_got,$code_got);
			if($add_in=="yes")
			{
		        require('class/invoicedel.php');
				$del_invoice_obj=new  invoicedel();
				$del_data=$del_invoice_obj->del($invoiceid);
				if ($del_data=='yes')
				{
				echo "TRANSFEROK";
				unlink('../temp_data_merchant_listit/'.$hash_got_data);
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