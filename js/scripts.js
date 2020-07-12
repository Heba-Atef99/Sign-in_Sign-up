
//function that changes the placeholder of img input field
$(".imgInput").on("change", ".file-upload-field", function(){ 
    if($(this).val()!=0)
    $(this).parent(".file-upload-wrapper").attr("data-text",$(this).val().replace(/.*(\/|\\)/, '') );

    else
    $(this).parent(".file-upload-wrapper").attr("data-text","Upload Your Personal Image");
});

//function that take only numbers
function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}

$(document).ready(function() {
    
    // ***************Validations of Sign-Up form*******************
    
    // Fn 1 for phone number validations
    function validatePhone() {
        var content = $("#number").val();
        if (content != "" && (content.length < 11 || content.length > 11 || content[0] != 0 || content[1] != 1)) return false;
        else return true;
    }

    // Fn 2 for email validation
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    // Fn 3 continuing email validation
    var uecond=null;
    function finalEmailValidation() {
        var result = $("#ue");
        var emaill = $("#upEmail").val();

        if (validateEmail(emaill)) {
            $("#upEmail").css("borderColor", "green");
            result.text("");
            uecond = 1;
            return true;
        }
        else {
            if (emaill) {
                uecond = 0;
                return false;
            }
        }
    }

    $("#upEmail").blur(function() {
        var result = $("#ue");
        if (finalEmailValidation() == false) {
            result.text("E-mail is Not Valid!");
            result.css("color", "rgb(220, 53, 69)");
            $("#upEmail").css("borderColor", "rgb(220, 53, 69)");
        }
    });

    // Fn 4 Passwords validation & matching 

    function validatePass(){
        var pass=$("#password").val();
        if(pass.length<6) return false;
        else return true;
    }

    function matchPass(){
        var pass=$("#password").val();
        var cpass=$("#cPassword").val();
        if(pass==cpass) return true;
        else return false;
    }

    //Fn 5 A way to make sure there are no invalid input fields in sign up form & to validate the phone number
    var phcond=null;
    var pcond=null;
    var cpcond=null;
    var phFeed = $("#hnumber");
    var pFeed = $("#pass");
    var cpFeed = $("#cPass");

    $('form.signUp :input').on('input', function() {
        var $id = $(this).attr("id");

        if (finalEmailValidation() && $id == "upEmail")
            $(this).css("borderColor", "green");

        else if ($id == "number" && validatePhone()) {
            $(this).css("borderColor", "green");
            phFeed.text("");
            phcond = 1;
        }

        else if ($id == "password" && validatePass()) {
            $(this).css("borderColor", "green");
            pFeed.text("");
            pcond = 1;
        }

        else if ($id == "cPassword" && matchPass()) {
            $(this).css("borderColor", "green");
            cpFeed.text("");
            cpcond = 1;
        }

        upBttnAvailable();
        return false;
    });

    $("form.signUp :input:not(button)").blur(function() {
        var content = $(this).val();
        var $id = $(this).attr("id");

        if (!content) {
            cond = 0
            $(this).css("borderColor", "rgb(220, 53, 69)");
            $(this).attr("placeholder", "This Info Is REQUIRED");
            if ($id == "number") phFeed.text("");
            if ($id == "password") pFeed.text("");
            if ($id == "cPassword") cpFeed.text("");
        }

        else if ($id == "number" && !validatePhone()) {
            phFeed.text("Phone Number is Not Valid !");
            phFeed.css("color", "rgb(220, 53, 69)");
            $(this).css("borderColor", "rgb(220, 53, 69)");
            pcond = 0;
        }

        else if ($id == "password" && !validatePass()) {
            pFeed.text("Password must contain only at least 6 characters !");
            pFeed.css("color", "rgb(220, 53, 69)");
            $(this).css("borderColor", "rgb(220, 53, 69)");
            pcond = 0;
        }

        else if ($id == "cPassword" && !matchPass()) {
            cpFeed.text("Passwords do not MATCH !");
            cpFeed.css("color", "rgb(220, 53, 69)");
            $(this).css("borderColor", "rgb(220, 53, 69)");
            cpcond = 0;
        }

        else if ( $(this).val() != "" && ($id == "fName" || $id == "cName"))
        $(this).css("borderColor", "green");

        upBttnAvailable();
        return false;
    });

    //function 6 IT is Time to submit that button,right? :/ 
    function upBttnAvailable() {
        var finalCond = 0;
        var noAlert = null;
        var inputs = 0;

        $("form.signUp :input:not(button)").each(function() {
            if (!$(this).val()) finalCond = 0;
            else finalCond++;
            inputs++;
        });

        $("h6").each(function() {
            noAlert = $(this).val();
            if (noAlert != "") finalCond = 0;
        });

        if (finalCond == inputs && uecond == 1 && phcond == 1 && pcond == 1 && cpcond == 1) {
            $(".upBtn").attr("disabled", false);
            $(".upBtn").css("cursor", "pointer");
        } else {
            $(".upBtn").attr("disabled", true);
            $(".upBtn").css("cursor", "not-allowed");
        }
    }
    

    // ***************Validations of Sign-In form*******************
 
    $("form.signIn :input").on('input',function(){
        var inEmail=$("#inEmail").val();
        var inPass=$("#inPass").val();    
        if(!(inEmail) || !(inPass)){
            $(".inBtn").attr("disabled", true);
            $(".inBtn").css("cursor", "not-allowed");
        } 
        else {            
        $(".inBtn").attr("disabled", false);
        $(".inBtn").css("cursor", "pointer");
        }
    });

    // ******************************************************************

    // some Styling ;)
    $(".inBtn").attr("disabled", true);
    $(".inBtn").css("cursor", "not-allowed");

    $(".upBtn").attr("disabled", true);
    $(".tpBtn").css("cursor", "not-allowed");

    $(":input").on("focus", function() {
        // bttnAvailable();
        var lable = $(this).prev();
        lable.css("color", "rgb(220, 53, 69)");
    });

    $(':input').blur(function() {
        // Continuoing of lable styling
        var lable = $(this).prev();
        lable.css("color", "black");
    });

})

