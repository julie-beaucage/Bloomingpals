@props(['notifications'])
@php

function truncate($str,$maxlength){
    if(strlen($str)>$maxlength){
        return substr($str,0,$maxlength-3).'...';
    }
    return $str;
    
}
@endphp


@if($notifications != null)
<div class="container-notif" id="container-notification-toggle" >
    
    @foreach ($notifications as $notification)
        <x-notification :notification="$notification" />
    @endforeach
</div>
@endif
