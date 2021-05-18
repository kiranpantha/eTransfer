<?php
class super_merchant
{
  function information($id,$name,$company,$uri,$s_c,$price,$ifyes,$ifno)
  {
   require('dbconn.php');
   $tbl_name="merchants"; // Table name 
   $sql="INSERT INTO(id,name,company,uri,s_c,price,ifyes,ifno) VALUES($id,$name,$company,$uri,$s_c,$price,$ifyes,$ifno)";
   $result=mysql_query($sql);
   if ($result)
   {
     return "yes"; 
   }
  }
}
?>