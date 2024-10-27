@extends('master')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/overlay-modal.css') }}">

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

<div id="profile_cntr" class="personality {{ $userPersonality }}">
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
                    <button class="buttonDetail btn btn-primary" id="openProfileOverlay">
                        <span class="material-symbols-rounded" style="font-size: 24px; color: #333;">settings</span>
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
                            <li>Courriel validé:
                                {!! Auth::user()->emailVerified ? '<span class="material-symbols-rounded" style="color: green;">check_circle</span>' : '<span class="material-symbols-rounded" style="color: red;">cancel</span>' !!}
                            </li>
                            <li>Sélectionner des intérêts:
                                {!! $interestsSelected ? '<span class="material-symbols-rounded" style="color: green;">check_circle</span>' : '<span class="material-symbols-rounded" style="color: red;">cancel</span>' !!}
                            </li>

                            <li>Faire le test de personnalité:
                                {!! $personalityTestDone ? '<span class="material-symbols-rounded" style="color: green;">check_circle</span>' : '<span class="material-symbols-rounded" style="color: red;">cancel</span>' !!}
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        @endif
        <div class="containerOnglerMain">
            <div class="listOnglet">
                <ul class="nav nav-tabs justify-content-center" id="main-tabs">
                    <li class="nav-item">
                        <a class="nav-link tab-link {{ request()->is('interets/*/interets') || !request()->is('profile/*') ? 'active' : '' }}"
                            href="{{ route('interets.interets', $user->id) }}"
                            data-target="interets/interests">Intérêts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link {{ request()->is('profile/amis') ? 'active' : '' }}"
                            href="{{ route('profile.amis', $user->id) }}" data-target="profile/amis">Mes pals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link {{ request()->is('profile/personnalite') ? 'active' : '' }}"
                            href="{{ route('profile.personnalite', $user->id) }}"
                            data-target="profile/personnalite">Personnalité</a>
                    </li>
                    <li class="nav-item dropdown" id="more-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Plus
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="moreDropdown">
                            <li class="nav-item">
                                <a class="nav-link tab-link {{ request()->is('profile/personnalite') ? 'active' : '' }}"
                                    href="{{ route('profile.personnalite', $user->id) }}"
                                    data-target="profile/personnalite">Personnalité</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tab-link {{ request()->is('profile/personnalite') ? 'active' : '' }}"
                                    href="{{ route('profile.personnalite', $user->id) }}"
                                    data-target="profile/personnalite">Personnalité</a>
                            </li>
                        </ul>
                    <li>
                </ul>
            </div>
            <div id="profile-content" class="onglet_profile"></div>
        </div>

        @endsection()

        @section('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('/js/overlay-modal.js')}}"></script>
        <script src="{{asset('/js/profileOnglet.js')}}"></script>
        <script src="{{asset('/js/resendEmail.js')}}"></script>
                <script>
            function handlePersonalityTestClick() {
                @if (!$emailVerified)
                    document.getElementById('emailVerificationModal').style.display = 'flex';
                @else
                    window.location.href = "{{ route('personality.test') }}";
                @endif
            }
        </script>
        <script>

            $(document).ready(function () {
                var img = document.getElementById("background_img");
                var color = document.getElementById("background_color");

                img.onload = function () {
                    var rgb = getAverageRGB(img);
                    color.style.background = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
                }

                var rgb = getAverageRGB(img);
                color.style.background = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
            });
            function getAverageRGB(img) {
                var canvas = document.createElement('canvas'),
                    context = canvas.getContext && canvas.getContext('2d'),
                    data, width, height, i = -4, length, rgb = { r: 0, g: 0, b: 0 }, count = 0;

                height = canvas.height = img.naturalHeight || img.offsetHeight || img.height;
                width = canvas.width = img.naturalWidth || img.offsetWidth || img.width;

                context.drawImage(img, 0, 0);

                try {
                    data = context.getImageData(0, height - 5, width, 1);
                } catch (e) {
                    return { r: 0, g: 0, b: 0 };
                }

                length = data.data.length;
                while ((i += 20) < length) {
                    count++;
                    rgb.r += data.data[i];
                    rgb.g += data.data[i + 1];
                    rgb.b += data.data[i + 2];
                }

                rgb.r = ~~(rgb.r / count);
                rgb.g = ~~(rgb.g / count);
                rgb.b = ~~(rgb.b / count);

                return rgb;
            }
        </script>
        @endsection()