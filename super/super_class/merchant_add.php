<?php
class super_merchant
{
  function information($userid,$name,$company,$uri,$s_c,$price,$ifyes,$ifno)
  {
   $rows=false;
   $main_data="NULL";
   require('dbconn.php');
   $tbl_name="merchants"; // Table name 
   $sql="INSERT INTO `$db_name`.`$tbl_name` (`id`, `userid`, `name`, `company`, `uri`, `s_c`, `price`, `ifyes`, `ifno`) VALUES (NULL, '$userid', '$name', '$company', '$uri', '$s_c', '$price', '$ifyes', '$ifno');";
   $result=mysql_query($sql);
   if ($result)
   {
   return 'yes';
   }
   else
   {
   return 'no';
   }
  }
}
?>