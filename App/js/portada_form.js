import $ from "jquery";

export default function portada_form() {

    $('#select_message').on('change', function () {
        if ($('#select_message').val() == 'question') {
            $('#if_question').removeClass('hidden');
            $('#if_incident').addClass('hidden');
           
        } else if ($('#select_message').val() == 'incident') {
            $('#if_question').addClass('hidden');
            $('#if_incident').removeClass('hidden');
        }
    })

    $('#question').on('keypress', function () {
        if ($('#question').val() != "") {
            $('#question_submit').removeClass('hidden');
        } else {
            $('#question_submit').addClass('hidden');
        }
    })

    $('#incidence').on('keydown', function () {
        
        if (($('#incidence').val() != "") && ($('#incidence_show').val() != null)&&($('#incidence_location').val() != null)) {
        $('#incidence_submit').removeClass('hidden');
    } else {
        $('#incidence_submit').addClass('hidden');
    }
    })

    $('#question_submit').on('click',function(){
        const question = $('#question').val();
        const type = $('#select_message').val();
        
        $.ajax({
            type: 'POST',
            async: false,
            url: '/sendMessage',
            data: { message:question,type:type },
            success: function (result) {
                $('#form_content').addClass('hidden');
                $('#send_ok').removeClass('hidden');
                setTimeout(restore_form,3000);
            }
        });
    })

    $('#incidence_submit').on('click',function(){
        
        let incidence = $('#incidence').val();
        const type = $('#select_message').val();
        const show = $('#incidence_show').val();
        const location = $('#incidence_location').val();

        incidence = 'Show: '+show+' Location: '+location+"\nMessage: "+incidence
        console.log(type);
        $.ajax({
            type: 'POST',
            async: false,
            url: '/sendMessage',
            data: { message:incidence,type:type },
            success: function (result) {
                $('#form_content').addClass('hidden');
                $('#send_ok').removeClass('hidden');
                setTimeout(restore_form,3000);
            }
        });
    })

}

function restore_form() {
    $('#send_ok').addClass('hidden');
    $('#form_content').removeClass('hidden');
    
}