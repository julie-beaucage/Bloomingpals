<?php

use App\Models\TagEvent;
use App\Models\Tag;

if (empty($events)) {
    echo '<span>Aucun résultat</span>';
    return;
}

foreach ($events as $event) {

    $date = date('j-m-Y', strtotime($event->date));
    
    $tags = "";
    $event_tags = TagEvent::where('id_evenement', $event->id)->get();

    foreach ($event_tags as $event_tag) {
        $tag = Tag::find($event_tag->id_tag);
        $tags .= '<span class="tag">' . $tag->nom . '</span>';
    }

    echo <<< HTML
        <a class="event_card no_select hover_darker" href="event/$event->id">
            <div class="banner">
                <img src="{$event->image}" alt="Image de l'évènement">
            </div>
            <div class="body">
                <div class="header">
                    <div class="text-nowrap">
                        <span class="name">{$event->nom}</span>
                    </div>
                    {$tags}
                </div>
                <div class="adress">
                    <span class="material-symbols-rounded icon_sm">location_on</span>
                    <div class="text-nowrap">
                        <span>{$event->adresse}, {$event->ville}</span>
                    </div>
                </div>
                <hr>
                <div class="infos">
                    <span>{$date}</span>
                    <span>{$event->nb_participant} Participants</span>
                </div>
            </div>
        </a>
    HTML;
}