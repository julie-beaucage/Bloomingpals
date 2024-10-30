<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meetup_Interest;

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
        foreach (Meetup_Interest::where("id_meetup", $id)->get() as $tag_rencontre) {
            $tag = Interest::where("id", $tag_rencontre->id)->get()->first();
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
}
