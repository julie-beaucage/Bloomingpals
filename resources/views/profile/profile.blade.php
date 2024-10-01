@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

@endsection()

@section('content')
<div class="profileMain">
    <div class="profile-background "
        style="background-image: url('{{ asset('storage/' . Auth::user()->background_image) }}')">
        <div class="profile-info">
            <img class="profile-picture"
                src="{{ Auth::user()->image_profile ? asset('storage/' . Auth::user()->image_profile) : asset('/images/flower.png') }}"
                alt="" />
            <h2>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h2>
            <div class="button_profile">
                <button type="button" class="btnProfile" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    Modifier le profil
                </button>
            </div>
        </div>
    </div>

    @include('profile.edit-profile-modal')
    <div class="containerOnglerMain">
        <div class="listOnglet">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link tab-link {{ request()->is('profile/amis') ? 'active' : '' }}"
                        href="{{ route('profile.amis', Auth::user()->id) }}" data-target="profile/amis">Amis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tab-link {{ request()->is('profile/personnalite') ? 'active' : '' }}"
                        href="{{ route('profile.personnalite', Auth::user()->id) }}"
                        data-target="profile/personnalite">Personnalité</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tab-link {{ request()->is('interets/*/interets') ? 'active' : '' }}"
                        href="{{ route('interets.interets', Auth::user()->id) }}"
                        data-target="interets/interests">Intérêts</a>
                </li>
            </ul>
        </div>
        <br>
        <div id="profile-content" class="onglet_profile">

    </div>
    </div>

</div>
@endsection()

@section('script')
<script src="{{asset('/js/profileOnglet.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

@endsection()