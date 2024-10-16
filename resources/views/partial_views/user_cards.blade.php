<?php

if (count($users)  == 0) {
    echo <<< HTML
        <span>Aucun résultat</span>
    HTML;
    return;
}

foreach ($users as $user) {
    echo <<< HTML
        <div>
            <span>{$user->first_name}</span>
        </div>
    HTML;
}