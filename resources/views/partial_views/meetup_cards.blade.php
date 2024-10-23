<?php

if (count($meetups)  == 0) {
    echo <<< HTML
        <span>Aucun résultat</span>
    HTML;
    return;
}

foreach ($meetups as $meetup) {
    echo <<< HTML
        <div>
            <span>{$meetup->nom}</span>
        </div>
    HTML;
}