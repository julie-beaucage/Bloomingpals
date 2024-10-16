<?php

USE App\Models\Interest;
USE App\Models\Meetup_Interest;
USE App\Models\Category_Interest;

if (count($meetups) == 0) {
    echo '';
    return;
}

foreach ($meetups as $meetup) {
    $date = date('j-m-Y', strtotime($meetup->date));
    $tags = "";

    $meetup_interests = Meetup_Interest::where('id_meetup', $meetup->id)->get();
    foreach ($meetup_interests as $meetup_interest) {
        $interest = Interest::find($meetup_interest->id_interest);
        if ($interest == null) continue;
        $background = Category_Interest::getColor($interest->id_category);
        $tags .= '<span class="tag" style="background-color:' . $background . '">' . $interest->name . '</span>';
    }

    srand($meetup->id);
    $image = $meetup->image ?? '\images\meetup_default'.rand(1,3).'.png';

    echo <<< HTML
        <a class="card no_select hover_darker" href="meetup/$meetup->id">
            <div class="banner">
                <img src="{$image}" alt="Image de l'évènement">
            </div>
            <div class="content">
                <div class="header">
                    <div class="text_nowrap">
                        <span class="name">{$meetup->name}</span>
                    </div>
                    {$tags}
                </div>
                <div class="adress">
                    <span class="material-symbols-rounded icon_sm">location_on</span>
                    <div class="text_nowrap">
                        <span>{$meetup->adress}, {$meetup->city}</span>
                    </div>
                </div>
                <hr>
                <div class="row infos">
                    <span>{$date}</span>
                    <span>Aucun participants</span>
                </div>
            </div>
        </a>
    HTML;
}