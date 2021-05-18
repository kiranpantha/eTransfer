<?php
class invoiceun_get
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
   $tbl_name="invoice_underprocess"; // Table name 
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
   <tr><td width="10%" background="../images/body.png"><span class="white">Invoice ID</span></td><td width="10%" background="../images/body.png"><span class="white">UserID</span></td><td width="20%" background=  "../images/body.png"><span class="white">User Name</span></td><td width="20%" background=  "../images/body.png"><span class="white">Action</span></td></tr>
   ';
   while($rows=mysql_fetch_array($result))
   {
       $array_data=$this->getdetails($rows['from'],$rows['type'],$rows['from']);
    $main_data='
	<tr><td width="10%" background=  "../images/back.png"><span class="white">'.$rows['id'].'</span></td><td width="10%" background=  "../images/back.png"><span class="white">'.$rows['from'].'</span></td><td width="20%" background=  "../images/back.png"><span class="white">'.$this->id_2_name($rows['from']).'</span></td><td width="20%" background=  "../images/back.png"><span class="white"> <a class="modal-button" title="Log in" href="unpaid_invoice_details.php?id='.$rows['id'].'" rel="{handler: \'iframe\', size: {x: 300, y: 190}, overlayOpacity: 0.7}">View details..</a></span></td></tr>'.$main_data;
	$added_veri='true';
   }
    $main_data.='   <tr><td width="10%" background="../images/body.png"><span class="white">Invoice ID</span></td><td width="10%" background="../images/body.png"><span class="white">UserID</span></td><td width="20%" background=  "../images/body.png"><span class="white">User Name</span></td><td width="20%" background=  "../images/body.png"><span class="white">Action</span></td></tr>
</table>';
   }
 if($added_veri=='true'){ return $main_data_a.$main_data; } else { return '<center><img src="images/epay.png"><br /><h1>||--No History--||</h1></center>'; }
  }
    function getdetails($id_pro,$from)
  {
   require('dbconn.php');
   $tbl_name="members"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE `id`=$id_pro";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
      if($count>=1)
      {
       while($rows=mysql_fetch_array($result))
       {  
	    $name=$rows['name'];
	    $email=$rows['email'];
		$type='Transfer';
		return array($name,$email,$type);
       }
     }
   }
   function id_2_name($id)
   {
   $tbl_name="members"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE `id`=$id";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
      if($count==1)
      {
      $rows=mysql_fetch_array($result);
      $name=$rows['name'];
	  return $name;
      }
   }
}
?>