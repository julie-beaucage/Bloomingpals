@php
    use Carbon\Carbon;
    $messages = $messages->values();
    
@endphp

@foreach ($messages as $index=>$message)

    @php
        Carbon::setLocale('fr');
        $date =  Carbon::parse($message->created_at);
        $now = Carbon::now();
        $date_string = null;
        $hasImage = true;
        $user = $users->where('id', $message->id_user)->first();
        $img = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
        $date_string = $date->format('H:i');
        
        if ($now->diff($date)->i < 1) {
            $date_string = "";
        }
        elseif ($index < count($messages) - 1) {
            $nextDate = Carbon::parse($messages[$index + 1]->created_at);

            if ($nextDate->diff($date)->i < 1) {
                $date_string = "";
            }
        }


        if ($index > 0) {
            $prevUser = $users->where('id', $messages[$index - 1]->id_user)->first();
            if ($user->id == $prevUser->id) {
                $hasImage = false;
            }
        }
        $content = $message->content;
        if($message->modify == 1){
            $content='<img src="'.asset($message->content).'" class="chat-img">';
        }else{
            $class = ($user->id == auth()->user()->id) ? 'link dark' : 'link';
            $content = preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank" class="' . $class. '">$1</a>', $content);
        }
        
    @endphp

    @if ($index == 0 || $date->isSameDay(Carbon::parse($messages[$index - 1]->created_at)) == false)
        <div class="separator">
            {{ ucfirst($date->translatedFormat('l j F Y')) }}
        </div>
    @endif

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