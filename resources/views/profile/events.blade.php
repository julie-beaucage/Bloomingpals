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
    $route = route("event", ["id" => $eventData->id]);

    $eventsHtml .= <<<HTML
        <a href="$route">
            <div class="event">
                <img class="image" src="$eventImage">
                <div class="eventInfoContainer">
                    <div class="title3 darkgreyText">
                        $eventData->nom
                    </div>
                    <div class="hr">
                    </div>
                    <div class="flexSplitH">
                        <div>
                            <div class="darkgreyText">
                                Date
                            </div>
                            <div class="greyText">
                                $eventData->date
                            </div>
                        </div>
                        <div>
                            <div class="darkgreyText">
                                Lieu
                            </div>
                            <div class="greyText">
                                $eventData->ville
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    HTML;
}
$eventsHtml .= '</div>';

echo $eventsHtml;

?>