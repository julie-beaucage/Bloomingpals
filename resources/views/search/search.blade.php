<?php
    use illuminate\Support\Facades\Auth;
    $id = Auth::user();

    $meetupHtml = "";

    foreach ($meetupsData as $meetupData) {
        $routing = route("meetupPage", ["meetupId" => $meetupData->id]);
        $meetupHtml .= <<<HTML
            <div>
                <a href="$routing">
                    $meetupData->nom
                </a>
            </div>
        HTML;
    }
?>

@extends("master")

@section("content")
    <?php
        $html = <<<HTML
            <div class="rencontres">
                {$meetupHtml}
            </div>
        HTML;
        echo $html;
    ?>
@endsection()

@section("scripts")

    <!--javascript-->
@endsection()

@section("style")
    <!--css-->
@endsection()

@section("title")
    Template
@endsection()
