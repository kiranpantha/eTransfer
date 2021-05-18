function validate(form1)
{
 var username = form1.username.value;
 var password = form1.password.value;

 if (username == "" || password == "") 
 {
  document.getElementById("error").style.color="#BDBDBD";
  document.getElementById("error").innerHTML = "<span class=\"error\">The Required Field Is Empty</span><br />";
  form1.username.focus();
  return false;
 }
 return true;
}
