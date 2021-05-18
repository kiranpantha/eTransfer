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
   <tr><td width="10%" background="../images/body.png"><span class="white">Invoice ID</span></td><td width="20%" background=  "../images/body.png"><span class="white">Type</span></td><td width="20%" background=  "../images/body.png"><span class="white">User Name</span></td><td width="20%" background=  "../images/body.png"><span class="white">Action</span></td></tr>
   ';
   while($rows=mysql_fetch_array($result))
   {
    $array_data=$this->getdetails($rows['from'],$rows['type'],$rows['p_to'],$rows['from']);
    $main_data='
	<tr><td width="10%" background=  "../images/back.png"><span class="white">'.$rows['id'].'</span></td><td width="20%" background=  "../images/back.png"><span class="white">'.$array_data[2].'</span></td><td width="20%" background=  "../images/back.png"><span class="white">'.$this->id_2_name($rows['from']).'</span></td><td width="20%" background=  "../images/back.png"><span class="white"> <a class="modal-button" title="Log in" href="invoice_details.php?id='.$rows['id'].'" rel="{handler: \'iframe\', size: {x: 300, y: 190}, overlayOpacity: 0.7}">View details..</a></span></td></tr>'.$main_data;
	$added_veri='true';
   }
    $main_data.='    <tr><td width="10%" background="../images/body.png"><span class="white">Invoice ID</span></td><td width="20%" background=  "../images/body.png"><span class="white">Type</span></td><td width="20%" background=  "../images/body.png"><span class="white">User Name</span></td><td width="20%" background=  "../images/body.png"><span class="white">Action</span></td></tr>
</table>';
   }
 if($added_veri=='true'){ return $main_data_a.$main_data; } else { return '<center><img src="images/epay.png"><br /><h1>||--No History--||</h1></center>'; }
  }
  function getdetails($id_pro,$is_mer,$p_to,$from)
  {
  $name=$email=$type=NULL;
   require('dbconn.php');
   if($is_mer==0)
   {
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
       }
      }
   }
   elseif($is_mer==1)
   {
   $tbl_name="merchants"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE `id`=$p_to";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
      if($count>=1)
      {
       while($rows=mysql_fetch_array($result))
       {  
	    $name=$rows['name'];
	    $email=$rows['company'];
	    $type='External Payement';
       }
      }
   }
   elseif($is_mer==2)
   {
   $tbl_name="products"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE `id`=$p_to";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
      if($count==1)
      {
       while($rows=mysql_fetch_array($result))
       {  
	    $name=$rows['info'];
	    $email=$rows['from'];
		$type_pro=$rows['type'];
		 if($type_pro=='rch')
		 {
		  $type="Recharge Card";
		 }
		 elseif($type_pro=='internet')
		 {
		  $type="Internet Bill";
		 }elseif($type_pro=='utility')
		 {
		  $type="Utitlity Payment";
		 }else
		 {
		  $type="Unknown";
		 }
       }
      }
   }
   return array($name,$email,$type,'NULL');
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