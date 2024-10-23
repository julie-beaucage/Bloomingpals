<?php
use illuminate\Support\Facades\Auth;

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

    if ($user->id != Auth::user()->id) {
        $buttonHtml = "";
        $friendFound = false;
        //check if the user is a friend
        foreach ($friends as $friend) {
            if ($friend->id == $user->id) {
                $buttonHtml = <<<HTML
                    <div class="lastSpacing grey_button no_select" value="addded">Ami</div>
                HTML;
                $friendFound = true;
                break;
            }
        }

        //check if the connected user sent a friend request to the user
        if (!$friendFound) {
            foreach ($friendRequestsSent as $friendRequest) {
                if ($friendRequest->id == $user->id) {
                    $buttonHtml = <<<HTML
                        <div class="lastSpacing grey_button no_select" value="addded">En Attente</div>
                    HTML;
                    $friendFound = true;
                    break;
                }
            }

            //check if the user sent a friend request to the connected user
            if (!$friendFound) {
                foreach ($friendRequestsReceive as $friendRequest) {
                    if ($friendRequest->id == $user->id) {
                        $routeAccept = route("AcceptFriendRequest", ["id" => $user->id]);
                        $routeRefuse = route("RefuseFriendRequest", ["id" => $user->id]);
                        $buttonHtml = <<<HTML
                            <div class="lastSpacing green_button no_select" value="addded"><a class="green_button" href="$routeAccept">Accepter</a></div>
                            <div class="lastSpacing red_button no_select" value="addded"><a class="red_button" href="$routeRefuse">Refuser</a></div>
                        HTML;
                        $friendFound = true;
                        break;
                    }
                }

                if (!$friendFound) {
                    $route = route("SendFriendRequest", ["id" => $user->id]);
                    $buttonHtml = <<<HTML
                        <div class="lastSpacing button no_select" value="add"><a class="blue_button" href="$route">Ajouter</a></div>
                    HTML; 
                }
            }
        }

        $imageUser = $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
        $route = route("profile", ["id" => $user->id]);
        $html .= <<<HTML
                <div>
                    <a href="$route">
                        <div class="profile_icon no_select" style="background-image: url($imageUser)"></div>
                        <div>{$user->first_name}</div>
                        <div>{$user->last_name}</div>
                        {$buttonHtml}
                    </a>
                </div>
        HTML;
    }
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