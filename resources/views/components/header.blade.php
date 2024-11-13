@if (Auth::check())
    @php
        $notif_count = App\Models\Notification::where('id_user', '=', Auth::user()->id)
            ->where('status', '=', 'unread')->count();
    @endphp

    <header id="header" class="header-nav">
        <span class="title no_select">BloomingPals
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
        </span>

        <a class="navbar_notification pointer" style="margin-right:.4em;">
            @if($notif_count != 0)
                <div class="notification-container">
                    <span class="notification-badge">
                        <span class="notif-count">{{$notif_count}}</span>
                    </span>
                </div>
            @endif
            <span class="material-symbols-rounded icon_md">notifications</span>
            <span class="material-symbols-rounded menu-icon" id="menu-icon">menu</span>
        </a>
        <div id="dropdown-menu" class="dropdown-menu">
            <a href="{{ route('logout') }}" class="navbar_logout pointer">
                <span class="material-symbols-rounded icon_md">logout</span>Déconnexion
            </a>
        </div>
    </header>

@endif