<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rencontre_utlisateur extends Model
{
    protected $table= 'rencontre_utilisateur';

    public $timestamps = false;
    public static function AddParticipant($userId, $meetupId) 
    {
        if (!rencontre_utlisateur::IsInRencontre($meetupId, $userId)) {
            $rencontreUtilisateur = new rencontre_utlisateur();
            $rencontreUtilisateur->id_rencontre  = $meetupId;
            $rencontreUtilisateur->id_utilisateur = $userId;
            $rencontreUtilisateur->save();
        }
    }

    public static function DeleteParticipant($userId, $meetupId) {
        /*a revoir*/
        if (rencontre_utlisateur::IsInRencontre($meetupId, $userId)) {
            rencontre_utlisateur::where("id_rencontre", $meetupId)->where("id_utilisateur", $userId)->delete();
        }
    }

    public static function IsInRencontre($meetupId, $userId) {
        return rencontre_utlisateur::where("id_rencontre", $meetupId)->where("id_utilisateur", $userId)->count() >= 1;
    }
}
