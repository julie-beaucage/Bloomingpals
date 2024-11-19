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
    $count_categories = count($event_categories);
    
    for ($i = 0; $i < $count_categories && $i < 1; $i++) {
        $category = Category_Interest::find($event_categories[$i]->id_category);
        if ($category == null) continue;
        $tags .= '<span class="tag" style="background-color: var(--category-'. $category->id .')">' . $category->name . '</span>';
    }

    $event_interests = Event_Interest::where('id_event', $event->id)->get();
    $count_interests = count($event_interests);

    for ($i = 0; $i < $count_interests && $i < 2 - $count_categories; $i++) {
        $interest = Interest::find($event_interests[$i]->id_interest);
        if ($interest == null) continue;
        $tags .= '<span class="tag" style="background-color: var(--category-'. $interest->id_category .')">' . $interest->name . '</span>';
    }

    if ($count_categories + $count_interests > 2) {
        $tags .= '<span class="tag square_tag">+' . $count_categories + $count_interests - 2 . '</span>';
    }

    echo <<< HTML
        <a class="card no_select hover_darker" href="event/$event->id">
            <div class="banner">
                <img src="{$event->image}" alt="Image de l'évènement">
                <div class="add-blossomlink">
                    <button class="plus-icon" data-event-id="{$event->id}">
                        <span class="material-symbols-rounded">add_reaction</span>
                    </button>
                    <div class="hover-text">Créer un BlossomLink</div>
                </div>
            </div>
            <div class="content">
                <div class="header">
                    <div class="text_nowrap name_cntr">
                        <span class="name">{$event->name}</span>
                    </div>
                    <div class="tags_cntr">
                        {$tags}
                    </div>
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
?>

<script>
document.querySelectorAll('.plus-icon').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const eventId = this.getAttribute('data-event-id');
        window.location.href = `/meetup/form/${eventId}`;
    });
});

</script>