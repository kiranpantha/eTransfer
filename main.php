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
if($_GET)
{
$info_got_data_chcek=$info_header=@$_GET['info'];
if ($info_got_data_chcek==NULL){ require('tpl/css.php'); echo '<div class="warning" align="center">ERROR<br /><img src="images/epay.png"></div>'; die(); }
}
else
{
header("Location: err.php");
die();
}
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sitetitle; ?></title>
<?php  include("userfiles/favicon.php");  ?>
<link href="style.css" rel="stylesheet" type="text/css"/>
<LINK rel="stylesheet" href="userfiles/trybth.php" />
<LINK rel="stylesheet" href="css/login_bth.css">
<LINK rel="stylesheet" href="store/mainstyler.css">
<style type="text/css">
<!--
.style_etransfer {font-size: 18px}
.notification{
width: auto; 
cursor: pointer; 
display: inline-block; 
margin: 0; 
outline: none; 
position: relative; 
text-align: center; 
text-decoration: none;
font-size:25px;
left:0;
background:#FF3333;
-webkit-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-moz-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
border:1px solid #2d2d2d
}
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
.ul_s_et_4 {
	font-size: 36px;
	font-weight: bold;
}
.ul_s_et_5 {font-size: 24px}
.ul_s_et_6 {
	font-size: 12px;
}
.out {font-size: 36px; font-weight: bold; color: #FF0000; }
.style8 {font-size: 14px}
.lang {
	color: #FFFFFF;
	font-weight: bold;
}
.num_noti {color: #FF0000; font-size: 16px; font-weight: bold; background-image: url(images/noisestrip.png); }
#notification_obj {
	position:absolute;
	z-index:1;
	width: 638px;
	height: 243px;
	left: -636px;
	top: 11px;
	visibility: hidden;
}
#close {
	position:absolute;
	width:24px;
	height:16px;
	z-index:1;
	left: 675px;
	top: -75px;
	visibility: hidden;
}
.my_moti_table_etransfer
{
background-image:url(images/talkwithu.png);
background-repeat:no-repeat;
}
#load_ing {
	position:absolute;
	width:682px;
	height:569px;
	z-index:1;
	left: 204px;
	top: 170px;
	background-color: #999999;
}
.plz {
	font-size: 36px;
	color: #FF0000;
}
.back_loading
{
background-color:#999999;
}
.notification1 {width: auto; 
cursor: pointer; 
display: inline-block; 
margin: 0; 
outline: none; 
position: relative; 
text-align: center; 
text-decoration: none;
font-size:25px;
left:0;
background:#FF3333;
-webkit-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-moz-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
border:1px solid #2d2d2d
}
.notification2 {width: auto; 
cursor: pointer; 
display: inline-block; 
margin: 0; 
outline: none; 
position: relative; 
text-align: center; 
text-decoration: none;
font-size:25px;
left:0;
background:#FF3333;
-webkit-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-moz-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
border:1px solid #2d2d2d
}
.notification11 {width: auto; 
cursor: pointer; 
display: inline-block; 
margin: 0; 
outline: none; 
position: relative; 
text-align: center; 
text-decoration: none;
font-size:25px;
left:0;
background:#FF3333;
-webkit-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-moz-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
border:1px solid #2d2d2d
}
body,td,th {
	color: #FFFFFF;
}
body {
	background-color: #000000;
	background-image: url(images/back_img.png);
}
-->
</style>
<script src="tpl/ajax_balance.php" type="text/javascript"></script>
<script src="js/main_js_info.js" type="text/javascript"></script>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head> 
<body>
<?php require('tpl/noscript.php'); ?>
<!--notify-->
<div id='soundbuffer'></div>
<!--end notify-->
<div id="load_ing" onMouseOver="MM_displayStatusMsg('Loading Please Wait');return document.MM_returnValue">
  <div align="center">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center"><img src="images/epay.png" alt="Logo" width="400" height="80" /></div></td>
      </tr>
      <tr class="back_loading">
        <td></td>
      </tr>
      <tr>
        <td><div align="center"><img src="images/loading.gif" alt="...." width="392" height="339" /></div></td>
      </tr>
      <tr>
        <td><div align="center"><span class="plz"><?php echo $loading_lang; ?></span></div></td>
      </tr>
    </table>
    <br />
  </div>
</div>
<div id="wrapper">
	<div id="logo">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td width="77%"><?php echo $sitename; ?></td>
          <td width="23%"><div class="num_noti" id="lastloggedin">&nbsp;</div>
   </td>
        </tr>
        <tr>
          <td><pre class="style_etransfer"><?php echo $sitewelcome;?></pre></td>
          <td><div style="text-align:center;"><span class="lang">Language:</span>
              <?php require('tpl/lang_frame.tpl'); ?>
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
			  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="textboxs">
                <tr>
                  <td width="37%"><div align="left"><img src="images/images/Dashboard.png" alt="DB" width="37" height="37" /></div></td>
                  <td width="19%"><div align="center" class="ul_s_et_4"><img src="images/images/dboard.png" alt="DashBoard" width="260" height="27" /></div></td>
                  <td width="44%">&nbsp;</td>
                </tr>
              </table>
			  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="textboxs">
                <tr>
                  <td><table width="100%" height="700px" border="0" cellpadding="0" cellspacing="0" background="imp_img/admin-dashboard2.png" class="textboxs">
                    <tr>
                      <td height="58"><p class="style_etransfer"><?php echo $balanceinformation; ?></p>
					   <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" >
                          <tr>
                            <td width="31%" background="imp_img/admin-dashboard.jpg"><div align="center"><span class="style8"><?php echo $balance_total; ?></span></div></td>
                            <td width="69%" background="imp_img/admin-dashboard.jpg"><div align="left"><span class="Msg">        <div id="tb" name="tb"><img src="images/loading.gif" alt="O" width="26" height="25" /></div>
                            </span>
                            </div></td>
                          </tr>
                          <tr>
                            <td background="imp_img/admin-dashboard.jpg"><div align="center"><span class="style8"><?php echo $balance_added; ?></span><br />
                            </div></td>
                            <td background="imp_img/admin-dashboard.jpg"><div align="left">
                              <div align="left"><span class="Msg">
                                <div id="ab"><img src="images/loading.gif" alt="O" width="26" height="25" /></div>
                              </span>                              </div>
                            </div></td>
                          </tr>
                          <tr>
                            <td background="imp_img/admin-dashboard.jpg"><div align="center"><img src="images/chimp.png" /></div>
                              <div align="center"><?php echo $balance_reward; ?></div></td>
                            <td background="imp_img/admin-dashboard.jpg"><div align="left">
                              <div align="left"><span class="Msg"><div id="rb"><img src="images/loading.gif" alt="O" width="26" height="25" /></div>
                              </span>                              </div>
                            </div></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="58"> <div align="center" class="ul_s_et_5">  
                        <div align="left"><?php echo $paymentservices; ?></div>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="46"><div align="right" class="ul_s_et_5">
                        <div align="left" class="style_etransfer">
                          <ul class="main" id="mymenu_e_t">
                            <li class="ul_s_et_6" onClick="javascript:document.getElementById("mymenu_e_t").type="square";"><a href="<?php echo "tpl/menu.php?info=rch&accessid=".md5('rch');  ?>"  target="mymenu"><?php echo $recharge; ?></a> </li>
                            <li class="ul_s_et_6"><a href="<?php echo "tpl/menu.php?info=internet&accessid=".md5('internet');  ?>" target="mymenu"><?php echo $payinternet; ?> </a></li>
                            <li class="ul_s_et_6"><a href="<?php echo "tpl/menu.php?info=other&accessid=".md5('other');  ?>" target="mymenu"><?php echo $othermerchant; ?></a> </li>
                            <li class="ul_s_et_6"><a href="<?php echo "tpl/menu.php?info=utility&accessid=".md5('utility');  ?>" target="mymenu"><?php echo $utilitypayment; ?></a></li>
                          </ul>
                        </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td height="50" class="ul_s_et_5"><?php echo $customermenu; ?></td>
                    </tr>
                    <tr>
                      <td height="45">
					  <ul class="main">
                        <li  class="ul_s_et_6"><a href="<?php echo "tpl/menu.php?info=info&accessid=".md5('info');  ?>" target="mymenu"><?php echo $accountdashboard; ?></a><br />
                        </li>
                        <li  class="ul_s_et_6"><a href="<?php echo "tpl/menu.php?info=statement&accessid=".md5('statement');  ?>" target="mymenu"><?php echo $statement; ?></a></li>
                        <li  class="ul_s_et_6" id="stat_last"><a href="javascript:MM_openBrWindow('tpl/complete_data.php','','scrollbars=yes,width=900,height=600');"><?php echo $statement_long_lang; ?></a>                        </li>
					  </ul></td>
                    </tr>
                    <tr>
                      <td height="48" class="out">&nbsp;</td>
                    </tr>
                  </table> </td>
                  <td width="67%" height="700px"><iframe src="<?php echo "tpl/menu.php?info=$info_header&accessid=".md5($info_header);  ?>" scrolling="auto" frameborder="0" style="width:100%; height:700px; background-repeat:repeat-y" name="mymenu" id="mymenu"></iframe></td>
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
          <h2>&nbsp;</h2>
          <div>
            <p align="center">
            <div>
              <div class="notification" id="noofnoti" onMouseOver="MM_displayStatusMsg('Notification');return document.MM_returnValue"><span class="notification2"><span class="notification11"><img src="images/noti_flag_big.png" alt="Notification" width="48" height="43" title="Notification" onClick="notification_userid()"/></span></span>
                <div id="close"><a onClick="closethemenu()"><img src="images/closebox.png" alt="X" width="30" height="30"  onclick="closethemenu()" title="Close"/></a>
                  <div id="notification_obj" style="background-image:url(images/talkwithu.png); background-repeat:no-repeat;">
                    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="my_noti_table_et">
                      <tr>
                        <td width="14%">&nbsp;</td>
                        <td width="76%"><span id="notification_obj_data"><img src="images/loading.gif" align="middle" /></span></td>                      </tr>
                    </table>
                  </div>
                </div>
                <div id="noti_info"></div></div>
                <div>
                  <ul>
                    <?php
		require("tpl/login_plug.php");
?>
                  </ul>
              </div>
            </div>
          </div></ul>
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
