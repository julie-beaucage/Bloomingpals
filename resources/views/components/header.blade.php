@if (Auth::check())
@php
$notif_count=App\Models\Notification::where('id_user', '=', Auth::user()->id)->where('status', '=', 'unread')->count();
@endphp

<header class="header-nav">
<span class="header-title" >BloomingPals</span>
<a class="navbar_notification" style="cursor:pointer; margin-right:.22em;">
    @if($notif_count != 0)
        <span class="notification-badge"><span class="notif-count">{{$notif_count}}</span></span>
    @endif
    <span class="material-symbols-outlined icon_md">  notifications</span>

</a>

</header>

@endif