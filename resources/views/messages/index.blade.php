@extends("master")

@section("title", "Messages")

@section ("style")
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}" />
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
            <div id="chat_messages_cntr">
                {{-- Chat --}}
            </div>
            <div id="chat_input_cntr">
                <input type="text" id="message_input" maxlength="200" class="search_field" placeholder="Type a message"/>
            </div>
        </div>
    </div>
@endsection()

@section("script")
    <script src="{{ asset('js/messages.js') }}"></script>
@endsection()