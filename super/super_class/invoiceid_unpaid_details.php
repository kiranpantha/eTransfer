<?php
class invoiceun_get_gets
{
  function information($secure,$userid)
  { 
  if($secure!=='INVOICEMINE'){exit();}
   $rows=false;
   $main_veri=false;
   $main_data_a=false;
   $main_data=false;
   $added_veri=false;
   $name=$email=$type=false;
   require('dbconn.php');
   $tbl_name="invoice_underprocess"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE `id`=$userid";
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
    $array_data=$this->getdetails($rows['from'],$rows['type'],$rows['p_to'],$rows['from']);
    $main_data='
	<tr><td width="40" background="../images/back.png"><span class="white">Invoice ID</span></td><td width="40" background=  "../images/back.png"><span class="white">'.$rows['id'].'</span></td></tr>
		<tr><td width="40" background="../images/body.png"><span class="white">Type</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$array_data[2].'</span></td></tr>
	<tr><td width="40" background="../images/body.png"><span class="white">Product</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$array_data[0].'</span></td></tr>
	<tr><td width="40" background="../images/body.png"><span class="white">From</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$array_data[1].'</span></td></tr>
	<tr><td width="40" background="../images/body.png"><span class="white">Price paid</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$rows['pricevalue'].'</span></td></tr>
		<tr><td width="40" background="../images/body.png"><span class="white">Date</span></td><td width="40" background=  "../images/body.png"><span class="white">'.date("Y/m/d",$rows['date']).'</span></td></tr>
	<tr><td width="40" background="../images/body.png"><span class="white">Code*</span></td><td width="40" background=  "../images/body.png"><span class="white">'.$rows['code'].'</span></td></tr>'.$main_data;
	$added_veri='true';
   }
    $main_data.='</table>';
   }
 if($added_veri=='true'){ return $main_data_a.$main_data; } else { return '<img src="epay.png"><br /><h1>||--No History--||</h1>'; }
  }
  function getdetails($id_pro,$is_mer,$p_to,$from)
  {
   $tbl_name="merchants"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE `id`=$p_to";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
      if($count==1)
      {
       while($rows=mysql_fetch_array($result))
       {  
	    $name=$rows['name'];
	    $email=$rows['company'];
	    $type='External Payement';
       }
      }
   return array($name,$email,$type,'NULL');
  }
}
?>