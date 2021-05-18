<?php
class invoice
{
  function information($invoiceid)
  {
   $rows=false;
   $main_data="NULL";
   require('dbconn.php');
   $tbl_name="invoice_underprocess"; // Table name 
   $sql="SELECT *  FROM `$tbl_name` WHERE `id` = $invoiceid";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count==1)
   {
   $rows=mysql_fetch_array($result);
   $main_data=array($rows['id'],$rows['from'],$rows['to'],$rows['type'],$rows['p_to'],$rows['pricevalue'],$rows['date'],$rows['code'],"NULL");
   }
  return $main_data;
  }
}
?>