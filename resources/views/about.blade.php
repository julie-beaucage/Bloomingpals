@extends('master')
@section('title', 'À propos')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/about.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/overlay-modal.css') }}">
@endsection()
@section("content")
    <!-- Formulaire de connexion et d'inscription en MODAL CSS SANS BOOTRAPS -->
    <div class="custom-overlay" id="loginOverlay" style="display: none;">
        <div class="container-custom-modal">
            <div class="header">
                <span id="title-empty" class="title no_wrap"></span>
                <button id="icone_back" class="back" onclick="showLogin()" style="border: none; background: none; display: none;">
                  <span class="material-symbols-rounded" style="font-size: 24px; color: black;">chevron_left</span>
                </button>
                <button class="close" onclick="closeOverlay()">
                    <span class="material-symbols-rounded" style="font-size: 24px; color: black;">close</span>
                </button>
            </div>
            <div class="pageContainerLogin">
                <div class="img_login_left">
                    <div class="image_login">
                        <img src="{{ asset('images/logoBloom.png') }}" alt="logo" class="imgLogo" />
                    </div>
                    <h1>BloomingPals</h1>
                    <p>Une expérience d'amitié nouvelle et captivante !</p>
                </div>
                @include('auth/login')
                @include('auth/signIn')           
            </div>
        </div>    
        <div class="flash-error" style="display: none; color: red;"></div>
    </div>
 <!-- --------------------------------------------------------------------->
    <div class="cover-container ">
        <div class="imgContainer">
          <img src="{{asset("../images/logoBloom.png")}}" alt="logo" class="icecream" />
        </div>
        <div class="container-cover-text ">
            <h1>BloomingPals</h1>
            <h2>Faites fleurir l'amitié</h2>
            <h3>A Propos...</h3>
        </div>
    </div>
    <div class="container">
        <div class="histoire">
            <h3>L'origine de BloomingPals</h3>
            <p>
                Tout a commencé en septembre 2024, lorsque nous avons reçu un 
                projet pour notre cours d'intégration. En nous réunissant en 
                équipe, nous avons rapidement réalisé que nos idées étaient 
                similaires et que nous partagions plusieurs points communs. 
                Parmi eux, une compétence <strong>sociale</strong> 😂 exceptionnelle (ou du moins, 
                c'est ce que nous aimons croire !).
            </p>
            <p>
                C'est alors qu'une idée s'est imposée : <em>
                "Pourquoi ne pas créer une application web pour aider 
                les gens à se faire de nouveaux amis ?"</em>. 
                De cette réflexion est née <strong>BloomingPals</strong>, 
                une plateforme conçue pour faire fleurir les amitiés.
            </p>
            <h3>Notre mission</h3>
            <p>
                BloomingPals est bien plus qu'une simple application :
                 c'est un espace où les amitiés prennent racine et prospèrent. 
                 Notre objectif est de faciliter la création de nouvelles connexions 
                 et d'élargir les cercles sociaux. Explorez les événements 
                 organisés à travers le Québec, créez des rencontres 
                 et partagez des moments inoubliables avec des personnes 
                 qui partagent vos intérêts.
            </p>
        </div>
        <div class="img_beg">
            <p class="text">
                "La seule façon d'avoir un ami est d'en être un."              
            </p>
            <cite class="citation">- De Ralph Waldo Emerson</cite>
        </div>
    </div>
    <div class="Fonctionnement_container container ">
        <div class="histoire">
            <h2>Comment ça marche ?</h2>
            <ol>
                <li>Inscrivez-vous et remplissez votre profil à 100%. Confirmez votre courriel pour accéder à toutes les fonctionnalités, complétez le test de personnalité et choisissez vos intérêts.</li>
                <li>Explorez les événements disponibles dans votre région.</li>
                <li>Créez un meetup pour rencontrer de futurs amis ! Vous pouvez choisir un événement ou en organiser un vous-même, comme aller à la plage ou assister à un spectacle.</li>
            </ol>
            <a href="{{ route('faq') }}" class="btn_primary">En savoir plus</a>
        </div>
        <div clas="video_container">
          <iframe  src="https://www.youtube.com/embed/ZnT2azDpIA0?si=MvjpG-UIKiC3rIbu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
    <div class="container_action">
        <h2>Ce que vous pouvez faire</h2>
        <ul class="cards">
            <li class="cards__item">
                <div class="card">
                <div class="card__image card__image--fence"></div>
                <div class="card__content">
                    <div class="card__title">🎉 Événements dans votre région</div>
                    <p class="card__text">
                        Restez au courant des événements réels autour de vous, 
                        comme des spectacles, des activités ou 
                        des rencontres communautaires.
                    </p>
                </div>
                </div>
            </li>
            <li class="cards__item">
                <div class="card">
                <div class="card__image card__image--chat"></div>
                <div class="card__content">
                    <div class="card__title">💬 Clavarder</div>
                    <p class="card__text">
                    Discutez avec vos amis dans un espace convivial et développez vos relations.
                    </p>
                </div>
                </div>
            </li>
            <li class="cards__item">
                <div class="card">
                <div class="card__image card__image--perso"></div>
                <div class="card__content">
                    <div class="card__title">🧠 Test de personnalité</div>
                    <p class="card__text">
                    Découvrez votre type de personnalité grâce au test Myers-Briggs et trouvez des personnes qui partagent vos traits.
                    </p>
                </div>
                </div>
            </li>
            <li class="cards__item">
                <div class="card">
                <div class="card__image card__image--meetups"></div>
                <div class="card__content">
                    <div class="card__title">🤝 Créer des meetups</div>
                    <p class="card__text">
                    Organisez vos propres meetups pour rencontrer de nouvelles personnes partageant vos intérêts.
                    </p>
                </div>
                </div>
            </li>
        </ul>
    </div>

@endsection
@section('script')
<script src="{{asset('/js/home-Overlay-login.js')}}"></script>
<script>
    function openOverlay() {
        document.getElementById("loginOverlay").style.display = "flex";
    }

    function closeOverlay() {
        document.getElementById("loginOverlay").style.display = "none";

    }
    document.addEventListener("DOMContentLoaded", function () {
        const joinButton = document.querySelector(".rejoindre_btn");
        if (joinButton) {
            joinButton.addEventListener("click", openOverlay);
        }
    });

    function showSignUp() {
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("signUpForm").style.display = "block";
        document.getElementById("icone_back").style.display = "block";
        document.getElementById("title-empty").style.display = "none";
    }

    function showLogin() {
        document.getElementById("signUpForm").style.display = "none";
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("icone_back").style.display = "none";
        document.getElementById("title-empty").style.display = "block";
    }

</script>
<script>
    window.onload = () => {
        var errorLogin = "{{ session('errorLogin') }}";
        var errorMessage = "{{ session('error') }}";
        var showModal = "{{ session('showModal') }}";
        var showModalLogin = "{{ session('showModalLogin') }}";
        console.log(errorMessage);
       if (showModalLogin ) {
            document.getElementById("loginOverlay").style.display = "flex"; 
        }
        if(showModal){
            document.getElementById("loginOverlay").style.display = "flex"; 
            showSignUp();
        }
    };
</script>
@endsection