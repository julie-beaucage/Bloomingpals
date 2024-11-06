@extends("master")

@section("title", "Messages")

@section ("style")
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}" />
@endsection()

@section("content")
    <div id="messages_cntr">
        <div id="menu_cntr">
            <div id="search_cntr">
                <input type="text" id="search_convo" class="search_field" placeholder="Search" />
                <span id="new_convo" class="icon_btn hover_darker pointer no_select material-symbols-rounded">add_comment</span>
            </div>
            <div id="convos_cntr">
                @foreach ($chatRooms as $chatRoom)
                    @php
                        $image = $chatRoom['last_user'] && $chatRoom['last_user']->image_profil ? asset('storage/' . $chatRoom['last_user']->image_profil) : asset('/images/simple_flower.png');
                        $personality = $chatRoom['last_user']->getPersonalityType();
                    @endphp

                    <div class="convo_card hover_darker no_select" data-id="{{ $chatRoom['id'] }}">
                        <div class="convo_img">
                            <img src="{{ $image }}" alt="Photo de profil" class="profile_image {{$personality}}">
                        </div>
                        <div class="convo_info">
                            <div class="convo_name">{{ $chatRoom['name'] }}</div> <!-- Name -->
                            <div class="convo_last">
                                {{$lastMessage = $chatRoom['last_message'] ? $chatRoom['last_message']->content : ''}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="chat_cntr" ><!-- Chat View --></div>
    </div>
@endsection()

@section("script")
    <script src="{{ asset('js/messages.js') }}"></script>
@endsection()