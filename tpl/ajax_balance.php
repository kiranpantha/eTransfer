<?php header('Content-Type: text/javascript'); ?>
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
var  http =  getXMLHTTPRequest();
var  https =  getXMLHTTPRequest();
var http_checklogin = getXMLHTTPRequest();

function getuserbalance() {
var myurl = 'tpl/balance_update.php';
myRand = parseInt(Math.random()*999999999999999);
var modurl = myurl+"?rand="+myRand;
http.open("GET", modurl, true);
http.onreadystatechange = useHttpResponse;
http.send(null);
}
function useHttpResponse() {
if (http.readyState == 4) {
if(http.status == 200) {
var ab = http.responseXML.getElementsByTagName("ab")[0];
var rb = http.responseXML.getElementsByTagName("rb")[0];
var tb = http.responseXML.getElementsByTagName("tb")[0];
document.getElementById('ab').innerHTML=ab.childNodes[0].nodeValue;
document.getElementById('rb').innerHTML=rb.childNodes[0].nodeValue;
document.getElementById('tb').innerHTML=tb.childNodes[0].nodeValue;
document.getElementById('load_ing').style.visibility='hidden';
}
}
}

function getnoofnotifications()
{
var myurl = 'tpl/no_of_notifications.php';
myRand = parseInt(Math.random()*999999999999999);
var modurl = myurl+"?rand="+myRand;
https.open("GET", modurl, true);
https.onreadystatechange = useHttpResponse_fornoti;
https.send(null);
}

function useHttpResponse_fornoti() 
{
if (https.readyState == 4) 
{
if(https.status == 200) 
{
var myinfo = https.responseXML.getElementsByTagName("num")[0];
document.getElementById('noti_info').innerHTML=myinfo.childNodes[0].nodeValue;
if(myinfo.childNodes[0].nodeValue==0)
{
//var play_notify=MM_controlSound('play','document.CS1382397138222','sound/etransfer_notify.wav');
}
else
{
if(myinfo.childNodes[0].nodeValue=="REQLOGIN")
{
  document.location="index.php"; 
}
else
{
document.getElementById('soundbuffer').innerHTML="<embed name='CS1382397138222' src='sound/etransfer_notify.wav' loop=false autostart=false mastersound hidden=true width=0 height=0></embed>";
var play_notify=MM_controlSound('play','document.CS1382397138222','sound/etransfer_notify.wav');
}
}
document.getElementById('notification_obj').visibility='visible';
document.getElementById('close').visibility='visible';
}

}
}// JavaScript Document