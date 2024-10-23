<?php
use illuminate\Support\Facades\Auth;
use App\Models\User_Interest; 
use App\Models\Interest;
use App\Models\Category_Interest;

if (count($users)  == 0) {
    echo '';
    return;
}

$html = <<<HTML
    <div class="userGrid">
HTML;

foreach ($users as $user) {
    $image = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
    $tags = "";

    $user_interests = User_Interest::where('id_user', $user->id)->get();
    foreach ($user_interests as $user_interest) {
        $interest = Interest::find($user_interest->id_interest);
        if ($interest == null) continue;

        $tags .= '<span class="tag" style="background-color: var(--category-'. $interest->id_category .')">' . $interest->name . '</span>';
    }

    echo <<< HTML
        <a class="card_long no_select hover_darker" href="profile/$user->id">
            <div class="banner">
                <img src="$image" alt="Image de profile de $user->first_name $user->last_name">
            </div>
            <div class="content">
                <div class="header">
                    <div class="text_nowrap">
                        <span class="name">$user->first_name $user->last_name</span>
                    </div>
                    $tags
                </div>
                <div class="infos">
                    <span>50% d'affinité avec vous</span>
                </div>
            </div>
        </a>
    HTML;
}
