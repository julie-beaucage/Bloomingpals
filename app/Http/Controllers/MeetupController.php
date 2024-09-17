<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rencontre;
use App\Models\utilisateur;
use App\Models\rencontre_utlisateur;

class MeetupController extends Controller
{
    public function MeetupPage($meetupId) {
        if (isset($meetupId)) {
            $meetupData = rencontre::where("id", $meetupId)->get()[0];
            $meetupTags = rencontre::GetTags($meetupId);
            $organisator = rencontre::GetOrganisator($meetupId);
            $participants = rencontre::GetParticipants($meetupId);

            /*check if public then if public set button to join*/
            return view("meetups.meetupPage", ['meetupData' => $meetupData, "meetupTagsData" => $meetupTags, 
                "organisatorData" => $organisator, "participantsData" => $participants]);
        }
    }

    public function JoinMeetup($meetupId, $userId) {
        /*join if public*/
        $meetupData = rencontre::where("id", $meetupId)->get()[0];

        if ($meetupData->public) {

            if ()
            rencontre_utlisateur::AddParticipant($userId, $meetupId);
            MeetupPage($meetupId);
        } else {
            MeetupPage($meetupId);
        }
        //return Redirect::back();
    }
}
