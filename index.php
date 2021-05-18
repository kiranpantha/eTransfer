<?php 
$lang_set=NULL;
$lang_set=@$_COOKIE['lang'];
if($lang_set==NULL)
{
 header('Location: lang.php?set=NP&redir='.base64_encode($_SERVER['REQUEST_URI']));
}
$email_my=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
require("tpl/class/verifylogin.php");
$gotoo=new verify();
$mydata=$gotoo->verified($email_my,$pass1,$pass2);
if ($mydata!=="NULL")
{
header('Location: main.php?info=name');
die();
}
require('words.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK rel="stylesheet" href="store/mainstyler.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT type="text/javascript" src="store/jquery.js"></SCRIPT>
<SCRIPT type="text/javascript" src="store/jquery-ui-custom.min.js"></SCRIPT>
<SCRIPT src="store/jquery.thumbnailScroller.js" /> </SCRIPT>
<SCRIPT type="text/javascript" src="tpl/ajax_login_refer.php"/></SCRIPT>
<title><?php echo $sitetitle; ?></title>
<?php require($url.'userfiles/favicon.php'); ?>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<LINK rel="stylesheet" href="userfiles/trybth.php" />
<LINK rel="stylesheet" href="css/login_bth.css" type="text/css">
<style type="text/css">
<!--
.style2 {font-size: 18px}
.Msg {
	color: #FF0000;
	font-size: 16px;
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
.lang {	color: #FFFFFF;
	font-weight: bold;
}
body {
	background-image: url(images/back_img.png);
}
.style4 {color: #FF0000; font-size: x-large; }
-->
</style>
</head>
<body>
<?php require('tpl/noscript.php'); ?>
<div id="wrapper">
	<div id="logo">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="80%"> <font face="Georgia, Times New Roman, Times, serif"> 
     <?php echo $sitename;?>
     
    </font></td>
          <td width="20%">&nbsp;</td>
        </tr>
        <tr>
          <td><pre class="style2"><?php echo $sitewelcome;?></pre></td>
          <td><div align="center"><span class="lang">Language:</span><?php require('tpl/lang_frame.tpl'); ?></div></td>
        </tr>
      </table>
   
    
  </div>
	<hr />
	<!-- end #logo -->
	<div id="header">
	  <div id="menu">
	<?php echo $sitemenu; ?>
    <br />
	  </div>
		<!-- end #menu -->
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
	<div id="page-bgtop">
		<div id="content">
		  <div class="post">
			  <h2 class="title"><?php echo $sitewelcome;?></h2>
			<div class="entry">
            <p> <span class="Msg">Each transaction is viewed and order is placed by human so it is 100% secure </span></p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
			 	 <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.adobe.com/swf/flashcodes" width="100%" height="82">
	<param name="movie" value="images/animation/animated_banner.swf">
	<param name="quality" value="high">
	<param name="bgcolor" value="#5A5957">
	<embed src="images/animation/animated_banner.swf" width="100%" height="82" quality="high" bgcolor="#5A5957" type="application/x-shockwave-flash" pluginspage="https://www.adobe.com/go/flash-player-updates">
</object>				</td>
			  </tr>
			</table>
	        <div align="center" class="post">
	          <div>
	              <div></div>
                  <div></div>
              </div>
	        </div>
			
			<h1 align="center"><span class="epayForm style2"><img src="images/special/card_small.png" alt="Visa&trade;" width="46" height="35" />Use your Visa&trade; card to top up Balance </strong></span></h1>
			</div>
			<hr /></div>
		  <div class="post">
			  <h2 class="title"><a></a>The most secure Gateway that a Nepali can trust </h2>
		  </div>
			<div class="post"><div class="entry">
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="81%">We accept bank transfer and after confirmation of your recharge request we will recharge your Account and we will withdraw within 24 hours to your bank account on the case of withdrawl request.<br />
                    You can also get a recharge coupon from any Merchants of our Pay site. <br /></td>
                  <td width="19%"><img src="<?php echo $urlveri; ?>" alt="Verified and 100% secure" width="126" height="62" /></td>
                </tr>
              </table>
			</div>
			</div>
</div>
		<!-- end #content -->
		<div id="sidebar">         
            <!-- end #sidebar -->
            <img src="<?php echo $image1; ?>" alt="Welcome !" width="173" height="195" />
<div style="width:100%">
		  <?php
		require("tpl/login_plug.php");
?></div>
	  </div>
	<div style="clear: both;"><?php echo $social; ?>
</div>
	</div>
	</div>
	<!-- end #page -->
	<div id="footer-bgcontent">
	<div id="footer">
		
      <p><?php echo $sitebase; ?> </a></p>
	</div>
	</div>
	<!-- end #footer -->
</div>
</body>
</html>
