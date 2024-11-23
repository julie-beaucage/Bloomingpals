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
    $count = count($user_interests);
    $userPersonality = $user->getPersonalityGroup();
    $userPersonalityType = $user->getPersonalityType();
    $affinity = round(Auth::user()->affinity($user_interests->pluck('id_interest')) * 100);
    $route = route("profile", ["id" => $user->id]);

    /*usort($usersWithAffinity, function ($a, $b) {
        return $b->affinity - $a->affinity; 
    });*/
    foreach ($user_interests->take(2) as $user_interest) {
        $interest = Interest::find($user_interest->id_interest);
        if ($interest) {
            $tags .= '<span class="tag" style="background-color: var(--category-' . $interest->id_category . ')">' . $interest->name . '</span>';
        }
    }

    if ($count > 2) {
        $tags .= '<span class="tag square_tag">+' . ($count - 2) . '</span>';
    }

@endphp

<a class="card_long no_select hover_darker {{ isset($userPersonality) ? $userPersonality : '' }}" href="{{ $route }}">
    <div class="banner {{ isset($userPersonality) ? $userPersonality : '' }}">
        <img src="{{ $image }}" alt="Image de profile de {{ $user->first_name }} {{ $user->last_name }}">
    </div>
    <div class="content">
        <div class="header">
            <div class="text_nowrap name_cntr">
                <span class="name">{{ $user->first_name }} {{ $user->last_name }}</span>
            </div>
            <div class="tags_cntr">
                {!! $tags !!}
            </div>
        </div>
        <div class="infos">
            <span>{{ $affinity }}% d'affinité avec vous</span>
            @isset($actionButtons)
                <div class="action_buttons">
                    {!! $actionButtons !!}
                </div>
            @else
               {!! btn_setUpFriend(auth()->id(), $user->id) !!}
            @endisset
        </div>
    </div>
</a>
