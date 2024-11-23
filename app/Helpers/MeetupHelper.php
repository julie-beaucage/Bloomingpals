<?php

use Illuminate\Support\Facades\DB;
use App\Models\Friendship_Request;

if (!function_exists('isFriendRequestSend')){
    function isFriendRequestSend($currentUserId, $userId) {
        $request = DB::table('friendships_requests')
        ->where(function ($query) use ($currentUserId, $userId) {
            $query->where('id_user_send', $currentUserId)
                  ->where('id_user_receive', $userId);
        })
        ->orWhere(function ($query) use ($currentUserId, $userId) {
            $query->where('id_user_send', $userId)
                  ->where('id_user_receive', $currentUserId);
        })
        ->first();

        return $request ? $request->status : 'none';

       /* $relation = Friendship_Request::GetUserRelationState($userId, $currentUserId);
        if ($relation == 'GotBlocked') {
            return 'Blocked';
        }
        if ($relation == 'Friend') {
            return 'Friend';
        }
        $relationRequest = Friendship_Request::GetUserRelationState($currentUserId, $userId);
        switch ($relationRequest) {
            case 'sent': return 'SendingInvitation';
            case 'receive': return 'Invited';
            case 'refuse': return 'Refuse';
            default: return 'None';
        }*/
        }
}

if (!function_exists('isSender')) {
    function isSender($currentUserId, $userId) {
        $request = DB::table('friendships_requests')
            ->where('id_user_send', $currentUserId)
            ->where('id_user_receive', $userId)
            ->where('status', 'pending')  
            ->first();

        return $request ? true : false;
    }
}


if (!function_exists('areFriends')) {
    /**
     * Vérifie si deux utilisateurs sont amis.
     *
     * @param int $currentUserId
     * @param int $userId
     * @return bool
     */
    function areFriends($currentUserId, $userId) {
        return DB::table('relations')
            ->where(function ($query) use ($currentUserId, $userId) {
                $query->where('id_user1', $currentUserId)
                      ->where('id_user2', $userId)
                      ->where('type', 'Friend');
            })
            ->orWhere(function ($query) use ($currentUserId, $userId) {
                $query->where('id_user1', $userId)
                      ->where('id_user2', $currentUserId)
                      ->where('type', 'Friend');
            })
            ->exists();
    }
}
if (!function_exists('btn_setUpFriend')){
    function btn_setUpFriend($currentUserId, $userId) {
    
        if ($userId == $currentUserId) {
            return ''; // Pas de bouton
        }
        $requestStatus = isFriendRequestSend($currentUserId, $userId);
        $url = '';
        $btn_txt = '';
        $btn_class = "btn_friends";
        $isSender =isSender ($currentUserId, $userId) ;
        $relation = areFriends($userId, $currentUserId);

        if($relation=='Friend'){
            $url = route("RemoveFriend", ["id" => $userId]);
            $btn_txt = "Retirer un ami(e)";
            $btn_class = "btn_refuse btn_primary";
        } 
        else {
            switch ($requestStatus) {
                case 'accepted':
                    $url = route("RemoveFriend", ["id" => $userId]);
                    $btn_txt = "Enlever l'amitié";
                    $btn_class = "btn_friends";
                    break;

                case 'Blocked':
                    $btn_txt = "Vous êtes bloqué";
                    $btn_class = "btn_blocked";
                    break;

                case 'pending':
                    if ($isSender) {
                        $url = route("CancelFriendRequest", ["id" => $userId]);
                        $btn_txt = "Annuler la demande";
                        $btn_class = "btn_refuse btn_primary";
                    } else {
                        $url_accept = route("AcceptFriendRequest", ["id" => $userId]);
                        $url_refuse = route("RefuseFriendRequest", ["id" => $userId]);
                        $btn_txt_accept = "Accepter";
                        $btn_txt_refuse = "Refuser";
                        return "
                        <div class='acceptContainer'>
                            <a href='{$url_accept}'>
                                <div class='btn_accept btn_primary no_select'>{$btn_txt_accept}</div>
                            </a>
                            <a href='{$url_refuse}'>
                                <div class='btn_refuse btn_primary no_select'>{$btn_txt_refuse}</div>
                            </a>
                        </div>";
                    }
                    break;

                case 'refused':
                    $btn_txt = "Vous avez été refusé";
                    $btn_class = "btn_refuse btn_primary ";
                    break;

                default: 
                    $url = route("SendFriendRequest", ["id" => $userId]);
                    $btn_txt = "Ajouter un ami(e)";
                    $btn_class = "btn_primary";
                    break;
            }
        }
        
        if (!empty($extra_html)) {
            return $extra_html;
        }
        return "
            <button class='{$btn_class} no_select ' onclick=\"window.location.href='{$url}'\">
                <span>{$btn_txt}</span>
            </button>";        
    }
        

    /*$currentUser = Auth::user();
        $relation = Friendship_Request::GetUserRelationState($userId, $currentUserId);

        if ($currentUser->id === $userId) {
            return '';
        }
        $btn_txt = "";
        $url = "";
        $btn_class = "btn_friends";

        if ($relation == "Friend") {
            $url = route("RemoveFriend", ["id" => $userId]);
            $btn_txt = "Enlever l'amitié";
        } elseif ($relation == "Blocked") {
            $btn_txt = "Vous êtes bloqué";
        } elseif ($relation == "SendingInvitation") {
            $url = route("CancelFriendRequest", ["id" => $userId]);
            $btn_txt = "Annuler la demande";
        } elseif ($relation == "Invited") {
            $url_accept = route("AcceptFriendRequest", ["id" => $userId]);
            $url_refuse = route("RefuseFriendRequest", ["id" => $userId]);
            $btn_txt_accept = "Accepter";
            $btn_txt_refuse = "Refuser";
            return "
            <div class='acceptContainer'>
                <a href='{$url_accept}'>
                    <div class='buttonn btn_accept no_select'>{$btn_txt_accept}</div>
                </a>
                <a href='{$url_refuse}'>
                    <div class='buttonn btn_refuse no_select'>{$btn_txt_refuse}</div>
                </a>
            </div>";
        } elseif ($relation == "Refuse") {
            $btn_txt = "Vous avez été refusé";
        } else {
            $url = route("SendFriendRequest", ["id" => $userId]);
            $btn_txt = "Ajouter un ami(e)";
        }
        return "
        <button class='{$btn_class} no_select' onclick=\"window.location.href='{$url}'\">
          <span>{$btn_txt}</span>
        </button>";*/
       
}

if (!function_exists('isRequestSend')) {
    function isRequestSend($userId, $meetupId)
    {
        $request = DB::table('meetups_requests')
            ->where('id_user', $userId)
            ->where('id_meetup', $meetupId)
            ->first();

        return $request ? $request->status : 'none';
    }
}

if (!function_exists('btn_setUp')) {
    function btn_setUp($userId, $meetup)
    {
        $meetupId = $meetup->id;
        if ($userId == $meetup->id_owner) {
            return ''; // Pas de bouton
        }
        $requestStatus = isRequestSend($userId, $meetupId);
        $url = '';
        $btn_txt = '';
        $btn_class = '';
        $icon_symbol = '';
        $btn_disabled  = '';

        if ($requestStatus == 'none') {
            $url = route("meetups.send_request", ["meetupId" => $meetupId]);
            $btn_txt = "Rejoindre";
            $btn_class = "btn_interesse";
            $icon_symbol = "star";
        } else {
            if ($requestStatus == 'accepted') {
                $url = route("meetups.cancel_request", ["meetupId" => $meetupId]);
                $btn_txt = "Participant"; // Icône de crochet coché
                $btn_class = "btn_friends";
                $icon_symbol = "check_circle";
            } elseif ($requestStatus == 'pending') {
                $btn_txt = "Annuler la demande";
                $url = "#"; // Ne fait rien ici
                $btn_class = "btn_refuse";
            } elseif ($requestStatus == 'refused') {
                $url = "#";
                $btn_txt = "Refusé";
                $btn_class = "btn_refuse";
                $btn_disabled = "disabled"; 
            }
        }

        return "
            <form action='{$url}' method='POST'>
                " . csrf_field() . "
                <button class='{$btn_class} no_select btn_primary' type='submit' {$btn_disabled}>
                    <span>{$btn_txt}</span>
                    <span class='material-symbols-rounded'>
                        {$icon_symbol}
                    </span>
                </button>
            </form>";
    }
}
