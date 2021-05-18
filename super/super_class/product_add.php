<?php
class _____
{
  function _($type,$info,$from,$price,$imgurl)
  {
   $rows=false;
   $main_data="NULL";
   require('dbconn.php');
   $tbl_name="products"; // Table name 
   $sql="INSERT INTO `$db_name`.`$tbl_name` (`id`, `type`, `info`, `from`, `pricevalue`, `imgsrc`) VALUES (NULL, '$type', '$info', '$from', '$price', '$imgurl.png');";
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