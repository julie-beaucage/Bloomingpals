<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table= 'events';

    public $timestamps = false;

    public static function GetEventsFromUser($userId) {
        $eventsJoined = Event_User::where("id_user", $userId)->join("events", "events.id", "=", "events_users.id_event")->orderBy("events.date", 'DESC')->get();
        return $eventsJoined;
    }
}
