<?php require('words.php'); ?>
<?php 
include("userfiles/favicon.php"); 
if($_GET)
{
if ($_GET['err']=='reqlogin')
{
$msg="<center>Forbidden access<br /> You must to log in first&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>";
}
if ($_GET['err']=='0X2425')
{
$msg="<center>Already Logged In<br />No access at this time</center>";
}
if ($_GET['err']=='0X0403')
{
$msg="<center>No Access Granted<br />No access at this time</center>";
}


if ($_GET['err']=='mererror')
{
$msg="<center>Forbidden access<br />The payment merchant doesnot exist's</center>";
}
if ($_GET['err']=='fake')
{
$msg='<center><h1>You might have been deleted by Website admin for fake information</h1><br /><STRONG>Forbidden access</STRONG><br />Why are you playing with the cookies? <br />You are not permitted to edit cookies<br />You might have changed the Password so Please Relogin Using New Password<br/>If it is not done by You then<a class="modal-button" title="Log in" href="forgot.php" rel="{handler: \'iframe\', size: {x: 680, y: 560}, overlayOpacity: 0.7}">Click Here</a></center>';
   setcookie('email', '');
   setcookie('pass1', '');
   setcookie('pass2', '');
}
if ($_GET['err']==404)
{
$msg="404 Document file || File not found&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
if ($_GET['err']==500)
{
$msg="404 Document file || File not found&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
if ($_GET['err']==403)
{
$msg="404 Document file || File not found&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
}
else
{
$msg="Unknown Error<br />0X0000ASQ";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE><?php echo $sitetitle; ?></TITLE>
<BASE href="<?php $home ?>">
<LINK href="style.css" rel="stylesheet" type="text/css" media="screen">
<STYLE type="text/css">
<!--
.style2 {font-size: 18px}
-->
</STYLE>
<LINK rel="stylesheet" href="userfiles/trybth.php">
<STYLE type="text/css">
<!--
.Msg {
	color: #FF0000;
	font-size: 16px;
}
.main
{
background-image:url(imp_img/admin-dashboard.jpg);
}
.textboxs
{
	display:block;
	color:#FFFFFF;
	background-color:#333333;
	font-weight:bold;
	font-size:11px;
	width:100%;
	text-align:center;
	padding:0;
	padding-top:3px;
	padding-bottom:4px;
	border:1px solid #ffffff;
	text-decoration:none;
	margin-left:1px;
	border-color:#FFFFFF;
}

.tryit
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
width:120px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}
.style4 {
	font-size: 36px;
	font-weight: bold;
}
.style5 {font-size: 24px}
.style6 {font-size: 12px;}
.out {font-size: 36px; font-weight: bold; color: #FF0000; }
div.warning {
    margin:             0.5em 0 0.5em 0;
    border:             0.1em solid #CC0000;
    width:              90%;
    background-image:   url(../imp_img/err.png);
    background-repeat:  no-repeat;
    background-position: 10px 50%;
    padding:            10px 10px 10px 36px;
	text-align:center;
            }
			div.att {
    margin:             0.5em 0 0.5em 0;
    border:             0.1em solid #00FF00;
    width:              90%;
    background-image:   url(../imp_img/ok.png);
    background-repeat:  no-repeat;
    background-position: 10px 50%;
    padding:            10px 10px 10px 36px;
		text-align:center;
            }
div.atten {
    margin:0.5em 0 0.5em 0;
    border:0.1em solid #00FF00;
    width:90%;
    background-image:url(../imp_img/ok.png);
    background-repeat:no-repeat;
    background-position:10px 50%;
    padding:10px 10px 10px 36px;
		text-align:center;

}
.lang {	color: #FFFFFF;
	font-weight: bold;
}
-->
</STYLE>
</HEAD>
<BODY>
<DIV id="wrapper">
	<DIV id="logo">
	  <TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
        <TR>
          <TD width="80%"><?php echo $sitename; ?></TD>
          <TD width="20%">A gateway for Nepali transactions</TD>
        </TR>
        <TR>
          <TD><PRE class="style2"><?php echo $sitewelcome;?></PRE></TD>
          <TD><DIV align="center"><span class="lang">Language:</span>
              <table width="43%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="21%" height="39"   style="background-color:#CCCCCC;"><a href="lang.php?set=NP&redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><img src="images/nplogo_small.png" alt="Nepali" width="37" height="39" /></a></td>
                  <td width="10%"   style="background-color:#CCCCCC;"><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>">
                    <?php if($lang_check=='np') { ?>
                    <img src="imp_img/check.gif" alt="√" width="15" height="15" />
                    <?php } ?>
                  </a></td>
                  <td width="21%">&nbsp;</td>
                  <td width="21%"   style="background-color:#CCCCCC;"><a href="lang.php?set=EN&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><img src="images/uslogo_small.png" alt="Nepali" width="38" height="38" /></a></td>
                  <td width="48%"   style="background-color:#CCCCCC;"><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>">
                    <?php if($lang_check=='en') { ?>
                    </a><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><img src="imp_img/check.gif" alt="√" width="15" height="15" />
                    <?php } ?>
                  </a></td>
                </tr>
              </table>
          </DIV></TD>
        </TR>
      </TABLE>
   
    
  </DIV>
	<HR>
	<!-- end #logo -->
	<DIV id="header">
		<DIV id="menu">
	<?php echo $sitemenu; ?>
    </DIV>
		<!-- end #menu -->
	</DIV>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<DIV id="page">
	<DIV id="page-bgtop">
		<DIV id="content">
		  <DIV class="post">
				
			  <H2 class="title"><?php echo $sitewelcome;?></H2>
	
			<DIV class="entry">
			<DIV class="warning">
			  <?php echo $msg; ?>
            </DIV>
			</DIV>
			<BR>
			<HR></DIV>
		  <DIV class="post">
			  <H2 class="title"><A></A>The most secure Gateway that a Nepali can trust </H2>
		  </DIV>
			<DIV class="post"><DIV class="entry">
			  <TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
                      <TR>
                        <TD width="81%">We accept bank transfer and after confirmation of your recharge request we will recharge your Account and we will withdraw within 24 hours to your bank account on the case of withdrawl request.<BR>
You can also get a recharge coupon from any Merchants of our Pay site. <BR></TD>
                        <TD width="19%"><IMG src="<?php echo $urlveri; ?>" alt="Verified and 100% secure" width="126" height="62"></TD>
                      </TR>
              </TABLE>
			  </DIV>
			</DIV>
		</DIV>
		<!-- end #content -->
		<DIV id="sidebar">
			
        <UL>
          <H2>
            <!-- end #sidebar -->
            <IMG src="<?php echo $image1; ?>" alt="Welcome !" width="173" height="195">
          </H2>
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
		  <?php
		require("tpl/login_plug.php");
?>
          </UL>
	  </DIV>
		
      <DIV style="clear: both;"><?php echo $social; ?></DIV>
      </DIV>
	</DIV>
</DIV>
	<!-- end #page -->
	<DIV id="footer-bgcontent">
	<DIV id="footer">
		
      <P><?php echo $sitebase; ?> </a></P>
	</DIV>
	</DIV>
	<!-- end #footer -->
</div>
</BODY>
</HTML>
