<?php header('Content-Type: text/javascript'); ?>
function emailValidator(elem)
{
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp))
	{
			return true;
	}
	else
	{
		alert("The email that you entered is invalid");
		elem.value="";
			elem.focus();
			return false;
	}
}
function getXMLHTTPRequest() {
try {
req = new XMLHttpRequest();
} catch(err1) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP");
} catch (err2) {
try {
req = new ActiveXObject("Microsoft.XMLHTTP");
} catch (err3) {
req = false;
}
}
}
return req;
}
var http = getXMLHTTPRequest();

function getemailinfo(myEmail){
var email=emailValidator(myEmail)
var myurl = 'tpl/user_email_verify.php';
var modurl = myurl+"?email="+myEmail.value;
http.open("GET", modurl, true);
http.onreadystatechange = useHttpResponse;
http.send(null);
}
function useHttpResponse() {
if (http.readyState == 4) {
if(http.status == 200) {
var errid = http.responseXML.getElementsByTagName("isvalid")[0];
  if (errid.childNodes[0].nodeValue=='404')
  {
  document.getElementById('errors').innerHTML='<span class="error">This Email is already registered with us</span>';
  }
  else
  {
  document.getElementById('errors').innerHTML='<span class="ok">This Email is still avialable</span>';
  }
}
}
}// JavaScript Document