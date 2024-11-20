var urlId = null;
var page = 0;
var etag = 0;
var chatInterval = null;
var menuInterval = null;
var lastCallThrottle;
var timeoutDebounce = null;

function debounce(func, wait, immediate) {

    return function () {
        var context = this, args = arguments;
        var later = function () {
            timeoutDebounce = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeoutDebounce;
        clearTimeout(timeoutDebounce);
        timeoutDebounce = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

function throttle(func, interval) {
    return function () {
        var now = Date.now();
        if (lastCallThrottle + interval < now) {
            lastCallThrottle = now;
            return func.apply(this, arguments);
        }
    };
}

async function loadPage(id, page_nb = page) {
    let returnData = null;
    await $.ajax({
        url: '/chat/' + id + '/' + page_nb,
        type: 'GET',
        success: function (data) {
            returnData = data;
        }
    });
    return returnData;
}

function updateMenu() {
    $.ajax({
        url: '/menu/' + $("#search_convo").val(),
        type: 'GET',
        success: function (data) {
            $('#convos_cntr').html(data);
        }
    });
}

function periodiclyUpdateMenu() {
    updateMenu();
    if (menuInterval != null) clearInterval(menuInterval);
    menuInterval = setInterval(() => updateMenu(), 8000);
}

async function updateChat(id) {
    await $.ajax({
        url: '/update/' + id + '/' + etag,
        type: 'GET',
        success: async function (data) {
            newEtag = parseInt(data['etag']);
            chatroom = data['chatroom'];

            if (newEtag == undefined || chatroom == undefined) {
                return;
            }

            let title = $("#chat_title").text();
            if (title != chatroom['name'])
                $("#chat_title").text(chatroom['name']);

            let settings_title = $("#settings_title").text();
            if (settings_title != chatroom['name'])
                $("#settings_title").text(chatroom['name']);

            if (newEtag != etag) {

                $page = await loadPage(id);

                let sliceVal = 0 - (newEtag - etag);
                $('#chat_messages_cntr').children().slice(sliceVal, sliceVal).prevObject.remove().end();
                $('#chat_messages_cntr').append($page);
                $('#chat_messages_cntr').scrollTop($('#chat_messages_cntr')[0].scrollHeight);

                etag = newEtag;
            }
            else {
                if (etag == 0 && $('#chat_messages_cntr .message').length == 0) {
                    $('#chat_messages_cntr').html(
                        $("<div>").attr("class", "no_message").text("Démarrez la conversation !")
                    );
                }
            }
        }
    });
}

function periodiclyUpdateChat(id) {
    if (chatInterval != null) clearInterval(chatInterval);
    chatInterval = setInterval(() => updateChat(id), 4000);
}

async function sendMessage(id, message,image=0) {
    await $.ajax({
        url: '/sendchat/' + id,
        type: 'POST',
        data: {
            "message": message,
            "_token": $('meta[name="csrf-token"]').attr('content'),
            image:image
        },
        success: function (data) {
            $(".convo_card-" + id).find('.convo_last').html(message);
        }
    });
}

async function changeChat(id, immediate = false) {

    urlId = id;
    page = 0;

    debounce(async function () {

        if (chatInterval != null)
            clearInterval(chatInterval);

        etag = 0;
        window.history.pushState("", "", '/messages/' + id);

        $("#chat_messages_cntr").off('scroll');

        $('#chat_cntr').css('display', 'flex');
        $('#menu_cntr').removeClass('active');
        if (!$('#chat_cntr').hasClass('active')) $('#chat_cntr').addClass('active');

        $("#chat_title").text('');
        $("#settings_title").text('');
        let spinner = $("<div>").attr("class", "loader");
        $('#chat_messages_cntr').html(spinner);

        let update = updateChat(id);
        $("#chat_cntr").show();
        $("#chat_settings_cntr").hide();
        await update;
        $("#chat_messages_cntr").scrollTop($('#chat_messages_cntr')[0].scrollHeight);
        periodiclyUpdateChat(id);

        $("#message_input").off('keypress');
        $("#message_input").keypress(async function (e) {
            if (e.which == 13) {
                const message = $(this).val();
                if (message == '') return;

                $("#message_input").val('');
                await sendMessage(id, message);
                updateChat(id);
                updateMenu();
            }
        });
        $('#image_plus').off();
        $('#image_plus').on('click', function () {
            $('#fileInput').click();
        });
        $('#fileInput').off();
        $('#fileInput').on('change', function () {
            previewFile();
        });
        $('#form_img').off();
        $('#form_img').on('submit',function(e){
            e.preventDefault();
            var formData=new FormData();
            var file = document.querySelector('input[type=file]').files[0];
            formData.append('image',file)
            displayImage(formData,urlId);
        })

        $("#chat_messages_cntr").scroll(async function () {
            if ($(this).scrollTop() == 0) {

                let data = await loadPage(urlId, page + 1);
                let prev_height = $('#chat_messages_cntr')[0].scrollHeight;
                $('#chat_messages_cntr .separator').each((index, element) => {
                    if (data.includes($(element).text().trim())) {
                        $(element).remove();
                    }
                });
                $('#chat_messages_cntr').prepend(data);
                let new_height = $('#chat_messages_cntr')[0].scrollHeight;
                $('#chat_messages_cntr').scrollTop(new_height - prev_height);

                if (data.length > 0) {
                    page += 1;
                }
            }
        });

        loadSettings(id);
    }, 500, immediate)();
};


async function displayImage(formData, id) {
    if (formData != null) {
        console.log(formData);
        formData.append('_token',$('meta[name="csrf-token"]').attr('content'));
         $.ajax({
            url: "/saveImage",
            method: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: async function (data) {
                await sendMessage(id, data,1)
            },
        });
    }
}
function checkFile(file) {
    const allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/bmp', 'image/webp'];
    if (allowedMimes.includes(file.type)) {
        if (file.size > 2000000) {
            alert('Image trop lourde')
        } else {
            //image is Ok
          //console.log($('#inputImage').files);
          $('#form_img').submit();

            //$('input[type="file"]').files=file;
            // $('#imageFeedback').text("");
            // let reader = new FileReader();

            // reader.onloadend = function () {
            //     displayImage($('#inputImage'), id);
            // }
            // reader.readAsDataURL(file);
            // return true;
        }
    } else {
        alert("Le fichier doit être une image");
    }
    return false;

}
function previewFile() {
    var preview = $(".img-preview");
    var file = document.querySelector('input[type=file]').files[0];
    checkFile(file);
}

$(document).ready(async function () {
    periodiclyUpdateMenu();

    let param_id = window.location.href.split('/').reverse()[0];
    urlId = parseInt(param_id) || null;
    if (urlId) {
        await changeChat(urlId);
    }
    else {
        $('#menu_cntr').addClass('active');
        $('#chat_cntr').css('display', 'none');
    }

    $(document).on('click', '.convo_card', async function () {
        const id = $(this).data('id');
        await changeChat(id);
    });

    $("#new_convo").click(function () {
        if ($("#relative_cntr").hasClass("hidden")) {
            $("#relative_cntr").removeClass("hidden");
            $(".search_suggestion input").focus();
        }

        if (!$("#content").hasClass("no_overflow")) {
            $("#content").addClass("no_overflow");
            $(".search_suggestion input").val("");
        }
    });

    $("#search_convo").keyup(function (e) {
        const query = $(this).val();
        if (e.which == 13) {
            updateMenu();
        }

        throttle(function () {
            updateMenu();
        }, 300)();
    });

    $(".search_suggestion").each(async function () {
        let filter_cntr = $(this);
        let suggestions = [];
        let selections_list = [];
        let timeout = null;

        $(this).children('input').keyup(function (e) {
            if (timeout != null)
                clearTimeout(timeout);

            let query = $(this).val();
            let suggestions_cntr = filter_cntr.find(".suggestions");

            async function updateSuggestions() {
                suggestions_cntr.empty();

                await $.ajax({
                    url: filter_cntr.data("url") + "/" + query,
                    type: "GET",
                    success: function (data) {
                        suggestions = data;
                    }
                });

                for (let i = 0; i < suggestions.length; i++) {

                    let elem = $("<span>").attr("class", "suggestion hover_darker no_select");
                    elem.append($("<img>").attr("src", suggestions[i]['profile_picture'] ? suggestions[i]['profile_picture'] : "/images/simple_flower.png").addClass(`profile_image ${suggestions[i]["personality"]}`));
                    elem.append($("<span>").text(`${suggestions[i]['first_name']} ${suggestions[i]['last_name']}`));
                    suggestions_cntr.append(elem);

                    elem.click(function () {
                        if (selections_list.includes(suggestions[i]["id"]))
                            return;

                        let selections = filter_cntr.find(".selections");
                        let selection = $("<span>").attr("class", `selection no_select tag color_tag tag_rmv hover_darker pointer ${suggestions[i]["personality"]}`).text(`${suggestions[i]['first_name']} ${suggestions[i]['last_name']}`);
                        selections.append(selection);
                        selections_list.push(suggestions[i]["id"]);

                        selection.click(function () {
                            selection.remove();
                            selections_list.splice(selections_list.indexOf(suggestions[i]["id"]), 1);
                        });

                        suggestions_cntr.empty();
                        filter_cntr.children('input').val("");
                        filter_cntr.children('input').focus();
                    })
                }
            }

            if (e.which == 13) {
                updateSuggestions();
                return;
            }

            timeout = setTimeout(async function () {
                await updateSuggestions();
            }, 300);
        });

        $("#close_popup_btn").click(function () {
            $("#relative_cntr").addClass("hidden");
            $("#content").removeClass("no_overflow");

            suggestions = [];
            selections_list = [];
            $(".search_suggestion input").val("");
            $("#users_selections").empty();
            $("#users_suggestions").empty();
        });

        $("#back_btn").click(function () {
            $("#menu_cntr").addClass("active");
            $("#chat_cntr").removeClass("active");
        });

        $("#info_btn").click(function () {
            $("#chat_settings_cntr").show();
            $("#chat_cntr").hide();
        });

        $("#close_btn").click(function () {
            $("#chat_cntr").show();
            $("#chat_settings_cntr").hide();
        });

        $("#newchat_btn").click(function () {
            if (selections_list.length == 0)
                return;

            $.ajax({
                url: $(this).data("url"),
                type: "POST",
                data: {
                    "ids": selections_list,
                    "_token": $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (parseInt(data) != NaN) {
                        updateMenu();
                        changeChat(data);
                        $("#relative_cntr").addClass("hidden");
                        $("#content").removeClass("no_overflow");
                        suggestions = [];
                        selections_list = [];
                        $(".search_suggestion input").val("");
                        $("#users_selections").empty();
                        $("#users_suggestions").empty();
                    }
                }
            });
        });
    });
});