<?php
$loggedin=0;
$errmsg=NULL;
require('dbconn.php');
require('super_class/loggedin.php');
$loggedin_obj= new user();
if($_POST)
{
if (!empty($_POST['user']) && !empty($_POST['pass']))
{
$userid_post=$_POST['user'];
$passid_post=$_POST['pass'];
$loggedin=$loggedin_obj->getusers($userid_post,$passid_post);
  if ($loggedin=='NULL')
  {
  $errmsg='Error in Logging in';
  }
  else
  {
  header('Location: index.php');
  die();
  }
}
else
{
  $errmsg='Enter Username or Password';
}
}
else
{
$userid_post=@$_COOKIE['users'];
$passid_post=@$_COOKIE['passs'];
$loggedin=$loggedin_obj->getusers($userid_post,$passid_post);
}
if(@$_GET['admin']=='logout')
{
setcookie('users','');
setcookie('passs','');
header('Location: index.php');
die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="images/favicon.png" type="image/png" />
<link rel="shortcut icon" href="images/favicon.png" type="image/png" />
<title><?php if($loggedin==0){ echo 'Super Admin Login'; } else {echo 'Super Admin DashBoard'; } ?></title>
<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-size: 24px;
}
.button_id{
background-color:#999999;
border:thin;
border:#FFFFFF;
}
.style6 {
	color: #FF0000;
	font-weight: bold;
}
.kiran {
	font-family: "Comic Sans MS";
	font-size: 16px;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	text-transform: uppercase;
	color:#FFFFFF;
	background:url(images/noisestrip_trans.png);
}
-->
</style>
<?php require('photo.tpl'); ?>
 <style type="text/css">
<!--
.nostrip {
	color:#999999;
	font-size: 16px;
	font-weight: bold;
	background-image:url(images/noisestrip.png);
}
.green {color:#00FF00;}
.red{color:#FF0000}
.blue_color{color:#0000FF}
#Layer1 {
	position:absolute;
	width:154px;
	height:115px;
	z-index:1;
	left: 829px;
	top: 19px;
}
#Layer2 {
	position:absolute;
	width:165px;
	height:115px;
	z-index:2;
	left: 11px;
	top: 101px;
}
-->
 </style>
</head>
<body style="background-image: url(images/topmenu.png);	background-repeat: repeat;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="17%" height="89" background="images/topmenu-right.png"  style="background-repeat:no-repeat;"><div align="right"><img src="images/epay.png" alt="e-transfer" width="75%" height="75%" /></div></td>
    <td width="1%" background="images/topmenu-middle.png" style="background-repeat:repeat-x;">&nbsp;</td>
    <td width="66%" background="images/topmenu-middle.png" style="background-repeat:repeat-x;"><div align="center"><img src="images/admin.png" alt="Super Admin" width="285" height="55" /><span class="style2">
    <br />
    <?php if($loggedin==0){ } else{ echo '<div style="background:url(images/noisestrip.png); width:90px;"><a href="?admin=logout">Log Out</a></div>';  }?>
    </span></div></td>
    <td width="16%" background="images/topmenu-left.png"  style="background-repeat:repeat-x;"><?php echo $errmsg;
	if($loggedin!==0)
	{
	 $addall=NULL;
	 $tbl_name='balance';
	 $sql="SELECT * FROM $tbl_name";
	 $result=mysql_query($sql);
	 $count=mysql_num_rows($result);
	 if($count>=1)
	 {
	  while($rows=mysql_fetch_array($result))
	  {
	   $addall=$addall+$rows['ab'];
	  }
	 }	
	 echo '<div class=\"kiran\" align=\"left\"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="nostrip">
            <tr>
              <td width="39%" class="green">Balance</td>
              <td width="12%"  class="blue_color"><div align="right"> NRS </div></td>
              <td width="49%"  class="red"><div align="right">'.$addall.'</div></td>
            </tr>
            <tr>
              <td  class="green"><span>Members  </span></td>
              <td><div align="right"></div></td>
              <td  class="red"><div align="right">'.$count.'</div></td>
            </tr>
          </table></div>';
	}	
?></td>
  </tr>
  <tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td>
    <td><div align="center">
<?php $add_data=false;
if($loggedin==1)
{
	if($_GET)
	{
	if(@$_GET['admin']=='addmer')
	{
    $verify='NULL';
    $data_kiran='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
    require('dbconn.php');
    $tbl_name='secure_merchant';
    $sql="SELECT * FROM $tbl_name";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
    if($count>=1)
    {
    while($rows=mysql_fetch_array($result))
    {
    $id=$rows['id'];
    $name=$rows['name'];
    $company=$rows['company'];
    $s_c=$rows['s_c'];
    $url=$rows['uri'];
    $price=$rows['price'];
    $ifyes=$rows['ifyes'];
    $ifno=$rows['ifno'];
    $add_data.='<tr bgcolor="#BDBDBD"><td><span class="style3">Product id</span></td><td>'.$id.'</td></tr>
             <tr bgcolor="#333333"><td><span class="style3">Product Name </span></td><td>'.$name.'</td></tr>
            <tr bgcolor="#333333"><td><span class="style3">Company</span></td><td>'.$company.'</td></tr>
             <tr bgcolor="#333333"> <td><span class="style3">URL</span></td><td>'.$url.'</td></tr>
            <tr bgcolor="#333333"><td><span class="style3">S_C</span></td><td>'.$s_c.'</td></tr>
            <tr bgcolor="#333333"><td><span class="style3">Price</span></td> <td>'.$price.'</td></tr>
            <tr bgcolor="#333333"><td><span class="style3">if Yes </span></td><td>'.$ifyes.'</td></tr>
			  <tr bgcolor="#333333"><td><span class="style3">if NO </span></td><td>'.$ifno.'</td></tr>
           <tr  bgcolor="#333333"><td>Approve: </td><td><iframe src="super_class/merchant_add_iframe.php?merid='.$id.'" frameborder="0" height="40" scrolling="no"  allowtransparency="yes"></iframe></td></tr>
          <tr><td>&nbsp;</td><td>&nbsp;</td></tr>';
	$verify='NO';
    }
    }
    $add_data.='</table>';
    if ($verify=='NO')
    {
    echo $data_kiran.$add_data;
    }
    else
    {
    include('css.php');
    echo '<div class="attention" align="center" style="height:30px;"><STRONG>No request at all</STRONG></div>';
    }
   }
   elseif(@$_GET['admin']=='listuser')
   {
     require('super_class/getalluserlist.php');
	 $get_user_obj=new getuser();
	 $getuser=$get_user_obj->getlist('GETDATAOFUSER');
	 echo $getuser;
   }
    elseif(@$_GET['admin']=='listtempuser')
   {
     require('super_class/getalltempuserlist.php');
	 $get_tempuser_obj=new gettempuser();
	 $gettempuser=$get_tempuser_obj->gettemplist('GETDATAOFUSER');
	 echo $gettempuser;
   } elseif(@$_GET['admin']=='listpaidinvoices')
   {
     require('super_class/invoiceid.php');
	 $get_invoice_obj=new invoice_get();
	 $getinvoice=$get_invoice_obj-> information('INVOICEMINE');
	 echo $getinvoice;
   } elseif(@$_GET['admin']=='listunpaidinvoices')
   {
     require('super_class/invoiceid_unpaid.php');
	 $get_invoiceun_obj=new invoiceun_get();
	 $getinvoiceun=$get_invoiceun_obj-> information('INVOICEMINE');
	 echo $getinvoiceun;
   }
   elseif ($_GET['admin']=='merchantlist')
   {   
   require("super_class/merchant_info.php");
   $merlist= new merchant();
   echo $merlist->information();
   } elseif ($_GET['admin']=='viewproducts')
   {   
   require("super_class/viewcode.php");
   $viewcode= new  viewcode();
   echo $viewcode->information("ADDCODEONIT");
   }
   else
   {
    echo '<STRONG><h1>Welcome to the administrative panel of</h1><br /><img src="images/epay.png"></STRONG>';
   }
 }
 else
   {
    echo '<STRONG><h1>Welcome to the administrative panel of</h1><br /><img src="images/epay.png"></STRONG>';
   }
}
?>
    </div></td>
  <td><?php  if($loggedin==0){ echo '
	 <table width="100%" border="0" cellspacing="0" cellpadding="0"   background="images/noisestrip.png" >
	 <tr>
	 <td width="22">&nbsp;</td>
     <td width="225"><div align="center"><STRONG>Login</STRONG></div></td>
            </tr>
      <tr>
        <td width="45%"></td>
        <td width="55%"><form id="post" method="post" action="">
          <table width="247" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" >
            <tr>
              <td width="22" nowrap="nowrap" title="Username"><img src="images/username.png" alt="Username" width="16" height="16" /></td>
              <td width="225" nowrap="nowrap"><div align="center">
                  <input name="user" type="text" class="green" id="user" size="30%" />
              </div></td>
            </tr>
            <tr>
              <td  title="Passkey"><img src="images/password.png" alt="Password" width="22" height="22" /></td>
              <td background="imp_img/form_text.gif"><div align="center">
                  <input name="pass" type="password" class="green" size="30%" />
              </div></td>
            </tr>
          </table>
          <input type="submit" name="Submit" value="Log in" class="button_id" />

                  </form>          </td>
      </tr>
    </table>';
	 } ?></td></tr>
      <tr><td height="19"><div id="Layer2">
        <?php
if($loggedin==1)
{
echo '<div style="background:url(images/noisestrip.png);" align="top"><H1 align="center">Welcome!</H1><br /><STRONG>Action List</STRONG><ul><li><A href="index.php?admin=addmer" target="_self">Verify Merchant</A></li><li><A href="index.php?admin=listuser" target="_self">List all User</A></li><li><A href="index.php?admin=listtempuser" target="_self">List unverified User</A></li><li><A href="index.php?admin=listpaidinvoices" target="_self">List Paid Invoices</A></li><li><A href="index.php?admin=listunpaidinvoices" target="_self">List Unpaid Invoices</A></li><li><A href="index.php?admin=merchantlist" target="_self">List all merchants</A></li><li><A href="index.php?admin=viewproducts" target="_self">View products</A></li></ul></div>';
}	
else
{
echo '<img src="images/plz.png.login.png" alt="Plz Log In" width="100%" height="100%" />';
}
	?>
      </div></td>
        <td >&nbsp;</td>
        <td ><div align="center"></div></td>
        <td>&nbsp;</td>
  </tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td background="images/noisestrip.png">&nbsp;</td>
        <td background="images/noisestrip.png">&nbsp;</td>
        <td background="images/noisestrip.png"><div align="center" class="style6">Ads</div></td>
        <td background="images/noisestrip.png">&nbsp;</td>
      </tr>    
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
  <tr>
    <td height="95" background="images/topmenu-middle.png" style="background-repeat:repeat-x"> <span class="style2">e-transfer Nepal </span><span class="button_id"><br />
    </span></td>
    <td background="images/topmenu-middle.png" style="background-repeat:repeat-x">&nbsp;</td>
    <td background="images/topmenu-middle.png" style="background-repeat:repeat-x">&nbsp;</td>
    <td background="images/topmenu-middle.png" style="background-repeat:repeat-x"><img src="images/poweredby.png" alt="Powered by e-transfer" width="122" height="42" /></td>
  </tr>
</table>
</body>
</html>
