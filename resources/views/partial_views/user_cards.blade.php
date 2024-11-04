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
$userDataList = [];
foreach ($users as $user) {
    $userPersonality = $user->getPersonalityGroup(); 
    $userPersonalityType = $user->getPersonalityType();
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

    $userDataList[] = [
        'user' => $user,
        'affinity' => $affinity,
        'html' => <<< HTML
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
                    <span>$affinity% d'affinité avec vous</span>
                    <p>$userPersonalityType</p>
                </div>
            </div>
        </a>
    HTML . ($user->id === $currentUser->id ? '<hr>' : '')
    ];
}
usort($userDataList, function ($a, $b) use ($currentUser) {
    if ($a['user']->id === $currentUser->id) return -1; 
    if ($b['user']->id === $currentUser->id) return 1;  
    return $b['affinity'] <=> $a['affinity']; 
});

foreach ($userDataList as $userData) {
    if ($userData['user']->id === $currentUser->id) {
        echo '<div style="margin-bottom: 1px; font-weight: bold;"> Vous</div>'; 
        echo $userData['html'];
    } else {
        echo $userData['html'];
    }
}