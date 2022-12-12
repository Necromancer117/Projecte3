import $ from "jquery";

export default function portada_form() {

    $('#select_message').on('change', function () {
        if ($('#select_message').val() == 'question') {
            $('#if_question').removeClass('hidden');
            $('#if_incident').addClass('hidden');
            $('#question').on('keydown', function () {
                if ($('#question').val() != "") {
                    $('#question_submit').removeClass('hidden');
                } else {
                    $('#question_submit').addClass('hidden');
                }
            })
        } else if ($('#select_message').val() == 'incident') {
            $('#if_question').addClass('hidden');
            $('#if_incident').removeClass('hidden');

            $('#incidence').on('keydown', function () {
                if (($('#incidence').val() != "") && ($('#incidence_show').val() != null)&&($('#incidence_location').val() != null)) {
                $('#incidence_submit').removeClass('hidden');
            } else {
                $('#incidence_submit').addClass('hidden');
            }
            })
            
        }
    })

}