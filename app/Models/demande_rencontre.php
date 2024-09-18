<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\utilisateur;

class demande_rencontre extends Model
{
    protected $table= 'demande_rencontre';

    public $timestamps = false;

    public static function GetRequestMeetup($organisatorId) {
        $users = [];
        $requests = demande_rencontre::where("id_utilisateur_recoit", $organisatorId)->get();
        if ($requests->count() > 0) {
            foreach ($requests as $request) {
                $user = utilisateur::where("id", $request->id_utilisateur_envoie)->get()[0];
                array_push($users, $user);
            }
        }
        return $users;
    }

    public static function GetRequestMeetupCount($organisatorId) {
        return demande_rencontre::where("id_utilisateur_recoit", $organisatorId)->count();
    }
}
