<?php
function getname($id)
{
   require('dbconn.php');
   $table="members";
   $sql="SELECT * FROM $table WHERE `id`=$id";
   $result=mysql_query($sql);
   if($result)
   {
    $count=mysql_num_rows($result);
	if($count==1)
	{
	$rows=mysql_fetch_array($result);
	$name=$rows['name'];
    return $name;	
	}
   }
}
/*-----start webapp------*/
require('class/verifylogin.php');
$logged_obj=new verify();
$user=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
$logged_stat=$logged_obj->verified($user,$pass1,$pass2);
   if ($logged_stat!=='NULL')
   {
   $rows=$add_data_middle=$add_data_top=$add_data_end=false;
   $main_veri=false;
   $add_data_top=false;
   $add_data_middle=false;
   $added_veri=false;
   require('dbconn.php');
   $tbl_name="invoice"; // Table name 
   $sql="SELECT * FROM $tbl_name WHERE `to`=$logged_stat AND `notified`='no' AND `type`='transfer'";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
    if($count>=1)
    { 
	$add_data_top='<style type="text/css">
	<!--
    body {	background-image: url(../images/back_noti_data.png); background-repeat:repeaty; }
	.tbl  { border-bottom-color: #00FF00; }
	.name {color: #FFFFFF}
	.text {color: #0000FF}
	.paiso {color: #000000}
	.top {background-image:url(../images/noti_back_left.png); background-repeat:no-repeat}
	.middle {background-image:url(../images/noti_back_middle.png); background-repeat:repeat-x;}
	.bottom {background-image:url(../images/noti_back_right.png); background-repeat:no-repeat}
	-->
	</style>
	<table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">';
	while($rows=mysql_fetch_array($result))
	{
	$id_name_of_invoice=$rows['id'];
	$sql_update="UPDATE `$db_name`.`$tbl_name` SET `notified` = 'yes' WHERE `$tbl_name`.`id` = $id_name_of_invoice";
	$result_update=mysql_query($sql_update);
	 if($result_update)
	 {
	 $add_data_middle.='<tr>
    <td  width="20%" height="88" class="top"></td>
    <td width="70%" class="middle"><span class="name">'.getname($rows['from']).'</span><span class="text"> transfered RS<span class="paiso">'.$rows['pricevalue'].'</span> to your account</span></td>
	<td  width="10%" class="bottom">&nbsp;</td>
	</tr>';
	}
	}
	$add_data_end='</table>';
    }
	if($add_data_middle!==false)
	{
	echo $add_data_top.$add_data_middle.$add_data_end;
	}
	else
	{
	$add_data_top='<style type="text/css">
	<!--
    body {	background-image: url(../images/back_noti_data.png); background-repeat:repeaty; }
	.tbl  { border-bottom-color: #00FF00; }
	.name {color: #FFFFFF}
	.text {color: #0000FF}
	.paiso {color: #000000}
	.top {background-image:url(../images/noti_back_left.png); background-repeat:no-repeat;}
	.middle {background-image:url(../images/noti_back_middle.png); background-repeat:repeat-x;}
	.bottom {background-image:url(../images/noti_back_right.png); background-repeat:no-repeat}
	-->
	</style>
	<table width="100%" height="109" border="0" cellpadding="0" cellspacing="0">';
	 $add_data_middle.='
	<tr>
    <td  width="20%" height="88" class="top">&nbsp;</td>
    <td  width="65%" class="middle"><span class="name"><h3>No new notifications found</h3></span></td>
	<td  width="10%" class="bottom">&nbsp;</td>
	</tr>';
	$add_data_end='</title>';
	echo $add_data_top.$add_data_middle.$add_data_end;
	}	
   }
?>  