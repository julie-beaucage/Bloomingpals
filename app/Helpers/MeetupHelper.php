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
            return "
                <button class=' ami btn_primary no_select'>
                    <span>C'est moi</span>
                </button>";
        }
        $requestStatus = isFriendRequestSend($currentUserId, $userId);
        $url = '';
        $btn_txt = '';
        $btn_class = "ami btn_primary ";
        $isSender =isSender ($currentUserId, $userId) ;
        $relation = areFriends($userId, $currentUserId);
        $icon_symbol = '';
        $removeText= '';
        $remove="";
        $txt_remove="";
        if ($relation) {
            $icon_symbol="check_circle";
            return "
                <div class='friend-menu'>
                    <button class='ami grey btn_friends {$btn_class} no_select'>
                        <span class='btn-text'>Ami(e)</span>
                        <span class='material-symbols-rounded'>{$icon_symbol}</span>
                        <span class='btn-text-remove'>Retirer l'ami(e)</span>
                    </button>
                </div>";
        }
        
        else {
            switch ($requestStatus) {
                case 'Blocked':
                    $btn_txt = "Vous êtes bloqué";
                    $btn_class .= "btn_blocked";
                    break;

                case 'pending':
                    if ($isSender) {
                        $url = route("CancelFriendRequest", ["id" => $userId]);
                        $btn_txt = "En attente";
                        $btn_class .= "btn_annuler btn_primary";
                        $removeText= 'Annuler la demande';
                        $txt_remove='btn-text';
                    } else {
                        $url_accept = route("AcceptFriendRequest", ["id" => $userId]);
                        $url_refuse = route("RefuseFriendRequest", ["id" => $userId]);
                        $btn_txt_accept = "Accepter";
                        $btn_txt_refuse = "Refuser";
                        return "
                        <div class='acceptContainer'>
                            <a href='{$url_accept}'>
                                <div class='ami btn_friends btn_accept btn_primary no_select'>{$btn_txt_accept}</div>
                            </a>
                            <a href='{$url_refuse}'>
                                <div class='ami btn_refuse btn_primary no_select btn_friends'>{$btn_txt_refuse}</div>
                            </a>
                        </div>";
                    }
                    break;

                case 'refused':
                    $btn_txt = "Vous avez été refusé";
                    $btn_class = "ami btn_annuler btn_primary ";
                    break;

                default: 
                    $url = route("SendFriendRequest", ["id" => $userId]);
                    $btn_txt = "Ajouter un ami(e)";
                    break;
            }
        }
        
        if (!empty($removeText)) {
            $remove = "<span class='btn-text-remove'>{$removeText}</span>";
        }
        return "
            <button class='btn_friends {$btn_class} no_select ' onclick=\"window.location.href='{$url}'\">
                <span class='{$txt_remove}'>{$btn_txt}</span>
                {$remove}
            </button>";        
    }       
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
            $btn_txt = "Modifier";
            $btn_class = "";

            return "
            <form action='/meetup/form/{$meetupId}' method='GET'>
                " . csrf_field() . "
                <button class='{$btn_class} no_select btn_primary' type='submit'>
                    <span>{$btn_txt}</span>
                </button>
            </form>";
        }
        $requestStatus = isRequestSend($userId, $meetupId);
        $url = '';
        $btn_txt = '';
        $btn_class = '';
        $icon_symbol = '';
        $btn_disabled  = '';


        if ($requestStatus == 'refused') {
            return '';
        }

        if ($requestStatus == 'none') {
            $url = route("meetups.send_request", ["meetupId" => $meetupId]);
            $btn_txt = "Rejoindre";
            $btn_class = "";
        } else {
            if ($requestStatus == 'accepted') {
                $url = route("meetups.leave", ["meetupId" => $meetupId]);
                $btn_txt = "Se retirer"; // Icône de crochet coché
                $btn_class = "";
            } elseif ($requestStatus == 'pending') {
                $btn_txt = "Annuler la demande";
                $url = route("meetups.cancel_request", ["meetupId" => $meetupId]);
                $btn_class = "";
            } elseif ($requestStatus == 'refused') {
                $url = "#";
                $btn_txt = "Refusé";
                $btn_class = "";
                $btn_disabled = "disabled"; 
                $url = "#";
                $btn_class = "";
            }
        }

        return "
            <form action='{$url}' method='POST'>
                " . csrf_field() . "
                <button class='{$btn_class} no_select btn_primary' type='submit'>
                    <span>{$btn_txt}</span>
                </button>
            </form>";
   }
}
