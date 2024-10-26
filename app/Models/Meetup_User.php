<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meetup_User extends Model
{
    protected $table= 'meetups_users';

    public $timestamps = false;
    public static function AddParticipant($userId, $meetupId) 
    {
        if (!Meetup_User::IsInRencontre($meetupId, $userId)) {
            $rencontreUtilisateur = new Meetup_User();
            $rencontreUtilisateur->id_meetup = $meetupId;
            $rencontreUtilisateur->id_user = $userId;
            $rencontreUtilisateur->save();
        }
    }

    public static function DeleteParticipant($userId, $meetupId) {
        /*a revoir*/
        if (Meetup_User::IsInRencontre($meetupId, $userId)) {
            Meetup_User::where("id_meetup", $meetupId)->where("id_user", $userId)->delete();
        }
    }

    public static function IsInRencontre($meetupId, $userId) {
        return Meetup_User::where("id_meetup", $meetupId)->where("id_user", $userId)->count() >= 1;
    }
}
