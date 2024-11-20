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
    $btn_class = "btn_friends";

    // Logique pour chaque état de relation
    if ($relation == "Friend") {
        $url = route("RemoveFriend", ["id" => $userId]);
        $btn_txt = "Enlever l'amitié";
    } elseif ($relation == "Blocked") {
        $btn_txt = "Vous êtes bloqué";
    } elseif ($relation == "SendingInvitation") {
        $url = route("CancelFriendRequest", ["id" => $userId]);
        $btn_txt = "Annuler la demande";
    } elseif ($relation == "Invited") {
        $url_accept = route("AcceptFriendRequest", ["id" => $userId]);
        $url_refuse = route("RefuseFriendRequest", ["id" => $userId]);
        $btn_txt_accept = "Accepter";
        $btn_txt_refuse = "Refuser";

        return "
        <div class='acceptContainer'>
            <a href='{$url_accept}'>
                <div class='buttonn btn_accept no_select'>{$btn_txt_accept}</div>
            </a>
            <a href='{$url_refuse}'>
                <div class='buttonn btn_refuse no_select'>{$btn_txt_refuse}</div>
            </a>
        </div>";
    } elseif ($relation == "Refuse") {
        $btn_txt = "Vous avez été refusé";
    } else {
        $url = route("SendFriendRequest", ["id" => $userId]);
        $btn_txt = "Ajouter en ami";
    }

    return "
    <button class='{$btn_class} no_select' onclick=\"window.location.href='{$url}'\">
       <span>{$btn_txt}</span>
   </button>";
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
    <div class="card_long no_select hover_darker {{ $userData['userPersonality'] }}" onclick="window.location.href='profile/{{ $userData['user']->id }}'">
        <div class="banner {{ $userData['userPersonality'] }}">
            <img src="{{ $userData['image'] }}" alt="Image de profile de {{ $userData['user']->first_name }} {{ $userData['user']->last_name }}">
        </div>
        <div class="content_user">
            <div class="header">
                <div class=" profile_link text_nowrap name_cntr" onclick="window.location.href='profile/{{ $userData['user']->id }}'">
                    <span class="name">{{ $userData['user']->first_name }} {{ $userData['user']->last_name }}</span>
                </div>
            </div>
            <div class="infos">
                <span>{{ $userData['affinity'] }}% d'affinité avec vous</span>
            </div>
            <div>
              <span class="tag_perso {{ $userData['userPersonality'] }}">{{ $userData['userPersonalityType'] }}
               </span>
            </div>

        </div>
        <div class="btn-container">
            {!! btn_setUp($userData['relation'], $userData['user']->id) !!}
        </div>
    </div>



    @if ($userData['user']->id === $currentUser->id)
        <hr>
    @endif
@endforeach
