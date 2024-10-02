<?php
    $requestHtml = "";

    foreach ($requestsData as $request) {
        $imageRequestHtml = "";
        if (isset($request->image_profil)) {
            $imageRequestHtml = <<<HTML
                <div class="profile_icon no_select" style="background-image: url({$request->image_profil})">
                            
                </div>
            HTML;
        } else {
            $imageRequestHtml = <<<HTML
                <div class="profile_icon no_select" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">
                            
                </div>
            HTML;
        }

        $acceptRouting = route("acceptRequest", ["meetupId" => $meetupData->id, "userId" => $request->id]);
        $denyRouting = route("denyRequest", ["meetupId" => $meetupData->id, "userId" => $request->id]);

        $requestHtml .= <<<HTML
            <div class="sideHorizontalFlexInline">
                <div class="profile">
                    {$imageRequestHtml}
                    <div class="username_container">
                        <div>{$request->prenom}</div>
                        <div class="grey_text">{$request->nom}</div>
                    </div>
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
            <div class="row">
                <div class="ibMax">
                    <a href="{$returnRouting}">     
                        <div class="respondButton">
                            retour
                        </div>
                    </a>
                </div>
                <div class="ibMax">
                    <div class="title1">
                        Requête de la rencontre {$meetupData->nom}
                    </div>
                </div>
            </div>
            <hr>
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
    <link rel="stylesheet" href="{{ asset('css/page/meetupRequests.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/meetup.css') }}">
@endsection()

@section("title")
    Template
@endsection()
