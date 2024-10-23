<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event_User;

class Event extends Model
{
    protected $table= 'events';

    public $timestamps = false;


    public static function GetEventsFromUser($userId) {
        $eventsJoined = Event_User::where("id_user", $userId)->join("evenement", "evenement.id", "=", "events_users.id_event")->orderBy("evenement.date", 'DESC')->get();
        return $eventsJoined;
    }
}
