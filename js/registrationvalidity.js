function validate(form1)
{
	if(form1.name.value =="")
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">Name Required</span><br />";
		//alert("You must enter a name.");
  		form1.name.focus();
  	    return false;
	}if(form1.add.value =="")
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">Address Required</span><br />";
  		form1.add.focus();
  	    return false;
	}if(form1.phn.value=="")
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must enter your phone number \n We need it to contact you</span><br />";
		form1.phn.focus();
		return false;
	}
	if(form1.email.value=="")
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must enter your email We need it to contact you</span><br />";
		form1.email.focus();
		return false;
	}
	if(form1.listday.selectedIndex ==0)
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must select day of your birthday</span><br />";
		form1.listday.focus();
		return false;
	}
	if(form1.listmonth.selectedIndex==0)
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must select month of your birthday</span><br />";
		form1.listmonth.focus();
		return false;
	}
	if(form1.listyear.selectedIndex==0)
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must select year of your birthday</span><br />";
		form1.listyear.focus();
		return false;
	}if(form1.select_gender.selectedIndex==0)
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must select your gender</span><br />";
		form1.select_gender.focus();
		return false;
	}
	if(form1.password1.value=="")
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must enter Your 1st Password</span><br />";
		form1.password1.focus();
		return false;
	}
		if(form1.password2.value=="")
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must enter Your 2nd Password</span><br />";
		form1.password2.focus();
		return false;
	}

	if(form1.password1.value==form1.password2.value)
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">Renter the password. \nBoth Password Matched \n As we don't allow same password for both the fields</span><br />";
		form1.password1.value="";
		form1.password2.value="";
		form1.password1.focus();
		return false;
	}
	if(form1.captcha2.value=="")
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">You must enter Security Check</span><br />";
		form1.captcha2.focus();
		return false;
	}
	
     return true;
}


function isNumeric(elem)
{
	
	var numericExpression = /^[0-9]+$/;	
	if(elem.value.match(numericExpression))
		
	{
			return true;		
	}
	
	else
		
	{
		alert("Only numbers are allowed to be placed in this field");
		elem.value="";
		elem.focus();
		return false;		
	}
}
function isAlphabet(elem)
{
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp))
	{
			return true;
	}
	else
	{
		document.getElementById("errors").innerHTML = "<span class=\"error\">Only Alphabets are allowed to be placed in this field</span><br />";
			elem.focus();
			return false;
	}
}
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
function lengthRestriction(elem)
{
	var uInput = elem.value;
	if( (uInput.length >=10) && (uInput.length<=15))
	{
			return true;
	}
	else
	{
		document.getElementById("password").innerHTML = "<span class=\"error\">Password too small</span><br />";
			elem.focus();
			return false;
	}
}