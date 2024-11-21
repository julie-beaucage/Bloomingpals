<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meetup_Interest;
use App\Models\Interest;

class Meetup extends Model
{
    protected $table= 'meetups';

    public $timestamps = false;
    
    /**
     * /
     * @param mixed $id meetup id
     * @return array
     */
    public static function GetTags($id) {
        $tags = [];
        $meetupIterests = Meetup_Interest::where("id_meetup", $id)->get();
        foreach ($meetupIterests as $tag_rencontre) {
            $tag = Interest::where("id", $tag_rencontre->id_interest)->get()->first();
            array_push($tags, $tag);
        }
        return $tags;
    }

    /**
     * /
     * @param mixed $id meetup id
     * @return array
     */
    public static function GetParticipants($meetupId) {
        $users = [];
        $participants = Meetup_User::where("id_meetup", $meetupId)->get();
        if ($participants->count() > 0) {
            foreach ($participants as $recontre_utilisateur) {
                $user = User::where("id", $recontre_utilisateur->id_user)->get()[0];
                array_push($users, $user);
            }
        }
        return $users;
    }
    /**
     * /
     * @param mixed $id meetup id
     * @return user[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function GetOrganisator($meetupId) {
        $rencontre = Meetup::where("id", $meetupId)->get()->first();
        $organisator = User::where("id", $rencontre->id_owner)->get()->first();
        return $organisator;
    }

    public static function RemoveParticipant($userId, $meetupId) {

    }
    /**
     * Summary of GetEventsFromUser
     * @param mixed $userId
     * @return Meetup_User[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function GetMeetupsFromUser($userId) {
        $rencontresJoined = Meetup_User::where("id_user", $userId)->join("meetups", "meetups.id", "=", "meetups_users.id_meetup")->orderBy("meetups.date", 'DESC')->get();
        return $rencontresJoined;
    }

    public static function RemoveAllMeetups($userId) {
        Meetup::where("id_owner", $userId)->delete();
    }
}
