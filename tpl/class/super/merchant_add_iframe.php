<?php
require('loggedin.php');
$loggedin_obj=new user();
if($_POST)
{
$userid_post=@$_COOKIE['users'];
$passid_post=@$_COOKIE['passs'];
$loggedin=$loggedin_obj->getusers($userid_post,$passid_post);
if ($loggedin==1) //if logged in
{
$merid_p=@$_POST['merid'];
require('dbconn.php');
$tbl_name='secure_merchant';
$sql="SELECT * FROM $tbl_name WHERE id=$merid_p";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1)
{
$rows=mysql_fetch_array($result);
$id=$rows['id'];
$name=$rows['name'];
$company=$rows['company'];
$s_c=$rows['s_c'];
$url=$rows['uri'];
$price=$rows['price'];
$ifyes=$rows['ifyes'];
$ifno=$rows['ifno'];
}
//kiran pantha
require('merchant_add.php');
$result_added=new super_merchant();
$result_add=$result_added->information($id,$name,$company,$url,$s_c,$price,$ifyes,$ifno);
if($result)
{
require('merchant_del.php');
$del_result=new del_merchant();
$kiran_del_data=$del_result->information($id);
echo "APPROVED";
die();
}
}
}
if ($_GET)
{
$userid_post=@$_COOKIE['users'];
$passid_post=@$_COOKIE['passs'];
$loggedin_obj=new user();
$loggedin=$loggedin_obj->getusers($userid_post,$passid_post);
if ($loggedin==1) //if logged in
{
$merid=@$_GET['merid'];
if(!empty($merid))
{
require('dbconn.php');
$tbl_name='secure_merchant';
$sql="SELECT * FROM $tbl_name WHERE id=$merid";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1)
{
echo '<form method="post" action=""><input type="hidden" value="'.$merid.'" name="merid"><input type="submit" name="me-a" value="Approve" style="background-color:#666666; color:#FFFFFF; border:#00FF66;" /></form>'; 
}       //end it
}
}
}
?>