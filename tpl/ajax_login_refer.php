<?php header('Content-Type: text/javascript'); ?>
function request()
{
var kiran_process1=getreferedifloggedin();
setTimeout('request()',5000);
}
setTimeout('request()',1);

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
var status_obj='false';
}
}
}
return req;
}
var http_referin = getXMLHTTPRequest();
function getreferedifloggedin(){
var myurl = 'tpl/user_logged_verify.php';
var modurl = myurl;
http_referin.open("GET", modurl, true);
http_referin.onreadystatechange = useHttpResponse_getlogin;
http_referin.send(null);
}
function useHttpResponse_getlogin() {
if (http_referin.readyState == 4) {
if(http_referin.status == 200) {
var errid = http_referin.responseXML.getElementsByTagName("isvalid")[0];
  if (errid.childNodes[0].nodeValue=='YES')
  {
  document.location='main.php?info=type'; 
  }
}
}
}// JavaScript Document
