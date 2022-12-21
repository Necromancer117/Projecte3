import $ from "jquery";
import QRCode from 'qrcode';

const editBtn = $('a[data-role=edit]');
const discardChanges = $('a[data-role=discardChanges]');

const modalEdit = $("div[data-role=editModal]");

editBtn.on('click',function(){
    modalEdit.toggleClass("hidden");
})

discardChanges.on('click',function(){
    modalEdit.toggleClass("hidden");
})


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
        var title = $('#'+id).children('td[data-target=title]').text(); 
        var type = $('#'+id).children('td[data-target=type]').text();
        var description = $('#'+id).children('td[data-target=description]').text();
        // var banner = $('#'+id).children('td[data-target=banner]').text();
        var hash = btoa("show_"+id);
        var url = "http://projecte3.local/vote/"+hash;

        
        $("#qr").attr("href","/creator/shows/print/"+id);

        $('#num').html(id);
        $('#title').val(title);
        $('#type').val(type);
        $('#description').val(description);
        // $('#banner').val(banner);
        $('#hash').html(url);
    });

    $('#save').on('click', function () {
        var id = $('#num').text();
        var title = $('#title').val();
        var type = $('#type').val();
        var description = $('#description').val();

        $.ajax({

            url       : '/creator/shows/update',
            method    : 'POST',
            data      : {id : id, title : title, type : type, description : description},
            success   : function (response) {
                            $('#'+id).children('td[data-target=title]').text(title); 
                            $('#'+id).children('td[data-target=type]').text(type);
                            $('#'+id).children('td[data-target=description]').text(description);
                        }
        })

        modalEdit.toggleClass("hidden");
    });



}