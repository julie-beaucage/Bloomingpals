@php
    $messages = $messages->values();
@endphp

@foreach ($messages as $index=>$message)

    @php
        $date = new DateTime($message->created_at);
        $now = new DateTime();
        $date_string = null;
        $hasImage = true;
        $user = $users->where('id', $message->id_user)->first();
        $img = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');

        if ($now->diff($date)->days > 0) {
            $date_string = $date->format('d-m-Y');

            if ($index < count($messages) - 1) {
                $nextDate = new DateTime($messages[$index + 1]->created_at);
                
                if ($nextDate->diff($date)->d < 1) {
                    $date_string = "";
                }
            }
            else {
                if ($now->diff($date)->d < 1) {
                    $date_string = "";
                }
            }
        } 
        else {
            $date_string = $date->format('H:i');

            if ($index < count($messages) - 1) {
                $nextDate = new DateTime($messages[$index + 1]->created_at);
                
                if ($nextDate->diff($date)->i < 2) {
                    $date_string = "";
                }
            }
            else {
                if ($now->diff($date)->i < 2) {
                    $date_string = "";
                }
            }
        }


        if ($index > 0) {
            $prevUser = $users->where('id', $messages[$index - 1]->id_user)->first();
            if ($user->id == $prevUser->id) {
                $hasImage = false;
            }
        }

        $content = $message->content;
        $class = ($user->id == auth()->user()->id) ? 'link dark' : 'link';
        $content = preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank" class="' . $class. '">$1</a>', $content);
    @endphp

    <div class="message {{ $message->id_user == Auth::id() ? 'sent' : 'received' }}">
        @if ($user->id != auth()->user()->id && $hasImage)
            <a class="message_user no_select" href="/profile/{{$user->id}}">
                <img src="{{ $img }}" alt="" class="profile_image {{ $user->getPersonalityType() }}">
                <span class="message_username">{{ $user->first_name }} {{ $user->last_name }}</span>
            </a>
        @endif
        <div class="message_content">
            <span class="message_text">{!! $content !!}</span>
        </div>
        @if ($date_string)
            <span class="message_date">{{ $date_string }}</span>
        @endif
    </div>
@endforeach