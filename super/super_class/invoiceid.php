<?php
class invoice_get
{
  function information($secure)
  { 
  if($secure!=='INVOICEMINE'){exit();}
   $rows=false;
   $main_veri=false;
   $main_data_a=false;
   $main_data=false;
   $added_veri=false;
   require('dbconn.php');
   $tbl_name="invoice"; // Table name 
   $sql="SELECT * FROM $tbl_name";
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
	<tr><td width="20%" background="../images/body.png"><span class="white">Invoice ID: '.$rows['id'].'</span></td><td width="20%" background=  "../images/back.png"><span class="white">'.$rows['type'].'</span></td><td width="20%" background=  "../images/body.png"><span class="white">Userid: <a class="modal-button" href="user_show_details.php?id='.$rows['userid'].'" rel="{handler: \'iframe\', size: {x: 750, y: 190}, overlayOpacity: 0.7}">'.$rows['userid'].'</a></span></td><td width="20%" background=  "../images/back.png"><span class="white"> <a class="modal-button" href="invoice_details.php?id='.$rows['id'].'" rel="{handler: \'iframe\', size: {x: 320, y: 190}, overlayOpacity: 0.7}">View details..</a></span></td></tr>'.$main_data;
	$added_veri='true';
   }
    $main_data.='</table>';
   }
 if($added_veri=='true'){ return $main_data_a.$main_data; } else { return '<img src="images/epay.png"><br /><h1>||--No History--||</h1>'; }
  }
}
?>