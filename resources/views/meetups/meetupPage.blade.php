<?php
    /* run this for the first time for test*//*
    $str = 'INSERT INTO type_personnalite(id, nom) VALUES(1, "personalité")';
    $result = $conn->query($str);

    $str = 'INSERT INTO utilisateur(id, estAdmin, email, prenom, nom, date_naissance, type_personnalite, salt, mot_passe) VALUES(1, 1, "gg@hotmail.com", "Bob", "Lecourt", DATE "2000-01-01", 1, "salut", "test")';
    $result = $conn->query($str);

    $str = 'INSERT INTO rencontre(id, nom, description, id_organisateur, adresse, date, nb_participant, public) VALUES(1, "Nom de la rencontre", "Voici la description", 1, "1234 rue popcorn", DATE "2025-01-01", 100, 1)';
    $result = $conn->query($str);*/

    /*variables*/

    use illuminate\Support\Facades\Auth;
    $date = explode(" ",$meetupData->date);
    $participantCount = count($participantsData);
    $currentUser = Auth::user();

    /*html variables*/

    /*get participants data*/
    $participantHtml = "";
    $imageParticipantHtml = "";
    $actionButtonHtml = "";
    $voirDemandeHtml = "";


    if ($currentUser->id == $organisatorData->id) {
        $routing = route('meetupForm', ['id' => $meetupData->id]);
        $actionButtonHtml = <<<HTML
            <a href="{$routing}">
                <div class="blue_button no_select">
                    Modifier
                </div>
            </a>
        HTML;

        $routing2 = route('meetupRequests', ['meetupId' => $meetupData->id]);
        $voirDemandeHtml = <<<HTML
                <div>
                    <a class="blueLink" href="{$routing2}">
                        Voir les demandes 
                        <span>
                            ($requestsParticipantsCount)
                        </span>
                    </a>
                </div>
        HTML;
    } else {

        if ($userRequested == "joining") {
            $routing = route('cancelJoiningMeetup', ['meetupId' => $meetupData->id]);
            $actionButtonHtml = <<<HTML
                <a href="{$routing}">
                    <div class="red_button no_select">
                        Annuler
                    </div>
                </a>
            HTML;
        } else if ($userRequested == "notJoining") {
            $routing = route('joinMeetup', ['meetupId' => $meetupData->id]);
            $actionButtonHtml = <<<HTML
                <a href="{$routing}">
                    <div class="blue_button no_select">
                        Rejoindre
                    </div>
                </a>
            HTML;
        } else if ($userRequested == "refused") {
            $actionButtonHtml = <<<HTML
                <div class="grey_button no_select">
                    Vous avez été refusé
                </div>
            HTML;
        }
    }

    if ($participantCount != 0) {
        foreach ($participantsData as $participantData) {
            //if it is the participant
            if ($participantData->id == $currentUser->id) {
                $routing = route('leaveMeetup', ['meetupId' => $meetupData->id]);
                $actionButtonHtml = <<<HTML
                    <a href="{$routing}">
                        <div class="blue_button no_select">
                            Quitter
                        </div>
                    </a>
                HTML;
                $isCurrentUserParticipant = true;
            }
    
            //Get organisator image
            $imageParticipantHtml = "";
            $participantRoute = route("profile", ["id" => $participantData->id]);

            if (isset($participantData->image_profil)) {
                $imageParticipantHtml = <<<HTML
                    <a href="$participantRoute">
                        <div class="profile_icon no_select" style="background-image: url({$participantData->image_profil})">
                                    
                        </div>
                    </a>
                HTML;
            } else {
                $imageParticipantHtml = <<<HTML
                    <a href="$participantRoute">
                        <div class="profile_icon no_select" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">
                                
                        </div>
                    </a>
                HTML;
            }
            $participantHtml .= <<<HTML
                <div class="organisator_profile">
                    $imageParticipantHtml
                    <div class="username_container">
                        <div>{$participantData->first_name} {$participantData->last_name}</div>
                        <div class="grey_text"><!--afinité a faire--></div>
                    </div>
                </div>
            HTML;
        }
    }

    $imageUser = $organisatorData->image_profil ? asset('storage/' . $organisatorData->image_profil) : asset('/images/simple_flower.png');
    /*Get organisator image*/
    $imageUtilisateurHtml = <<<HTML
        <div class="profile_icon no_select" style="background-image: url($imageUser)">
                    
        </div>
    HTML;


    $imageMeetup = $meetupData->image ? asset('storage/' . $meetupData->image) : asset('/images/R.jpg');
    /*Get image data*/
    $imageHtml =  <<<HTML
        <div class="event_image" style="background-image: url($imageMeetup)">

        </div>
    HTML;


    /*get tags data*/
    $tagsHtml = "";

    foreach ($meetupTagsData as $tag) {
        $tagsHtml .= <<<HTML
            <div>
                {$tag->nom}
            </div>
        HTML;
    }
?>


@extends("master")

@section("style")
    <link rel="stylesheet" href="{{ asset('css/page/meetup.css') }}">
@endsection()

@section("content")
    <?php

    $html = <<<HTML
        <div class="meetupImageContainer">
            $imageHtml
        </div>
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
                            <div class="title5">{$organisatorData->first_name} {$organisatorData->last_name}</div>
                            <div class="grey_text"><!--afinité a faire--></div>
                        </div>
                    </div>
                    <div>
                        $actionButtonHtml
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
            <div class="title6 no_select participantCountContainer">
                <div>
                    Participants
                    <span class="grey_text">
                        ($participantCount)
                    </span>
                </div>
                $voirDemandeHtml
            </div>
            <div>
                $participantHtml
            </div>
        </div>
    HTML;
    echo $html;
?>
@endsection()