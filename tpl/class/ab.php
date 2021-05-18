<?php
class myrbalance
{
  public function getmyrbalance($userid)
  {
   $balance="NULL";
   require('dbconn.php');
   $tbl_name="balance"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE id=$userid";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count==1){
   $rows=mysql_fetch_array($result);
   $balance=$rows['rb'];
   }
   return $balance;
  }
}
?>