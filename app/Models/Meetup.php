<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag_Meetup;

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
        foreach (Tag_Meetup::where("id_meetup", $id)->get() as $tag_rencontre) {
            $tag = Tag::where("id", $tag_rencontre->id_tags)->get();
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
                $user = User::where("id", $recontre_utilisateur->id_utilisateur)->get()[0];
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
        $rencontre = Meetup::where("id", $meetupId)->get();
        $organisator = User::where("id", $rencontre[0]->id_organisateur)->get()[0];
        return $organisator;
    }

    public static function RemoveParticipant($userId, $meetupId) {

    }
}
