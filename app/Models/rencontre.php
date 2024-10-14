<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tag_rencontre;
use App\Models\rencontre_utlisateur;

class Rencontre extends Model
{
    protected $table= 'rencontre';

    public $timestamps = false;
    
    /**
     * /
     * @param mixed $id meetup id
     * @return array
     */
    public static function GetTags($id) {
        $tags = [];
        foreach (tag_rencontre::where("id_rencontre", $id)->get() as $tag_rencontre) {
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
        $participants = rencontre_utlisateur::where("id_rencontre", $meetupId)->get();
        if ($participants->count() > 0) {
            foreach ($participants as $recontre_utilisateur) {
                $user = user::where("id", $recontre_utilisateur->id_utilisateur)->get()[0];
                array_push($users, $user);
            }
        }
        return $users;
    }
    /**
     * Summary of GetEventsFromUser
     * @param mixed $userId
     * @return evenement_utilisateur[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function GetRencontresFromUser($userId) {
        $rencontresJoined = rencontre_utlisateur::where("id_utilisateur", $userId)->join("rencontre", "rencontre.id", "=", "rencontre_utilisateur.id_rencontre")->orderBy("rencontre.date", 'DESC')->get();
        return $rencontresJoined;
    }
    /**
     * /
     * @param mixed $id meetup id
     * @return user[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function GetOrganisator($meetupId) {
        $rencontre = Rencontre::where("id", $meetupId)->get();
        $organisator = user::where("id", $rencontre[0]->id_organisateur)->get()[0];
        return $organisator;
    }

    public static function RemoveParticipant($userId, $meetupId) {

    }
}
