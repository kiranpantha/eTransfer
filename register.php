<?php 
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
//nepali words
function tonepali($word_got)
{
  $i=NULL;
  $word=NULL;
  $lenofword=strlen($word_got);
  for($i;$i<$lenofword;$i++)
  {
   $word_extract=substr($word_got,$i,1);
   $n_add = NULL;			
			switch($word_extract){
				case '1':
					$n_add = "१";
					break;
					
				case '2':
					$n_add  = "२";
					break;
					
				case '3':
					$n_add  = "३";
					break;
					
				case '4':
					$n_add = "४";
					break;
					
				case '5':
					$n_add = "५";
					break;
				
				case '6':
					$n_add = "६";
					break;
				
				case '7':
					$n_add = "७";
					break;
				
				case '8':
					$n_add = "८";
					break;
				
				case '9':
					$n_add = "९";
					break;
				
				case '0':
					$n_add = "०";
					break;
			}	
		$word.=$n_add;
  }
  return $word;
}
//nepali
require('words.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
color:#FFFFFF;
background:#FF0000;
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
color:#000000;
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
<link rel="stylesheet" href="css/login_bth.css" type="text/css"/>
<!--script -->
<script language="javascript"  src="js/registrationvalidity.js" > </script> 
<script language="javascript"  src="tpl/ajax_validity.php" ></script> 
<SCRIPT type="text/javascript" src="tpl/ajax_login_refer.php"/></SCRIPT>
<style type="text/css">
<!--
body {
	background-image: url(images/back_img.png);
}
-->
</style>
<script type="text/javascript">
<!---
function reload_security_check()
{
document.getElementById("et_security").src = "nospam/?" + Math.floor(Math.random() * 100);}
-->
</script>
</head>
<body>	<?php include('tpl/noscript.php'); ?>

<div id="wrapper">
	<div id="logo">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="80%"> <font face="Georgia, Times New Roman, Times, serif"> 
     <?php echo $sitename;?>
     
    </font></td>
          <td width="20%"><?php echo $gateway_for_nepali; ?></td>
        </tr>
        <tr>
          <td style="color:#FFFFFF; font-size:18px"><pre><?php echo $sitewelcome;?></pre></td>
          <td><div align="center"><span class="lang">Language:</span><?php require('tpl/lang_frame.tpl'); ?></div></td>
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
?>
  <br /><span id="errors"></span>
          </div>
          <form action="redg.php" method="post" name="registerform" onsubmit="return validate(this);" />
  <TABLE width="106%" border="0" cellspacing="0" cellpadding="0">
    <TR>
      <TD width="13%" class="name"><P class="name"><?php echo $name_lang; ?></P></TD>
      <TD width="48%">
        <INPUT name="name" type="text" class="let_us_epay_register_select_small" id="name" size="50%" >     </TD>
      <TD width="39%">You must be a valid citizen of Nepal having sufficient evidence.If we want to verify yourself you must prove that you are citizen of Neal </TD>
    </TR>
    <TR>
      <TD class="name"><?php echo $org_lang; ?></TD>
      <TD><INPUT name="org" type="text" class="let_us_epay_register_select_small" id="org"  size="50%" ></TD>
      <TD><span class="style3">Optional Field </span></TD>
    </TR>
    <TR>
      <TD class="name"><p><?php echo $address_lang; ?><br /></p></TD>
      <TD><INPUT name="add" type="text" class="let_us_epay_register_select_small" id="add" size="50%"></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD class="name"><?php echo $phone_lang; ?></TD>
      <TD><input name="phn" type="text" class="let_us_epay_register_select_small" id="phn" size="50%" onchange="phoneValidator(this);"></TD>
      <TD><span class="name">97XXXXXXXX</span> <span class="Msg">OR</span> <span class="name">98XXXXXXXX </span></TD>
    </TR>
    <TR>
      <TD class="name"><p><?php echo $email_lang; ?><br /></p></TD>
      <TD><input name="email" type="text" class="let_us_epay_register_select_small" id="email" size="50%" onchange="javascript: getemailinfo(this);"></TD>
      <TD>You will get every transciction record in your E-mail </TD>
    </TR>
    <TR>
      <TD class="name"><p><?php echo $birth_lang; ?></p></TD>
      <TD><span class="size3">
        <select name="listday" class="let_us_epay_register_select_small" id="tday">
        <?php
		if($lang_check=='en')
		{
		 $i=1;
		 $list_data='<option>Day</option>';
		 for($i;$i<=31;$i++)
		 {
		 $list_data.="<option>".$i."</option>";
		 }
		 echo $list_data;	
		}
		else
		{
		 $i=1;
		 $list_data='<option>दिन</option>';
		 for($i;$i<=31;$i++)
		 {
		 $list_data.="<option value=\"$i\">".tonepali($i)."</option>";
		 }
		 echo $list_data;	
		}	
		?> 
        </select>
        <select name="listmonth" class="let_us_epay_register_select_small" id="tmonth">
		<?php
		$listmonth_data=NULL;
		$month_en=array('Month','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$month_np=array('महिना','जनवरी','फेबवरी','मार्च','अप्रिल','मे','जुन','जुलाइ','अगस्त','सेक्टेम्बर','अक्टुबर','नोमेम्बर','डिसेम्बर');
		if($lang_check=='en')
		{
		 $i=0;
		 for($i;$i<=12;$i++)
		 {
		 $listmonth_data.="<option>".$month_en[$i]."</option>\n";
		 }
		 echo $listmonth_data;	
		}
		else
		{
		 $i=0;
		 for($i;$i<=12;$i++)
		 {
		 $listmonth_data.="<option value=\"".$month_en[$i]."\">".$month_np[$i]."</option>";
		 }	
		 echo $listmonth_data;	
		}	
		?>
        </select>
        <select name="listyear" class="let_us_epay_register_select_small" id="tyear">
         <?php
		if($lang_check=='en')
		{
		 $i=date('Y')-16;
		 $list_data='<option>Year</option>';
		 for($i;$i>=1920;$i--)
		 {
		 $list_data.="<option>".$i."</option>\n";
		 }
		 echo $list_data;	
		}
		else
		{
		 $i=date('Y')-16;
		 $list_data="<option>बर्ष</option>\n";
		 for($i;$i>=1920;$i--)
		 {
		 $list_data.="<option value=\"$i\">".tonepali($i)."</option>\n";
		 }
		 echo $list_data;		
		 }	
		?> 
        </select>
      </span></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD class="name"><p><?php echo $gender_lang; ?></p>        </TD>
      <TD><label><?php
        if($lang_check=='en')
		{
		 echo '
		 <select name="select_gender" class="let_us_epay_register_small" >
          <option>Select</option>
          <option value="m">Male</option>
          <option value="f">Female</option>
        </select>';
		}
		else
		{
		 echo '
		 <select name="select_gender" class="let_us_epay_register_small" >
          <option>चुन्नुहोस्</option>
          <option value="m">पुरूष</option>
          <option value="f">महिला</option>
        </select>';
		}
		?>
      </label></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD class="name"><p><?php echo $password1_lang; ?><br />
      </p></TD>
      <TD><INPUT name="password1" type="password" class="let_us_epay_register_select_small" id="password1" size="50%" ></TD>
      <TD>Two Password security for extended security </TD>
    </TR>
    <TR>
      <TD class="name"><p><?php echo $password1_lang; ?><br />
      </p>        </TD>
      <TD><INPUT name="password2" type="password" class="let_us_epay_register_select_small" id="password2" size="50%"></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD class="name">&nbsp;</TD>
      <TD><SPAN class="style2"><?php echo $capctha_lang; ?><br /><div  class="let_us_epay_register_small">
                  <img src="nospam/?rand=<?php echo rand(1,10000); ?>" alt="No! Spam" name="et_security" width="100%" height="30" id="et_security" onclick="reload_security_check();" title="Click to reload"/><br />
      Problem Loading! Click on Image to reload </div>
        </SPAN><BR>
        <INPUT name="captcha" type="text" class="let_us_epay_register_select_small" id="captcha" size="50%" autocomplete="no"></TD>
      <TD>&nbsp;</TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD><label>
        <br />
        <input type="submit" name="submit_redg_data" value="<?php echo $register_bth_lang;  ?>" class="button" onclick="return validate(registerform);" />
      </label></TD>
      <TD><input type="reset" name="Submit2" value="<?php echo $clear_lang; ?>" class="button" /></TD>
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
