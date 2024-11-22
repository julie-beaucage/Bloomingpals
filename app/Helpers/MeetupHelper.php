<?php

use Illuminate\Support\Facades\DB;

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

        if ($requestStatus == 'none') {
            $url = route("meetups.send_request", ["meetupId" => $meetupId]);
            $btn_txt = "Rejoindre";
            $btn_class = "btn_interesse";
        } else {
            if ($requestStatus == 'accepted') {
                $url = route("meetups.cancel_request", ["meetupId" => $meetupId]);
                $btn_txt = "Participant"; // Icône de crochet coché
                $btn_class = "btn_friends";
            } elseif ($requestStatus == 'pending') {
                $btn_txt = "En attente";
                $url = "#"; // Ne fait rien ici
                $btn_class = "btn_pending";
            } elseif ($requestStatus == 'refused') {
                $url = "#";
                $btn_txt = "Refusé";
                $btn_class = "btn_refused";
            }
        }

        return "
            <form action='{$url}' method='POST'>
                " . csrf_field() . "
                <button class='{$btn_class} no_select btn_primary' type='submit'>
                    <span>{$btn_txt}</span>
                    <span class='material-symbols-rounded'>
                        star
                    </span>
                </button>
            </form>";
    }
}
