<?php
class invoiceadd
{
  function add($userid,$from,$pricevalue,$date)
 {
 require('dbconn.php'); 
 $tbl_nameins='invoice';
 $sqlins='INSERT INTO `'.$db_name.'`.`'.$tbl_nameins.'` (`id`, `userid`, `type`, `from`, `pricevalue` ,  `date` ,  `code` ) VALUES (NULL, \''.$userid.'\', \''.'External Payment'.'\', \''.$from.'\', \''.$pricevalue.'\', \''.$date.'\', \'NULL\');';
 $resultins=mysql_query($sqlins);
 if($resultins)
 {
 //add to invoice db
 return "yes";
 }
 }
}
?>