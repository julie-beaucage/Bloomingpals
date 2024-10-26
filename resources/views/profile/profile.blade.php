@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection()
@include('profile.edit-profile-modal', ['style' => 'display: none;'])

@php
    $userPersonality = Auth::user()->getPersonalityType();
@endphp

@section('content')
<div id="background_cntr" class="no_select">
    <div id="background_color"></div>
    <img id="background_img"
        src="{{ $user->background_image ? asset('storage/' . $user->background_image) : asset('/images/R.jpg') }}"
        alt="Bannière du profile">
</div>
<div id="profile_cntr" class="personality {{ $userPersonality  }}">
    <div id="info_cntr">
        <div class="profile-picture no_select">
            <img src="{{ $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png') }}"
                alt="Photo de profil">
        </div>

        <h1 id="profile_name">{{ $user->first_name}} {{ $user->last_name }}</h1>
        <h5>0 amis</h5>
        @if ($user->id == Auth::user()->id)
            <div class="button_profile">
                <div class="text-end">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editProfileModal"
                        style="background: transparent; border: none;">
                        <i class="fas fa-cog" style="font-size: 24px; color: #333;"></i>
                    </button>
                </div>
            </div>

            @if ($profileCompletionPercentage < 100)
                <div class="alert alert-warning mt-3">
                <h5>Vérification du profil :</h5>
                    Complétez votre profil pour pouvoir bloomer de nouvelles relations avec des Pals !
                    <div class="progress mt-4" style="height: 20px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ $profileCompletionPercentage }}%;"
                            aria-valuenow="{{ $profileCompletionPercentage }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $profileCompletionPercentage}}% complété
                        </div>
                    </div>
                    <div class="profile-checklist mt-3">
                <ul>
                    <li>
                        Courriel validé: 
                        @if (Auth::user()->$emailVerified)
                            <i class="fas fa-check-circle" style="color: green;"></i>
                        @else
                            <i class="fas fa-times-circle" style="color: red;"></i>
                        @endif
                    </li>
                    <li>
                        Sélectionner des intérêts: 
                        @if ($interestsSelected)
                            <i class="fas fa-check-circle" style="color: green;"></i>
                        @else
                            <i class="fas fa-times-circle" style="color: red;"></i>
                        @endif
                    </li>
                    <li>
                        Faire le test de personnalité: 
                        @if ($personalityTestDone)
                            <i class="fas fa-check-circle" style="color: green;"></i>
                        @else
                            <i class="fas fa-times-circle" style="color: red;"></i>
                        @endif
                    </li>
                </ul>
            </div>
                </div>
                
            @endif
        @endif

        <div class="containerOnglerMain">
            <div class="listOnglet">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link tab-link {{ request()->is('interets/*/interets') || !request()->is('profile/*') ? 'active' : '' }}"
                            href="{{ route('interets.interets', $user->id) }}"
                            data-target="interets/interests">Intérêts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link {{ request()->is('profile/amis') ? 'active' : '' }}"
                            href="{{ route('profile.amis', $user->id) }}" data-target="profile/amis">Amis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link {{ request()->is('profile/personnalite') ? 'active' : '' }}"
                            href="{{ route('profile.personnalite', $user->id) }}"
                            data-target="profile/personnalite">Personnalité</a>
                    </li>
                </ul>
            </div>
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

    <script>
        $(document).ready(function () {
            // Set the background color of the body
            // to the average color of the banner image
            var img = document.getElementById("background_img");
            var color = document.getElementById("background_color");
            document.body.style.background = 'rgb(0,0,0)';

            img.onload = function () {
                var rgb = getAverageRGB(img);
                color.style.background = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
            }

            // get average color and set
            var rgb = getAverageRGB(img);
            color.style.background = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
        });

        function getAverageRGB(img) {
            var blockSize = 5, // only visit every 5 pixels
                defaultRGB = {
                    r: 0,
                    g: 0,
                    b: 0
                }, // for non-supporting envs
                canvas = document.createElement('canvas'),
                context = canvas.getContext && canvas.getContext('2d'),
                data, width, height,
                i = -4,
                length,
                rgb = {
                    r: 0,
                    g: 0,
                    b: 0
                },
                count = 0;

            height = canvas.height = img.naturalHeight || img.offsetHeight || img.height;
            width = canvas.width = img.naturalWidth || img.offsetWidth || img.width;

            context.drawImage(img, 0, 0);

            try {
                data = context.getImageData(0, height - 5, width, 1);
            } catch (e) {
                console.log('return default')
                return defaultRGB;
            }

            length = data.data.length;
            while ((i += blockSize * 4) < length) {
                ++count;
                rgb.r += Math.pow(data.data[i], 2.2);
                rgb.g += Math.pow(data.data[i + 1], 2.2);
                rgb.b += Math.pow(data.data[i + 2], 2.2);
            }

            // ~~ used to floor values
            rgb.r = ~~Math.pow(rgb.r / count, 1 / 2.2);
            rgb.g = ~~Math.pow(rgb.g / count, 1 / 2.2);
            rgb.b = ~~Math.pow(rgb.b / count, 1 / 2.2);

            return rgb;
        }
    </script>
    @endsection()