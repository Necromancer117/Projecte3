import $ from "jquery";
var show = false
export default function login() {
$(document).ready(function() {
   //$('#user_options').css();

   //Toggle dropdown when click on avatar
    $('#avatar').on('click',function () {
     if (!show) {
        //$('#user_options').removeClass('invisible');
        show=!show;
        $('.item').removeClass('hidden');
        $('.user_options').removeClass('hidden');
        $(".user_options").animate({
            opacity: '1',
            height: '170px',
            width: '150px'
          });
          
     }else{
        $('.item').addClass('hidden');
        show=!show;
         $(".user_options").animate({
            opacity: '0',
            height: '0px',
            width: '0px'
          });
        //$('#user_options').addClass('invisible');
     }
   });
});
}
