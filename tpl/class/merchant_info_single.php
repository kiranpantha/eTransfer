<?php
class merchant_single
{
  function information($id)
  {
   $rows=false;
   $main_data="NULL";
   require('dbconn.php');
   $tbl_name="merchants"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE id=$id";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count==1){
   $rows=mysql_fetch_array($result);
   $kiran = array($rows['name'],$rows['company'],$rows['uri'],$rows['price'],$rows['ifyes'],$rows['ifno'],$rows['userid'],$rows['s_c']);
   }
  return $kiran;
  }
}
?>