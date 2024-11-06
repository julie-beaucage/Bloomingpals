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
        $route = route("profile", ["id" => $report['user_send']->id]);

        $image = $report['user_receive']->image_profil ? asset('storage/' . $report->image_profil) : asset('/images/simple_flower.png');
        $route = route("profile", ["id" => $report['user_receive']->id]);


        $routeUserThatReported = route("banUser", ["id" => $report["user_send"], "reason" => ""]);
        $routeUserReported = route("banUser", ["id" => $report["user_receive"], "reason" => ""]);

        $html .= <<<HTML
            <div class="whitebg maxWidth">
                <div class="flexRow maxWidth">
                    <div class="userCard maxWidth">
                        <a class="card_long no_select hover_darker" href="$route">
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
                        <button class="red_button banButton" value="user">
                            Bannir
                        </button><br>
                        <div>
                            <h5>objet:</h5>
                            {$report["object_type"]->name}<br><br>
                            <h5>Raison:</h5>
                            {$report['object']}
                        </div>
                    </div>
                    <div class="flexRow center">
                        <div>
                            report to:
                        </div>
                    </div>
                    <div class="userCard maxWidth">
                        <a class="userCard card_long no_select hover_darker" href="$route">
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
                        <button class="red_button banButton" value="user">
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
            });
        });
    </script>
@endsection