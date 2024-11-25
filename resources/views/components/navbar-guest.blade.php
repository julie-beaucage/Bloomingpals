@if (!Auth::check())
    <navbar-guest id="header-guest" class="header-nav-guest">
        <a class="title no_select" href="{{ route('home') }}">BloomingPals
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
        </a>
        <div class="menus-guest">            
            <a href="#" id="loginBtn" class="nav-link">Connexion</a>
            <a href="#" id="signUpBtn" class="nav-link">S'inscrire</a>
        </div>
    </navbar-guest>
@endif
