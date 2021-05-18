<?php
class invoiceadd_underprocess
{
  function add_underprocess($userid,$type,$from,$pricevalue,$date)
 {
 require('dbconn.php'); 
 $tbl_nameins='invoice_underprocess';
 $sqlins='INSERT INTO `'.$db_name.'`.`'.$tbl_nameins.'` (`id`, `userid`, `type`, `from`, `pricevalue` ,`date` ) VALUES (NULL, \''.$userid.'\', \''.$type.'\', \''.$from.'\', \''.$pricevalue.'\', \''.$date.'\');';
 $resultins=mysql_query($sqlins);
 if($resultins)
 {
 //add to invoice db
return "yes";
 }
 }
}
?>