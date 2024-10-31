@extends('master')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">
<link rel="stylesheet" href="{{ asset('css/overlay-modal.css') }}">
<link rel="stylesheet" href="{{ asset('css/interets.css') }}">
<link rel="stylesheet" href="{{ asset('css/personality.css') }}">

@endsection()
@php
    $userPersonality = Auth::user()->getPersonalityType();
@endphp

@include('profile.settings-page')
@include('profile.confidentiality')
@include('profile.account-settings-password')
@include('profile.account-settings')

@section('content')
<div id="profile-overlay-cntr" class="overlay-cntr">
    @if ($user->id == Auth::user()->id)
        <x-email-verification-modal />
        @include('profile.edit-profile-modal', ['style' => 'display: none;'])
    @endif
</div>

<div id="background_cntr" class="no_select">
    <div id="background_color"></div>
    <img id="background_img"
        src="{{ $user->background_image ? asset('storage/' . $user->background_image) : asset('/images/R.jpg') }}"
        alt="Bannière du profile">
</div>

<div id="profile_cntr" class="personality {{ $userPersonality }}">
    <div id="info_cntr" class="personality {{ $userPersonality }}">
        <div class="profile-picture no_select">
            <img src="{{ $user->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png') }}"
                alt="Photo de profil">
        </div>

        <h1 id="profile_name">{{ $user->first_name }} {{ $user->last_name }}
            @if ($user->id == Auth::user()->id)
                <button class="icon-btn hover_darker" id="openProfileOverlay" title="Modifier profile"
                    data-bs-toggle="modal" data-bs-target="#settings">
                    <span class="material-symbols-rounded">settings</span>
                </button>
            @endif
        </h1>
        @if (Auth::user()->id == $user->id)

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
                                {!! $emailVerified ? '<span class="material-symbols-rounded" style="color: green;">check_circle</span>' : '<span class="material-symbols-rounded" style="color: red;">cancel</span>' !!}
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
        @elseif ($relation == "Friend")
            <a href="{{ route("RemoveFriend", ["id" => $user->id])}}">
                <div class="red_button no_select">Enlever l'amitier</div>
            </a>
        @elseif ($relation == "Blocked")
            <div class="red_button no_select">You are blocked</div>
        @elseif ($relation == "SendingInvitation")
            <div class="acceptContainer">
                <a href="{{ route("CancelFriendRequest", ["id" => $user->id])}}">
                    <div class="red_button">annuler la demande d'amitier</div>
                </a>
            </div>
        @elseif ($relation == "Invited")
            <div class="acceptContainer">
                <a href="{{ route("AcceptFriendRequest", ["id" => $user->id])}}">
                    <div class="green_button">Accepter</div>
                </a>
                <a href="{{ route("RefuseFriendRequest", ["id" => $user->id])}}">
                    <div class="red_button">Refuser</div>
                </a>
            </div>
        @elseif ($relation == "Refuse")
            <div class="grey_button">Vous avez été refusé</div>
        @else
            <a href="{{ route("SendFriendRequest", ["id" => $user->id])}}">
                <div class="blue_button">Ajouter en ami</div>
            </a>
        @endif

        <div class="containerOnglerMain">
            <div class="listOnglet">
                <ul class="nav nav-tabs justify-content-center" id="main-tabs">
                    <li class="nav-item">
                        <a class="nav-link tab-link no_wrap {{ request()->is('interets/*/interets') || !request()->is('profile/*') ? 'active' : '' }}"
                            href="{{ route('interets.interets', $user->id) }}"
                            data-target="interets/interests">Intérêts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link no_wrap {{ request()->is('profile/amis') ? 'active' : '' }}"
                            href="{{ route('profile.amis', $user->id) }}" data-target="profile/amis">Mes pals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link no_wrap {{ request()->is('profile/personnalite') ? 'active' : '' }}"
                            href="{{ route('profile.personnalite', $user->id) }}"
                            data-target="profile/personnalite">Personnalité</a>
                    </li>
                    <li class="nav-item dropdown" id="more-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Plus
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="moreDropdown">
                            <li class="nav-item" title="Events">
                                <a class="nav-link tab-link {{ request()->is('profile/events') ? 'active' : '' }}"
                                    href="{{ route('profile.events', $user->id) }}"
                                    data-target="profile/events">Événement</a>
                            </li>
                            <li class="nav-item" title="Rencontres">
                                <a class="nav-link tab-link {{ request()->is('profile/rencontres') ? 'active' : '' }}"
                                    href="{{ route('profile.rencontres', $user->id) }}"
                                    data-target="profile/rencontres">Rencontres</a>
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
        <script src="{{ asset('/js/profileOnglet.js') }}"></script>
        <script src="{{ asset('/js/resendEmail.js') }}"></script>
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
            function showModal(modalId) {
                console.log(document.body.innerHTML);
                document.getElementById(modalId).style.display = 'flex';
            }

            function closeModal(modalId) {
                document.getElementById(modalId).style.display = 'none';
            }

            function handlePersonalityTestClick() {
                @if (!$emailVerified)
                    showModal('emailVerificationModal');
                @else
                    localStorage.removeItem('personalityAnswers');
                    window.location.href = "{{ route('personality.test') }}";
                @endif
            }

            function closeVerificationModal() {
                closeModal('emailVerificationModal');
                document.getElementById('originalMessage').style.display = 'block';
                document.getElementById('successMessage').style.display = 'none';
            }

            function handleSubmit(event) {
                event.preventDefault();
                fetch("{{ route('verification.resend') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({})
                })
                    .then(response => {
                        if (response.ok) {
                            document.getElementById('originalMessage').style.display = 'none';
                            document.getElementById('successMessage').style.display = 'block';
                            console.log("Email de vérification renvoyé avec succès.");
                        } else {
                            console.error("Échec de l'envoi de l'email de vérification.");
                        }
                    })
                    .catch(error => console.error("Erreur réseau:", error));
            }

            function previewImage(event, previewId) {
                const file = event.target.files[0];
                const preview = document.getElementById(previewId);

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
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


                document.addEventListener("DOMContentLoaded", function () {
                    $("#profile-content").on("DOMSubtreeModified", function () {
                        $(".close").each(function () {
                            $(this).click(function () {
                                const modalId = $(this).data("modal-id");
                                closeModal(modalId);
                            });
                        });
                    });

                    // $(document).on("click", "#openProfileOverlay", function () {
                    //     showModal("overlayProfile");
                    // });

                    $(document).on("click", "#openInterestOverlay", function () {
                        @if (!$emailVerified)
                            showModal('emailVerificationModal');
                        @else
                            showModal('overlayInterests');
                        @endif
                    });
                });
                let arrows = document.querySelectorAll(".arrow");
                    
                    arrows.forEach((elem) => {
                        elem.addEventListener("click", function (event) {
                            console.log('click');

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
            });
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