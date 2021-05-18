<?php
if($_POST)
{
$info=$_POST['name'];
$type=$_POST['type'];
$via=$_POST['via'];
$price=$_POST['price'];
if(!empty($info) && !empty($type) && !empty($via) && !empty($price ))
{
  if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  die("Upload Failed");
  }
  $filename=$_FILES["file"]["name"];
$allowedExts = array("png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	die();
    }
  else
    {
	$timedata=md5(date('U'))."_".md5(rand(900,9000));
    echo "Upload: " . $timedata.".png <br />";
    echo "Size: " . substr($_FILES["file"]["size"] / 1024,0,4) . " Kb<br />";
    move_uploaded_file($_FILES["file"]["tmp_name"],"../images/upload/" .$timedata.".png");
	echo '<h1>Data Add Sucessful</h1>';
	//place the data's in DB
	require('super_class/product_add.php');
	$my_add_product_obj=new _____();
	$my_got_result=$my_add_product_obj->_($type,$info,$via,$price,$timedata);
	//placed the data
	die();
  }
 }
 }
 else
 {
 echo "ERROR IN DATA";
 die();
 }
}
?>
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
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<form action="" method="post" enctype="multipart/form-data" onsubmit="MM_validateForm('name','','R','type','','R','via','','R','price','','RisNum');return document.MM_returnValue">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tryit_tbl">
  <tr>
    <td width="19%" height="38"><span class="style4">
      Name of Product </span></td>
    <td width="19%"><input name="name" type="text" class="tryit_tbl" id="name" /></td>
  </tr>
  <tr>
    <td height="37"><span class="style4">Type of Product </span></td>
    <td><select name="type" style=" class="tryit_tbl">
        <option value="rch">Recharge</option>
		<option value="internet">Internet</option>
        </select></td>
  </tr>
  <tr>
    <td height="36"><span class="style4">Published Via </span></td>
    <td><input name="via" type="text" class="tryit_tbl" id="via" /></td>
  </tr>
  <tr>
    <td height="34"><span class="style4">Price of Product </span></td>
    <td><input name="price" type="text" class="tryit_tbl" id="price" /></td>
  </tr>
  <tr>
    <td height="34"><span class="style4">Logo of Project  </span></td>
    <td><input name="file" type="file" class="tryit_tbl" id="product" size="60%" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <div align="right">
        <input name="addpro" type="submit" class="tryit_login" id="addpro" value="Add Data" />
        </div>
    </label></td>
  </tr>
</table>
</form>    
