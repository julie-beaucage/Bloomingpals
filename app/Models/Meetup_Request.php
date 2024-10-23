<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Meetup_Request extends Model
{
    protected $table= 'meetups_requests';

    public $timestamps = false;
    public static function GetMeetupRequestsNotAnswerd($meetupId) {
        $users = [];
        $requests = Meetup_Request::where("id_meetup", $meetupId)->where("state", "Sent")->get();
        if ($requests->count() > 0) {
            foreach ($requests as $request) {
                $user = User::where("id", $request->id_user)->first();
                array_push($users, $user);
            }
        }
        return $users;
    }

    public static function GetMeetupRequestsNotAnswerdCount($meetupId) {
        return Meetup_Request::where("id_meetup", $meetupId)->where("state", "Sent")->count();
    }

    public static function IsInRequest($userId, $meetupId)  {
        $request = Meetup_Request::where("id_meetup", $meetupId)
            ->where("id_user", $userId)->get();

        if ($request->count() > 0) {
            return true;
        } 

        return false;
    }
    public static function GetRequest($userId, $meetupId) {
        return Meetup_Request::where("id_meetup", $meetupId)
            ->where("id_user", $userId)->get()[0];
    }


    public static function AddMeetupRequest($userId, $meetupId) 
    {
        if (!Meetup_Request::IsInRequest($userId, $meetupId)) {
            $demandeRecontre = new Meetup_User();
            $demandeRecontre->id_utilisateur = $userId;
            $demandeRecontre->id_rencontre = $meetupId;
            $demandeRecontre->etat = 'Sent';
            $demandeRecontre->save();
        }
    }

    public static function AcceptMeetupRequest($userId, $meetupId) {
        $request = Meetup_Request::where("id_meetup", $meetupId)->where("id_user", $userId);
        $request->update([
            'state' => 'Accepted'
        ]);
    }
    public static function DenyMeetupRequest($userId, $meetupId) {
        $request = Meetup_Request::where("id_meetup", $meetupId)->where("id_user", $userId);
        $request->update([
            'state' => 'Refused'
        ]);
    }
}
