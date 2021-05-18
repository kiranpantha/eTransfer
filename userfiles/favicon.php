<?php
if(@$_COOKIE['lang']=='')
{
setcookie('lang','np');
}
echo '
<base href="http://localhost/e/"  />
<link rel="icon" href="userfiles/favicon.png" type="image/png" />
<link lang="np"  />
<link rel="copyright" label="kiransoft nepal" />';
$filename=$_SERVER['SCRIPT_NAME'];
require("tpl/photo.tpl");
?>