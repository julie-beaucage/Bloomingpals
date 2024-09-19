<?php

namespace App\Http\Controllers;
use App\Models\demande_rencontre;
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
            $GetRequestMeetupCount = demande_rencontre::GetRequestMeetupCount($organisator->id);

            /** a faire: 
             * -s'assurer que le client peut y accéder car il doit être amis si l'événement est priver
             * -faire que le boutton pour rejoindre, modifier, ou quitter soit présent. */


            return view("meetups.meetupPage", ['meetupData' => $meetupData, "meetupTagsData" => $meetupTags, 
                "organisatorData" => $organisator, "participantsData" => $participants, 
                "requestsParticipantsCount" => $GetRequestMeetupCount]);
        }
    }
    public function MeetupRequestsPage($meetupId) {
        $meetupData = rencontre::where("id", $meetupId)->get()[0];
        $organisator = rencontre::GetOrganisator($meetupId);
        $participants = rencontre::GetParticipants($meetupId);

        //a modifier
        return view("meetups.meetupRequests", ['meetupData' => $meetupData, "participantsData" => $participants, "meetupId" => $meetupId]);
        if ($organisator->id == Auth::user()->id) {
            return view("meetups.meetupRequests", ["participantsData" => $participants, "meetupId" => $meetupId]);
        } else {
            return view("deniedAccess.pageNotFound");
        }

        //verify if the connected user is the current user
    }

    public function LeaveMeetup($meetupId) {
        $meetupData = rencontre::where("id", $meetupId)->get()[0];
        rencontre_utlisateur::DeleteParticipant(Auth::user()->id, $meetupId);
    }
    public function ModifyMeetup($newMeetupData) {
        $meetupData = rencontre::where("id", $newMeetupData->id)->get()[0];

        $meetupData::update([
            "nom" => $newMeetupData->nom, 
            "description" => $newMeetupData->description,
            "adresse" => $newMeetupData->adresse,
            "date" => $newMeetupData->date,
            "nb_participant" => $newMeetupData->nb_participant,
            "image" => $newMeetupData->image,
            "public" => $newMeetupData->public]);
    }

    public function JoinMeetup($meetupId) {
        $userId = Auth::user()->id;
        /*join if public*/
        $meetupData = rencontre::where("id", $meetupId)->get()[0];

        if ($meetupData->public) {
            if (!rencontre_utlisateur::IsInRencontre($meetupId, $userId)) {
                rencontre_utlisateur::AddParticipant($userId, $meetupId);
            }
            return $this->MeetupPage($meetupId);
        } else {
            return $this->MeetupPage($meetupId);
        }
    }
}
