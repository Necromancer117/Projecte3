
import $ from 'jquery';

var step1 = true;
var step2 = false;

export default function accountSettings(){

}

$('#account_step1').on('click',function () {
    $('#account__password').addClass('hidden');
    $('#account__account').removeClass('hidden');
    $('#account_step1').addClass('text-blue-400 underline');
    $('#account_step2').removeClass('text-blue-400 underline');
});
$('#account_step2').on('click',function(){
    $('#account__account').addClass('hidden');
    $('#account__password').removeClass('hidden');
    $('#account_step2').addClass('text-blue-400 underline');
    $('#account_step1').removeClass('text-blue-400 underline');
})

$('#settings_submit').on('click',function () {
    
    const firstname = $('input[name="first_name"]').val();
    const lastname = $('input[name="last_name"]').val();
    const mail = $('input[name="mail"]').val();
    const avatar = $('input[name="file"]').val();


});


