<?php

use App\Models\Event_Category;
use App\Models\Event_Interest;
use App\Models\Interest;
use App\Models\Category_Interest;

if (count($events) == 0) {
    echo '';
    return;
}

foreach ($events as $event) {

    $date = date('j-m-Y', strtotime($event->date));
    $tags = "";

    $event_categories = Event_Category::where('id_event', $event->id)->get();
    foreach ($event_categories as $event_category) {
        $category = Category_Interest::find($event_category->id_category);
        if ($category == null) continue;

        $tags .= '<span class="tag" style="background-color: var(--category-'. $category->id .')">' . $category->name . '</span>';
    }

    $event_interests = Event_Interest::where('id_event', $event->id)->get();
    foreach ($event_interests as $event_interest) {
        $interest = Interest::find($event_interest->id_interest);
        if ($interest == null) continue;

        $tags .= '<span class="tag" style="background-color: var(--category-'. $interest->id_category .')">' . $interest->name . '</span>';
    }

    echo <<< HTML
        <a class="card no_select hover_darker" href="event/$event->id">
            <div class="banner">
                <img src="{$event->image}" alt="Image de l'évènement">
            </div>
            <div class="content">
                <div class="header">
                    <div class="text_nowrap">
                        <span class="name">{$event->name}</span>
                    </div>
                    {$tags}
                </div>
                <div class="adress">
                    <span class="material-symbols-rounded icon_sm">location_on</span>
                    <div class="text_nowrap">
                        <span>{$event->adress}, {$event->city}</span>
                    </div>
                </div>
                <hr>
                <div class="infos">
                    <span>{$date}</span>
                    <span>Aucun participants</span>
                </div>
            </div>
        </a>
    HTML;
}