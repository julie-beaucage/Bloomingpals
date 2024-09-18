<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tags_rencontre;
use App\Models\tags;
use App\Models\utilisateur;

class rencontre extends Model
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
        foreach (tags_rencontre::where("id_rencontre", $id)->get() as $tag_rencontre) {
            $tag = tags::where("id", $tag_rencontre->id_tags)->get();
            array_push($tags, $tag);
        }
        return $tags;
    }

    /**
     * /
     * @param mixed $id meetup id
     * @return array
     */
    public static function GetParticipants($id) {
        $users = [];
        $participants = rencontre_utlisateur::where("id_rencontre", $id)->get();
        if ($participants->count() > 0) {
            foreach ($participants as $recontre_utilisateur) {
                $user = utilisateur::where("id", $recontre_utilisateur->id_utilisateur)->get()[0];
                array_push($users, $user);
            }
        }
        return $users;
    }
    /**
     * /
     * @param mixed $id meetup id
     * @return utilisateur[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function GetOrganisator($id) {
        $rencontre = Rencontre::where("id", $id)->get();
        $organisator = utilisateur::where("id", $rencontre[0]->id_organisateur)->get()[0];
        return $organisator;
    }
}
