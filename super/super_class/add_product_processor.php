<?php
if($_GET)
{
header('Content-Type: text/xml');
require('loggedin.php');
$loggedin_obj= new user();
$userid_post=@$_COOKIE['users'];
$passid_post=@$_COOKIE['passs'];
$loggedin=$loggedin_obj->getusers($userid_post,$passid_post);
if ($loggedin!=='NULL')
{
$proid=$_GET['proid'];
$product=$_GET['product'];
 if(!empty($proid) && !empty($product))
 {
 require('dbconn.php');
 $sql = "INSERT INTO `$db_name`.`product_code` (`id`, `code`) VALUES ('$proid', '$product');"; 
 $result=mysql_query($sql);
 if($result)
 {
 echo "<?xml version=\"1.0\" ?><added><isok>YES</isok></added>";
 die();
 }
 else
 {
 echo "<?xml version=\"1.0\" ?><added><isok>NO</isok></added>";
 die();
 }
 }
}
else
{
echo "<?xml version=\"1.0\" ?><added><isok>ERRLOGIN</isok></added>";
 die();
}
}
?>