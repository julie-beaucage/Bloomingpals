<div id="chat_messages_cntr">
@foreach ($messages as $index=>$message)

    @php
        $date = new DateTime($message->created_at);
        $now = new DateTime();
        $date_string = null;

        if ($now->diff($date)->days > 0) {
            $date_string = $date->format('d/m/Y');
        } else {
            $date_string = $date->format('H:i');
        }

        if ($index < count($messages) - 1) {
            $nextDate = new DateTime($messages[$index + 1]->created_at);
            
            if ($nextDate->diff($date)->i < 2) {
                $date_string = "";
            }
        }

        $user = $users->where('id', $message->id_user)->first();
        $img = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
    @endphp

    <div class="message {{ $message->id_user == Auth::id() ? 'sent' : 'received' }}">
        @if ($user->id != auth()->user()->id)
            <div class="message_user no_select">
                <img src="{{ $img }}" alt="Photo de profil" class="profile_image {{ $user->getPersonalityType() }}">
                <span class="message_username">{{ $user->first_name }} {{ $user->last_name }}</span>
            </div>
        @endif
        <div class="message_content">
            <span class="message_text">{{ $message->content }}</span>
        </div>
        @if ($date_string)
            <span class="message_date">{{ $date_string }}</span>
        @endif
    </div>
@endforeach
</div>

<div id="chat_input_cntr">
    <input type="text" id="message_input" class="search_field" placeholder="Type a message"/>
</div>