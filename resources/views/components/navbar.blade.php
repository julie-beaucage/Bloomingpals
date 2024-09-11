<div id="navbar">

    <span class="title no_select">BloomingPals</span>

    <span class="utilisateurNom">
        <p>Bonjour {{auth()->user()->prenom}}</p>
    </span>

    <a class="navbar-item no-select" href="{{url('home')}}">
        <span class="material-symbols-rounded icon-md">home</span>
        <span class="title">Home</span>
    </a>

    <a class="navbar_item no_select" href="{{url('search')}}">
        <span class="material-symbols-rounded icon_md">search</span>
        <span class="title">Search</span>
    </a>

    <a class="navbar_item no_select" href="{{url('profile')}}">
        <span class="material-symbols-rounded icon_md">account_circle</span>
        <span class="title">Profile</span>
    </a>
    <a class="navbar-item no-select" href="{{url('logout')}}">
    <span class="material-symbols-rounded icon-md">logout</span>
    <span class="title">déconnexion</span> 
    </a>

    @guest
    <div>Veuillez vous connecter pour accéder à cette section.</div>
@endguest
</div>