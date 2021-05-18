<?php require('words.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Register - <?php echo $sitetitle; ?></title>
<?php require($url.'userfiles/favicon.php'); ?>
<!--css -->
<link rel="stylesheet" href="userfiles/trybth.php"/>
<link rel="stylesheet" href="tpl/css.php"/>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style2 {font-size: 18px}
.textboxs
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
width:350px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}
.error {
width: auto; 
cursor: pointer; 
display: inline-block; 
line-height: 1; 
margin: 0; 
outline: none; 
padding: 10px 20px 11px; 
position: relative; 
text-align: center; 
text-decoration: none;
left:0;
background:#FF3333;
-webkit-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-moz-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
border:1px solid #2d2d2d
}.ok
{  
width: auto; 
cursor: pointer; 
display: inline-block; 
line-height: 1; 
margin: 0; 
outline: none; 
padding: 10px 20px 11px; 
position: relative; 
text-align: center; 
text-decoration: none;
left:0;
background:#00FF00;
-webkit-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-moz-box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
box-shadow: inset 0px -3px 1px rgba(0, 0, 0, 0.45), 0px 2px 2px rgba(0, 0, 0, 0.25);
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
border:1px solid #2d2d2d
}.textboxs_new
{
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
width:100px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}
.tryit
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}
.Msg {
	color: #FF0000;
	font-size: 16px;
}
.style3 {color: #FF0000}
.style4 {font-size: 18}
.name {color: #00FF00; font-weight: bold; }
.style2 {color: #FF0000}
.blue{
border-right:2px solid #6600CC;
border-left:2px solid #6600CC; 
border-top:2px solid #6600CC; 
border-bottom:2px solid #6600CC;
padding:0; font-size:12pt;
color:#6600CC;
background:#FFFFFF;
}
.style6 {font-size: 24px}
.lang {	color: #FFFFFF;
	font-weight: bold;
}
-->
</STYLE>
<link rel="stylesheet" href="css/btn.css" type="text/css"/>
<!--script -->
<script language="javascript"  src="js/registrationvalidity.js" > </script> 
<script language="javascript"  src="tpl/ajax_validity.php" ></script> 
</head>
<body>
<div id="wrapper">
	<div id="logo">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="80%"> <font face="Georgia, Times New Roman, Times, serif"> 
     <?php echo $sitename;?>
     
    </font></td>
          <td width="20%">A gateway for Nepali transactions</td>
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
	<div id="header">
		<div id="menu">
	<?php echo $sitemenu; ?>    </div>
  </div>
	<div id="page">
	<div id="page-bgtop">
		<div id="content">
		  <div class="post">
				
			  <h2 class="title"><?php echo $sitewelcome;?></h2>
			 				<div class="entry">
					
            <p> <span class="Msg">Each transaction is viewed and order is placed by human so it is 100% secure </span></p>
			</div>
		  </div>
          <div align="center">
  <?php
require('dbconn.php');
$capcha1=rand(0,9);
$capcha2=rand(0,9);
// word
if ($capcha1==1)
{
$capcha1wrd="one";
}
if ($capcha1==2)
{
$capcha1wrd="two";
}
if ($capcha1==3)
{
$capcha1wrd="three";
}
if ($capcha1==4)
{
$capcha1wrd="four";
}
if ($capcha1==5)
{
$capcha1wrd="five";
}
if ($capcha1==6)
{
$capcha1wrd="six";
}
if ($capcha1==7)
{
$capcha1wrd="seven";
}
if ($capcha1==8)
{
$capcha1wrd="eight";
}
if ($capcha1==9)
{
$capcha1wrd="nine";
}
if ($capcha1==0)
{
$capcha1wrd="zero";
}
//end word
if ($capcha2==1)
{
$capcha2wrd="one";
}
if ($capcha2==2)
{
$capcha2wrd="two";
}
if ($capcha2==3)
{
$capcha2wrd="three";
}
if ($capcha2==4)
{
$capcha2wrd="four";
}
if ($capcha2==5)
{
$capcha2wrd="five";
}
if ($capcha2==6)
{
$capcha2wrd="six";
}
if ($capcha2==7)
{
$capcha2wrd="seven";
}
if ($capcha2==8)
{
$capcha2wrd="eight";
}
if ($capcha2==9)
{
$capcha2wrd="nine";
}
if ($capcha2==0)
{
$capcha2wrd="zero";
}

// end 2
if ($capcha2%2==0)
{
$type="+";
$typewrd="plus";
}
else
{
$type="-";
$typewrd="minus";
}
if ($type=="+")
{
$ctype=$capcha1+$capcha2;
}
elseif ($type=="-")
{
$ctype=$capcha1-$capcha2;
}
//end captha
?>
  <br /><span id="errors"></span>
          </div>
          <form action="redg.php" method="post" name="registerform" onsubmit="return validate(this);" />
  <TABLE width="106%" border="0" cellspacing="0" cellpadding="0">
    <TR>
      <TD width="9%" class="name"><P class="name">Name</P></TD>
      <TD width="37%">
        <INPUT name="name" type="text" class="textboxs" id="name" size="100%" >     </TD>
      <TD width="54%">You must be a valid citizen of Nepal having sufficient evidence.If we want to verify yourself you must prove that you are citizen of Neal </TD>
    </TR>
    <TR>
      <TD class="name">Organization</TD>
      <TD><INPUT name="org" type="text" class="textboxs" id="org"  size="60%" ></TD>
      <TD><span class="style3">Optional Field </span></TD>
    </TR>
    <TR>
      <TD class="name"><p>Address<br />
      </p></TD>
      <TD><INPUT name="add" type="text" class="textboxs" id="add" size="60%"></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD class="name">Phone Number </TD>
      <TD><input name="phn" type="text" class="textboxs" id="phn" size="60%" onchange="return isNumeric(this);"></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD class="name"><p>E-mail<br />
      </p>        </TD>
      <TD><input name="email" type="text" class="textboxs" id="email" size="60%" onchange="javascript: getemailinfo(this);"></TD>
      <TD>You will get every transciction record in your E-mail </TD>
    </TR>
    <TR>
      <TD class="name"><p>Birthday
              <br />
          </p>        </TD>
      <TD><span class="size3">
        <select name="listday" class="textboxs_new" id="tday">
          <option>Day</option>
          <script type="text/javascript">
							for(i=1;i<=31;i++)
								document.write("<option>"+i+"</option>");
						</script>
        </select>
        <select name="listmonth" class="textboxs_new" id="tmonth" style="font-size:8pt;">
        <option>Month</option>
          <option>Jan</option>
          <option>Fab</option>
          <option>Mar</option>
          <option>Apr</option>
          <option>May</option>
          <option>Jun</option>
          <option>Jul</option>
          <option>Aug</option>
          <option>Sep</option>
          <option>Oct</option>
          <option>Nov</option>
          <option>Dec</option>
        </select>
        <select name="listyear" class="textboxs_new" id="tyear" style="font-size:8pt;" >
          <option> Year (Birth) </option>
          <script type="text/javascript">
							for(i=<?php echo date("Y") ?>-16;i>=1920;i--)
								document.write("<option>"+i+"</option>");
						</script>
        </select>
      </span></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD class="name"><p>Gender
              <br />
          </p>        </TD>
      <TD><label>
        <select name="select_gender" class="textboxs">
          <option>Select</option>
          <option value="m">Male</option>
          <option value="f">Female</option>
        </select>
      </label></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD class="name"><p>Password 1<br />
      </p></TD>
      <TD><INPUT name="password1" type="text" class="textboxs" id="password1" size="60%" ></TD>
      <TD>We have the word's unique double password and double domain authorization </TD>
    </TR>
    <TR>
      <TD class="name"><p>Password 2 <br />
      </p>        </TD>
      <TD><INPUT name="password2" type="text" class="textboxs" id="password2" size="60%"></TD>
      <TD>System Designed by our Excellent Programmers</TD>
    </TR>
    <TR>
      <TD class="name">&nbsp;</TD>
      <TD><SPAN class="style2"><span class="name">Captcha</span><br />
                  <img src="userfiles/capctha.php?word=<?php echo base64_encode($capcha1wrd."+".$typewrd."+".$capcha2wrd); ?>" />
            <INPUT name="captcha1" type="hidden" id="captcha1" value="<?php echo md5($ctype) ;   ?>">
        </SPAN><BR>
        <INPUT name="captcha2" type="text" class="textboxs" id="captcha2" size="60%"></TD>
      <TD><span class="style4">THREE-TWO =&gt;<span class="style3">1</span> NOT ONE </span></TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD><label>
        <br />
        <input type="submit" name="submit_redg_data" value="Get registered" class="button" onclick="return validate(registerform);" />
      </label></TD>
      <TD><input type="reset" name="Submit2" value="Reset" class="button" /></TD>
    </TR>
  </TABLE>
  </form>

		  <div class="post">
			  <h2 class="title"><a></a><br />
		      The most secure Gateway that a Nepali can trust </h2>
		  </div>
			<div class="post"><div class="entry">
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="81%"><?php echo $promo; ?><br /></td>
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
         <div style="width:100%;"><?php
		require("tpl/login_plug.php");
?></div>
	  </div>
		
      <div style="clear: both;"><?php echo $social; ?></div>
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
