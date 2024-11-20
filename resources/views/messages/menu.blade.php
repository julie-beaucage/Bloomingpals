@if (count($chatRooms) == 0)
    <div class="no_convo">
        <div class="no_convo_text">Aucune conversation</div>
    </div>
@endif

@foreach ($chatRooms as $chatRoom)
    @php
        if ($chatRoom['last_user']->id == Auth::id()) {
            $image = $chatRoom['other_users'][0] && $chatRoom['other_users'][0]->image_profil ? asset('storage/' . $chatRoom['other_users'][0]->image_profil) : asset('/images/simple_flower.png');
        }
        else {
            $image = $chatRoom['last_user']->image_profil ? asset('storage/' . $chatRoom['last_user']->image_profil) : asset('/images/simple_flower.png');
        }
        $personality = $chatRoom['other_users'][0] ? $chatRoom['other_users'][0]->getPersonalityType() : '';
        
        $lastMessage = "";
        if ($chatRoom['last_message']) {
            $lastMessage .= ($chatRoom['last_user']->id == Auth::id()) ? 'Vous: ' : (count($chatRoom['other_users']) > 1 ? $chatRoom['other_users'][0]->first_name . ': ' : '');
            $lastMessage .= $chatRoom['last_message']->content;
        }

    @endphp

    <div id="convo-{{ $chatRoom['id'] }}" class="convo_card hover_darker no_select" data-id="{{ $chatRoom['id'] }}">
        <div class="convo_img">
            <img src="{{ $image }}" alt="" class="profile_image {{$personality}}">
        </div>
        <div class="convo_info">
            <div class="convo_name">{{ $chatRoom['name'] }}</div> <!-- Name -->
            <div class="convo_last">
                {{ $lastMessage }}
            </div>
        </div>
    </div>
@endforeach