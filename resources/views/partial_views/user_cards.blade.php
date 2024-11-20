<?php
use App\Models\User_Interest;
use App\Models\Interest;
use App\Models\Friendship_Request;
use Illuminate\Support\Facades\Auth;

$currentUser = Auth::user();

if (count($users) == 0) {
    return;
}

$userDataList = [];

// Function to get relation state with a user
function getRelationState($currentUserId, $userId) {
    $relation = Friendship_Request::GetUserRelationState($userId, $currentUserId);
    if ($relation == 'GotBlocked') {
        return 'Blocked';
    }

    if ($relation == 'Friend') {
        return 'Friend';
    }

    $relationRequest = Friendship_Request::GetUserRelationState($currentUserId, $userId);
    switch ($relationRequest) {
        case 'sent': return 'SendingInvitation';
        case 'receive': return 'Invited';
        case 'refuse': return 'Refuse';
        default: return 'None';
    }
}

function btn_setUp($relation, $userId) {
    $btn_txt = "";
    $url = "";
    $btn_class = "";

    // Logique pour chaque état de relation
    if ($relation == "Friend") {
        $url = route("RemoveFriend", ["id" => $userId]);
        $btn_txt = "Enlever l'amitié";
        $btn_class = "red_button";
    } elseif ($relation == "Blocked") {
        $btn_txt = "Vous êtes bloqué";
        $btn_class = "red_button";
    } elseif ($relation == "SendingInvitation") {
        $url = route("CancelFriendRequest", ["id" => $userId]);
        $btn_txt = "Annuler la demande d'amitié";
        $btn_class = "red_button";
    } elseif ($relation == "Invited") {
        $url_accept = route("AcceptFriendRequest", ["id" => $userId]);
        $url_refuse = route("RefuseFriendRequest", ["id" => $userId]);
        $btn_txt_accept = "Accepter";
        $btn_txt_refuse = "Refuser";
        $btn_class_accept = "green_button";
        $btn_class_refuse = "red_button";

        return "
        <div class='acceptContainer'>
            <a href='{$url_accept}'>
                <div class='{$btn_class_accept} no_select'>{$btn_txt_accept}</div>
            </a>
            <a href='{$url_refuse}'>
                <div class='{$btn_class_refuse} no_select'>{$btn_txt_refuse}</div>
            </a>
        </div>";
    } elseif ($relation == "Refuse") {
        $btn_txt = "Vous avez été refusé";
        $btn_class = "grey_button";
    } else {
        $url = route("SendFriendRequest", ["id" => $userId]);
        $btn_txt = "Ajouter ami(e)";
        $btn_class = "blue_button";
    }

    return "
    <a href='{$url}'>
        <span class='{$btn_class} no_select btn_friends'>{$btn_txt}</span>
    </a>";
}

foreach ($users as $user) {
    $relation = getRelationState($currentUser->id, $user->id);
    if ($relation == 'Blocked') {
        return redirect()->back();
    }

    $image = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
    $userPersonality = $user->getPersonalityGroup();
    $userPersonalityType = $user->getPersonalityType();
    $affinity = $currentUser->calculateAffinity($user->id, $currentUser->id);
    $image = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
    $tags = "";

    $user_interests = User_Interest::where('id_user', $user->id)->get();
    $count = count($user_interests);

    for ($i = 0; $i < $count && $i < 2; $i++) {
        $interest = Interest::find($user_interests[$i]->id_interest);
        if ($interest == null)
            continue;
        $tags .= '<span class="tag" style="background-color: var(--category-' . $interest->id_category . ')">' . $interest->name . '</span>';
    }

    if ($count > 2) {
        $tags .= '<span class="tag square_tag">+' . ($count - 2) . '</span>';
    }

    $userDataList[] = [
        'user' => $user,
        'affinity' => $affinity,
        'tags' => $tags,
        'image' => $image,
        'userPersonality' => $userPersonality,
        'userPersonalityType' => $userPersonalityType,
        'relation' => $relation
    ];
}

// Sort by affinity (current user first)
usort($userDataList, function ($a, $b) use ($currentUser) {
    if ($a['user']->id === $currentUser->id) return -1;
    if ($b['user']->id === $currentUser->id) return 1;
    return $b['affinity'] <=> $a['affinity'];
});
?>

@foreach ($userDataList as $userData)
    @if ($userData['user']->id === $currentUser->id)
        <hr>
        <div style="margin-left:5%; font-weight: bold; color:var(--neutral-800);">Votre profil :</div>
    @endif

    <div class="card_long no_select hover_darker {{ $userData['userPersonality'] }}">
       <div class="banner {{ $userData['userPersonality'] }}">
                <img src="{{ $userData['image'] }}" alt="Image de profile de {{ $userData['user']->first_name }} {{ $userData['user']->last_name }}">
        </div>   
        <a href="profile/{{ $userData['user']->id }}" class="profile_link">
            <div class="content">
                <div class="header">
                    <div class="text_nowrap name_cntr">
                        <p class="name">{{ $userData['user']->first_name }} {{ $userData['user']->last_name }}</p>
                    </div>
                </div>
            </div>
        </a>

        <!-- Bouton de configuration -->
        <div class="button_container">
            {!! btn_setUp($userData['relation'], $userData['user']->id) !!}
        </div>

        <div class="infos">
            <span>{{ $userData['affinity'] }}% d'affinité avec vous</span>
            <div class="tag_perso {{ $userData['userPersonality'] }}">{{ $userData['userPersonalityType'] }}</div>
        </div>
    </div>

    @if ($userData['user']->id === $currentUser->id)
        <hr>
    @endif
@endforeach
