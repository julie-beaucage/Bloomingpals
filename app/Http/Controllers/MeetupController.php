<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rencontre;
use App\Models\utilisateur;

class MeetupController extends Controller
{
    public function MeetupPage($meetupId) {
        if (isset($meetupId)) {
            $meetupData = rencontre::where("id", $meetupId)->get()[0];
            $meetupTags = rencontre::GetTags($meetupId);
            $organisator = rencontre::GetOrganisator($meetupId);
            $participants = rencontre::GetParticipants($meetupId);


            return view("meetups.meetupPage", ['meetupData' => $meetupData, "meetupTagsData" => $meetupTags, 
                "organisatorData" => $organisator, "participantsData" => $participants]);
        }
    }
}
