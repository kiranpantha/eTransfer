<?php
$host='localhost'; // Host name 
$username='root'; // Mysql username 
$password='';// Mysql password 
if(!@mysql_connect("$host", "$username", "$password"))
{
die("cannot connect");
}
$db_name="e-commerce"; // Database name  
if(!@mysql_select_db("$db_name")){die("cannot select DB");}
?>