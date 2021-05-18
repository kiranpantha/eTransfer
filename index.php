<?php require('words.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK rel="stylesheet" href="store/mainstyler.css" type="text/css">
<SCRIPT type="text/javascript" src="store/jquery.js"></SCRIPT>
<SCRIPT type="text/javascript" src="store/jquery-ui-custom.min.js"></SCRIPT>
<SCRIPT src="store/jquery.thumbnailScroller.js" /> </SCRIPT>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $sitetitle; ?></title>
<?php require($url.'userfiles/favicon.php'); ?>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<LINK rel="stylesheet" href="userfiles/trybth.php" />
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
-->
</style>
</head>
<body>
<div id="wrapper">
	<div id="logo">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="80%"> <font face="Georgia, Times New Roman, Times, serif"> 
     <?php echo $sitename;?>
     
    </font></td>
          <td width="20%"><img src="images/e.gif" alt="A gateway for Nepali transactions" title="A gateway for Nepali transactions"width="184" height="54" /></td>
        </tr>
        <tr>
          <td><pre class="style2"><?php echo $sitewelcome;?></pre></td>
          <td><div align="center"><span class="lang">Language:</span>
            <table width="43%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="21%" height="39"   style="background-color:#CCCCCC;"><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><img src="images/nplogo_small.png" alt="Nepali" width="37" height="39" /></a></td>
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
          </div></td>
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
					
            <p> <span class="Msg">Each transaction is viewed and order is placed by human so it is 100% secure </span></p><br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>	
				</td>
			  </tr>
			</table>
	  </div>
				<br />
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
			
        <ul>
          <h2>
            <!-- end #sidebar -->
            <img src="<?php echo $image1; ?>" alt="Welcome !" width="173" height="195" /></h2>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		  <?php
		require("tpl/login_plug.php");
?>
          </ul>
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
