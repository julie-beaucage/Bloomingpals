@extends("master")

@section("style")
    <link rel="stylesheet" href="{{ asset('css/page/event.css') }}">
@endsection()

@section("content")
    <div class="event_image" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">
        
    </div>
    <div class="detail_container">
        <div class="principal_info">
            <div class="organisator_profile">
                <div class="profile_icon no_select" style="background-image: url(https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg)">
                    
                </div>
                <div class="username_container">
                    <div class="title5">Nom</div>
                    <div class="grey_text">surnom</div>
                </div>
            </div>
            <div class="event_name_container">
                <div class="title4 right_text">
                    Nom de l'event
                </div>
                <div class="tags">
                    <div>
                        tag1
                    </div>
                    <div>
                        tag2
                    </div>
                </div>
            </div>
        </div>
        <a href="">
            <div class="blue_button">
                rejoindre
            </div><br>
        </a>
        <div class="title6 no_select">Information</div>
    </div>
@endsection()