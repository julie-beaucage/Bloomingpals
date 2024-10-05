<?php
$eventsHtml = "";

foreach ($eventsData as $eventData) {
    $eventImage = "";
    if ($eventData->image != null) {
        $eventImage = $eventData->image;
    } else {
        $default_images=rand(1,3);
        $eventImage = '\images\meetup_default'.$default_images.'.png'; 
    }
    $eventsHtml .= <<<HTML
        <div class="event">
            <img class="image" src="{{$eventImage}}">
            $eventData->id<br>
            <div>
                $eventData->date
            </div>
        </div>
    HTML;
}

echo $eventsHtml;

?>