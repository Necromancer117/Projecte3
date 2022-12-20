import $ from "jquery";

var show = false;

export default function creatorShowsDropdwon() {

    $('#cratorShowsButton').on('click', function () {
        show = !show;
        if (show) {
            $('#cratorShowsDropdwon').show();
        } else {
            $('#cratorShowsDropdwon').hide();
        }
    });

    $('a[data-role=edit]').on('click', function () {
        var id = $(this).data('id');
        var title = $('#'+id).children('td[data-target=title]').text;
        var type = $('#'+id).children('td[data-target=type]').text;
        var banner = $('#'+id).children('td[data-target=banner]').text;

        $('#title').val(title);
        $('#type').val(type);
        $('#banner').val(banner);
        $('#popUp').modal('toggle');
    });
}