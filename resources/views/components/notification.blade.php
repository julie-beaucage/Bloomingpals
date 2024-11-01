
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

        $linking="";
        $profil_link="";
        $img_src="";
        $header_text="";
        $extra_text="";
        $content_text="";

switch($notification->name){

    case('Meetup Request'):

        $linking='/meetup/'.$content->meetup->id;
        $profil_link='/profile/'.$content->user_send->id;
        $img_src=$content->user_send->image_profil != null ? asset('storage/'.$content->user_send->image_profil): asset('/images/simple_flower.png');
        $header_text=$content->user_send->first_name.'   '.$content->user_send->last_name;
        $content_text=$content->message.'  <strong>'.truncate($content->meetup->name,25);
        break;
    
    case('Friendship Request'):
        $linking='/profile/'.$content->user_send->id;
        $profil_link="/profile/".$content->user_send->id;
        $img_src=$content->user_send->image_profil != null ? asset('storage/'.$content->user_send->image_profil): asset('/images/simple_flower.png');
        $header_text= truncate($content->user_send->first_name.'  '. $content->user_send->last_name,35);
        $content_text=$content->message;
        break;
    
    case('Meetup Interest'):
        $linking='/meetup/'.$content->meetup->id;
        $img_src=$content->meetup->image != null ? asset($content->meetup->image): asset('images\meetup_default'.rand(1,3).'.png');
        $header_text= truncate($content->header,35);
        $content_text=$content->message;
        break;

    case('Friendship Accept'):
        $linking='/profile/'.$content->user_send->id;
        $profil_link="/profile/".$content->user_send->id;
        $img_src=$content->user_send->image_profil != null ? asset('storage/'.$content->user_send->image_profil): asset('/images/simple_flower.png');
        $header_text= truncate($content->user_send->first_name.'  '. $content->user_send->last_name,35);
        $content_text=$content->message;
        break;
}


@endphp

<div style="display:flex; align-items:center; box-sizing: border-box;" class="shrink" notifid="{{$notification->id}}" >

<div class="notification-container-page" linking="{{$linking}}" >
         <div class="center-content"><a href="{{$profil_link}}" ><img class="profile-picture-notif {{$square=$notification->name == 'Meetup Interest'? 'square':''}}"
        id="notification-profile-picture" src="{{$img_src}}"></a></div>

        <div class="notification-content">
            
                <div class="header-notif" id="notification-username">
                    <div class="shrink" style="text-wrap: wrap; overflow:hidden;">
                        <div class="truncate">
                        <a href="{{$profil_link}}"> <strong>{{$header_text}}</strong></a> {{$extra_text}}</div>
                        <div style="text-align:start;"> @php echo $content_text; @endphp </strong></div>
                    </div>
                    <div class="no-shrink">
                        @if($notification->status == 'unread')
                            <div class="notif-icon" id="{{$notification->id}}"></div>
                        @else
                            <span class="material-symbols-rounded close_icon-page" id="{{$notification->id}}">close</span>
                        @endif
                    </div>
                    </div>
             
            <div class="shrink"><div class="truncate"><i>Il y a {{$time}}</i></div></div>
            </div>
            </div>
</div>


