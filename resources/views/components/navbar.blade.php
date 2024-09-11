<div id="navbar">

    <span class="title no-select">BloomingPals</span>



    <a class="navbar-item no-select" href="{{url('home')}}">
        <span class="material-symbols-rounded icon-md">home</span>
        <span class="title">Home</span>
    </a>

    <a class="navbar-item no-select" href="{{url('search')}}">
        <span class="material-symbols-rounded icon-md">search</span>
        <span class="title">Search</span>
    </a>

    <a class="navbar-item no-select" href="{{url('profile')}}">
        <span class="material-symbols-rounded icon-md">account_circle</span>
        <span class="title">Profile</span>
    </a>

    @guest
    <div>Veuillez vous connecter pour accéder à cette section.</div>
@endguest
</div>