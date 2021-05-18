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

function getadded(Ele,proid)
{
var para = Ele.value;
var myurl = 'super_class/add_product_processor.php';
var modurl = myurl+"?proid="+proid+"&product="+para;
http.open("GET", modurl, true);
http.onreadystatechange = useHttpResponse;
http.send(null);
}
function useHttpResponse() {
if (http.readyState == 4) {
if(http.status == 200) {
var errid = http.responseXML.getElementsByTagName("isok")[0];
  if (errid.childNodes[0].nodeValue=='YES')
  {
  alert('Added data');
  Ele.value="";
  }
  else
  {
  alert('ERROR IN ADDING DATA');
  }
}
}
}// JavaScript Document