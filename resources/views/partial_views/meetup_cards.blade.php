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

    $btnHTML = btn_setUp(auth()->id(), $meetup);


    echo <<<HTML
        <a href="meetups/$meetup->id" class="card no_select hover_darker">
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
                    <span>Créé par: {$creator->first_name} {$creator->last_name}</span>
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
        </a>
    HTML;
}
?>
