import $, { data } from 'jquery';

export default function rate() {

    var check = false

    //Emojis
    const emojis = [
        '&#10024',
        '&#128577',
        '&#128528',
        '&#128578',
        '&#128512',
        '&#128525'
    ]
    //Rating text
    const rating = [
        'Rating',
        'Very Bad',
        'Bad',
        'Good',
        'Very Good',
        'Excellent !'
    ]

    //Change icon when mouse enter of star
    $('.star').on('mouseenter', function () {
        if (!check) {
            const rate = $('#' + this.id).data('rate');

            $('#emoji').html(emojis[rate]);
            $('#rating').html(rating[rate]);
            //Fill stars before current star
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
    //Reset stars
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
    //Fill stars when click
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

        //Send vote
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





