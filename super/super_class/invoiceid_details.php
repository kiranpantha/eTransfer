<?php
class invoice_get_details
{
  function information($secure,$id)
  { 
   if($secure!=='INVOICEMINE'){exit();}
   $rows=false;
   $main_veri=false;
   $main_data_a=false;
   $main_data=false;
   $added_veri=false;
   require('dbconn.php');
   $tbl_name="invoice"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE id=$id";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count>=1){
   $main_data_a='<style type="text/css">
   <!--
   .white {
	  color: #FFFFFF;
	  font-size: 18px;
   }
   -->
   </style>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
   ';
   while($rows=mysql_fetch_array($result))
   {
    $main_data='
	<tr><td width="40" background="../images/back.png"><span class="white">Invoice ID</span></td><td width="40" background=  "../images/back.png"><span class="white">'.$rows['id'].'</span></td></tr>
		<tr><td width="40" background="../images/body.png"><span class="white">Type</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$rows['type'].'</span></td></tr>
	<tr><td width="40" background="../images/body.png"><span class="white">From</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$rows['from'].'</span></td></tr>
	<tr><td width="40" background="../images/body.png"><span class="white">Price paid</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$rows['pricevalue'].'</span></td></tr>
		<tr><td width="40" background="../images/body.png"><span class="white">Date</span></td><td width="40" background=  "../images/body.png"><span class="white">'.date("Y/m/d",$rows['date']).'</span></td></tr>
	<tr><td width="40" background="../images/body.png"><span class="white">Code*</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$rows['code'].'</span></td></tr>'.$main_data;
	$added_veri='true';
   }
    $main_data.='</table>';
   }
 if($added_veri=='true'){ return $main_data_a.$main_data; } else { return '<img src="images/epay.png"><br /><h1>||--Invalid ID--||</h1>'; }
  }
}
?>