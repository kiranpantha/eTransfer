<?php
class addcode
{
  function information($s_c)
  {
  if($s_c!=="ADDCODEONIT"){return "ERROR";}
   $rows=false;
   $top=$middle=$last=NULL;
   require('dbconn.php');
   $tbl_name="product_code"; // Table name 
   $sql="SELECT * FROM $tbl_name";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count>=1){
   $top='<style type="text/css">
<!--
.title {color: #FF0000; font-weight: bold; font-size: 18px; }
.cont {color: #000000; font-weight: bold;}
-->
</style>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td width="20%" background="images/noisestrip.png"><span class="title">Type of Product </span></td>
    <td width="40%"  background="images/noisestrip.png"><span class="title">Information of Product </span></td>
    <td width="25%"  background="images/noisestrip.png"><span class="title">From</span></td>
    <td width="15%"  background="images/noisestrip.png"><span class="title">Price Value</span></td>
  </tr>';
     while($rows=mysql_fetch_array($result))
	 {
$middle.='<tr>
    <td background="images/noisestrip_trans.png"><span class="cont">'.$rows['type'].'</span></td>
    <td background="images/noisestrip_trans.png"><span class="cont">'.$rows['info'].'</span></td>
    <td background="images/noisestrip_trans.png"><span class="cont">'.$rows['from'].'</span></td>
    <td background="images/noisestrip_trans.png"><span class="cont">NRS '.$rows['pricevalue'].'</span></td>
  </tr>';
	 }
	$last="</table>";
   }
   return $top.$middle.$last;
  }
}
?>