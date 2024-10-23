<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table= 'relations';

    public $timestamps = false;

    /**
     * Summary of GetEventsFromUser
     * @param mixed $userId
     * @return [[user bloquer], [user ami]]
     */
    public static function GetUserRelationsList($userId) {
        $relationsTable = [[], []];
        $relations = relation::where("id_utilisateur1", $userId)->get();

        if ($relations->count() > 0) {
            foreach ($relations as $relation) {
                $user = user::where("id", $relation->id_utilisateur2)->get()[0];
                if ($relation->type == "ami") {
                    array_push($relationsTable[0], $user);
                } else {
                    array_push($relationsTable[1], $user);
                }
            }
        }
        return $relationsTable;
    }

    public static function GetBlockYouUsers($userId) {
        $bloquers = [];
        $relations = relation::where("id_utilisateur2", $userId)->get();

        if ($relations->count() > 0) {
            foreach ($relations as $relation) {
                $user = user::where("id", $relation->id_utilisateur1)->get()[0];
                if ($relation->type == "bloquer") {
                    array_push($bloquers, $user);
                }
            }
        }
        return $bloquers;
    }
}
