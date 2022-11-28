
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
    $('#account_password_message').removeClass();
    $('#account_password_message').addClass('opacity-0 mx-auto lg:w-1/2 mt-3 mb-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative')
    $('#account_password_message').html('');
    $('#account_password_message').html(message);
    $('#account_password_message').animate({
        opacity: '1'
    })
}

function success(message) {

    $('#account_password_message').removeClass();
    $('#account_password_message').addClass('opacity-0 mx-auto lg:w-1/2 mt-3 mb-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative')
    $('#account_password_message').html('');
    $('#account_password_message').html(message);
    $('#account_password_message').animate({
        opacity: '1'
    })

}

$('#settings_submit').on('click', function () {

    if (step1) {

        let success = false;
        if ($('input[name="first_name"]').val() != '') {
            $.ajax({
                type: 'POST',
                url: '/account/settings/check',
                data: { select: 'update_firstname', value: $('input[name="first_name"]').val() },
                success: function (result) {
                   success=true;
                }
            });
        }
        if ($('input[name="last_name"]').val() != '') {
            $.ajax({
                type: 'POST',
                url: '/account/settings/check',
                data: { select: 'update_lastname', value: $('input[name="last_name"]').val() },
                success: function (result) {
                    success=true;
                }
            });
        }
        if ($('input[name="mail"]').val() != '') {
            $.ajax({
                type: 'POST',
                url: '/account/settings/check',
                data: { select: 'update_mail', value: $('input[name="mail"]').val() },
                success: function (result) {
                    success=true;
                }
            });
        }
        if ($('input[name="file"]').val() != '') {
            $.ajax({
                type: 'POST',
                url: '/account/settings/check',
                data: { select: 'update_avatar', value: $('input[name="file"]').val() },
                success: function (result) {
                    success=true;
                }
            });
        }

        success ? success('Your credentials has been changed') : '';
    }
    if (step2) {
        //If passwords are not empty and doesn't match
        if (($('input[name="new_password"]').val() != "") && ($('input[name="repeat_password"]').val() != "") && ($('input[name="current_password"]').val() != "")) {
            if ($('input[name="new_password"]').val() != $('input[name="repeat_password"]').val()) {
                error('The passwords doesn\'t match');
            } else {
                const new_pass = $('input[name="new_password"]').val();
                //Send the new password and check if is the current password
                $.ajax({
                    type: 'POST',
                    url: '/account/settings/check',
                    data: { select: 'check_pass', pass: new_pass },
                    success: function (result) {
                        const exist = result['result'];
                        if (exist) {
                            error('You are currently using this password')
                        } else {
                            $.ajax({
                                type: 'POST',
                                url: '/account/settings/check',
                                data: { select: 'update_pass', pass: new_pass },
                                success: function (result) {
                                    success('Your password has been changed successfully!')
                                }
                            });
                        }
                    }
                });
            }
        } else {
            error('The fields can\'t be empty');
        }

    }


});


