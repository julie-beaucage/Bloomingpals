@extends("master")

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/overlay-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interets.css') }}">
    <link rel="stylesheet" href="{{ asset('css/personality.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reports.css') }}">
@endsection()

@section('content')
    <?php

    $html = "";
    use App\Models\User_Interest; 
    use App\Models\Interest;
    
    foreach ($reports as $report) {


        $image = $report['user_send']->image_profil ? asset('storage/' . $report->image_profil) : asset('/images/simple_flower.png');
        $routeSend = route("profile", ["id" => $report['user_send']->id]);

        $image = $report['user_receive']->image_profil ? asset('storage/' . $report->image_profil) : asset('/images/simple_flower.png');
        $routeReceive = route("profile", ["id" => $report['user_receive']->id]);

        $userSendName = $report['user_send']->first_name." ".$report['user_send']->last_name;
        $userReceiveName = $report['user_receive']->first_name." ".$report['user_receive']->last_name;

        $routeClosing = route("closeReport", ["user_send" => $report['user_send'], "user_receive" => $report["user_receive"]]);

        $html .= <<<HTML
            <div class="whitebg maxWidth">
                <div class="flexRow maxWidth">
                    <div class="userCard maxWidth">
                        <a class="card_long no_select hover_darker" href="$routeSend">
                            <div class="banner">
                                <img src="$image" alt="Image de profile de {$report['user_send']->first_name} {$report['user_send']->last_name}">
                            </div>
                            <div class="content">
                                <div class="header">
                                    <div class="text_nowrap name_cntr">
                                        <span class="name">{$report['user_send']->first_name} {$report['user_send']->last_name}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <button class="red_button banButton" value="$userSendName">
                            <input type="hidden" class="userId" value="{$report['user_send']->id}">
                            Bannir
                        </button><br>
                        <div>
                            <h5>objet:</h5>
                            {$report["object_type"]->name}<br><br>
                            <h5>Raison:</h5>
                            {$report['object']}<br><br>

                            <a class="grey_button" href="$routeClosing">
                                Fermer le Signalement
                            </a><br><br>
                        </div>
                    </div>
                    <div class="flexRow center">
                        <div>
                            report to:
                        </div>
                    </div>
                    <div class="userCard maxWidth">
                        <a class="userCard card_long no_select hover_darker" href="$routeReceive">
                            <div class="banner">
                                <img src="$image" alt="Image de profile de {$report['user_receive']->first_name} {$report['user_receive']->last_name}">
                            </div>
                            <div class="content">
                                <div class="header">
                                    <div class="text_nowrap name_cntr">
                                        <span class="name">{$report['user_receive']->first_name} {$report['user_receive']->last_name}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <button class="red_button banButton" value="$userReceiveName">
                            <input type="hidden" class="userId" value="{$report['user_receive']->id}">
                            Bannir
                        </button>
                    </div>
                </div>
            </div><br><br>
        HTML;
    }

    echo $html;
    ?>

    @include ('admin/banningReason')
@endsection()

@section("script")
    <script>
        $(document).ready(function() {
            $(".banButton").on("click", function() {
                console.log("Bouton signalé cliqué.");
                $("#banUserForm").css("display", "block");
                $("#userName").html($(this).val());
                $("#userId").val($(this).children(".userId").val());
            });
        });
    </script>
@endsection