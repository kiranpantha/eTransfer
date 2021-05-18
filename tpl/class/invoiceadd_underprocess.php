<?php
class invoiceadd_underprocess
{
  function add_underprocess($payer,$geter,$type,$p_to,$pricevalue,$code,$date)
  {
  require('dbconn.php'); 
  $tbl_nameins='invoice_underprocess';
  $sqlins="INSERT INTO `$db_name`.`$tbl_nameins` (`id`, `from`, `to`, `type`, `p_to`, `pricevalue`, `date`, `code`, `notified`) VALUES (NULL,'$payer', '$geter', '$type', '$p_to', '$pricevalue', '$date', '$code', 'no')";
  $resultins=mysql_query($sqlins);
  if($resultins)
  {
  //add to invoice db
  return "yes";
  }
  }
}
?>