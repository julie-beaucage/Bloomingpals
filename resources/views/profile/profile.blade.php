@extends('master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection()

@include('profile.edit-profile-modal')

@section('content')

<div id="background_cntr" class="no_select">
    <div id="background_color"></div>
    <img id="background_img" src="{{ $user->background_image ? asset('storage/' . $user->background_image) : asset('/images/R.jpg') }}"
        alt="Bannière du profile">
</div>
<div id="profile_cntr">
    <div id="info_cntr">
        <div class="profile-picture no_select">
            <img src="{{ $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png') }}"
                alt="Photo de profil">
        </div>

        <h1 id="profile_name">{{ $user->first_name }} {{ $user->last_name }}</h1>
        @if (Auth::user()->id == $user->id)
            <div class="button_profile">
                <button type="button" class="btnProfile" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    Modifier le profil
                </button>
            </div>
        @elseif ($relation == "Friend")
        <a href="{{ route("RemoveFriend", ["id" => $user->id])}}"><div class="red_button no_select">Enlever l'amitier</div></a>
        @elseif ($relation == "Blocked")
            <div class="red_button no_select">You are blocked</div>
        @elseif ($relation == "SendingInvitation")
            <div class="acceptContainer">
                <a href="{{ route("CancelFriendRequest", ["id" => $user->id])}}"><div class="red_button">annuler la demande d'amitier</div></a>
            </div>
        @elseif ($relation == "Invited")
            <div class="acceptContainer">
                <a href="{{ route("AcceptFriendRequest", ["id" => $user->id])}}"><div class="green_button">Accepter</div></a>
                <a href="{{ route("RefuseFriendRequest", ["id" => $user->id])}}"><div class="red_button">Refuser</div></a>
            </div>
        @elseif ($relation == "Refuse")
            <div class="grey_button">Vous avez été refuser</div>
        @else
            <a href="{{ route("SendFriendRequest", ["id" => $user->id])}}"><div class="blue_button">Ajouter en ami</div>
            {{$relation}}
            {{$relationRequest}}
        @endif

    <div class="containerOnglerMain">
        <div class="listOnglet">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item" title="Intérêts">
                    <a class="nav-link tab-link {{ request()->is('interets/*/interets') || request()->is('profile/personnalite') || !request()->is('profile/*') ? 'active' : '' }}"
                        href="{{ route('interets.interets', $user->id) }}" data-target="interets/interests">Informations</a>
                </li>
                <li class="nav-item" title="Amis">
                    <a class="nav-link tab-link {{ request()->is('profile/amis') ? 'active' : '' }}"
                        href="{{ route('profile.amis', $user->id) }}" data-target="profile/amis">Amis</a>
                </li><!--
                <li class="nav-item" title="Personalité">
                    <a class="nav-link tab-link {{ request()->is('profile/personnalite') ? 'active' : '' }}"
                        href="{{ route('profile.personnalite', $user->id) }}"
                        data-target="profile/personnalite">Personnalité</a>
                </li>-->
                <li class="nav-item" title="Events">
                    <a class="nav-link tab-link {{ request()->is('profile/events') ? 'active' : '' }}"
                        href="{{ route('profile.events', $user->id) }}"
                        data-target="profile/events">Activitées</a>
                </li><!--
                <li class="nav-item" title="Rencontres">
                    <a class="nav-link tab-link {{ request()->is('profile/rencontres') ? 'active' : '' }}"
                        href="{{ route('profile.rencontres', $user->id) }}"
                        data-target="profile/rencontres">Rencontres</a>
                </li>-->
            </ul>
        </div>
        <div id="information_container" class="onglet_profile">
            <div id="SubMenu" class="onglet_profile"></div>
            <div id="profile-content" class="onglet_profile"><!--information html--></div>
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
    $(document).ready(function() {
        // Set the background color of the body
        // to the average color of the banner image
        var img = document.getElementById("background_img");
        var color = document.getElementById("background_color");
        document.body.style.background = 'rgb(0,0,0)';

        img.onload = function() {
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
            data = context.getImageData(0, height-5, width, 1);
        } catch (e) {
            console.log('return default')
            return defaultRGB;
        }

        length = data.data.length;
        while ( (i += blockSize * 4) < length ) {
            ++count;
            rgb.r += Math.pow(data.data[i], 2.2);
            rgb.g += Math.pow(data.data[i+1], 2.2);
            rgb.b += Math.pow(data.data[i+2], 2.2);
        }

        // ~~ used to floor values
        rgb.r = ~~Math.pow(rgb.r/count, 1/2.2);
        rgb.g = ~~Math.pow(rgb.g/count, 1/2.2);
        rgb.b = ~~Math.pow(rgb.b/count, 1/2.2);
        
        return rgb;
    }
</script>
@endsection()