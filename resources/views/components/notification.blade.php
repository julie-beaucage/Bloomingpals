
@props(['notification'])

@php
date_default_timezone_set('America/Toronto');
$content=json_decode($notification->content);
$today=new DateTime(date('Y-m-d H:i:s'));

$notif_date= new DateTime($notification->created_date);
$diff=$today->diff($notif_date);


$time='quelques instants';
// 5 min
if($diff->i>1){
    $time=$diff->i.' minutes';
}
// 1h
if($diff->h>0){
    $time=$diff->h.' heure';
    if($diff->h>1){ $time=$time.'s';}
}
// jour
if($diff->days>0){
    $time=$diff->days. ' jour';
    if($diff->days>1){ $time=$time.'s';}
}
// semaine
if($diff->days>6){
    $time=floor($diff->days/7). ' semaine';
    if(floor($diff->days/7)>1){ $time=$time.'s';}
}



@endphp

<div style="display:flex; align-items:center; box-sizing: border-box;" class="shrink" notifid="{{$notification->id}}" >
@switch($notification->name)

    @case('Friendship Request')
    <div class="notification-container-page" linking="/possible/de/voir/les/demandes/amis">
        <div class="center-content"><a href="/profile/{{$content->user_send->id}}"><img class="profile-picture-notif"
        id="notification-profile-picture" src="{{$image = $content->user_send->image_profil != null ? asset('storage/'.$content->user_send->image_profil): asset('/images/simple_flower.png')}}"></a></div>

        <div class="notification-content">
        
                <div class="header-notif" id="notification-username"><a href="/profile/{{$content->user_send->id}}">
                    <div class="shrink" style="text-wrap: wrap; overflow:hidden;">
                        <div class="truncate"><strong> @php echo truncate($content->user_send->first_name.'  '. $content->user_send->last_name,35); @endphp </strong></div><div>{{$content->message}}</div></a>
                    </div>
                    <div class="no-shrink"><span class="material-symbols-rounded close_icon-page" id="{{$notification->id}}">close</span></div>
                    
                    @if($notification->status== 'unread')
                    <div class="notif-icon"><div class="inner-notif"></div>
                    @endif
                    </div>
               
                <div class="shrink"><div class="truncate" style="font-size:;"><i>Il y a {{$time}}</i></div></div>
            </div>
            </div>

        @break
        @case('Meetup Request')
    <div class="notification-container-page" linking="/meetup/page/{{$content->meetup->id}}" >
        <div class="center-content"><a href="/profile/{{$content->user_send->id}}" ><img class="profile-picture-notif"
        id="notification-profile-picture" src="{{$image = $content->user_send->image_profil != null ? asset($content->user_send->image_profil): asset('/images/simple_flower.png')}}"></a></div>

        <div class="notification-content">
            
                <div class="header-notif" id="notification-username">
                    <div class="shrink" style="text-wrap: wrap; overflow:hidden;">
                        <div class="truncate">
                        <a href="/profile/{{$content->user_send->id}}"> <strong>{{$content->user_send->first_name}}   {{$content->user_send->last_name}}</strong></a></div>
                        <div> @php echo $content->message.'  <strong>'.truncate($content->meetup->name,25) @endphp </strong></div>
                    </div>
                    <div class="no-shrink">
                        @if($notification->status == 'unread')
                            <div class="notif-icon"></div>
                        @else
                            <span class="material-symbols-rounded close_icon-page" id="{{$notification->id}}">close</span>
                        @endif
                    </div>
                    </div>
             
            <div class="shrink"><div class="truncate">Il y a {{$time}}</div></div>
            </div>
            </div>

        @break 
        
        @case('Meetup Interest')
        
        <div class="notification-container-page" linking="/meetup/page/{{$content->meetup->id}}" >
        <div class="center-content"><img class="profile-picture-notif square"
        id="notification-profile-picture" src="{{asset($content->meetup->image)}}"></div>
        <div class="notification-content">
            
                <div class="header-notif" id="notification-username">
                    <div class="shrink" style="text-wrap: wrap; overflow:hidden;"><div class="truncate"><strong>@php echo truncate($content->header,35); @endphp </strong></div>{!! $content->message !!}</div>
                    <div class="no-shrink">
                    @if($notification->status == 'unread')
                    <div class="notif-icon"></div>
                    @else
                    <span class="material-symbols-rounded close_icon-page" id="{{$notification->id}}">close</span>
                    @endif
                    </div>
                    
                    </div>
            <div class="shrink"><div class="truncate" style="font-size:;"><i>Il y a {{$time}}</i></div></div>
            
            
        </div>
        </div>
        

        @break 
        
        <!-- @case('Meetup Interest')
        
        <div class="notification-container-page" linking="/meetup/page/{{$content->meetup->id}}" >
        <div class="center-content"><a ><img class="profile-picture-notif square"
        id="notification-profile-picture" src="{{$content->meetup->image}}"></a></div>

        <div class="notification-content">
            
                <div class="center-content header-notif" id="notification-username">
                    <strong>{{$content->header}}</strong>&nbsp&nbsp {{$time}}</div><div></div>
                    @if($notification->status== 'unread')
                    <div class="notif-icon"><div class="inner-notif"></div></div>
                    @endif
             
            <div style="text-wrap:wrap;">{!! $content->message !!}</div>
            </div>
            </div> -->

@endswitch
<div></div>
</div>

