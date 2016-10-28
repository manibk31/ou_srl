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
               
                //Implemented the below logic in function validateEmailPassword!!!
                /*var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

          if(!((email=="")&&(password=="")))
              { 
                 
                  email_len=email.length;
                  password_len=password.length;
                  
                  if(((password_len<6)||(password_len>15)))
                      {
                          valid=false;
                          $("#password_alert").removeClass("hidden");
                      } 
                  if(!(re.test(email)))
                      {
                          valid=false;
                           $("#email_alert").removeClass("hidden");
                      }
              }
          else
              {
                  valid=false;
                  $("#email_alert1").removeClass("hidden");
                  $("#password_alert1").removeClass("hidden");
                 
              }
    */
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
    
        console.log(valid);
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