
import $ from 'jquery';

var step1 = true;
var step2 = false;



var firstname = $('input[name="first_name"]');
var lastname = $('input[name="last_name"]');
var mail = $('input[name="mail"]');
var avatar = $('input[name="file"]');
var cur_pass = $('input[name="current_password"]');
var new_pass = $('input[name="new_password"]');
var repeat_pass = $('input[name="repeat_password"]');





export default function accountSettings() {

}

$('#account_step1').on('click', function () {


    $('#account__password').addClass('hidden');
    $('#account__account').removeClass('hidden');
    $('#account_step1').addClass('text-blue-400 underline');
    $('#account_step2').removeClass('text-blue-400 underline');

    resetParamsStep2();
});
$('#account_step2').on('click', function () {
    $('#account__account').addClass('hidden');
    $('#account__password').removeClass('hidden');
    $('#account_step2').addClass('text-blue-400 underline');
    $('#account_step1').removeClass('text-blue-400 underline');

    resetParamsStep1();
})

function resetParamsStep1() {

    step1 = false;
    step2 = true;
    firstname = $('input[name="first_name"]').val("");
    lastname = $('input[name="last_name"]').val("");
    mail = $('input[name="mail"]').val("");
    avatar = $('input[name="file"]').val("");
}
function resetParamsStep2() {

    step1 = true;
    step2 = false;
    cur_pass = $('input[name="current_password"]').val("");
    new_pass = $('input[name="new_password"]').val("");
    repeat_pass = $('input[name="repeat_password"]').val("");
}

function error(message) {
    $('#account_password_error').removeClass('hidden');
                    $('#account_password_error').html('');
                    $('#account_password_error').html(message);
                    $('#account_password_error').animate({
                        opacity: '1'
                    })
}

$('#settings_submit').on('click', function () {

    if (step1) {
        
    }
    if (step2) {

        
            //If passwords are not empty and doesn't match
            if(($('input[name="new_password"]').val() != "") && ($('input[name="repeat_password"]').val() != "")){
                if ($('input[name="new_password"]').val() != $('input[name="repeat_password"]').val()) {
                    error('The passwords doesn\'t match');
                } else{
                    $.ajax({
                        type: 'POST',
                        url: '/account/settings/check',
                        data: {select: 'check_pass', pass: '123'},
                        success: function (result) {
                            if (result) {
                                
                            } else {
                                
                            }
                        }
                    });
                } 
            }else{
                error('The fields can\'t be empty');
            }
        
    }


});


