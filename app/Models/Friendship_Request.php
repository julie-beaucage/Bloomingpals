<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Friendship_Request extends Model
{
    protected $table= 'friendships_requests';
    protected $fillable = ["id_user_send", "id_user_receive", "status"];
    public $timestamps = false;

    public static function getReceivedFriendRequests($userId)
    {
        return self::where('id_user_receive', $userId)
                   ->where('status', 'pending')
                   ->get();
    }
    /* CODE QUI NEST PAS UTILISER A 50% ?*/ 
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
                    "status" => 'pending'
                ];
                Friendship_Request::Create($request);
            }
        }
    }

    public static function IsRefuse($user1, $user2) {
        $receive = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2);
        if ($receive->count() > 0) {
            if ($receive->get()->first()->status == "refused") {
                return true;
            }
        }
        return false;
    }

    public static function GetFriendRequestReceive($userId) {
        $requests = [];
        $requestsData = Friendship_Request::where("id_user_receive", $userId)->where("status", "pending")->get();
        if ($requestsData->count() > 0) {
            foreach ($requestsData as $requestData) {
                $user = User::where("id", $requestData->id_user_send)->get()->first();
                array_push($requests, $user);
            }
        }
        return $requests;
    }
    public static function GetFriendRequestpending($userId) {
        $requests = [];
        $requestsData = Friendship_Request::where("id_user_send", $userId)->where("status", "pending")->get();
        if ($requestsData->count() > 0) {
            foreach ($requestsData as $requestData) {
                $user = User::where("id", $requestData->id_user_receive)->get()->first();
                array_push($requests, $user);
            }
        }
        return $requests;
    }

    public static function GetUserRelationstatus($user1, $user2) {
        $status = Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->where("status", "pending");
        $message = null;
        if ($status->count() > 0) {
            $message = "receive";
            return $message;
        }
        $status = Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2);
        if ($status->count() > 0) {
            if ($status->get()->first()->status == "refused") {
                $message = "refuse";
            } else if ($status->get()->first()->status == "pending") {
                $message = "pending";
            }
        }

        return $message;
    }

    public static function AcceptFriendRequest($user1, $user2) {
        $status = ["status" => "accepted"];
        Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->update($status);
    }
    public static function RefuseFriendRequest($user1, $user2) {
        $request = Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1);
        if ($request->count() > 0) {
            $status = ["status" => "refused"];
            Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->update($status);
        }
    }

    public static function CancelFriendRequest($user1, $user2) {
        $other_request = Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->get();
        if ($other_request->count() > 0) {
            if (!$other_request->first()->status == "refused") {
                Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->delete();
                return;
            }
        } else {
            Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->delete();
        }
    }

    public static function RemoveFriendRequest($user1, $user2) {
        Friendship_Request::where("id_user_send", $user1)->where("id_user_receive", $user2)->delete();
        Friendship_Request::where("id_user_send", $user2)->where("id_user_receive", $user1)->delete();
    }
}
