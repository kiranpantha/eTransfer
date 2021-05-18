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
}
}
}
return req;
}
var http = getXMLHTTPRequest();
function getServerTime() {
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
}
}
}// JavaScript Document