<?php
use App\Models\User_Interest; 
use App\Models\Interest;
use App\Models\Category_Interest;

if (count($users)  == 0) {
    echo '';
    return;
}

foreach ($users as $user) {
    $image = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
    $tags = "";

    $user_interests = User_Interest::where('id_user', $user->id)->get();
    foreach ($user_interests as $user_interest) {
        $interest = Interest::find($user_interest->id_interest);
        if ($interest == null) continue;

        $background = Category_Interest::getColor($interest->id_category);
        $tags .= '<span class="tag" style="background-color:' . $background . '">' . $interest->name . '</span>';
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