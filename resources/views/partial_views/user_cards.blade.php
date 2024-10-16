<?php

if (count($users)  == 0) {
    echo <<< HTML
        <span>Aucun résultat</span>
    HTML;
    return;
}

$html = <<<HTML
    <div class="userGrid">
HTML;

foreach ($users as $user) {


    $buttonHtml = "";
    $friendFound = false;
    /*foreach ($amis as $ami) {
        if ($ami->id == $user->id) {
            $buttonHtml = `<div class="lastSpacing" value="addded">Ami</div>`;
            $friendFound = true;
        }
    }*/

    if (!$friendFound) { 
        $buttonHtml = `<div class="lastSpacing button" value="add"><a class="blue_button" href="">Ajouter</a></div>`;
    }

    $imageUser = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
    $html .= <<<HTML
        <div>
            <div class="profile_icon no_select" style="background-image: url($imageUser)">
                        
            </div>
            <div>{$user->first_name}</div>
            <div>{$user->last_name}</div>
            $buttonHtml
        </div>
    HTML;
}

$html .= <<< HTML
    </div>
HTML;

echo $html;

?>

<!--<script>
    $(".lastButtonSpacing").on("click", function(button) {
        button
    });

</script>-->