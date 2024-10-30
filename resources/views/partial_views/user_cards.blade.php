<?php
use App\Models\User_Interest; 
use App\Models\Interest;
use App\Models\Category_Interest;
use illuminate\Support\Facades\Auth;
use Mockery\Undefined;

$currentUser = Auth::user();

if (count($users) == 0) {
    echo '';
    return;
}

foreach ($users as $user) {
    $userPersonality = $user->getPersonalityType(); 
    $affinity = $currentUser->calculateAffinity($user->id, $currentUser->id);
    $image = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
    $tags = "";

    $user_interests = User_Interest::where('id_user', $user->id)->get();
    $count = count($user_interests);
    
    for ($i = 0; $i < $count && $i < 2; $i++) {
        $interest = Interest::find($user_interests[$i]->id_interest);
        if ($interest == null) continue;
        $tags .= '<span class="tag" style="background-color: var(--category-'. $interest->id_category .')">' . $interest->name . '</span>';
    }

    if ($count > 2) {
        $tags .= '<span class="tag square_tag">+' . ($count - 2) . '</span>'; 
    }

    echo <<< HTML
        <a class="card_long no_select hover_darker $userPersonality" href="profile/$user->id">
        <div class="banner {$userPersonality}">
                <img src="$image" alt="Image de profile de $user->first_name $user->last_name">
            </div>
            <div class="content">
                <div class="header">
                    <div class="text_nowrap name_cntr">
                        <span class="name">$user->first_name $user->last_name</span>
                    </div>
                    $tags
                </div>
                <div class="infos">
                    <span>$affinity % d'affinité avec vous</span>
                </div>
            </div>
        </a>
    HTML;
}
