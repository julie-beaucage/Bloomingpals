<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Friendship_Request extends Model
{
    protected $table= 'Friendships_Requests';

    protected $fillable = ["id_user_send", "id_user_receive", "state"];

    public $timestamps = false;

    /* you may need to check if the other user already sent a request*/
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
        $requestsData = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->update($state);
    }
    public static function RefuseFriendRequest($user1, $user2) {
        $state = ["state" => "Refused"];
        $requestsData = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->update($state);
    }
}
