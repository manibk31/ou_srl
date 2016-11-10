$(function() {




    $("#signin").hide();
    $("form").submit(function(e) {


        var form = $(this);
        var id = form.attr('id');
        var valid = true;

        switch (id) {

            case "signin":
                var action = "signin"
                var email = document.forms["signin"]["email"].value;
                var password = document.forms["signin"]["password"].value;
                valid = validateEmailPassword(email, password, valid, action);
                break;

            case "signup":
                var action="signup";
                var email = document.forms["signup"]["email"].value;
                var password = document.forms["signup"]["password"].value;
                var password_cnf = document.forms["signup"]["confirmpassword"].value;

                valid=validateEmailPassword(email,password,valid,action);
                if(!(valid&&(password_cnf==password)))
                    {
                        valid=false;
                         $("#confirm_alert").removeClass("hidden");
                    }
                else
                    {   valid=true;
                        $("#confirm_alert").addClass("hidden");
                    }
                break;

        }


       return valid;
    });
});
//to switch betweem two forms
function loadSignin() {

    $("#signup").hide();
    $("#signin").show();
    return false;
}

function loadSignup() {

    $("#signin").hide();
    $("#signup").show();
    return false;
}
//functoin to validate email and password
function validateEmailPassword(email, password, valid, action) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var pass_re=/((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;
    var id_selector;

    if (action == "signin") {
        id_selector = 1;
    } else {
        id_selector = 2;
    }
    if (!((email == "") && (password == ""))) {

        email_len = email.length;
        password_len = password.length;
        var pass_reg=pass_re.test(password);

        if (((password_len < 6) || (password_len > 15))||(!pass_reg)){
            valid = false;
            $("#password_alert" + id_selector).removeClass("hidden");
        } else {
            $("#password_alert" + id_selector).addClass("hidden");

        }
        if (!(re.test(email))) {
            valid = false;

            $("#email_alert" + id_selector).removeClass("hidden");
        } else {
            $("#email_alert" + id_selector).addClass("hidden");

        }
    } else {
        valid = false;
        $("#email_alert" + id_selector).removeClass("hidden");
        $("#password_alert" + id_selector).removeClass("hidden");

    }

    return valid;

}
setTimeout(function() {
$('.message').fadeOut();
}, 5000 );

$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

function validateDetails()
{

  var valid=true;
  var validity=0;
  var touched=0;
  var name=document.forms["update"]["name"].value;
  var status=document.forms["update"]["status"].value;
  var school=document.forms["update"]["school"].value;
  var phone=document.forms["update"]["phone"].value;
  var fax=document.forms["update"]["fax"].value;
  var url=document.forms["update"]["url"].value;
  var office=document.forms["update"]["office"].value;
  var photo=document.forms["update"]["photo"].value;

  if((!alpha_regex(name))||name=="")
  {


      $("#name_alert").removeClass("hidden");
      $("#name").parent().addClass("has-error");

  }
  else {


$("#required_alert").addClass("hidden");
$("#name").parent().removeClass("has-error");
  }
  if(status!="")
  {
    touched++;
    valid=alpha_regex(status);
    if(!valid)
    {
      $("#status_alert").removeClass("hidden");
      $("#status").parent().addClass("has-error");
    }
    else{

      validity++
      $("#status_alert").addClass("hidden");
      $("#status").parent().removeClass("has-error");
    }
  }

  if(school!="")
  {
    touched++;
    valid=alpha_regex(school);
    if(!valid)
    {
      $("#school_alert").removeClass("hidden");
      $("#school").parent().addClass("has-error");
    }
    else{

      validity++;
      $("#school_alert").addClass("hidden");
      $("#school").parent().removeClass("has-error");
    }
  }
  if(phone!="")
  {
      touched++;
    valid=phone_verify(phone);
    if(!valid){
      $("#phone_alert").removeClass("hidden");
        $("#phone").parent().addClass("has-error");
    }
    else {

      validity++;
      $("#phone_alert").addClass("hidden");
      $("#phone").parent().removeClass("has-error");
    }

  }
  if(fax!="")
  {
    touched++;
    valid=fax_regex(fax);
    if(!valid)
    {
      $("#fax_alert").removeClass("hidden");
      $("#fax").parent().addClass("has-error");
    }
    else {

      validity++;
      $("#fax_alert").addClass("hidden");
      $("#fax").parent().removeClass("has-error");
    }

  }

  if(office!="")
  {
    touched++;
    valid=alpha_regex(office);
    if(!valid)
    {
      $("#office_alert").removeClass("hidden");
      $("#office").parent().addClass("has-error");
    }
    else{

      validity++;
      $("#office_alert").addClass("hidden");
      $("#office").parent().removeClass("has-error");
    }
  }
if(validity==touched)
{
  valid=true;
}
else {
  valid=false;
}
return valid;
}
function validateEmail(email)
{
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return (re.test(email));
}
function validatePassword(password)
{
  var re=/((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;
  return (re.test(password));
}
function alpha_regex(str)
{
  var re=/^[A-Za-z\s]+$/;
  return re.test(str);

}
function phone_verify(number)
{
  var re = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  return re.test(number);
}
function fax_regex(fax)
{
  var re=/[\+? *[1-9]+]?[0-9 ]+/;
  return re.test(fax);
}
$('#publication_tab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
