@php
use App\Models\User_Interest; 
use App\Models\Interest;
use App\Models\Category_Interest;
use Illuminate\Support\Facades\Auth;
@endphp
@php
    $image = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
    $tags = "";
    $user_interests = User_Interest::where('id_user', $user->id)->get();
    $userPersonality = $user->getPersonalityGroup();
    $userPersonalityType = $user->getPersonalityType();
    $affinity = round(Auth::user()->affinity($user_interests->pluck('id_interest')) * 100);
    $route = route("profile", ["id" => $user->id]);
@endphp

<div class="card_long no_select hover_darker {{ isset($userPersonality) ? $userPersonality : '' }}">
    <div class="banner {{ isset($userPersonality) ? $userPersonality : '' }}">
        <img src="{{ $image }}" alt="Image de profile de {{ $user->first_name }} {{ $user->last_name }}">
    </div>
    <div class="content">
        <a class="header" href="{{ $route }}">
            <div class="text_nowrap name_cntr">
                <span class="name">{{ $user->first_name }} {{ $user->last_name }}</span>
            </div>
        </a>
        <div class="infos">
            <span>{{ $affinity }}% d'affinité avec vous</span>
            @if(isset($actionButtons)) 
                @if($user->id == Auth::user()->id)
                    <div class="action_buttons">
                        {!! $actionButtons !!}
                    </div>
                @endif
            @else
              {!! btn_setUpFriend(auth()->id(), $user->id) !!}
            @endif
        </div>
        <div id="friend-options" class="friend-options-dropdown">
            <ul>
                <li><a href="{{ route('RemoveFriend', ['id' => $user->id]) }}">Retirer l'ami(e)</a></li>
            </ul>
        </div>
    </div>
</div>
