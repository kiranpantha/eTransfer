<?php 
$loggedin_data='false';
$loggedin=false;
require('words.php');
$myusername=@$_COOKIE['email']; 
$mypassword1=@$_COOKIE['pass1'];
$mypassword2=@$_COOKIE['pass2']; 			//end check
if (empty($myusername) || empty($mypassword1) || empty($mypassword2))
{
header('Location: err.php?err=reqlogin');
die();
}
else
{
//check
require('tpl/class/verifylogin.php');
$login_obj=new verify();
$loggedin=$login_obj->verified($myusername,$mypassword1,$mypassword2);
if ($loggedin!=='NULL')
{
$loggedin_data='true';
}
}
if ($loggedin_data=='false')
{
header("Location: err.php?err=fake");
die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $sitetitle; ?></title>
<base href="<?php $home ?>"  />
<?php  include("userfiles/favicon.php");  ?>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style2 {font-size: 18px}
-->
</style>
<link rel="stylesheet" href="userfiles/trybth.php" />
<style type="text/css">
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
background-color:#666666;
border:#CCCCCC;
border:thin;
border-width:2px;
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
.style8 {font-size: 14px}
.lang {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<script src="tpl/ajax_balance.php" type="text/javascript"></script>
</head>
<body onload="getServerTime()" onmousemove="getServerTime()">
<div id="wrapper">
	<div id="logo">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="77%"><?php echo $sitename; ?></td>
          <td width="23%">A gateway for Nepali transactions</td>
        </tr>
        <tr>
          <td><pre class="style2"><?php echo $sitewelcome;?></pre></td>
          <td><div style="text-align:center;"><span class="lang">Language:</span>
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
          </div>
          <div align="center"></div></td>
        </tr>
      </table>
   
    
  </div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
	<?php echo $sitemenu; ?></div>
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
			  <table width="101%" border="0" cellpadding="0" cellspacing="0" class="textboxs">
                <tr>
                  <td width="37%"><div align="left"><img src="store/Dashboard.png" alt="DB" width="37" height="37" /></div></td>
                  <td width="19%"><div align="center" class="style4"><img src="store/dboard.png" alt="DashBoard" width="260" height="27" /></div></td>
                  <td width="44%">&nbsp;</td>
                </tr>
              </table>
			  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="textboxs">
                <tr>
                  <td width="33%"><table width="100%" height="305" border="0" cellpadding="0" cellspacing="0" background="imp_img/admin-dashboard2.png" class="textboxs">
                    <tr>
                      <td height="58"><p class="style2"><?php echo $balanceinformation; ?></p>
					   <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" >
                          <tr>
                            <td width="31%" background="imp_img/admin-dashboard.jpg"><div align="center"><span class="style8"><?php echo $balance_total; ?></span></div></td>
                            <td width="69%" background="imp_img/admin-dashboard.jpg"><div align="left"><span class="Msg">        <div id="tb" name="tb"></div></span>
                            </div></td>
                          </tr>
                          <tr>
                            <td background="imp_img/admin-dashboard.jpg"><div align="center"><span class="style8"><?php echo $balance_added; ?></span><br />
                            </div></td>
                            <td background="imp_img/admin-dashboard.jpg"><div align="left">
                              <div align="left"><span class="Msg">
                                <div id="ab" name="ab"></div></span>                              </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td background="imp_img/admin-dashboard.jpg"><div align="center"><img src="images/chimp.png" /></div>
                              <div align="center"><?php echo $balance_reward; ?></div></td>
                            <td background="imp_img/admin-dashboard.jpg"><div align="left">
                              <div align="left"><span class="Msg"><div id="rb" name="rb"></div></span>                              </div>
                            </div></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="58"> <div align="center" class="style5">  
                        <div align="left"><?php echo $paymentservices; ?></div>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="46"><div align="right" class="style5">
                        <div align="left" class="style2">
                          <ul class="main">
                            <li class="style6"><a href="main.php?info=rch"><?php echo $recharge; ?></a> </li>
                            <li class="style6"><a href="main.php?info=internet"><?php echo $payinternet; ?> </a></li>
                            <li class="style6"><a href="main.php?info=other"><?php echo $othermerchant; ?></a> </li>
                            <li class="style6"><a href="main.php?info=utlity"><?php echo $utilitypayment; ?></a> </li>
                          </ul>
                        </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="50" class="style5"><?php echo $customermenu; ?></td>
                    </tr>
                    <tr>
                      <td height="45">
					  <ul class="main">
                        <li  class="style6"><a href="main.php?info=info"><?php echo $accountdashboard; ?></a><br />
                        </li>
                        <li  class="style6"><a href="main.php?info=statement"><?php echo $statement; ?></a></li>
                      </ul></td>
                    </tr>
                    <tr>
                      <td height="48" class="out">&nbsp;</td>
                    </tr>
                  </table>             </td>
                  <td width="67%"><iframe src="<?php echo "tpl/menu.php?info=".$_GET['info']."&accessid=".md5($_GET['info']);  ?>" scrolling="auto" frameborder="0" style="width:100%; height:600px;" ></iframe></td>
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
            <img src="<?php echo $image1; ?>" alt="Welcome !" width="173" height="195" />
          </h2>
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
