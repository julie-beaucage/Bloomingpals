<?php
    /* run this for the first time for test*//*
    $str = 'INSERT INTO type_personnalite(id, nom) VALUES(1, "personalité")';
    $result = $conn->query($str);

    $str = 'INSERT INTO utilisateur(id, estAdmin, email, prenom, nom, date_naissance, type_personnalite, salt, mot_passe) VALUES(1, 1, "gg@hotmail.com", "Bob", "Lecourt", DATE "2000-01-01", 1, "salut", "test")';
    $result = $conn->query($str);

    $str = 'INSERT INTO rencontre(id, nom, description, id_organisateur, adresse, date, nb_participant, public) VALUES(1, "Nom de la rencontre", "Voici la description", 1, "1234 rue popcorn", DATE "2025-01-01", 100, 1)';
    $result = $conn->query($str);*/

    if(!isset($meetupId)) {
        /*à changer*/
        $meetupId = 1;
    }

    $idCurrentUser = 1;

    if (!$meetupData->public) {
        /*check if the user is a friend*/
    }

    /*variables*/
    $date = explode(" ",$meetupData->date);
    $participantCount = count($participantsData);

    /*Get organisator image*/
    $imageUtilisateurHtml = "";
    if (isset($organisatorData->image)) {
        $imageUtilisateurHtml = <<<HTML
            <div class="profile_icon no_select" style="background-image: url({$organisatorData->image})">
                        
            </div>
        HTML;
    } else {
        $imageUtilisateurHtml = <<<HTML
            <div class="profile_icon no_select" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">
                        
            </div>
        HTML;
    }

    /*Get image data*/
    $imageHtml = "";
    if (isset($meetupData[0]->image)) {
        $imageHtml = <<<HTML
            <div class="event_image" style="background-image: url({$meetupData->image})">

            </div>
        HTML;
    } else {
        $imageHtml = <<<HTML
            <div class="event_image" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">

            </div>
        HTML;
    }

    /*get tags data*/
    $tagsHtml = "";

    foreach ($meetupTagsData as $tag) {
        $tagsHtml .= <<<HTML
            <div>
                {$tag->nom}
            </div>
        HTML;
    }

    /*get participants data*/
    $participantHtml = "";

    if ($participantCount != 0) {
        foreach ($participantsData as $participantData) {
            /*Get organisator image*/
            $imageParticipantHtml = "";
            if (isset($participantData->image_profil)) {
                $imageParticipantHtml = <<<HTML
                    <div class="profile_icon no_select" style="background-image: url({$participantData->image_profil})">
                                
                    </div>
                HTML;
            } else {
                $imageParticipantHtml = <<<HTML
                    <div class="profile_icon no_select" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">
                                
                    </div>
                HTML;
            }
            $participantHtml .= <<<HTML
                <div class="organisator_profile">
                    $imageParticipantHtml
                    <div class="username_container">
                        <div>{$participantData->prenom}</div>
                        <div class="grey_text">{$participantData->nom}</div>
                    </div>
                </div>
            </div>
        HTML;
    }

    /*Get the action button*/
    $actionButtonHtml = "";
    if ($actionButtonState == 0) {
        $routing = route('meetupPage', ['meetupId' => 1]);

        $actionButtonHtml = <<<HTML
            <a href="{$routing}">
                <div class="blue_button no_select">
                    rejoindre
                </div>
            </a>
        HTML;
    } else if ($actionButtonState == 1) {

    } else if ($actionButtonState == 2) {

    }
?>


@extends("master")

@section("style")
    <link rel="stylesheet" href="{{ asset('css/page/meetup.css') }}">
@endsection()

@section("content")
    <?php
    /*variable de test*/
    $routing = route('joinMeetup', ['meetupId' => 1, "userId" => 7]);


    $html = <<<HTML
        $imageHtml
        <div class="detail_container">
            <div class="principal_info section">
                <!--meetup name section-->
                <div class="meetup_name_container">
                    <div class="title4 right_text">
                        {$meetupData->nom}
                    </div>
                    <div class="tags">
                        
                        $tagsHtml
                    </div>
                </div>
                
                <!--organisator profile section-->
                <div class="joining_Conainter">
                    <div class="organisator_profile">
                        $imageUtilisateurHtml
                        <div class="username_container">
                            <div class="title5">{$organisatorData->prenom} {$organisatorData->nom}</div>
                            <div class="grey_text"><!--afinité a faire--></div>
                        </div>
                    </div>
                    <div>
                        <a href="{$routing}">
                            $actionButtonHtml
                        </a>
                    </div>
                </div>
            </div>
            <div class="title6 no_select">Information</div>
            <div class="info_container section">
                <div>
                    <div class="dark_grey_text no_select">Date</div>
                    <div class="grey_text">{$date[0]}</div>
                </div>
                <div>
                    <div class="dark_grey_text no_select">Adresse</div>
                    <div class="grey_text">{$meetupData->adresse}</div>
                </div>
                <div>
                    <div class="dark_grey_text no_select">Heure</div>
                    <div class="grey_text">{$date[1]}</div>
                </div>
                <div>
                    <div class="dark_grey_text no_select">Groupe</div>
                    <div class="grey_text">{$meetupData->nb_participant} participants maximum</div>
                </div>
            </div>
            <div class="title6 no_select">Description</div>
            <div class="section">
                {$meetupData->description}
            </div>
            <div class="title6 no_select">
                Participants
                <span class="grey_text">
                    ($participantCount)
                </span>
            </div>
            <div>
                $participantHtml
            </div>
        </div>
    HTML;
    echo $html?>
@endsection()