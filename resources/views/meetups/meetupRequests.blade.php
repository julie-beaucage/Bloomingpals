<?php
    
?>

@extends("master")

@section("content")
    <?php
        $html = <<<HTML
            <div class="title1">
                Requête de la rencontre {$meetupData->nom}
                <!--content-->
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
@endsection()

@section("title")
    Template
@endsection()
