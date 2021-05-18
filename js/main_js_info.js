function request()
{
var kiran_process1=getuserbalance();
var kiran_process2=getnoofnotifications();
setTimeout('request()',5000);
}
setTimeout('request()',1);
function MM_controlSound(x, _sndObj, sndFile) { //v3.0
  var i, method = "", sndObj = eval(_sndObj);
  if (sndObj != null) {
    if (navigator.appName == 'Netscape') method = "play";
    else {
      if (window.MM_WMP == null) {
        window.MM_WMP = false;
        for(i in sndObj) if (i == "ActiveMovie") {
          window.MM_WMP = true; break;
      } }
      if (window.MM_WMP) method = "play";
      else if (sndObj.FileName) method = "run";
  } }
  if (method) eval(_sndObj+"."+method+"()");
}
function notification_userid()
{
 var urldata= Math.floor(Math.random() * 1000);
 document.getElementById('notification_obj_data').innerHTML='<iframe src="tpl/user_notification_data.php?rand='+urldata+'" frameborder="0"  allowtransparency="yes" width="90%" height="90%"></iframe><br/>More information is located in Invoices';
 document.getElementById('notification_obj').style.visibility='visible';
 document.getElementById('close').style.visibility='visible';
}
 function closethemenu()
 {
 document.getElementById('notification_obj').style.visibility='hidden';
 document.getElementById('close').style.visibility='hidden';
 }// JavaScript Document