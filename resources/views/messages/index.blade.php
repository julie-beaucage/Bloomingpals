@extends("master")

@section("title", "Messages")

@section ("style")
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}" />
@endsection()

@section("content")
    <div id="relative_cntr" class="hidden">
        <div id="absolute_cntr">
            <div class="popup_cntr">
                <div class="header">
                    <span class="title">Nouvelle conversation</span>
                    <span id="close_popup_btn" class="material-symbols-rounded no_select pointer">close</span>
                </div>

                <div class="content">
                    <div class="filter_cntr search_suggestion search_selection" data-url="/searchUsers">
                        <input id="users_search" type="text" class="search_suggestion_input search_field" placeholder="Rechercher">
                        <div id="users_selections" class="selections"></div>
                        <div id="users_suggestions" class="suggestions"></div>
                    </div>
                    <input id="newchat_btn" type="submit" value="Créer" class="btn_primary no_select" data-url="/newChat"/>
                </div>
            </div>
        </div>
    </div>
    <div id="messages_cntr">
        <div id="menu_cntr">
            <div id="search_cntr">
                <input type="text" id="search_convo" class="search_field" placeholder="Search" />
                <span id="new_convo" class="icon_btn hover_darker pointer no_select material-symbols-rounded">add_comment</span>
            </div>
            <div id="convos_cntr">
                {{-- $menu --}}
            </div>
        </div>
        <div id="chat_cntr" >
            <div id="chat_header">
                <span id="info_btn" class="material-symbols-rounded no_select pointer icon_btn hover_darker" id="back_btn">info</span>
                <h1 id="chat_title"></h1>
                <span id="back_btn" class="material-symbols-rounded no_select pointer icon_btn hover_darker" id="back_btn">arrow_back</span>
            </div>
            <div id="chat_messages_cntr">
                {{-- Chat --}}
            </div>
            <div id="chat_input_cntr">
                <input type="text" id="message_input" maxlength="200" class="search_field" placeholder="Envoyer un message"/>
            </div>
        </div>
        <div id="chat_settings_cntr" style="display: none">
            <div id="settings_header">
                <h1 id="settings_title"></h1>
                <span id="close_btn" class="material-symbols-rounded no_select pointer icon_btn hover_darker" id="back_btn">close</span>
            </div>
            <div id="settings_cntr">
            </div>
        <div>
    </div>
@endsection()

@section("script")
    <script>
        function updateMenu(search = false) 
        { 
            let searchValue = search ? $('#search_convo').val() : '';
            $.ajax({
                url: '/menu/' + searchValue,
                type: 'GET',
                success: function(data) {
                    $('#convos_cntr').html(data);
                }
            });
        }

        async function loadSettings(id) {

            $("#settings_cntr").empty();
            
            let info = null;

            await $.ajax({
                url: "/info/" + id,
                method: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    info = data;
                },
                error: function(err) {
                    console.log(err);
                }
            });

            if (info == null) {
                return;
            }

            if (info['users'].length > 1) {
                $("#settings_cntr").append(`
                    <div id="name_field">
                        <span class="field_title">Changez le nom de la conversation</span>
                        <input type="text" id="name_input" class="search_field" placeholder="Nom" value="${info["chatroom"].name}"/>
                    </div>
                `);

                $("#settings_cntr").append(`
                    <div id="members_field">
                        <span class="field_title">Membres du groupe (${info['users'].length + 1})</span>
                        <div id="members_cntr">
                            <div id="members">
                            </div>
                            ${(info['users'].length > 3) ? '<span id="see_more" class="hover_darker">Voir plus</span>' : ''}
                        </div>
                    </div>
                `);

                await $.ajax({
                    url: "/chatMembers/" + id,
                    method: "GET",
                    success: function(data) {
                        $("#members").append(data);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }

            $("#settings_cntr").append(`
                <div id="leave_field">
                    <span class="field_title">Quitter la conversation</span>
                    <input type="submit" id="leave_btn" class="btn_primary no_select" value="Quitter"/>
                </div>
            `);

            $("#see_more").click(function() {
                $("#members").toggleClass("expanded");
                $("#see_more").text($("#members").hasClass("expanded") ? "Voir moins" : "Voir plus");
            });

            $("#name_input").on("focusout", function() {
                let name = $("#name_input").val();
                if (name != info["chatroom"].name) {
                    $.ajax({
                        url: "/changeChatName/" + id,
                        method: "POST",
                        data: {
                            id: id,
                            name: name,
                            "_token": $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $("#chat_title").text(name);
                            console.log(data);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });

            $("#leave_btn").click(function() {
                $.ajax({
                    url: "/leaveChat/" + id,
                    method: "POST",
                    data: {
                        id: id,
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data);
                        $("#chat_settings_cntr").hide();
                        $('#chat_cntr').css('display', 'none');
                        $('#menu_cntr').addClass('active');
                        window.history.pushState("", "", '/messages');
                        updateMenu();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        }
    </script>
    <script src="{{ asset('js/messages.js') }}"></script>
@endsection()