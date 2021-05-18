<?php 
$title='';
$email_my=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
require("class/verifylogin.php");
$gotoo=new verify();
$mydata=$gotoo->verified($email_my,$pass1,$pass2);
if ($mydata!=="NULL")
{
$idname=$mydata;
}
else
{
echo "ERROR";
//header("Location: ../err.php?errid=reqlogin");
die();
}
//end check
?>
<HTML>
<HEAD>
<LINK rel="stylesheet" href="../userfiles/cssforreg.css"/>
<STYLE>

<!--

BODY {
	SCROLLBAR-FACE-COLOR: #808080;
	SCROLLBAR-HIGHLIGHT-COLOR: #000000;
	SCROLLBAR-SHADOW-COLOR: #999999;
	SCROLLBAR-3DLIGHT-COLOR: #ffffff;
	SCROLLBAR-ARROW-COLOR:  #C0C0C0;
	SCROLLBAR-TRACK-COLOR: #969696;
	SCROLLBAR-DARKSHADOW-COLOR: #666666;
	background-color: #333333;
}
.topic {
	font-size: 18px;
	color: #99FF33;
	font-weight: bold;
	text-align:center;
}
.comp {
	color: #0000FF;
	font-weight: bold;
}
.price {
	color: #FF0000;
	font-weight: bold;
}
.frm {color: #FFFFFF;}

-->

</STYLE>
<?php require('photo_menu.tpl'); ?>
<META http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD>
<BODY>
<DIV align="center">
<?php
if ($idname!==0)
{
if ($_GET)
{
$access=$_GET['accessid'];
$task=$_GET['info'];
if (!empty($access) && !empty($task))
{
if (md5($task)==$access)
{
//if statement
if ($_GET['info']=='addfunds')
{
echo 'Not developed Yet';
exit();
}
elseif ($_GET['info']=='other')
{   
   require("class/merchant_info.php");
   $merlist= new merchant();
   echo $merlist->information();
   exit();
}
elseif ($_GET['info']=='statement')
{
   require("class/invoiceid.php");
   $merlist= new invoice();
   echo $merlist->information($idname);
   exit();
}
//if state end
else
{
$tbl_name1="products";
$sql1="SELECT * FROM $tbl_name1 WHERE type='$task'";
$result1=mysql_query($sql1);
if ($result1)
{
while($rows=mysql_fetch_array($result1))
{
$type=$rows['type'];
$info=$rows['info'];
$from=$rows['from'];
$id=$rows['id'];
$price=$rows['pricevalue'];
$title.='<tr><td><img src="store/'.$id.'.png" title="'.$info.'"></td><td><span class="topic">'.$info.'</span><br />
    <span class="frm">From </span><span class="comp">'.$from.'</span><br />
    <span class="frm">Price</span> <span class="price"> Rs '.$price.'</span> <br /><a class="modal-button" title="Log in" rel="{handler: \'iframe\', size: {x: 375, y: 200}, overlayOpacity: 0.7}" href="buy.php?info='.$id.'&accessid='.md5($id).'"><img src="../imp_img/order.png" alt="Order Now" Title="Order Now"/></a></td></tr>';
}
}
if ($title=='')
{
$title="<tr><td>Nothing related payment center found</td></tr>";
}
}
}
}
else
{
echo "Not a Valid Command";
}
}
//profile
echo '<TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">'.$title.'</TABLE>';
}
else
{
echo "<div class=\"warning\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<STRONG>You need to Log in First</STRONG></div>";
}
?>
 
</DIV>
</BODY>
</HTML>