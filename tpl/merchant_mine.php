<?php 
$title=NULL;
$email_my=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
require("class/verifylogin.php");
$gotoo=new verify();
$mydata=$gotoo->verified($email_my,$pass1,$pass2);
if ($mydata!=="NULL")
{
$idname=$mydata;
}
else
{
echo "ERROR";
//header("Location: ../err.php?errid=reqlogin");
die();
}
//end check
?>
<HTML>
<HEAD>
<LINK rel="stylesheet" href="../userfiles/cssforreg.css"/>
<STYLE>
<!--
@import url("../userfiles/trybth.php");
BODY {
	SCROLLBAR-FACE-COLOR: #808080;
	SCROLLBAR-HIGHLIGHT-COLOR: #000000;
	SCROLLBAR-SHADOW-COLOR: #999999;
	SCROLLBAR-3DLIGHT-COLOR: #ffffff;
	SCROLLBAR-ARROW-COLOR:  #C0C0C0;
	SCROLLBAR-TRACK-COLOR: #969696;
	SCROLLBAR-DARKSHADOW-COLOR: #666666;
	background-color: #333333;
}
.topic {
	font-size: 18px;
	color: #99FF33;
	font-weight: bold;
	text-align:center;
}
.comp {
	color: #0000FF;
	font-weight: bold;
}
.price {
	color: #FF0000;
	font-weight: bold;
}
.frm {color: #FFFFFF;}
.style17 {color: #FFFFFF; font-size: 18px; font-weight: bold; }

-->

</STYLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD>
<BODY>



<?php
if ($idname!=='NULL')
{
  
}
?>
<BR>

</BODY>
</HTML>
