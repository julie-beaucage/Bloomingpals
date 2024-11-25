<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@php
    $userPersonality = $user->getPersonalityGroup();
@endphp

<div class="profile-container {{ $userPersonality }}">
    <h3>À propos de ....</h3>
    <div class="biography_profile">
        <p><strong>Prénom :</strong> {{ $user->first_name }}</p>
        <p><strong>Nom :</strong> {{ $user->last_name }}</p>
        <p><strong>Genre :</strong> {{ $user->gender }}</p>
        <p><strong>Date de naissance:</strong> {{ $user->birthdate }}</p>
    </div>
    <br>
    <h4>Biographie</h2>
    <div class="biography_profile">
        <p>{{ $user->bio }}</p>
    </div>
</div>
