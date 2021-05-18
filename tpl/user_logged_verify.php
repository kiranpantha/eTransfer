<?php
  header('Content-Type: text/xml');
  $verified='NULL';
  require('class/___.php');
  $verified_obj=new _();
  $verified=$verified_obj->__();
    if ($verified!=='NULL')
	{
	  $add_data= "<?xml version=\"1.0\" ?><email><isvalid>YES</isvalid></email>";
	}
	else
	{
	  $add_data= "<?xml version=\"1.0\" ?><email><isvalid>NO</isvalid></email>";
	}
   echo $add_data;
?>