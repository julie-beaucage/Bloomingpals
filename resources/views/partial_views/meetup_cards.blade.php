<?php

if (count($meetups)  == 0) {
    echo <<< HTML
        <span>Aucun résultat</span>
    HTML;
    return;
}

foreach ($meetups as $meetup) {
    $date = date('j-m-Y', strtotime($meetup->date));
    $tags = "";

    $meetup_interests = Meetup_Interest::where('id_meetup', $meetup->id)->get();
    $count = count($meetup_interests);

    for ($i = 0; $i < $count && $i < 2; $i++) {

        if ($count > 2 && $i == 1) {
            $tags .= '<span class="tag square_tag">+' . $count - 1 . '</span>';
            break;
        }

        $interest = Interest::find($meetup_interests[$i]->id_interest);
        if ($interest == null) continue;
        $tags .= '<span class="tag" style="background-color: var(--category-'. $interest->id_category .')">' . $interest->name . '</span>';
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
                    <div class="text_nowrap name_cntr">
                        <span class="name">{$meetup->name}</span>
                    </div>
                    <div class="tags_cntr">
                        {$tags}
                    </div>
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