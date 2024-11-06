<div id="chat_messages_cntr">
@foreach ($messages as $message)

    @php
        $date = new DateTime($message->created_at);
        $now = new DateTime();

        if ($now->diff($date)->days > 0) {
            $date = $date->format('d/m/Y');
        } else {
            $date = $date->format('H:i');
        }
    @endphp

    <div class="message {{ $message->id_user == Auth::id() ? 'sent' : 'received' }}">
        <div class="message_content">
            <span class="message_text">{{ $message->content }}</span>
        </div>
        <span class="message_date">{{ $date }}</span>
    </div>
@endforeach
</div>

<div id="chat_input_cntr">
    <input type="text" id="message_input" class="search_field" placeholder="Type a message"/>
</div>