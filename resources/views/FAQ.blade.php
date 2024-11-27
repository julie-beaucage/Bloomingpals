@extends('master')

@section('title', 'FAQ')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/about.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/overlay-modal.css') }}">
@endsection()

@section('content')
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
<div class="faq-container">
    <h1>FAQ - BloomingPals</h1>
    <div class="accordion">
        <div class="accordion-item">
            <div class="accordion-header">Quel est le but du site web BloomingPals ?</div>
            <div class="accordion-body">
                <p>Le but est d'aider les utilisateurs à s'épanouir socialement en se faisant de nouveaux amis partageant des intérêts et des personnalités similaires.</p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-header">Qu'est-ce qu'un meetup ?</div>
            <div class="accordion-body">
                <p>Un meetup est une rencontre que les utilisateurs peuvent créer. Ils peuvent choisir le thème, la date, le lieu et le nombre de participants autorisés.</p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-header">Qu'est-ce qu'un événement ?</div>
            <div class="accordion-body">
                <p>Un événement est une activité ou une occasion spéciale, souvent tirée directement du site Evenoko. Les utilisateurs peuvent s'y inscrire ou s'en inspirer pour créer leurs propres meetups.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header">De quoi est basé le test de personnalité BloomingPals ?</div>
            <div class="accordion-body">
            <p>
                Le test de personnalité BloomingPals est basé sur le modèle **Myers-Briggs Type Indicator (MBTI)**. 
                Ce modèle explore 16 types de personnalité en combinant quatre dimensions principales :
            </p>
            <ul>
                <li>
                    <strong>Extraversion (E) vs. Introversion (I)</strong> : 
                    Cette dimension détermine si vous êtes plus énergisé par des interactions sociales (Extraversion) 
                    ou par la réflexion et le temps passé seul (Introversion).
                </li>
                <li>
                    <strong>Sensation (S) vs. Intuition (N)</strong> : 
                    Elle définit si vous préférez vous concentrer sur les faits concrets et les détails (Sensation) 
                    ou sur les concepts, les idées et les possibilités (Intuition).
                </li>
                <li>
                    <strong>Pensée (T) vs. Sentiment (F)</strong> : 
                    Cette dimension examine si vous prenez principalement vos décisions de manière logique et rationnelle (Pensée) 
                    ou en fonction des émotions et des valeurs humaines (Sentiment).
                </li>
                <li>
                    <strong>Jugement (J) vs. Perception (P)</strong> : 
                    Elle indique si vous préférez un mode de vie organisé et planifié (Jugement) 
                    ou flexible et adaptable (Perception).
                </li>
            </ul>
            <p>
                Le test BloomingPals utilise ces dimensions pour déterminer votre type de personnalité, 
                qui vous permet de mieux vous comprendre et de trouver des correspondances plus adaptées sur notre plateforme.
                Grâce à ce système, vous pouvez établir des connexions avec des personnes partageant des intérêts 
                et des styles de communication compatibles.
            </p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header">Pourquoi la couleur de mon profil a-t-elle changé ?</div>
            <div class="accordion-body">
                <p>
                    La couleur de thème de votre profil change en fonction de votre type de personnalité. 
                    Voici les associations : 
                </p>
                <ul>
                    <li><strong>Analystes</strong> : Mauve</li>
                    <li><strong>Sentinelles</strong> : Bleu</li>
                    <li><strong>Explorateurs</strong> : Jaune</li>
                    <li><strong>Diplomates</strong> : Vert</li>
                </ul>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-header">Que signifient les lettres du test MBTI ?</div>
            <div class="accordion-body">
                <ul>
                    <li><strong>E (Extraversion)</strong> : Orienté vers le monde extérieur, aime interagir avec les autres.</li>
                    <li><strong>I (Introversion)</strong> : Préfère se concentrer sur son monde intérieur et les idées.</li>
                    <li><strong>S (Sensation)</strong> : Se concentre sur les faits et les détails concrets.</li>
                    <li><strong>N (Intuition)</strong> : Préfère se concentrer sur les concepts et les possibilités.</li>
                    <li><strong>T (Thinking)</strong> : Prend des décisions basées sur la logique et les faits.</li>
                    <li><strong>F (Feeling)</strong> : Prend des décisions en tenant compte des émotions et des valeurs.</li>
                    <li><strong>J (Judging)</strong> : Préfère une structure et une organisation dans la vie.</li>
                    <li><strong>P (Perceiving)</strong> : Préfère être flexible et spontané.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('/js/home-Overlay-login.js')}}"></script>
<script>
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', () => {
            const accordionItem = header.parentElement;
            accordionItem.classList.toggle('active');
        });
    });
</script>
<script>
    window.onload = () => {
        const wrapper = document.querySelector('.carousel-wrapper');
        const cards = document.querySelectorAll('.carousel-card');
        cards.forEach(card => {
            wrapper.appendChild(card.cloneNode(true)); 
        });
    };

</script>
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
