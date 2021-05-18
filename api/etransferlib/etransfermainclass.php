<?php
class etransfer_data_main
{
 function etransfer_data_get_result($accesscode,$specialcode,$merchantid,$unicheck1,$unicheck_md5,$unicheck_sha,$invoiceid,$got_hash_data)
 { 
   require('etransfer.php');  
   require('etransfercomplete.php');
   require('etransfercss.php');
   $etransfer_url_validity_obj= new etransferlib();
   $etransfer_url_validity=$etransfer_url_validity_obj->etransfer_verify($specialcode,$accesscode,$unicheck1,$unicheck_md5,$unicheck_sha);
   //get data verify
      if ($etransfer_url_validity==302)
	  {
	    //further processing
		$etransfer_invoice_obj= new etransferlib_complete();	
		$invoice_verified=$etransfer_invoice_obj->etransfer_verify($merchantid,$specialcode,$invoiceid,$got_hash_data);
		return $invoice_verified;
	  }
	  else
	  {
	    return $etransfer_url_validity;
	  }
  }
}
?>