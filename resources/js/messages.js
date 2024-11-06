$(document).ready(function() {
    $(".convo_card").click(function() {
        const id = $(this).data('id');

        $.ajax({
            url: '/chat/' + id,
            type: 'GET',
            success: function(data) {
                $('#chat_cntr').html(data);

                $("#message_input").keypress(function(e) {
                    if(e.which == 13) {
                        const message = $(this).val();
            
                        $.ajax({
                            url: '/chata/' + id,
                            type: 'POST',
                            data: {
                                message: message
                            },
                            success: function(data) {
                                $('#chat_cntr').html(data);
                                $('#message_input').val('');
                            }
                        });
                    }
                });
            }
        });
    });
});