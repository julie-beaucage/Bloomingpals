<?php
    $requestHtml = "";

    foreach ($requestsData as $request) {
        $imageRequestHtml = "";

        $userImage = $request->image_profil ? asset('storage/' . $request->image_profil) : asset('/images/simple_flower.png');

        $imageRequestHtml = <<<HTML
            <div class="profile_icon no_select" style="background-image: url($userImage)">
                        
            </div>
        HTML;
        $acceptRouting = route("acceptRequest", ["meetupId" => $meetupData->id, "userId" => $request->id]);
        $denyRouting = route("denyRequest", ["meetupId" => $meetupData->id, "userId" => $request->id]);

        $profileRoute = route("profile", ["id" => $request->id]);

        $requestHtml .= <<<HTML
            <div class="sideHorizontalFlexInline userContainer">
                <div>
                    <a href="{$profileRoute}">
                        <div class="profile">
                            {$imageRequestHtml}
                            <div class="username_container">
                                <div>{$request->first_name}</div>
                                <div class="grey_text">{$request->last_name}</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="respondButton" href="{$acceptRouting}"> 
                        Accepter
                    </a>
                    <a class="respondButton" href="{$denyRouting}">
                        Refuser
                    </a>
                </div>
            </div>
        HTML;
    }
?>

@extends("master")

@section("content")
    <?php
        $returnRouting = route("meetupPage", ["meetupId" => $meetupData->id]);

        $html = <<<HTML
            <div class="row titleBackground">
                <div class="ibMax">
                    <a href="{$returnRouting}">     
                        <div class="biggerRespondButton">
                            retour
                        </div>
                    </a>
                </div>
                <div class="ibMax">
                    <div class="title1">
                        Requêtes de la rencontre {$meetupData->nom}
                    </div>
                </div>
            </div>
            <div class="profilesContainer">
                $requestHtml
            </div>
        HTML;
        echo $html;
    ?>
@endsection()

@section("scripts")

    <!--javascript-->
@endsection()

@section("style")
    <link rel="stylesheet" href="{{ asset('css/meetupRequests.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meetup.css') }}">
@endsection()
