@extends("master")

@section("style")
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
@endsection()

@section("content")
    <div class="event-image" src="https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg">
        
    </div>
    <div class="detail-container">
        <div class="principal-info">
            <div class="organisaton-profile">
                <img class="profile-icon no-select" src="https://img.freepik.com/photos-gratuite/beaute-abstraite-automne-dans-motif-veines-feuilles-multicolores-genere-par-ia_188544-9871.jpg"/>
                <div class="username-container">
                    <div>Nom</div>
                    <div class="greyText">surnom</div>
                </div>
            </div>
            <div class="event-name-container">
                <div class="right-text">
                    Nom de l'event
                </div>
                <div>
                    <div class="tag">
                        tag1
                    </div>
                    <div class="tag">
                        tag2
                    </div>
                </div>
            </div>
        </div>
        <div class="button-primary">
            rejoindre
        </div><br>
        <div class="no-select">Information</div>
    </div>
@endsection()