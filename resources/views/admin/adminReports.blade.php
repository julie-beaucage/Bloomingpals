@extends("master");

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

        $html .= <<<HTML
            <div class="flexRow maxWidth">
                    <a class="userCard card_long no_select hover_darker" href="$route">
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
                        <div class="whitebg flexRow center">
                            <div>
                                report to:
                            </div>
                        </div>
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
                    </a><br><br>
            </div>
        HTML;
    }

    echo $html;
    ?>
@endsection()