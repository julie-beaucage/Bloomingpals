@extends("master")

@section("content")
    <span>
    <div class="profile-container">
        <!-- Photo de couverture -->
        <div class="cover-photo">
            <img src="{{ asset('storage/' . $user->cover_photo) }}" alt="Photo de couverture">
        </div>

        <!-- Contenu du profil -->
        <div class="profile-content">
            <!-- Photo de profil -->
            <div class="profile-avatar">
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Photo de profil">
            </div>

            <!-- Nom et informations -->
            <div class="profile-info">
                <h1>{{ $user->name }}</h1>
                <p>{{ $user->bio }}</p>
            </div>
        </div>
    </div>
    </span>
@endsection()