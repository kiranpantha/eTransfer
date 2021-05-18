<?php
$phone=$_GET['p'];
if(!preg_match("/^9+([7-8_-][0-9_-][0-9_-][0-9_-][0-9_-][0-9_-][0-9_-][0-9_-][0-9_-])/",$phone,$matches))
{
echo "<li>Phone Number doesnot seem to be valid</li>";
}
?>