<?php
    use App\Models\DB;
    $conn = mysqli_connect("localhost", "root", "", "db");

    $idOrganitsator;
    $meetupName;
    $description;
    $adress;
    $date;
    $hour;
    $nbParticipantMax;
    $nbParticipants = "Not imlemented";
    $image;
    $public;
    /* run this for the first time for test
    $str = 'INSERT INTO type_personnalite(id, nom) VALUES(1, "personalité")';
    $result = $conn->query($str);

    $str = 'INSERT INTO utilisateur(id, estAdmin, email, prenom, nom, date_naissance, type_personnalite, salt, mot_passe) VALUES(1, 1, "gg@hotmail.com", "Bob", "Lecourt", DATE "2000-01-01", 1, "salut", "test")';
    $result = $conn->query($str);

    $str = 'INSERT INTO rencontre(id, nom, description, id_organisateur, adresse, date, nb_participant, public) VALUES(1, "Nom de la rencontre", "Voici la description", 1, "1234 rue popcorn", DATE "2025-01-01", 100, 1)';
    $result = $conn->query($str);*/

    if(!isset($eventId)) {
        echo "bug";
        $eventId = 1;
    }

    $str = 'SELECT * FROM `rencontre` WHERE id = '.$eventId.';';
    $result = $conn->query($str);

    /*code pris de https://www.w3schools.com/php/php_mysql_select.asp et modifer*/

    /*get meetup data*/
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $id = $data["id"];
        $idOrganitsator = $data["id_organisateur"];
        $meetupName = $data["nom"];
        $description = $data["description"];
        $adress = $data["adresse"];
        $fullDate = explode(" ", $data["date"]);
        $date = $fullDate[0];
        $fullHour = explode(":", $fullDate[1]);
        $hour = $fullHour[0].":".$fullHour[1];
        $nbParticipantMax = $data["nb_participant"];
        $image = $data["image"];
        $public = $data["public"];

      } else {
        view('search.search');
    }

    $imageHtml = "";
    if (isset($image)) {
        $imageHtml = <<<HTML
            <div class="event_image" style="background-image: url({$image})">

            </div>
        HTML;
    } else {
        $imageHtml = <<<HTML
            <div class="event_image" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">

            </div>
        HTML;
    }


    /*get organisator data*/
    if (isset($idOrganitsator)) {
        $str = 'SELECT * FROM `utilisateur` WHERE id = '.$idOrganitsator.';';
        $result = $conn->query($str);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $firstName = $data["prenom"];
            $lastName = $data["nom"];
            $imageUtilisateur = $data["image_profil"];
        } else {
            echo "L'utilisateur qui a fait l'event n'existe pas";
        }
    } else {
        echo "L'utilisateur qui a fait l'event n'existe pas";
    }
    $imageUtilisateurHtml = "";
    if (isset($imageUtilisateur)) {
        $imageUtilisateurHtml = <<<HTML
            <div class="profile_icon no_select" style="background-image: url({$imageUtilisateur})">
                        
            </div>
        HTML;
    } else {
        $imageUtilisateurHtml = <<<HTML
            <div class="profile_icon no_select" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">
                        
            </div>
        HTML;
    }

    /*get tags data*/
    $tagsHtml = "";

    $str = 'SELECT * FROM `tags_rencontre` WHERE id_rencontre = '.$eventId.';';
    $result = $conn->query($str);
    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {

            $str = 'SELECT * FROM `tags` WHERE id = '.$data["id_tags"].';';
            $result = $conn->query($str);

            if ($result->num_rows > 0) {
                $data1 = $result->fetch_assoc();
                $tagsHtml += <<<HTML
                    <div>
                        {$data1["nom"]}
                    </div>
                HTML;
            }
        }
    }


    /*get participants data*/
    $str = 'SELECT * FROM `rencontre_utilisateur` WHERE id_rencontre = '.$eventId.';';
    $result = $conn->query($str);
    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {

            $str = 'SELECT * FROM `tags` WHERE id = '.$data["id_utilisateur"].';';
            $result = $conn->query($str);

            if ($result->num_rows > 0) {
                $data1 = $result->fetch_assoc();
                $tagsHtml += <<<HTML
                    <div>
                        <div class="profile_icon no_select" style="background-image: url({$data1['image_profil']})">
                        
                        </div>
                        <div>
                            $nom
                        </div>
                        <div>
                            <!--affiniter utilisateur-->
                        </div>
                    </div>
                HTML;
            }
        }
    }

?>


@extends("master")

@section("style")
    <link rel="stylesheet" href="{{ asset('css/page/event.css') }}">
@endsection()

@section("content")
    <?php
    /*variable de test*/
    $routing = route('eventPage', ['eventId' => 1]);


    $html = <<<HTML
        $imageHtml
        <div class="detail_container">
            <div class="principal_info section">
                <!--meetup name section-->
                <div class="meetup_name_container">
                    <div class="title4 right_text">
                        $meetupName
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
                            <div class="title5">$firstName $lastName</div>
                            <div class="grey_text">surnom</div>
                        </div>
                    </div>
                    <div>
                        <a href="{$routing}">
                            <div class="blue_button no_select">
                                rejoindre
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="title6 no_select">Information</div>
            <div class="info_container section">
                <div>
                    <div class="dark_grey_text no_select">Date</div>
                    <div class="grey_text">$date</div>
                </div>
                <div>
                    <div class="dark_grey_text no_select">Adresse</div>
                    <div class="grey_text">$adress</div>
                </div>
                <div>
                    <div class="dark_grey_text no_select">Heure</div>
                    <div class="grey_text">$hour</div>
                </div>
                <div>
                    <div class="dark_grey_text no_select">Groupe</div>
                    <div class="grey_text">$nbParticipantMax participants maximum</div>
                </div>
            </div>
            <div class="title6 no_select">Description</div>
            <div class="section">
                $description
            </div>
            <div class="title6 no_select">
                Participants
                <span class="grey_text">
                    ({$nbParticipants})
                </span>
            </div>
        </div>
    HTML;
    echo $html?>
@endsection()