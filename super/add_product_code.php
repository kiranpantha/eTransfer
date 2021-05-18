<?php
if($_GET)
{
$productid=$_GET['id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add the Code</title>
<style type="text/css">
<!--
a.tryitbtn,a.tryitbtn:link,a.tryitbtn:visited
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
width:120px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}

a.tryitbtn:hover,a.tryitbtn:active
{
background-color:#7A991A;
}
.tryit
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
width:150px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}
.tryit_login
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
width:170px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}

.tryit_tbl
{
	display:block;
	color:#FFFFFF;
	background-color:#98bf21;
	font-weight:bold;
	font-size:11px;
	width:100%;
	text-align:center;
	padding:0;
	padding-top:3px;
	padding-bottom:4px;
	border:1px solid #ffffff;
	outline:1px solid #98bf21;
	text-decoration:none;
	margin-left:1px;
	font-style: oblique;
	border-color: #FFFFFF;
}
.tryit_red
{
	display:block;
	color:#FFFFFF;
	background-color:#FF0000;
	font-weight:bold;
	width:350px;
	height:40px;
	text-align:center;
	padding:0;
	padding-top:3px;
	padding-bottom:4px;
	border:1px solid #ffffff;
	outline:1px solid #98bf21;
	text-decoration:none;
	margin-left:1px;
	background-image: url(../imp_img/err.png);
	background-repeat: no-repeat;
	font-family: Arial, Helvetica, sans-serif;
	visibility: hidden;
}
.style4 {font-size: 24px}
#msgbox {
	position:absolute;
	z-index:1;
	background-image: url(images/redgnew.png);
	background-repeat: no-repeat;
	visibility: hidden;
}
-->
</style>
<script src="super_class/ajax_add_data.php" type="text/javascript"></script>
</head>
<body>
<form id="FORMFOR" name="FORMFOR">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tryit_tbl">
  <tr>
    <td width="19%" height="38"><span class="style4">
      Code of Product </span>
   </td>
 <td width="19%"><input name="product" type="text" class="tryit_tbl" id="product" onchange="getadded(this,<?php echo $productid; ?>);"/><input name="id" type="hidden" class="tryit_tbl" id="id" value="<?php echo $productid; ?>"/>
 </tr>
  <tr>
    <td><div>
     <div class="style4" id="msgbox"></div></td></tr>
</table>
</form>
</body>
</html>
