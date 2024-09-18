<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\models\rencontre;

class rencontre_utlisateur extends Model
{
    protected $table= 'rencontre_utilisateur';

    public $timestamps = false;

    public static function AddParticipant($userId, $rencontreId) 
    {
        $rencontreUtilisateur = new rencontre_utlisateur();
        $rencontreUtilisateur->id_rencontre  = $rencontreId;
        $rencontreUtilisateur->id_utilisateur = $userId;
        $rencontreUtilisateur->save();
    }

    public static function IsInRencontre($rencontreId, $userId) {
        return rencontre_utlisateur::where("id_rencontre", $idRencontre);
    }
}
