<?php
class etransfer_data_main
{
 function etransfer_data_get_result($accesscode,$specialcode,$merchantid,$x1,$x2,$x3,$x4,$invoiceid)
 { 
   require('etransfer.php');  
   require('etransfercomplete.php');
   require('etransfercss.php');
   $etransfer_url_validity_obj= new etransferlib();
   $etransfer_url_validity=$etransfer_url_validity_obj->etransfer_verify($specialcode,$accesscode,$x1,$x2);
   //get data verify
      if ($etransfer_url_validity==302)
	  {
	    //further processing
		$etransfer_invoice_obj= new etransferlib_complete();	
		$invoice_verified=$etransfer_invoice_obj->etransfer_verify($merchantid,$specialcode,$invoiceid);
		return $invoice_verified;
	  }
  }
}
?>