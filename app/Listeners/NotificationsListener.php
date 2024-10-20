<?php

namespace App\Listeners;

use App\Http\Controllers\MeetupController;
use App\Models\Meetup;
use App\Models\Type_Notification;
use DateTime;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NewNotif;
use Illuminate\Support\Facades\DB;
use App\Models\User;


/*About

Parameters

Meetup Request: id of meetup

Friendship Request: none

Meetup Interest: id => id of meetup, m




*/

class NotificationsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {   
        $default_image_path="\images\meetup_default";
    }
    //replace str in french
    function ReplaceMonth($str){
        return str_ireplace(
            array(
            'Jan',
            'Feb',
            'Mar',
            "Apr",
            "May",
            'Jun',
            'July',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'),

            array(
                'Janvier',
                'Février',
                'Mars',
                "Avril",
                "Mai",
                'Juin',
                'Juillet',
                'Août',
                'Septembre',
                'Octobre',
                'Novembre',
                'Decembre'),
            $str);
    }



    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewNotif $event)
    {
        setlocale(LC_ALL, 'fr_FR');
        
        $data=$event->content;
       
        $user=USER::where('id',$event->user_receive)->first();
        $data['user_receive']=$user;
        $data['user_receive']['password']="";

        if($event->type=='Meetup Request'){
            $data['user_send']=USER::where('id',$event->user_send)->first();
            $data['user_send']['password']="";
            $data['meetup']=Meetup::where('id',$event->content['id'])->first();
            if($data['user_send']['genre']=='femme'){
                $data['message']= 'veux rejoindre votre Meetup :';
            }else{
                $data['message']= 'veux rejoindre votre Meetup :';
            }
        }

        if($event->type== 'Friendship Request'){
            $data['user_send']=USER::where('id',$event->user_send)->first();
            $data['user_send']['password']="";
            if($data['user_send']['genre']=='femme'){
                $data['message']= 'vous as envoyée une demande d\'amitié';
            }else{
                $data['message']= 'vous a envoyé une demande d\'amitié';
            }
        }

        if($event->type=='Meetup Interest'){
            $default_image_path="\images\meetup_default";
            $data['header']= 'Que disez-vous de ce Meetup ?';
            
            $data['meetup']=Meetup::where('id','=',$event->content['id'])->first();
            
            if($data['meetup']['image'] == null){
                $data['meetup']['image']= $default_image_path.rand(1,3).'.png';
            }

            $date= new DateTime($data['meetup']['date']);
            $data['message']= '<strong>Date:</strong> '
            .$this->ReplaceMonth($date->format('j M Y')).'&nbsp&nbsp<strong>Ville:</strong>&nbsp'.$data['meetup']['city'].'&nbsp&nbsp<strong>Affinité:</strong> 73% ';

            
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
