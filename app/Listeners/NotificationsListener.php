<?php

namespace App\Listeners;

use App\Models\Meetup;
use App\Models\Type_Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewNotif;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class NotificationsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewNotif $event)
    {
        $data=$event->content;
       
        $user=USER::where('id',$event->user_receive)->first();
        $data['user_receive']=$user;

        if($event->type=='Meetup Request'){
            $data['user_send']=USER::where('id',$event->user_send)->first();
            $data['meetup']=Meetup::where('id',$event->content['id'])->first();
            $data['message']='Viens d\'envoyer une demande pour rejoindre votre Meetup :';
            
        }

        if($event->type== 'Friendship Request'){
            $data['user_send']=USER::where('id',$event->user_send)->first();
            if($data['user_send']['genre']=='femme'){
                $data['message']= 'vous as envoyée une demande d\'amitié';
            }else{
                $data['message']= 'vous as envoyé une demande d\'amitié';
            }
            

        }



        //  add notification to database;

        $content=json_encode($data);
        $event->type=Type_Notification::where('name',$event->type)->first()->id;


        //dd($event->type);

        DB::statement("Call addNewNotification(?,?,?)", [
            $user->id,
            $event->type,
            $content
        ]);


        //     $( document ).ready(function() {
        //         let notification= document.createElement("div");
        //         notification.innerText="testing";
        //         notification.classList.add("notification-container");
        //         let content=document.getElementById("content");
        //         console.log(content);
        //     });
      

        // </script>';
        
       
    }
}
