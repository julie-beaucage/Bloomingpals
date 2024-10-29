@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection()
@include('profile.edit-profile-modal', ['style' => 'display: none;'])

@include('profile.edit-profile-modal')
@include('profile.settings-page')
@include('profile.confidentiality')
@include('profile.account-settings-password')
@include('profile.account-settings')
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
<div id="profile_cntr"  class="personality {{ $userPersonality  }}">
    <div id="info_cntr">
        <div class="profile-picture no_select">
            <img src="{{ $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png') }}"
                alt="Photo de profil">
        </div>

        <h1 id="profile_name">{{ $user->first_name}} {{ $user->last_name }}</h1>
        <h5>0 amis</h5>
        <div class="button_profile">
            @if ($user->id == Auth::user()->id)
                <button type="button" class="btnProfile" data-bs-toggle="modal" data-bs-target="#settings">
                    Paramètres
                </button>
            @endif
        </div>

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
                        <a onclick="refreshFormFields()"
                            class="nav-link tab-link {{ request()->is('profile/personnalite') ? 'active' : '' }}"
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
        const crsf = $('meta[name="csrf-token"]').attr('content');
        function refreshFormFields() {
            $("#password-enter").removeClass('is-invalid').val("");
            $('#feedback-account').removeClass('invalid-feedback').text("Entrez votre mot de passe pour accéder à vos informations");

            // Reset the new password input
            $("#password-account").removeClass('is-invalid').val("");
            $('#feedback-new-password').removeClass('invalid-feedback').text("");

            // Reset the confirm password input
            $("#password-account2").removeClass('is-invalid').val("");
            $('#feedback-new-password2').removeClass('invalid-feedback').val("");

            $("#email").removeClass('is-invalid').val("");
            $('#feedback-account-email').removeClass('invalid-feedback').text("");
        }

        $(document).ready(function () {
            $("#account-settings-password-form").submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: 'checkPassword',
                    type: "POST",
                    data: $("#account-settings-password-form").serialize(),
                    success: function (data) {
                        if (data == 1) {
                            $("#account-settings-password").modal('hide');
                            $("#account-settings").modal('show');
                        }
                        else {
                            $("#password-enter").addClass('is-invalid').focus();
                            $('#feedback-account').addClass('invalid-feedback').text(data);
                        }
                    }
                });

            });
            document.getElementById('account-settings-form').addEventListener('submit', async function (e) {
                let data = new FormData(e.target);
                e.preventDefault();

                let error = false;


                if (data.get('password') != data.get('password2')) {
                    msg = "Les mots de passe sont différents";
                    $("#password-account").addClass('is-invalid');
                    $('#feedback-new-password').addClass('invalid-feedback').text(msg);

                    $("#password-account2").addClass('is-invalid');
                    $('#feedback-new-password2').addClass('invalid-feedback').text(msg);
                    error = true;
                }
                if (data.get('email') !== '') {
                    try {
                        const result = await new Promise((resolve) => {
                            $.ajax({
                                url: '/profile/checkEmail',
                                type: "POST",
                                data: { email: data.get('email'), _token: crsf },
                                success: function (res) {
                                    resolve(res);
                                }
                            });
                        });

                        // Check the result
                        if (result == 1) {
                            $("#email").addClass('is-invalid');
                            $('#feedback-account-email').addClass('invalid-feedback').text("Email déjà utilisé");
                            error = true;
                        } else {
                            $("#email").removeClass('is-invalid');
                            $('#feedback-account-email').removeClassClass('invalid-feedback').text("");
                        }

                    } catch (er) { }
                }
                if (error == false) {
                    console.log("s");
                    account_settings_form = true;
                    $("#account-settings").modal('hide');
                    this.submit();
                }

            });


            let arrows = document.querySelectorAll(".arrow");
            arrows.forEach((elem) => {
                elem.addEventListener("click", function (event) {

                    arrow = event.target.parentNode.parentNode.lastElementChild;
                    if (arrow.style.display == "none") {
                        arrow.style.display = "block";
                        event.target.innerHTML = "keyboard_arrow_down";
                    }
                    else {
                        arrow.style.display = "none";
                        event.target.innerHTML = "keyboard_arrow_right";
                    }
                });
            });


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