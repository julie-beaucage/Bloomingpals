<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Friendship_Request extends Model
{
    protected $table= 'Friendships_Requests';
    protected $fillable = ["id_user_send", "id_user_receive", "state"];
    public $timestamps = false;

    public static function AddFriendRequest($user1, $user2) {
        if (!Friendship_Request::IsRefuse($user1, $user2)) {
            if (Friendship_Request::IsRefuse($user2, $user1)) {
                $request = Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->delete();
            } 
            $user = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2);
            if ($user->count() == 0) {
                $request = [
                    "id_user_send" => $user1,
                    "id_user_receive" => $user2,
                    "state" => 'Sent'
                ];
                Friendship_Request::Create($request);
            }
        }
    }

    public static function IsRefuse($user1, $user2) {
        $receive = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2);
        if ($receive->count() > 0) {
            if ($receive->get()->first()->state == "Refused") {
                return true;
            }
        }
        return false;
    }

    public static function GetFriendRequestReceive($userId) {
        $requests = [];
        $requestsData = Friendship_Request::where("id_user_receive", $userId)->where("state", "Sent")->get();
        if ($requestsData->count() > 0) {
            foreach ($requestsData as $requestData) {
                $user = User::where("id", $requestData->id_user_send)->get()->first();
                array_push($requests, $user);
            }
        }
        return $requests;
    }
    public static function GetFriendRequestSent($userId) {
        $requests = [];
        $requestsData = Friendship_Request::where("id_user_send", $userId)->where("state", "Sent")->get();
        if ($requestsData->count() > 0) {
            foreach ($requestsData as $requestData) {
                $user = User::where("id", $requestData->id_user_receive)->get()->first();
                array_push($requests, $user);
            }
        }
        return $requests;
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

    public static function AcceptFriendRequest($user1, $user2) {
        $state = ["state" => "Accepted"];
        Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->update($state);
    }
    public static function RefuseFriendRequest($user1, $user2) {
        $request = Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1);
        if ($request->count() > 0) {
            $state = ["state" => "Refused"];
            Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->update($state);
        }
    }

    public static function CancelFriendRequest($user1, $user2) {
        $other_request = Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->get();
        if ($other_request->count() > 0) {
            if (!$other_request->first()->state == "Refused") {
                Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->delete();
                return;
            }
        } else {
            Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->delete();
        }
        /*$other_request = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->get();
        if (!($other_request->count() > 0 && $other_request->first()->state == "Refused")) {
            Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->delete();
        }*/
    }

    public static function RemoveFriendRequest($user1, $user2) {
        Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->delete();
        Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->delete();
    }
}
