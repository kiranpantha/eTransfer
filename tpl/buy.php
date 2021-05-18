<?php 
require('dbconn.php');
$buy='';
//pay
function payed($userid,$type,$from,$pricevalue,$code_too)
{
require('class/invoiceadd.php');
$add_new=new invoiceadd();
$add_new->add($userid,$type,$from,$pricevalue,$code_too);
}
//kiran
function getbalance($idname)
{
$tbl_nam="balance";
$sql="SELECT * FROM $tbl_nam WHERE id='$idname'";
$result=mysql_query($sql);
if ($result)
{
$rowss=mysql_fetch_array($result);
$ab=$rowss['ab'];
$rb=$rowss['rb'];
return $ab;
}	
}
//
//get code
function get_code($idinfo)
{
$tbl_name1="product_code";
$sql1="SELECT * FROM $tbl_name1 WHERE id='$idinfo'";
$result1=mysql_query($sql1);
if ($result1)
{
$rows=mysql_fetch_array($result1);
$code_value=$rows['code'];
}
return $code_value;
}
//end code
//del that code
function del_that_code($idnam,$code_pro)
{
$tbl_n='product_code';
$sql3="DELETE FROM $tbl_n WHERE id = '$idnam' and code='$code_pro'";
$result3=mysql_query($sql3);
if ($result3)
{
echo '<br>---Code Executed---';
}
}
//end del that name
if (empty($_COOKIE['email']) && empty($_COOKIE['pass1']) && empty($_COOKIE['pass2']))
{
header("Location: ../err.php?err=reqlogin");
die();
$idname=0;
}
else
{
//check
$tbl_name="members"; // Table name 
$myusername=$_COOKIE['email']; 
$mypassword1=$_COOKIE['pass1'];
$mypassword2=$_COOKIE['pass2'];
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' AND password1='$mypassword1' AND password2='$mypassword2'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
while($rows=mysql_fetch_array($result))
{
$idname=$rows['id'];
}
}
if ($idname=='')
{
header("Location: ../err.php?err=fake");
die();
}
}				//end check
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
$title='';
require('dbconn.php');
$tbl_name1="products";
$sql1="SELECT * FROM $tbl_name1 WHERE id='$task'";
$result1=mysql_query($sql1);
if ($result1)
{
while($rows=mysql_fetch_array($result1))
{
$type=$rows['type'];
$info=$rows['info'];
$from=$rows['from'];
$id_price=$id=$rows['id'];
$price=$rows['pricevalue'];
$title.='<tr width="250"><td><img src="store/'.$id.'.png" title="'.$info.'"></td><td><span class="topic">'.$info.'</span><br />
  <span class="frm">From </span><span class="comp">'.$from.'</span><br />
    <span class="frm">Price</span> <span class="price"> Rs '.$price.'</span> <br /><a href="buy.php?info='.$id.'&buy=true&accessid='.md5($id).'"><img src="../imp_img/buy.png" alt="Confirm Buy" Title="Confirm Buy"/></a></td></tr>';
//Buy
}
}
$ab=getbalance($idname);
//price edit
if (@$_GET['buy']=='true')
{
if ($ab>$price)
{
//get code
$code_to=get_code($id_price);
//end getcode
if (!empty($code_to))
{
$addedbalance=$ab-$price;
$tbl_name2="balance";
$sqlv="UPDATE `$tbl_name2` SET `ab` = '$addedbalance'  WHERE id='$idname'";
$resultv=mysql_query($sqlv);
if ($resultv)
{
echo "<div class=\"atten\">The code is <BR> <STRONG>$code_to</STRONG><BR> It's copy is sent to you via E-mail and SMS</DIV>";
$from='My Balance';
payed($idname,$info,$from,$price,$code_to);
del_that_code($id_price,$code_to);
//sending mail and sms

//end it
die();
}
}
else
{
echo "<div class=\"warning\" align=\"center\" style=\"width:80%\"><STRONG>No Code Found</STRONG><BR>Sorry for inconvience</div>";
}
}
else
{
echo "<div class=\"warning\"  align=\"center\" style=\"width:80%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<STRONG>Insufficient Balance</STRONG></div>";
}
//price
}
}
else
{
echo "<div class=\"warning\"  align=\"center\" style=\"width:80%\"><STRONG>Internal Error ! Please let us know about it</STRONG></div>";
}
}
else
{
echo "<div class=\"warning\"  align=\"center\" style=\"width:80%\"><STRONG>Internal Error ! Please let us know about it</STRONG></div>";
}
}
}
else
{
echo "<div class=\"warning\"  align=\"center\" style=\"width:80%\"><STRONG>You must log in First</STRONG></div>";
}
echo '<TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">'.$title.'</TABLE>';
?>
 
</DIV>
</BODY>
</HTML>