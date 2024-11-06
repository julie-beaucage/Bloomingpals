function loadChat(id) {
    $.ajax({
        url: '/chat/' + id,
        type: 'GET',
        success: function(data) {
            $('#chat_cntr').html(data);
            $("#chat_messages_cntr").scrollTop($("#chat_messages_cntr")[0].scrollHeight);
            $('#chat_cntr').css("visibility", "visible");

            $("#message_input").keypress(function(e) {
                if(e.which == 13) {
                    const message = $(this).val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/chata/' + id,
                        type: 'POST',
                        data: {
                            message: message
                        },
                        success: function(data) {
                            loadChat(id);
                            $(".convo_card-" + id).find('.convo_last').html(message);
                        }
                    });
                }
            });
        }
    });
}

$(document).ready(function() {

    $('#chat_cntr').css("visibility", "hidden");

    let param_id = window.location.href.split('/').reverse()[0];
    let parsed_id = parseInt(param_id) || null;
    if (parsed_id) {
        loadChat(parsed_id);
    }

    $(".convo_card").click(function() {
        const id = $(this).data('id');
        window.history.pushState("", "", '/messages/' + id);
        loadChat(id);
    });
});