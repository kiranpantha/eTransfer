<?php
class invoicedel
{
  function del($invoiceid)
 {
 require('dbconn.php'); 
 $tbl_nameins='invoice_underprocess';
 $sqlins="DELETE FROM `".$db_name."`.`".$tbl_nameins."` WHERE `".$tbl_nameins."`.`id` =".$invoiceid;
 $resultins=mysql_query($sqlins);
 if($resultins)
 {
 return "yes";
 }
 }
}
?>