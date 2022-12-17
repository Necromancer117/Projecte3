import $ from "jquery";

var show = false;

export default function cratorNavBar() {
    $('#creatorDropDown').show();

    $('#profileImage').on('click', function () {
        show = !show;
        if (show) {
            $('#creatorDropDown').show();
        } else {
            $('#creatorDropDown').hide();
        }
    })
}