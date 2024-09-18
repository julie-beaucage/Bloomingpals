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

            /** a faire: 
             * -s'assurer que le client peut y accéder car il doit être amis si l'événement est priver
             * -faire que le boutton pour rejoindre, modifier, ou quitter soit présent. */


            return view("meetups.meetupPage", ['meetupData' => $meetupData, "meetupTagsData" => $meetupTags, 
                "organisatorData" => $organisator, "participantsData" => $participants, "actionButtonState" => 0]);
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
