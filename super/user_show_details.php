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
 require('super_class/getsingleuserlist.php');
 $invoice_obj=new  getuser_single();
 $invoiceid=$invoice_obj->getlist('GETDATAOFUSER',$id);
 echo $invoiceid;
 } 
 }
}
?>