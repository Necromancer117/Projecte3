import $ from 'jquery';

export default function favorites() {}

$('.favorite').click(function(){

    var id_show = this.id;

    if(!$('#'+id_show).hasClass('active')){
        $.ajax({
        type: 'POST',
        url: '/favorites',
        data: { selector:'add',value: id_show },
        success: function () {
            $('#'+id_show).addClass('active');
            $('#'+id_show).children().removeClass('text-white');
            $('#'+id_show).children().addClass('text-red-600')
        }
    });
    }else{
        $.ajax({
            type: 'POST',
            url: '/favorites',
            data: { selector:'remove',value: id_show },
            success: function () {
                $('#'+id_show).removeClass('active');
                $('#'+id_show).children().removeClass('text-red-600');
                $('#'+id_show).children().addClass('text-white')
            }
        });
    }
    
})



