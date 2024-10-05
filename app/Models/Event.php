<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\evenement_utilisateur;

class Event extends Model
{
    protected $table= 'evenement';

    public $timestamps = false;


    public static function GetEventsFromUser($userId) {
        $eventsJoined = evenement_utilisateur::where("id_utilisateur", $userId)->join("evenement", "evenement.id", "=", "evenement_utilisateur.id_evenement")->orderBy("evenement.date", 'DESC')->get();
        return $eventsJoined;
    }
}
