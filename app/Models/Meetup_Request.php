<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Events\NewNotif;
class Meetup_Request extends Model
{
    protected $table= 'meetups_requests';

    public $timestamps = false;

    protected $fillable = ['id_meetup', 'id_user', 'state'];
    public static function GetMeetupRequestsNotAnswerd($meetupId) {
        $users = [];
        $requests = Meetup_Request::where("id_meetup", $meetupId)->where("state", "Sent")->get();
        if ($requests->count() > 0) {
            foreach ($requests as $request) {
                $user = User::where("id", $request->id_user)->get()[0];
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
            ->where("id_user", $userId)->get()->first();
    }

    public static function IsUserRequesting($userId, $meetupId) {

        $requests = Meetup_Request::where("id_meetup", $meetupId)->where("id_user", $userId);
        if ($requests->count() > 0) {
            if ($requests->get()->first()->state == "Sent") {
                return "joining";
            } else if ($requests->get()->first()->state == "Accepted") {
                return "accepted";
            } else if ($requests->get()->first()->state == "Refused") {
                return "refused";
            }
        }
        return "notJoining";
    }
    public static function CancelJoining($userId, $meetupId) {
        Meetup_Request::where("id_meetup", $meetupId)->where("id_user", $userId)->delete();
    }


    public static function AddMeetupRequest($userId, $meetupId) 
    {
        if (!Meetup_Request::IsInRequest($userId, $meetupId)) {
            $demandeRecontre = new Meetup_Request;
            $demandeRecontre->id_user = $userId;
            $demandeRecontre->id_meetup = $meetupId;
            $demandeRecontre->state = 'Sent';
            $demandeRecontre->save();
            $meetup =Meetup::where('id',$meetupId)->first();
            event(new NewNotif($meetup->id_owner,$userId,'Meetup Request',["id" => $meetupId]));
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

    public static function RemoveAllRequests($userId) {
        Meetup_Request::where("id_user", $userId)->delete();
    }
}
