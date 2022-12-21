import $ from "jquery";
import QRCode from 'qrcode';

const editBtn = $('a[data-role=edit]');
const addBtn = $('a[data-role=addShow]');
const discardChanges = $('a[data-role=discardChanges]');
const discard = $('a[data-role=discard]');

const modalEdit = $("div[data-role=editModal]");

editBtn.on('click',function(){
    modalEdit.toggleClass("hidden");
})

discardChanges.on('click',function(){
    modalEdit.toggleClass("hidden");
})
discard.on('click',function(){
    modalEdit.toggleClass("hidden");
})

// ? WHEN PRESIONG THE ADD SHOW BUTTON
addBtn.on('click',function(){
    modalEdit.toggleClass("hidden");

    // * HIDE UNNESCESARY FIELDS
    $('#numContainer').addClass("hidden");
    $('#qrContainer').addClass("hidden");

    // * CAHNGE BUTTON APEARENCE
    $('a[data-role=add]').toggleClass("hidden");
    $('a[data-role=discard]').toggleClass("hidden");
    $('a[data-role=applyChanges]').toggleClass("hidden");
    $('a[data-role=discardChanges]').toggleClass("hidden");

    // * EMPTY THE PREVIUS SAVED TEXT
    $('#title').val('');
    $('#type').val('');
    $('#description').val('');
})


var show = false;

export default function creatorShows() {

    // ? SEE THE AVIABLE EDITIONS
    $('#cratorShowsButton').on('click', function () {
        show = !show;
        if (show) {
            $('#cratorShowsDropdwon').show();
        } else {
            $('#cratorShowsDropdwon').hide();
        }
    });
    
    // ? SEE THE EDIT BOX
    $('a[data-role=edit]').on('click', function () {
        // * GET THE ID CLICKED
        var id = $(this).data('id');

        // * GET ALL THE CHILDREN FORM SUCH ID
        var title = $('#'+id).children('td[data-target=title]').text(); 
        var type = $('#'+id).children('td[data-target=type]').text();
        var description = $('#'+id).children('td[data-target=description]').text();
        // var banner = $('#'+id).children('td[data-target=banner]').text();

        // * HASH DE ID
        var hash = btoa("show_"+id);
        var url = "http://fakecirc.psoual.me/vote/"+hash;

        // * CRATE THE DONWLOAD PATH
        $("#qr").attr("href","/creator/shows/print/"+id);

        // * FILL THE FIELDS IN EDIT BOX
        $('#num').html(id);
        $('#title').val(title);
        $('#type').val(type);
        $('#description').val(description);
        // $('#banner').val(banner);
        $('#hash').html(url);
    });

    // ? EDIT SHOW
    $('#applyChanges').on('click', function () {

        // * GET ALL THE FIELDS VALUES
        var id = $('#num').text();
        var title = $('#title').val();
        var type = $('#type').val();
        var description = $('#description').val();

        // * UPLOAD EVERYTHING TO THE CONTROLER
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

        // * HIDE THE BOX
        modalEdit.toggleClass("hidden");
    });


    // ? CHANGE EDITIONS
    $('a[data-role=year]').on('click', function () {
        // * GET THE SELECTED YEAR
        var year = $(this).data('id');

        // * UPLOAD THE SELECTED YEAR
        $.ajax({

            url       : '/creator/shows',
            method    : 'POST',
            data      : {year : year},
            success   : function (response) {

                        }
        })

    });

    // ? ADD NEW SHOW
    $('a[data-role=add]').on('click', function () {

        // * GET THE VARS
        var title = $('#title').val();
        var type = $('#type').val();
        var description = $('#description').val();
        var img = $('#banner').val();
        // ! var edition = $('#description').val();

        // * IF THE FILE IS CORRECT
        if (validateTypefile(img)) {

            // * UPLOD THE FILE
            $.ajax({
                url: '/creator/show/add/upload',
                async: false,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            // * GIVE SRC TO FILE
                .done(function (res) {
                    var result = JSON.parse(res);
                    $('#banner').attr('src','/img/shows/'+result['image']);
                    success = true;
                });
        }else{
            error('The image is not in <b>PNG</b> format');
        }

        $.ajax({

            url       : '/creator/shows/add',
            method    : 'POST',
            data      : {title : title, type : type, description : description, img : img},
            success   : function (response) {

                        }
        })

    });


}