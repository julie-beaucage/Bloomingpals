@if (!Auth::check())
    <navbar-guest id="header-guest" class="header-nav-guest">
        <span class="title no_select">BloomingPals
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
        </span>
        <div class="menus-guest">
            <a href="{{ route('home') }}" class="navbar-item-guest">
                <!--<span class="material-symbols-rounded icon_md">home</span>-->Accueil
            </a>
            <a href="{{ route('login.form') }}" class="navbar-item-guest">
                <!--<span class="material-symbols-rounded icon_md">quiz</span>--->Connexion
            </a>
            <a href="{{ route('register.form') }}" class="navbar-item-guest">
                <!--<span class="material-symbols-rounded icon_md">person_add</span>-->S'inscrire
            </a>
        </div>
    </navbar-guest>
@endif
