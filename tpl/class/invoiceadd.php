<?php
class invoiceadd
{
  function add($userid,$type,$from,$pricevalue,$code_too)
 {
 require('dbconn.php'); 
 $tbl_nameins='invoice';
 $sqlins='INSERT INTO `'.$db_name.'`.`'.$tbl_nameins.'` (`id`, `userid`, `type`, `from`, `pricevalue` ,  `date` ,  `code` ) VALUES (NULL, \''.$userid.'\', \''.$type.'\', \''.$from.'\', \''.$pricevalue.'\', \''.date("U").'\', \''.$code_too.'\');';
 $resultins=mysql_query($sqlins);
 if($resultins)
 {
 //add to invoice db
return "yes";
 }
 }
}
?>