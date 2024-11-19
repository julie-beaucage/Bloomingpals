@if (Auth::check())
@php
$notif_count=App\Models\Notification::where('id_user', '=', Auth::user()->id)->where('status', '=', 'unread')->count();
@endphp

<header class="header-nav">
    <a class="header-logo no_select" href="/home">
        <span class="header-title" >BloomingPals</span>
        <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
    </a>

    <a class="navbar_notification pointer noselect hover_darker">
        @if($notif_count != 0)
        <div style="position:absolute;">
        <span class="notification-badge"><span class="notif-count">{{$notif_count}}</span></span>
        </div>
            
        @endif
        <span class="material-symbols-rounded icon_md">  notifications</span>
    </a>

</header>

@endif