<?php

use App\Models\Meetup;
use App\Models\Meetup_Interest;
use App\Models\Interest;
use App\Models\User;

if (count($meetups) == 0) {
    echo '';
    return;
}

$meetupDataList = [];

function isRequestSend($userId, $meetupId)
{
    $request = DB::table('meetups_requests')
        ->where('id_user', $userId)
        ->where('id_meetup', $meetupId)
        ->first();

    return $request ? $request->status : 'none';
}

function btn_setUp($userId, $meetupId)
{
    $requestStatus = isRequestSend($userId, $meetupId);
    $url = '';
    $btn_txt = '';
    $btn_class = '';

    if ($requestStatus == 'none') {
        $url = route("meetups.send_request", ["meetupId" => $meetupId]);
        $btn_txt = "S'intéresser à joindre";
        $btn_class = "btn_interesse";
    } else {
        if ($requestStatus == 'accepted') {
            $url = route("meetups.cancel_request", ["meetupId" => $meetupId]);
            $btn_txt = "Participant"; // Icône de crochet coché
            $btn_class = "btn_friends";
        } elseif ($requestStatus == 'pending') {
            $btn_txt = "En attente";
            $url = "#"; // Ne fait rien ici
            $btn_class = "btn_pending";
        } elseif ($requestStatus == 'refused') {
            $url = "#";
            $btn_txt = "Refusé";
            $btn_class = "btn_refused";
        }
    }

    return "
        <form action='{$url}' method='POST'>
            " . csrf_field() . "
            <button class='{$btn_class} no_select' type='submit'>
                <span>{$btn_txt}</span>
            </button>
        </form>";
}

foreach ($meetups as $meetup) {
    $date = date('j-m-Y', strtotime($meetup->date));
    $tags = "";

    $meetup_interests = Meetup_Interest::where('id_meetup', $meetup->id)->get();
    $count = count($meetup_interests);

    for ($i = 0; $i < $count && $i < 2; $i++) {
        if ($count > 2 && $i == 1) {
            $tags .= '<span class="tag square_tag">+' . ($count - 1) . '</span>';
            break;
        }

        $interest = Interest::find($meetup_interests[$i]->id_interest);
        if ($interest == null) continue;
        $tags .= '<span class="tag" style="background-color: var(--category-' . $interest->id_category . ')">' . $interest->name . '</span>';
    }

    srand($meetup->id);
    $image = $meetup->image ?? '\images\meetup_default' . rand(1, 3) . '.png';

    $creator = User::find($meetup->id_owner);

    $currentParticipants = $meetup->participants()->count();
    $maxParticipants = $meetup->nb_participant;
    $placesLeft = $maxParticipants - $currentParticipants;

    $btnHTML = btn_setUp(auth()->user()->id, $meetup->id);

    echo <<<HTML
        <div class="card no_select hover_darker">
            <div class="banner">
                <img src="{$image}" alt="Image de l'évènement">
            </div>
            <div class="content">
                <div class="header">
                    <span class="date">{$date}</span>
                    <span class="name">{$meetup->name}</span>
                </div>
                <div class="adress">
                    <span class="material-symbols-rounded icon_sm">location_on</span>
                    <span>{$meetup->adress}, {$meetup->city}</span>
                </div>
                <div class="creator">
                    <span>Créé par: {$creator->name} (ID: {$creator->id})</span>
                </div>
                <div class="tags_cntr">
                    {$tags}
                </div>
                <hr>
                <div class="row infos">
                    <span>Participants : {$currentParticipants}/{$maxParticipants}</span>
                    <div class="btn-container">
                        {$btnHTML}
                    </div>
                </div>
            </div>
        </div>
    HTML;
}
?>
