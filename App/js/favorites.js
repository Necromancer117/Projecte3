import $ from 'jquery';

export default function favorites() {}

$('.favorite').click(function(){

    var id_show = this.id;

    $.ajax({
        type: 'POST',
        url: '/favorites',
        data: { value: id_show },
        success: function (result) {
            console.log(result);
        }
    });
})


