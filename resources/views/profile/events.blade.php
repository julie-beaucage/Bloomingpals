<?php
$eventsHtml = '<div class="events">';
foreach ($eventsData as $eventData) {
    $eventImage = "";
    if ($eventData->image != null) {
        $eventImage = $eventData->image;
    } else {
        $default_images=rand(1,3);
        $eventImage = '\images\meetup_default'.$default_images.'.png'; 
    }


    $eventsHtml .= <<<HTML
        <a href="">
            <div class="event">
                <img class="image" src="$eventImage">
                <div class="title3 darkgreyText">
                    $eventData->nom
                </div>
                <div class="hr">
                </div>
                <div class="flexSplitH">
                    <div>

                        Date <br>
                        $eventData->date
                    </div>
                    <div>

                        Lieu <br>
                        $eventData->ville
                    </div>
                </div>
            </div>
        </a>
    HTML;
}
$eventsHtml .= '</div>';

echo $eventsHtml;

?>