import $, { data } from 'jquery';

export default function rate() {

    var check = false


    const emojis = [
        '&#10024',
        '&#128577',
        '&#128528',
        '&#128578',
        '&#128512',
        '&#128525'
    ]
    const rating = [
        'Rating',
        'Very Bad',
        'Bad',
        'Good',
        'Very Good',
        'Excellent !'
    ]

    $('.star').on('mouseenter', function () {
        if (!check) {
            const rate = $('#' + this.id).data('rate');

            $('#emoji').html(emojis[rate]);
            $('#rating').html(rating[rate]);

            for (let index = 1; index <= 5; index++) {
                if (index <= rate) {
                    $('#star-' + index).children('i').removeClass('bi-star');
                    $('#star-' + index).children('i').addClass('bi-star-fill');
                } else {
                    $('#star-' + index).children('i').removeClass('bi-star-fill');
                    $('#star-' + index).children('i').addClass('bi-star');
                }
            }
        }
    })
    $('.star').on('mouseout', function () {

        if (!check) {
            const rate = $('#' + this.id).data('rate');


            $('#emoji').html(emojis[0]);
            $('#rating').html(rating[0]);
            for (let index = 1; index <= 5; index++) {

                $('#star-' + index).children('i').removeClass('bi-star-fill');
                $('#star-' + index).children('i').addClass('bi-star');

            }
        }
    })

    $('.star').on('click', function () {

        check = true;
        const rate = $('#' + this.id).data('rate');

        $('#emoji').html(emojis[rate]);
        $('#rating').html(rating[rate]);
        $('#vote_send').animate({
            opacity: '1'
        });

        for (let index = 1; index <= 5; index++) {
            if (index <= rate) {
                $('#star-' + index).children('i').removeClass('bi-star');
                $('#star-' + index).children('i').addClass('bi-star-fill');
            } else {
                $('#star-' + index).children('i').removeClass('bi-star-fill');
                $('#star-' + index).children('i').addClass('bi-star');
            }
        }


        $('#vote_send').on('click', function () {
            const id_show = $('#vote_send').children('button').data('show_id');
            $.ajax({
                type: 'POST',
                url: '/sendVote',
                data: { rate: rate,id_show:id_show },
                success: function (res) {
                    
                    if (res['query']) {
                        $('#setRate').addClass('hidden');
                        $('#vote_send').addClass('hidden');
                        $('#thankYou').removeClass('hidden');
                        $('#thankYou').animate({
                            opacity:'1'
                        })
                    }else{
                        
                    }
                }
            });
        })
    })


}





