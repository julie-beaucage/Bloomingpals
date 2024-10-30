<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


//in this model, the user 1 is always the one who choose what happen to user 2
class Relation extends Model
{
    protected $table= 'relations';

    protected $fillable = ["id_user1", "id_user2", "type"];

    public $timestamps = false;

    public static function AddFriendRequest($user1, $user2) {
        $userCount = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->count();
        if ($userCount == 0) {
            $request = [
                "id_user_send" => $user1,
                "id_user_receive" => $user2,
                "state" => 'Sent'
            ];
            Friendship_Request::Create($request);
        }
    }

    public static function GetRelationUsers($user1, $user2) {
        $relation = null;

        if (!Relation::GetIfBlocked($user2, $user1)) {
            $relationData = Relation::where('id_user1', $user1)->where('id_user2', $user2);

            if ($relationData->count() > 0) {
                $relation = $relationData->get()->first()->type;
            }
        } else {
            $relation = "GotBlocked";
        }

        return $relation;
    }

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

    public static function GetIfBlocked($user1, $user2) {
        $relationData = Relation::where('id_user1', $user1)->where('id_user2', $user2)->where("type", "Blocked")->get();
        $blocked = true;
        if ($relationData->count() == 0) {
            $blocked = false;
        }
        return $blocked;
    }

    public static function GetBlockedUser() {
        return "";
    }

    public static function AddFriend($user1, $user2) {
        if (!Relation::GetIfBlocked($user2, $user1)) {
            if (!Relation::GetIfBlocked($user1, $user2)) {
                $table1 = [
                    "id_user1" => $user1, 
                    "id_user2" => $user2, 
                    "type" => "Friend"
                ];
                Relation::Create($table1);
                $table2 = [
                    "id_user1" => $user2, 
                    "id_user2" => $user1, 
                    "type" => "Friend"
                ];
                Relation::Create($table2);
            }
        }
    }
    public static function GetUserRelationState($user1, $user2) {
        $state = Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->where("state", "Sent");
        $message = null;
        if ($state->count() > 0) {
            $message = "receive";
            return $message;
        }
        $state = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2);
        if ($state->count() > 0) {
            if ($state->get()->first()->state == "Refused") {
                $message = "refuse";
            } else if ($state->get()->first()->state == "Sent") {
                $message = "sent";
            }
        }

        return $message;
    }
    public static function GetFriendRequestSent($userId) {
        $requests = [];
        $requestsData = Friendship_Request::where("id_user_send", $userId)->where("state", "Sent")->get();
        if ($requestsData->count() > 0) {
            foreach ($requestsData as $requestData) {
                $user = User::where("id", $requestData->id_user_receive)->get()[0];
                array_push($requests, $user);
            }
        }
        return $requests;
    }
    public static function GetFriendRequestReceive($userId) {
        $requests = [];
        $requestsData = Friendship_Request::where("id_user_receive", $userId)->where("state", "Sent")->get();
        if ($requestsData->count() > 0) {
            foreach ($requestsData as $requestData) {
                $user = User::where("id", $requestData->id_user_send)->get()[0];
                array_push($requests, $user);
            }
        }
        return $requests;
    }

    public static function RemoveFriend($user1, $user2) {
        if (!Relation::GetIfBlocked($user1, $user2)) {
            Relation::where("id_user1", $user2)->where("id_user2", $user1)->delete();
            Relation::where("id_user1", $user1)->where("id_user2", $user2)->delete();
        }
    }
}
