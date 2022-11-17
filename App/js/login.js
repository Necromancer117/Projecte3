import $ from "jquery";

var show = false;
export  default function login() {
$('#show_pass').on('change',function () {
    show=!show;
    if (show) {
        $('#login_pass').attr('type', 'text');
    }else{
        $('#login_pass').attr('type', 'password');
    }
})
}
