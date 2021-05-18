<?php 
$mobi='false';
$a=$_SERVER['HTTP_USER_AGENT'];
if (strstr($a,"MIDP")){ $mobi='true'; }
if (strstr($a,"J2ME") ){ $mobi='true'; }
if(strstr($a,"MOBILE")){ $mobi='true'; }
if (strstr($a,"CLDC")){ $mobi='true'; } 
if($_GET['mobi']=='true'){ $mobi='true';} 
if (strstr(strtolower($a),"android")){ $mobi='true'; } 
if (strstr(strtolower($a),"series 60")) { $mobi='true'; } 
if (strstr(strtolower($a),"blackberry")) { $mobi='true'; }
if (strstr(strtolower($a),"iphone")){ $mobi='true'; }
if($mobi=='true')
{
header('Location: /m');
}
else
{
echo '
<script type="text/javascript">
<!--
var $kiran=mouse();
function mouse()
{
if(screen.width<300)
{
document.location=\'/m\';
}
}
-->
</script>';
}
?>