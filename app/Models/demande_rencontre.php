<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\utilisateur;
use App\models\rencontre;

class demande_rencontre extends Model
{
    protected $table= 'demande_rencontre';

    public $timestamps = false;

    public static function GetMeetupRequestsNotAnswerd($meetupId) {
        $users = [];
        $requests = demande_rencontre::where("id_rencontre", $meetupId)
            ->where("etat", "Envoyee")->get();
        if ($requests->count() > 0) {
            foreach ($requests as $request) {
                $user = utilisateur::where("id", $request->id_utilisateur)->get()[0];
                array_push($users, $user);
            }
        }
        return $users;
    }

    public static function GetMeetupRequestsNotAnswerdCount($meetupId) {
        return demande_rencontre::where("id_rencontre", $meetupId)->count();
    }

    public static function IsInRequest($userId, $meetupId)  {
        $request = demande_rencontre::where("id_rencontre", $meetupId)
            ->where("id_utilisateur", $userId)->get();

        if ($request->count() > 0) {
            return true;
        } 

        return false;
    }
    public static function GetRequest($userId, $meetupId) {
        return demande_rencontre::where("id_rencontre", $meetupId)
            ->where("id_utilisateur", $userId)->get()[0];
    }


    public static function AddMeetupRequest($userId, $meetupId) 
    {
        if (!demande_rencontre::IsInRequest($userId, $meetupId)) {
            $demandeRecontre = new rencontre_utlisateur();
            $demandeRecontre->id_utilisateur = $userId;
            $demandeRecontre->id_rencontre = $meetupId;
            $demandeRecontre->etat = 'Envoyee';
            $demandeRecontre->save();
        }
    }

    public static function AcceptMeetupRequest($userId, $meetupId) {
        $request = demande_rencontre::GetRequest($userId, $meetupId);
        $request->update([
            'etat' => 'Acceptee'
        ]);
    }
    public static function DenyMeetupRequest($userId, $meetupId) {
        $request = demande_rencontre::GetRequest($userId, $meetupId);
        $request->update([
            'etat' => 'Refusee'
        ]);
    }
}
