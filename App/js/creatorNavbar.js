import $ from "jquery";

var show = false
export default function creatorNavBar() {

    $(function() {
        $('#avatar').on('click',function () {
            if (!show) {
                show=!show;
                $('#creatorDropDown').removeClass('hidden');
                $('.user_options').removeClass('hidden');
                $(".user_options").animate({
                    opacity: '1',
                    height: '170px',
                    width: '150px'
                });
            }
            else{
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
