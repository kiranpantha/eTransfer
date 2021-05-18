<?php
class del_merchant
{
  function information($id)
  {
   require('dbconn.php');
   $tbl_name="secure_merchant"; // Table name 
   $sql="DELETE FROM $tbl_name WHERE id=$id";
   $result=mysql_query($sql);
   if ($result)
   {
     return "yes"; 
   }
   else
   {
   return "no";
   }
  }
}
?>