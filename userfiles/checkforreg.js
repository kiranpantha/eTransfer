function CheckInput(form) {
var idd;
idd=0;
	s=form.name.value;
	u=form.email.value;
	p=form.passkey.value;
	q=form.address.value;
	if (s.length==0) 
	{
		form.name.focus();
		form.nameerr.value="Enter your Name";
	return false;
	}
	else
	{
	form.nameerr.value=" ";
	}
	if (s.length<6) 
	{
		form.name.focus();
		form.nameerr.value="Enter at least 6 characters";
	return false;
	}
	else
	{
	form.nameerr.value=" ";
	}
	if (u.length==0) {
		form.email.focus();
		form.emailerr.value="Please enter a your Email.";
	   	return false;
	}
    else
	{
	form.emailerr.value=" ";
	}
	if (p.length==0) {
		form.passkey.focus();
		form.passerr.value="Please enter a your Passkey.";
			return false;
	}
	else
	{
	form.passerr.value=" ";
	}
	if(q.length==0){
	   form.address.focus();
	   form.adderr.value="Enter your address";
	   return false;
	}
	else
	{
	form.adderr.value=" ";
	}
	return true;
}
var time = 3000;
var numofitems = 7;

//menu constructor
function menu(allitems,thisitem,startstate){ 
  callname= "gl"+thisitem;
  divname="subglobal"+thisitem;  
  this.numberofmenuitems = allitems;
  this.caller = document.getElementById(callname);
  this.thediv = document.getElementById(divname);
  this.thediv.style.visibility = startstate;
}
function ehandler(event,theobj){
  for (var i=1; i<= theobj.numberofmenuitems; i++){
    var shutdiv =eval( "menuitem"+i+".thediv");
    shutdiv.style.visibility="hidden";
  }
  theobj.thediv.style.visibility="visible";
}
				
function closesubnav(event){
  if ((event.clientY <48)||(event.clientY > 107)){
    for (var i=1; i<= numofitems; i++){
      var shutdiv =eval('menuitem'+i+'.thediv');
      shutdiv.style.visibility='hidden';
    }
  }
}
  