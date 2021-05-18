$(document).ready(function(){
    $('#oldCustomers input[type=submit]').attr("disabled", true);
    $('#oldCustomers input[type=submit]').addClass('btndisabled');
});

$('#oldCustomers #customer_email').bind('keyup paste',function(event){
     var adminEmail = $('#oldCustomers #CustomerAdminEmail').val();
     if(!validateEmail(adminEmail)){
         $('#errmsgtext').remove();
         $('#CustomerAdminEmail').addClass('error');
         $('#msg').append("<div id='errmsgtext'>Enter a valid email.eg:- admin@email.com </div>");
         $('#oldCustomers input[type=submit]').attr("disabled", true);
         $('#oldCustomers input[type=submit]').addClass('btndisabled');
     }else{
         $('#errmsgtext').remove();
         $('#CustomerAdminEmail').removeClass('error');
         enableButton();
     }
});

function validateEmail(email)
{ 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateDomainName(domain_name){
   var re = /^(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.){2}([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9])$/;
   return re.test(domain_name);
}

$('#oldCustomers #domain_name').bind('keyup paste',function(event){
     var domainName = $('#oldCustomers #DomainnameDomainName').val();
     if(!validateDomainName(domainName)){
         $('#errmsgtext').remove();
         $('#DomainnameDomainName').addClass('error');
         $('#msg').append("<div id='errmsgtext'>Enter a valid domain name eg:- prashiddha.com.np</div>");
         $('#oldCustomers input[type=submit]').attr("disabled", true);
         $('#oldCustomers input[type=submit]').addClass('btndisabled');
     }else{
         $('#errmsgtext').remove();
         $('#DomainnameDomainName').removeClass('error');
         enableButton();
     }
});


function enableButton()
{
    var c1 = validateEmail($.trim($('#oldCustomers #CustomerAdminEmail').val()));
    var c2 = validateDomainName($.trim($('#oldCustomers #DomainnameDomainName').val()))
    if( c1 && c2 )
        {
           $('#oldCustomers input[type=submit]').attr("disabled", false);
           $('#oldCustomers input[type=submit]').removeClass('btndisabled');
           $('#success').remove();
           
        }
}


