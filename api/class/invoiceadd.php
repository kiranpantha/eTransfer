<?php
class invoiceadd
{
  function add($me,$you,$type,$p_to,$pricevalue,$date,$code)
 {
 require('dbconn.php'); 
 $tbl_nameins='invoice';
 $sqlins="INSERT INTO `$db_name`.`$tbl_nameins` (`id`, `from`, `to`, `type`, `p_to`, `pricevalue`, `date`, `code`, `notified`) VALUES (NULL,'$me', '$you', '$type', '$p_to', '$pricevalue', '$date', '$code', 'no')";
 $resultins=mysql_query($sqlins);
 if($resultins)
 {
 //add to invoice db
 return "yes";
 }
 }
}
?>