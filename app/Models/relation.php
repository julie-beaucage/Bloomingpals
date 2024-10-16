<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table= 'relations';

    public $timestamps = false;

    public static function GetRelationUsers($user1, $user2) {
        $relation = null;
        $relationData = Relation::where('id_user1', $user1)->where('id_user2', $user2)->get();

        if (!Relation::GetIfBlocked($user2, $user1)) {
            if ($relationData->count() != 0) {
                $relation = $relationData[0]->type;
            }
        } else {
            $relation = "GotBlocked";
        }

        return $relation;
    }

    public static function GetFriends($userId) {
        return "";
    }

    public static function GetIfBlocked($user1, $user2) {
        $relationData = Relation::where('id_user1', $user1)->where('id_user2', $user2)->get();
        $blocked = true;
        if ($relationData->count() == 0) {
            $blocked = false;
        }
        return $blocked;
    }

    public static function GetBlockedUser() {

    }
}
