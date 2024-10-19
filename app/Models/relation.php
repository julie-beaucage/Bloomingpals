<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table= 'relations';

    public $timestamps = false;

    public static function GetFriends($userId) {
        $friends = [];
        $relationsData = Relation::where('id_user1', $userId)->where("type", "Friend");

        if ($relationsData->count() > 0) {
            foreach ($relationsData->get() as $relationData) {
                if (!Relation::GetIfBlocked($relationData->id_user2, $userId)) {
                    $user = User::where("id", $relationData->id_user2)->get()->first();
                    array_push($friends, $user);
                }
            }
        }
        return $friends;
    }
}
