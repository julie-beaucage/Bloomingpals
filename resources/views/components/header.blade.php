@if (Auth::check())
    @php
        $notif_count = App\Models\Notification::where('id_user', '=', Auth::user()->id)
            ->where('status', '=', 'unread')->count();
    @endphp

    <header id="header" class="header-nav">
        <a class="title no_select" href="/home">BloomingPals
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
        </a>

        <div class="header_btns">
            <a class="navbar_notification pointer no_select" style="display:flex; align-items: center;">
                @if($notif_count != 0)
                    <div class="notification-container">
                        <span class="notification-badge">
                            <span class="notif-count">{{$notif_count}}</span>
                        </span>
                    </div>
                @endif
                <span class="material-symbols-rounded icon_md">notifications</span>
            </a>
            <span class="material-symbols-rounded menu-icon no_select" id="menu-icon">menu</span>
            <div id="dropdown-menu" class="dropdown-menu">
                <a href="{{ route('meetup.form') }}" class="navbar_logout pointer">
                    <span class="material-symbols-rounded icon_md">add_circle</span>Nouvelle rencontre
                </a>
                <a href="{{ route('logout') }}" class="navbar_logout pointer">
                    <span class="material-symbols-rounded icon_md">logout</span>Déconnexion
                </a>
            </div>
        </div>
    </header>

@endif