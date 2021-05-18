<?php
class merchant
{
  function information()
  {
  $rows=false;
   $main_data="NULL";
   require('dbconn.php');
   $tbl_name="merchants"; // Table name 
   $sql="SELECT * FROM $tbl_name";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count>=1){
$main_data='<style type="text/css">
<!--
.white {
	color: #FFFFFF;
	font-size: 10px;
}
-->
</style>
This are the merchant that are with us
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" background="../images/back.png"><span class="white">Product</span></td>
    <td width="40%" background="../images/back.png"><span class="white">Company<span></td>
    <td width="30%" background="../images/back.png"><span class="white">Website</span></td>
  </tr>';
   while($rows=mysql_fetch_array($result))
   {
    $main_data.='<tr>
    <td  background="../images/body.png">'.$rows['name'].'</td>
    <td  background="../images/body.png">'.$rows['company'].'</td>
    <td  background="../images/body.png"><a href="http://'.$rows['uri'].'">'.$rows['uri'].'</a></td>
    </tr>';
   }
    $main_data.='</table><br /><a href="addmerchant.php"><img src="../images/info.png">Want to be a merchant</a>';
   }
   return $main_data;
  }
}
?>