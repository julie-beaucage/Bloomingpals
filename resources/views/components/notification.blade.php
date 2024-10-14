
@props(['notification'])

@php
$content=json_decode($notification->content);
$today=new DateTime(date('Y-m-d'));

$notif_date= new DateTime($notification->created_date);
$diff=$today->diff($notif_date);

$time='Aujourd\'ui';

if($diff->days>0){
    $time='Il y a '.$diff->days. ' jours';
}
if($diff->days>6){
$time='Il y a '.floor($diff->days/7). ' semaines';
}
@endphp




<div style="display:flex; align-items:center;">
@switch($notification->name)

    @case('Friendship Request')
    <div class="notification-container-page" onclick="window.location.href='profile/{{$content->user_send->id}}'" style="cursor:pointer;">
        <div class="center-content"><img class="profile-picture"
        id="notification-profile-picture" src="{{$image = $content->user_send->image_profil != null ? asset($content->user_send->image_profil): '/images/simple_flower.png';}}"></div>

        <div class="notification-content">
            <div class="header-and-icon">
                <div class="center-content" id="notification-username"><a href="profile/{{$content->user_send->id}}">
                    <strong>{{$content->user_send->first_name}}   {{$content->user_send->last_name}}</strong></a>&nbsp&nbsp {{$time}}</div><div></div>
                    @if($notification->status== 'unread')
                    <div class="notif-icon"><div class="inner-notif"></div></div>
                    @endif
                </div>
            <div style="text-wrap:wrap;">{{$content->message}}</div>
            </div>
            </div>

        @break
        @case('Meetup Request')
    <div class="notification-container-page" onclick="window.location.href='meetup/page/{{$content->meetup->id}}'" style="cursor:pointer;">
        <div class="center-content"><img class="profile-picture"
        id="notification-profile-picture" src="{{$image = $content->user_send->image_profil != null ? asset($content->user_send->image_profil): '/images/simple_flower.png';}}"></div>

        <div class="notification-content">
            <div class="header-and-icon">
                <div class="center-content" id="notification-username"><a href="profile/{{$content->user_send->id}}">
                    <strong>{{$content->user_send->first_name}}   {{$content->user_send->last_name}}</strong></a>&nbsp&nbsp {{$time}}</div><div></div>
                    @if($notification->status== 'unread')
                    <div class="notif-icon"><div class="inner-notif"></div></div>
                    @endif
                </div>
            <div style="text-wrap:wrap;">{{$content->message}} &nbsp <strong>{{$content->meetup->name}}</strong></div>
            </div>
            </div>

        @break            
@endswitch
<span class="material-symbols-rounded close_icon-page" id="{{$notification->id}}">close</span>
</div>

