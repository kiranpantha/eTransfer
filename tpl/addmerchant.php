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
  if(!$_POST)
  {
  echo ' <DIV align="center" class="frm" >Please get this form filled to process the data as a new merchant
  <FORM action="mer_add.php" method="post" enctype="multipart/form-data" name="addmer" target="_self" id="addmer">
  <TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
    <TR>
      <TD width="63%"  background="../images/back.png"><SPAN class="style17">Product Name </SPAN></TD>
      <TD width="37%"  background="../images/back.png">
        <INPUT name="mer_name" type="text" class="tryit_tbl">
    </TD>
    </TR>
    <TR>
      <TD height="35"  background="../images/back.png"><SPAN class="style17">Company Name </SPAN></TD>
      <TD  background="../images/back.png"><INPUT name="mer_company" type="text" class="tryit_tbl"></TD>
    </TR>
    <TR>
      <TD height="31"  background="../images/back.png"><SPAN class="style17">Your company Website </SPAN></TD>
      <TD  background="../images/back.png"><INPUT name="mer_uri" type="text" class="tryit_tbl"></TD>
    </TR>
    <TR>
      <TD height="31"  background="../images/back.png"><SPAN class="style17">The page for further process </SPAN></TD>
      <TD  background="../images/back.png"><INPUT name="mer_ifyes" type="text" class="tryit_tbl"></TD>
    </TR>
    <TR>
      <TD height="29"  background="../images/back.png"><SPAN class="style17">The page if user clicks Cancel Payment </SPAN></TD>
      <TD  background="../images/back.png"><INPUT name="mer_ifno" type="text" class="tryit_tbl"></TD>
    </TR>
    <TR>
      <TD height="33"  background="../images/back.png"><SPAN class="style17">The price of the product </SPAN></TD>
      <TD  background="../images/back.png"><INPUT name="mer_price" type="text" class="tryit_tbl"></TD>
    </TR>
    <TR>
      <TD  background="../images/body.png"><SPAN class="style17">Want to submit Data to the system administrator to complete the further process </SPAN></TD>
      <TD background="../images/body.png">
        
          <DIV align="right">
            <INPUT name="process" type="submit" class="tryit_login" id="process" value="Send for further process">
        </DIV></TD>
    </TR>
  </TABLE>
</FORM>
</DIV>';
  }
  elseif($_POST)
  {
   
  }
}
?>
<BR>

</BODY>
</HTML>
