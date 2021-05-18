<?php
$website="www.etransfer.com.np";
$sitetitle="e-Transfer [The tatally secure e-payment solutions for Nepal]";
$sitename='<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="10%"><img src="images/epay.png" alt="e-Payments" width="250" height="60"/></td>
              <td width="90%"><img src="'.$image2.'" alt="Welcome !" width="64"  height="60" id="npflag" /></td>
            </tr>
          </table>';
//words
$recharge="Recharge Card";
$payinternet="Pay Internet Bills";
$othermerchant="Other Mercants";
$utilitypayment="Utility Payments";
$accountdashboard="Account DashBoard";
$statement="Mini Statement";
$customermenu="Customer Menu";
$paymentservices="Payment Services";
$balanceinformation="Balance Information";
$balance_total="Total Balance: ";
$balance_reward="Reward Balance: ";
$balance_added="Added Balance: ";
$typefriendsname="Type the friend's Email Address";
$email_lang="Email";
$mahasul="Amount";
$nrs="NRS";
$transfer_lang="Transfer";
$failed_transfer='Sorry to say but <br />This e-mail is not registered with us<br />Fund Transfer failed';
$confirmcode="Confirm Code";
$confirmsubmit="Confirm $email_lang";
$info_top_confirm='Please confirm the account with the verification code that was mailed to you ';
$gateway_for_nepali='A gateway for Nepali transactions';
$password_lang='Password';
$password1_lang="Passkey 1";
$password2_lang="Passkey 2";
$login_lang="Log in";
$forgot_lang_desc="Forgetting password is common in our system";
$forgot_lang="Forgot Password";
$cook= "<font color=\"red\">* Cookies must be enabled</font>";
$start_for_pass='Type the email to recover password';
$procced_lang='Recover Password';
$accept_lang='We accept bank transfer and after confirmation of your recharge request we will recharge your Account and we will withdraw within 24 hours to your bank account on the case of withdrawl request.<br />You can also get a recharge coupon from any Merchants of our Pay site.';
$language_lang='Language';
//register.php
$name_lang="Name";
$org_lang="Organization";
$address_lang="Address";
$phone_lang="Phone";
$birth_lang="Birthday";
$gender_lang="Gender";
$capctha_lang="Security Check";
$register_bth_lang="Register";
$clear_lang="Clear Form";
$loading_lang='Please Wait...';
$statement_long_lang='Detail Invoice';
//end words
$sitewelcome="Welcome to the totally secure website for e-payments";
$sitebase="Copyright  ".$_SERVER['SERVER_NAME']." 2012-".date("Y");
$promo="We accept bank transfer and after confirmation of your recharge request we will recharge your Account and we will withdraw within 24 hours to your bank account on the case of withdrawl request .<br> You may also contact any merchants of our payment gateway inorder to get recharge via special pin number which is produced by repeted algorithm by our team";
$social='<div align="right"><a href="mailto:info@pay.kiranpantha.com.np" title="E-Mail"><img src="imp_img/mail.png" alt="E-Mail" width="47" height="49" id="E-Mail" title="E-Mail" /></a> <a href="http://fb.com/kiranpanth" title="Twitter"><img src="imp_img/fb.png" alt="Facebook" width="47" height="49" id="Facebook" title="Facebook" /></a><a href="http://twitter.com/kiranpanth"><img src="imp_img/bird.png" alt="Twitter" width="60" height="49" id="Twitter" title="Twitter" /></a></div>';
$bankname='<A href="http://www.nabilbank.com/" target="_blank"><IMG src="store/nb.png"></A>
			<A href="http://ace.com.np/" target="_blank"><IMG src="store/ace.png"></A>
			<A href="https://itouch.bankofasia.com.np/" target="_blank"><IMG src="store/boa.png"></A>
			<A href="http://www.cedbl.com/" target="_blank"><IMG src="store/cedb.png"></A>
			<A href="http://ctbanknepal.com/" target="_blank"><IMG src="store/catb.png"></A>
			<A href="http://www.everestbankltd.com/" target="_blank"><IMG src="store/ebl.png"></A>
			<A href="http://www.globalimebank.com/" target="_blank"><IMG src="store/gimeb.png"></A>
			<A href="https://ebanking.janatabank.com.np/ENULogin.html" target="_blank"><IMG src="store/jbnl.png"></A>
			<A href="http://www.kailashbank.com/" target="_blank"><IMG src="store/kbbl.png"></A>
			<A href="http://www.kistbank.com/" target="_blank"><IMG src="store/kbl.png"></A>
			<A href="http://www.manakamanabank.com/" target="_blank"><IMG src="store/mdbl.png"></A>
			<A href="http://nccbank.com.np/" target="_blank"><IMG src="store/nccb.png"></A>
			<A href="http://nbbl.com.np/" target="_blank"><IMG src="store/nbb.png"></A>
			<A href="http://www.nmb.com.np/" target="_blank"><IMG src="store/nmbb.png"></A>
			<A href="http://www.sdbl.com.np/" target="_blank"><IMG src="store/sdbl.png"></A>
			<A href="https://www.sunrisebank.com.np/ibn/login.php" target="_blank"><IMG src="store/sbl.png"></A>
			<A href="http://tdbl.com.np/" target="_blank"><IMG src="store/tdbl.png"></A>
			<A href=""><IMG src="store/comingsoon.png"></A>
			<A href=""><IMG src="store/comingsoon.png"></A>
			<A href=""><IMG src="store/comingsoon.png"></A>';
$bankname='<IMG src="images/logo.png" width="100" height="100"><IMG src="images/logo.png" width="100" height="100"><IMG src="images/logo.png" width="100" height="100"><IMG src="images/logo.png" width="100" height="100"><IMG src="images/logo.png" width="100" height="100"><IMG src="userfiles/capctha.php?word=Coming+soon" width="100" height="100">';
//menu
$email=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
if (empty($email) && empty($pass1) && empty($pass2))
{
$sitemenu='<h3><a href="index.php" ><img src="images/home.png" alt="Home!" width="32" height="25" />Home</a> <a class="modal-button" title="Login" href="login.php?admin=login&post='.$_SERVER['PHP_SELF'].'" rel="{handler: \'iframe\', size: {x: 680, y: 560}, overlayOpacity: 0.7}"><img src="images/login_template.png" alt="Login" width="32" height="25" />Log In</a><a href="register.php" ><img src="images/redgnew.png" alt="Register" width="32" height="25" />Register</a><a href="confirm.php" ><img src="images/email_verify.png" alt="Verify Email" width="32" height="25" /><STRONG>Confirm Email</STRONG></a></h3>';
}
else
{
$sitemenu='<h3><a href="main.php?info=rch" ><img src="images/home.png" alt="Home!" width="32" height="25" /><STRONG>Home</STRONG></a> <a href="main.php?info=addfunds"><img src="images/addfunds.png" alt="Add Funds" width="32" height="25" /><STRONG>Add Funds</STRONG></a> <a class="modal-button" title="Transfer Funds" href="sendfund.php" rel="{handler: \'iframe\', size: {x: 680, y: 560}, overlayOpacity: 0.7}"><img src="images/transfermoney.png" alt="Transfer Funds" width="32" height="25" /><STRONG>Transfer Funds</STRONG></a><a href="main.php?info=statement" ><img src="images/statement.png" alt="Statement" width="32" height="25" /><STRONG>Statement</STRONG></a></h3>';
}
?>