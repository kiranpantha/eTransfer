<?php
$lang_set=NULL;
$paid_till= $got_till=0;
$email_my=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
require("class/verifylogin.php");
$gotoo=new verify();
$mydata=$gotoo->verified($email_my,$pass1,$pass2);
if ($mydata=="NULL")
{
echo '<title>403 ERROR</title><center><h1>Undefind Request</h1>Request Failed</center>';
die();
}
else
{
$rows_data=NULL;
$user_email=$email_my;
$userid=$mydata;
   require('dbconn.php');
   $tbl_name="members"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE id=$userid";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count==1){
   $rows_data=mysql_fetch_array($result);
   $user_name=$rows_data[1];
   $user_id=$rows_data[0];
   $user_email=$rows_data[2];
   $user_addr=$rows_data[6];
   }
  
}
//
function id_2_email($id)
  {
   $login_id="NULL";
   require('dbconn.php');
   $tbl_name="members"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE id=$id";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count==1){
   $rows=mysql_fetch_array($result);
   $login_id=$rows['email'];
   }
   return $login_id;
  }
  function type($pro)
  {
   if ($pro==0)
   {
   return 'Transfer';
   }
   elseif ($pro==1)
   {
   return 'External Payment';
   }
   else
   {
   return 'Utility Payment';
   }
  }
  function id_2_mername($pro)
  {
  $name=NULL;
  require('dbconn.php');
  $sql="SELECT * FROM `merchants` WHERE `id`=$pro";
  $result=mysql_query($sql);
  $count=mysql_num_rows($result);
   if ($count==1)
   {
    $array_row=mysql_fetch_array($result);
	$name=$array_row['name'].' by '.$array_row['company'];
   }
   return $name;
  }
  function id_2_proname($pro)
  {
  require('dbconn.php');
  $sql="SELECT * FROM `products` WHERE `id`=$pro";
  $result=mysql_query($sql);
  $count=mysql_num_rows($result);
   if ($count==1)
   {
    $array_row=mysql_fetch_array($result);
	$name=$array_row['info'].' from '.$array_row['from'];
   }
   return $name;
  }
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="../userfiles/favicon.png" type="image/png" />
<title>Detail Invoice</title>
<style type="text/css">
<!--
body {
	background-color: #666666;
}
.tbl_title {color: #FFFFFF}
.time_data {color: #00FF00}
.id_bold_tbl_data {color: #FFFFFF; font-weight: bold; }
.balance {color: #FF0000}
.n_o {color: #FF0000; font-weight: bold; }
-->
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="31%"><span class="tbl_title">Requested Date:</span><br />
          <span class="time_data">  <?php 
		echo date(' d M Y [D]');
		?></span><br />
          <span class="tbl_title">Requested Time:</span> <br />
          <span class="time_data"><?php 
		echo date('h:i:s A');
		?></span>      <br /></td>
        <td width="49%"><div align="center"><img src="epay.png" alt="e-Transfer &trade;" width="378" height="80" /></div></td>
        <td width="20%"><h2><a onClick="ok_print();" href="#"><span class="id_bold_tbl_data">[</span><img src="../images/b_print.png" alt="Print" width="16" height="20">PRINT<span class="id_bold_tbl_data">]</span></a></h2></td>
      </tr>
    </table>	</td>
  </tr>
  <tr>
    <td><div align="center">
      <h1>---||<span class="tbl_title"> Total Invoice </span>||---</h1>
    </div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12%"><span class="id_bold_tbl_data">User Detail's </span></td>
        <td width="10%">&nbsp;</td>
        <td width="2%">&nbsp;</td>
        <td width="31%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="31%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><span class="id_bold_tbl_data">Name  </span></td>
        <td class="id_bold_tbl_data"><span class="id_bold_tbl_data">:</span></td>
        <td class="id_bold_tbl_data"><?php echo $user_name; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><span class="id_bold_tbl_data">User Id </span></td>
        <td class="id_bold_tbl_data"><span class="id_bold_tbl_data">:</span></td>
        <td class="id_bold_tbl_data"><?php echo $user_id; ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><span class="id_bold_tbl_data">E-mail</span></td>
        <td class="id_bold_tbl_data"><span class="id_bold_tbl_data">:</span></td>
        <td class="id_bold_tbl_data"><?php echo $user_email; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><span class="id_bold_tbl_data">Address</span></td>
        <td class="id_bold_tbl_data"><span class="id_bold_tbl_data">:</span></td>
        <td class="id_bold_tbl_data"><?php echo $user_addr; ?></td>
        <td>&nbsp;</td>
      </tr>
    </table>      </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr bgcolor="#333333">
        <td width="13%" class="id_bold_tbl_data">ID</td>
        <td width="23%" class="id_bold_tbl_data">Date and Time </td>
        <td width="36%" class="id_bold_tbl_data">Item</td>
        <td width="15%" class="id_bold_tbl_data">Got</td>
      </tr>
      <?php
	  $rows=false;
      $main_veri=false;
      $main_data_a=false;
      $main_data=false;
      $added_veri=false;
      require('dbconn.php');
      $tbl_name="invoice"; // Table name 
      $sql="SELECT * FROM $tbl_name WHERE `to`=$userid";
      $result=mysql_query($sql);
      $count=mysql_num_rows($result);
      if($count>=1){
	   while($rows=mysql_fetch_array($result))
	   {
	   ?>
      <tr bgcolor="#CCCCCC">
        <td style="color:#667700;"><?php echo $rows['id']; ?></td>
        <td><?php echo date('m/d/Y [m:i:s A]',$rows['date']); ?></td>
        <td><?php
		 echo type($rows['type']).' from '.id_2_email($rows['from']);
		 if ($rows['p_to']!=='0')
		 {
		 echo ' for '.id_2_mername($rows['p_to']);
		 }
		  ?></td>
        <td>RS <?php echo round($rows['pricevalue'],2) ?></td>
      </tr>
      <?php
	   $paid_till=$paid_till+$rows['pricevalue'];
	   }
	  }
	  ?>
      <tr bgcolor="#333333">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="id_bold_tbl_data"><div align="right">Total<span class="balance">&nbsp;</span><span class="balance">&nbsp;</span> </div></td>
        <td><span class="balance">&nbsp;&nbsp;&nbsp;</span><span class="n_o">RS </span><span class="balance"><?php echo $paid_till; ?></span></td>
      </tr>
      <tr bgcolor="#666666">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#333333">
        <td width="13%" class="id_bold_tbl_data">ID</td>
        <td width="23%" class="id_bold_tbl_data">Date and Time </td>
        <td width="36%" class="id_bold_tbl_data">Item</td>
        <td width="13%" class="id_bold_tbl_data">Paid</td>
      </tr>
      <?php
      // table
	  $rows=false;
      $main_veri=false;
      $main_data_a=false;
      $main_data=false;
      $added_veri=false;
      require('dbconn.php');
      $tbl_name="invoice"; // Table name 
      $sql_cr = "SELECT * FROM `$tbl_name` WHERE `from` = $userid";	
      $result_cr=mysql_query($sql_cr);
      $count_cr=mysql_num_rows($result_cr);
      if($count_cr>=1){
	   while($rows_cr=mysql_fetch_array($result_cr))
	   {
	   if ($rows_cr['type']==0)
	   {
	   ?>
      <tr bgcolor="#999999">
        <td  style="color:#667700;"><?php echo $rows_cr['id']; ?></td>
        <td><?php echo date('m/d/Y [m:i:s A]',$rows_cr['date']); ?></td>
        <td><?php echo 'Transfer to '.id_2_email($rows_cr['to']); ?></td>
        <td>RS <?php echo round($rows_cr['pricevalue'],2); ?></td>
      </tr>
      <?php
	   }
	   elseif ($rows_cr['type']==1)
	   {
	   ?>
      <tr bgcolor="#999999">
        <td  style="color:#667700;"><?php echo $rows_cr['id']; ?></td>
        <td><?php echo date('m/d/Y [m:i:s A]',$rows_cr['date']); ?></td>
        <td><?php echo 'External Payment to '.id_2_mername($rows_cr['p_to']); ?></td>
        <td>RS <?php echo round($rows_cr['pricevalue'],2); ?></td>
      </tr>
      <?php
	   }
	   elseif ($rows_cr['type']==2)
	   {
	   ?>
      <tr bgcolor="#999999">
        <td  style="color:#667700;"><?php echo $rows_cr['id']; ?></td>
        <td><?php echo date('m/d/Y [m:i:s A]',$rows_cr['date']); ?></td>
        <td><?php echo id_2_proname($rows_cr['p_to']); ?></td>
        <td>RS <?php echo round($rows_cr['pricevalue'],2); ?></td>
      </tr>
      <?php
	   }
	   $got_till=$got_till+$rows_cr['pricevalue'];
	   }
	  }
  	  ?>
      <tr bgcolor="#333333">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="id_bold_tbl_data"><div align="right"><strong>Total</strong></div></td>
        <td><span class="n_o"> <span class="balance">&nbsp;</span><span class="balance">&nbsp;</span>RS</span> <span class="balance"><?php echo $got_till; ?></span></td>
      </tr>
      <tr bgcolor="#666666">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#333333">
      <tr>
        <td class="id_bold_tbl_data"><h3>Total balance Paid till date:</h3></td>
        <td class="id_bold_tbl_data"><h3>Total balance Got till date : </h3></td>
        <td class="id_bold_tbl_data"><h3>Total balance :</h3></td>
      </tr>
      <tr>
        <td class="balance"><h2><span class="balance">RS <?php echo $paid_till; ?></span></h2></td>
        <td class="balance"><h2><span class="balance">RS <?php echo $got_till; ?></span></h2></td>
        <td class="balance"><h2><span class="balance">
          <?php
	    $tbl_name="balance"; // Table name 
		$sql="SELECT * FROM $tbl_name WHERE id=$userid";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count==1){
		$rows=mysql_fetch_array($result);
        $balance=$rows['ab'];
        }
	 echo 'RS '.$balance; ?>
        </span></h2></td>
      </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
<span class="n_o">* Not for official use</span>
<script type="text/javascript">
<!--
function ok_print(){
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
-->
</script>
</body>
</html>
