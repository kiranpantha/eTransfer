<?php
if($_GET)
{
 ///verify loggedin
 if (@$_GET['id']!=='')
 {
 require('super_class/loggedin.php');
 $userid_post=@$_COOKIE['users'];
 $passid_post=@$_COOKIE['passs'];
 $loggedin_obj=new  user();
 $loggedin=$loggedin_obj->getusers($userid_post,$passid_post);
 if($loggedin==0)
 {
 echo 'Error';
 die();
 }
 else
 {
 $id=$_REQUEST['id'];
 require('super_class/invoiceid_details.php');
 $invoice_obj=new invoice_get_details();
 $invoiceid=$invoice_obj->information('INVOICEMINE',$id);
 echo $invoiceid;
 } 
 }
}
?>