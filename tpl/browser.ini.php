<?php
     $b= $_SERVER['HTTP_USER_AGENT'];
	 if (strstr($b,"Opera"))
	 {
	 $browserinfo= "Opera";
	 } 
	 elseif (strstr($b,"Mozilla"))
	 {
	 $browserinfo= "Mozilla Firefox";
	 }
	  elseif (strstr($b,"safari"))
	 {
	 $browserinfo= "Safari browser";
	 }
	  elseif (strstr($b,"UC"))
	 {
	 $browserinfo= "UC browser";
	 }
	 elseif (strstr($b,"NetFront"))
	 {
	 $browserinfo= "NetFront browser";
	 }
	 else
	 {
	 $browserinfo= $b;
	 }
?>