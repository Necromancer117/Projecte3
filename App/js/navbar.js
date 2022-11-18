var show = false
export default function login() {
$(document).ready(function() {
   //$('#user_options').css();
    $('#avatar').on('click',function () {
     if (!show) {
        //$('#user_options').removeClass('invisible');
        show=!show;
        $('.item').removeClass('invisible');
        $("#user_options").animate({
            opacity: '1',
            height: '120px',
            width: '150px'
          });
          
     }else{
        $('.item').addClass('invisible');
        show=!show;
         $("#user_options").animate({
            opacity: '0',
            height: '0px',
            width: '0px'
          });
        //$('#user_options').addClass('invisible');
     }
   });
});
}
