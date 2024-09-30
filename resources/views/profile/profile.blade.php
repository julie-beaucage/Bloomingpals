@extends("master")

@section("content")
        <div class="profile-background " style="background-image: url('{{ asset('storage/' . Auth::user()->background_image) }}')">
            <div class="profile-info">
              <img class="profile-picture" src="{{ Auth::user()->image_profile ? asset('storage/' . Auth::user()->image_profile) : asset('/images/flower.png')}}" alt="" />
              <h2>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h2>
              <div class="button_profile">
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
             Modifier le profil
             </button>
       </div>
            </div>
        </div>

@include('profile.edit-profile-modal')
<div class="listOnglet">
        <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link tab-link {{ request()->is('profile/amis') ? 'active' : '' }}" href="{{ route('profile.amis', Auth::user()->id) }}" data-target="profile/amis">Amis</a>
        </li>
        <li class="nav-item">
            <a class="nav-link tab-link {{ request()->is('profile/personnalite') ? 'active' : '' }}" href="{{ route('profile.personnalite', Auth::user()->id) }}" data-target="profile/personnalite">Personnalité</a>
        </li>
        <li class="nav-item">
            <a class="nav-link tab-link {{ request()->is('interets/*/interets') ? 'active' : '' }}" href="{{ route('interets.interets', Auth::user()->id) }}" data-target="interets/interests">Intérêts</a>
        </li>
    </ul>
    </div>
    <div id="profile-content" class="onglet_profile">
        @include('profile.amis') 
    </div>


    @endsection()
