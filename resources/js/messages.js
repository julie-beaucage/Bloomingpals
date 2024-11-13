const { parse } = require("postcss");

var page = 0;
var etag = 0;
var chatInterval = null;
var menuInterval = null;

function throttle(func, interval) {
    var lastCall = 0;
    return function() {
        var now = Date.now();
        if (lastCall + interval < now) {
            lastCall = now;
            return func.apply(this, arguments);
        }
    };
}

async function loadPage(id) {
    var returnData = null;
    await $.ajax({
        url: '/chat/' + id + '/' + page,
        type: 'GET',
        success: function(data) {
            returnData = data;
        }
    });
    return returnData;
}

function updateMenu() 
{ 
    $.ajax({
        url: '/menu/' + $("#search_convo").val(),
        type: 'GET',
        success: function(data) {
            $('#convos_cntr').html(data);
            console.log(data);
        }
    });
}

function periodiclyUpdateMenu() {
    updateMenu();
    if (menuInterval != null) clearInterval(menuInterval);
    menuInterval = setInterval(() => updateMenu(), 8000);
}

function updateChat(id) {
    $.ajax({
        url: '/update/' + id + '/' + etag,
        type: 'GET',
        success: async function(data) {
            newEtag = parseInt(data);

            if (!isNaN(newEtag) && newEtag != undefined && newEtag != etag) {

                $page = await loadPage(id);
    
                let sliceVal = 0 - (newEtag - etag);
                $('#chat_messages_cntr').children().slice(sliceVal, sliceVal).prevObject.remove().end();
                $('#chat_messages_cntr').append($page);
                $('#chat_messages_cntr').scrollTop($('#chat_messages_cntr')[0].scrollHeight);

                etag = newEtag;
            }
        }
    });
}

function periodiclyUpdateChat(id) {
    updateChat(id);
    if (chatInterval != null) clearInterval(chatInterval);
    chatInterval = setInterval(() => updateChat(id), 4000);
}

async function sendMessage(id, message) {
    await $.ajax({
        url: '/sendchat/' + id,
        type: 'POST',
        data: {
            "message": message,
            "_token": $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            $(".convo_card-" + id).find('.convo_last').html(message);
        }
    });
}

async function changeChat(id) {
    if (chatInterval != null)
        clearInterval(chatInterval);

    etag = 0;
    window.history.pushState("", "", '/messages/' + id);

    $('#menu_cntr').removeClass('active');
    if (!$('#chat_cntr').hasClass('active')) $('#chat_cntr').addClass('active');
    
    $('#chat_messages_cntr').html('');
    $('#chat_messages_cntr').prepend(await loadPage(id));
    $('#chat_messages_cntr').scrollTop($('#chat_messages_cntr')[0].scrollHeight);
    periodiclyUpdateChat(id);

    $("#message_input").off('keypress');
    $("#message_input").keypress(function(e) {
        if(e.which == 13) {
            const message = $(this).val();
            if (message == '') return;
        
            throttle(async function() {
                $("#message_input").val('');
                await sendMessage(id, message);
                updateChat(id);
                updateMenu();
            }, 200)();
        }
    });
};

$(document).ready(async function() {
    periodiclyUpdateMenu();

    let param_id = window.location.href.split('/').reverse()[0];
    let parsed_id = parseInt(param_id) || null;
    if (parsed_id) {
        await changeChat(parsed_id);
    }
    else {
        $('#menu_cntr').addClass('active');
    }

    $(document).on('click', '.convo_card', async function() {
        const id = $(this).data('id');
        await changeChat(id);
    });

    $("#new_convo").click(function() {
        if ($("#relative_cntr").hasClass("hidden")) {
            $("#relative_cntr").removeClass("hidden");
            $(".search_suggestion input").focus();
        }

        if (!$("#content").hasClass("no_overflow")) {
            $("#content").addClass("no_overflow");
            $(".search_suggestion input").val("");
        }
    });

    $("#close_popup_btn").click(function() { 
        $("#relative_cntr").addClass("hidden");
        $("#content").removeClass("no_overflow");
    });

    $("#search_convo").keypress(function(e) {
        if (e.which == 13) {
            updateMenu();
            $("#search_convo").val("");
        }
    });

    $(".search_suggestion").each(async function() {
        let filter_cntr = $(this);
        let suggestions = [];
        let selections_list = [];
        let timeout = null;
        
        $(this).children('input').keyup(function() {
            if (timeout != null)
                clearTimeout(timeout);
        
            let query = $(this).val();
            let suggestions_cntr = filter_cntr.find(".suggestions");
            
            timeout = setTimeout(async function() {

                await $.ajax({
                    url: filter_cntr.data("url") + "/" + query,
                    type: "GET",
                    success: function(data) {
                        suggestions = data;
                    }
                });

                suggestions_cntr.empty();

                for (let i = 0; i < suggestions.length; i++) {

                    let elem = $("<span>").attr("class", "suggestion hover_darker no_select").text(`${suggestions[i]['first_name']} ${suggestions[i]['last_name']}`);
                    suggestions_cntr.append(elem);
    
                    elem.click(function() {
                        if (selections_list.includes(suggestions[i]["id"]))
                            return;
    
                        let selections = filter_cntr.find(".selections");
                        let selection = $("<span>").attr("class", "selection no_select tag tag_rmv hover_darker pointer").text(`${suggestions[i]['first_name']} ${suggestions[i]['last_name']}`);
                        selections.append(selection);
                        selections_list.push(suggestions[i]["id"]);
                        
                        selection.click(function() {
                            selection.remove();
                            selections_list.splice(selections_list.indexOf(suggestions[i]["id"]), 1);
                        });
    
                        suggestions_cntr.empty();
                        filter_cntr.children('input').val("");
                        filter_cntr.children('input').focus();
                    })
                }
            }, 200);
        });

        $("#newchat_btn").click(function() {
            if (selections_list.length == 0)
                return;

            $.ajax({
                url: $(this).data("url"),
                type: "POST",
                data: {
                    "ids": selections_list,
                    "_token": $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (parseInt(data) != NaN) {
                        console.log(data);
                        changeChat(data);
                        $("#relative_cntr").addClass("hidden");
                        $("#content").removeClass("no_overflow");
                        let suggestions = [];
                        let selections_list = [];
                        $(".search_suggestion input").val("");
                        $("#users_selections").empty();
                    }
                }
            });
        });
    });
});