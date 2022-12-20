import $ from "jquery";

var show = false;

export default function creatorNavBar() {

    $('#profileImage').on('click', function () {
        show = !show;
        if (show) {
            $('#creatorDropDown').show();
        } else {
            $('#creatorDropDown').hide();
        }
    })
}