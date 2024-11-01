<?php

namespace App\Listeners;

use App\Http\Controllers\MeetupController;
use App\Http\Controllers\NotificationController;
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
        $default_image_path = "\images\meetup_default";
    }
    //replace str in french
    function ReplaceMonth($str)
    {
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
                'Dec'
            ),

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
                'Decembre'
            ),
            $str
        );
    }
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewNotif $event)
    {

        function getUser($id, $data,$type)
        {

            $user = USER::where('id', $id)->first();
            $data[$type]['first_name'] = $user->first_name;
            $data[$type]['last_name'] = $user->last_name;
            $data[$type]['image_profil'] = $user->image_profil;
            $data[$type]['id'] = $id;

            return $data;
        }
        // if notifications are activated
        if (User::where('id', '=', $event->user_receive)->first()->notification == 1) {
            setlocale(LC_ALL, 'fr_FR');

            $data = $event->content;

            $user = getUser($event->user_receive,$data,'user_receive');
            $data['user_receive']=$event->user_receive;
            if($event->user_send!= -1){
                $data = getUser($event->user_send, $data,'user_send');
            }

            if ($event->type == 'Meetup Request') {
                $data['meetup'] = Meetup::where('id', $event->content['id'])->first();
                $data['message'] = 'veux rejoindre votre Meetup :';
            }

            if ($event->type == 'Friendship Request') {
                $data['message'] = 'vous a envoyé(e) une demande d\'amitié';
            }

            if ($event->type == 'Meetup Interest') {
                $data['header'] = 'Que disez-vous de ce Meetup ?';
                $data['meetup'] = Meetup::where('id', '=', $event->content['id'])->first();
                $date = new DateTime($data['meetup']['date']);
                $data['message'] = '<strong>Date:</strong> '
                    . $this->ReplaceMonth($date->format('j M Y')) . '&nbsp&nbsp<strong>Ville:</strong>&nbsp' . $data['meetup']['city'] . '&nbsp&nbsp<strong>Affinité:</strong> 73% ';
            }

            if ($event->type == 'Friendship Accept') {
                $data['message'] = 'a accepté(e) votre demande d\'amitié';

            }

            //  add notification to database;
            $content = json_encode($data);
            $event->type = Type_Notification::where('name', $event->type)->first();

            if ($event->type != null) {
                DB::statement("Call addNewNotification(?,?,?)", [
                    $event->user_receive,
                    $event->type->id,
                    $content
                ]);
            }

        }


    }
}
