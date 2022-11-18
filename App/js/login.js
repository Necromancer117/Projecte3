import $ from "jquery";

var show = false;
export  default function login() {
$('#show_pass').on('change',function () {
    show=!show;
    if (show) {
        $('#input_pass').attr('type', 'text');
    }else{
        $('#input_pass').attr('type', 'password');
    }
})
}
