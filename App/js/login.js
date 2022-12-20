import $ from "jquery";

var show = false;
export  default function login() {
    //Get checkbox value to show password
$('#show_pass').on('change',function () {
    show=!show;
    if (show) {
        $('#input_pass').attr('type', 'text');
    }else{
        $('#input_pass').attr('type', 'password');
    }
})
//Animate error
$('#login_error').animate({
    opacity: '1'
})
}

// ? ---- LOGIN FUNCTIONS ---- * //
$(function() {

    // * TEXT IS UNFILLED FUNCTION
    $('#submitSignup').on('click',function() {
        var submit = true;
        if ($('#nameSignup').val() == "") {
            $('#fillName').show();
            submit = false;
        }
        else{
            $('#fillName').hide();
        }

        if ($('#lastSignup').val() == "") {
            $('#fillLast').show();
            submit = false;
        }
        else{
            $('#fillLast').hide();
        }

        if ($('#emailSignup').val() == "") {
            $('#fillEmail').show();
            submit = false;
        }
        else{
            $('#fillEmail').hide();
        }

        if ($('#input_pass').val() == "") {
            $('#fillPasword').show();
            submit = false;
        }
        else{
            $('#fillPasword').hide();
        }
        
        if ($('#input_pass').val() != $('#confirmPass').val()) {
            submit = false;
        }
        
        if (!submit){
            return false;
        }
    });

    // * PASSWORD IS NOT EQUAL FUNCTION
    $('#input_pass').on('blur',function() {
        if(($('#input_pass').val() != "") && ($('#confirmPass').val() != "")){
            if ($('#input_pass').val() != $('#confirmPass').val()) {
                $('#alertPassword').show();
            } 
            else{
                $('#alertPassword').hide();
            }
        }
    });

    $('#confirmPass').on('blur',function() {
        if(($('#input_pass').val() != "") && ($('#confirmPass').val() != "")){
            if ($('#input_pass').val() != $('#confirmPass').val()) {
                $('#alertPassword').show();
            } 
            else{
                $('#alertPassword').hide();
            }
        }
    });

});
