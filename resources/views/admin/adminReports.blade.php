@extends("master");

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/overlay-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interets.css') }}">
    <link rel="stylesheet" href="{{ asset('css/personality.css') }}">
@endsection()

@section('content')
    <?php

    $html = "";
    use App\Models\User_Interest; 
    use App\Models\Interest;


    foreach ($reports as $report) {


        $image = $report['user_send']->image_profil ? asset('storage/' . $report->image_profil) : asset('/images/simple_flower.png');
        $tags = "";

        $user_interests = User_Interest::where('id_user', $report['user_send']->id)->get();
        $count = "";
        if ($count != "Undefined") {
            $count = count($user_interests);
        } else {
            $count = 0;
        }
        
        for ($i = 0; $i < $count && $i < 2; $i++) {
            $interest = Interest::find($user_interests[$i]->id_interest);
            if ($interest == null) continue;
            
            $tags .= '<span class="tag" style="background-color: var(--category-'. $interest->id_category .')">' . $interest->name . '</span>';
        }

        if ($count > 2) {
            $tags .= '<span class="tag square_tag">+' . ($count - 2) . '</span>';
        }

        $route = route("profile", ["id" => $report['user_send']->id]);

        $html .= <<<HTML
            <a class="card_long no_select hover_darker" href="$route">
                <div class="banner">
                    <img src="$image" alt="Image de profile de {$report['user_send']->first_name} {$report['user_send']->last_name}">
                </div>
                <div class="content">
                    <div class="header">
                        <div class="text_nowrap name_cntr">
                            <span class="name">{$report['user_send']->first_name} {$report['user_send']->last_name}</span>
                        </div>
                        <div class="tags_cntr">
                            {$tags}
                        </div>
                    </div>
                </div>
            </a>
        HTML;
    }

    echo $html;
    ?>
@endsection()