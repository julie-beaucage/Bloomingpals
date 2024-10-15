
@props(['notification'])

@php
date_default_timezone_set('America/Toronto');
$content=json_decode($notification->content);
$today=new DateTime(date('Y-m-d H:i:s'));

$notif_date= new DateTime($notification->created_date);
$diff=$today->diff($notif_date);


$time='Il y a quelques instants';
// 5 min
if($diff->i>1){
    $time='Il y a '. $diff->i.' minutes';
}
// 1h
if($diff->h>0){
    $time='Il y a '. $diff->h.' heure';
    if($diff->h>1){ $time=$time.'s';}
}
// jour
if($diff->days>0){
    $time='Il y a '.$diff->days. ' jour';
    if($diff->days>1){ $time=$time.'s';}
}
// semaine
if($diff->days>6){
    $time='Il y a '.floor($diff->days/7). ' semaine';
    if(floor($diff->days/7)>1){ $time=$time.'s';}
}


@endphp




<div style="display:flex; align-items:center;">
@switch($notification->name)

    @case('Friendship Request')
    <div class="notification-container-page" linking="/possible/de/voir/les/demandes/amis">
        <div class="center-content"><a href="/profile/{{$content->user_send->id}}"><img class="profile-picture-notif"
        id="notification-profile-picture" src="{{$image = $content->user_send->image_profil != null ? asset($content->user_send->image_profil): '/images/simple_flower.png';}}"></a></div>

        <div class="notification-content">
            <div class="header-and-icon">
                <div class="center-content" id="notification-username"><a href="/profile/{{$content->user_send->id}}">
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
    <div class="notification-container-page" linking="/meetup/page/{{$content->meetup->id}}" >
        <div class="center-content"><a href="/profile/{{$content->user_send->id}}" ><img class="profile-picture-notif"
        id="notification-profile-picture" src="{{$image = $content->user_send->image_profil != null ? asset($content->user_send->image_profil): '/images/simple_flower.png';}}"></a></div>

        <div class="notification-content">
            <div class="header-and-icon">
                <div class="center-content" id="notification-username"><a href="/profile/{{$content->user_send->id}}">
                    <strong>{{$content->user_send->first_name}}   {{$content->user_send->last_name}}</strong></a>&nbsp&nbsp {{$time}}</div><div></div>
                    @if($notification->status== 'unread')
                    <div class="notif-icon"><div class="inner-notif"></div></div>
                    @endif
                </div>
            <div style="text-wrap:wrap;">{{$content->message}} &nbsp <strong>{{$content->meetup->name}}</strong></div>
            </div>
            </div>

        @break 
        
        @case('Meetup Interest')
        
        <div class="notification-container-page" linking="/meetup/page/{{$content->meetup->id}}" >
        <div class="center-content"><a ><img class="profile-picture-notif square"
        id="notification-profile-picture" src="{{$content->meetup->image}}"></a></div>

        <div class="notification-content">
            <div class="header-and-icon">
                <div class="center-content" id="notification-username"><a >
                    <strong>{{$content->header}}</strong></a>&nbsp&nbsp {{$time}}</div><div></div>
                    @if($notification->status== 'unread')
                    <div class="notif-icon"><div class="inner-notif"></div></div>
                    @endif
                </div>
            <div style="text-wrap:wrap;">{!! $content->message !!}</div>
            </div>
            </div>
        @break
@endswitch
<span class="material-symbols-rounded close_icon-page" id="{{$notification->id}}">close</span>
</div>

