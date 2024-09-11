<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Meetup;

class MeetupController extends Controller
{
    public function MeetupPage($meetupId) {
        $meetupName = "";
        $meetupData = Meetup::where("id", $meetupId);
        
        $meetupTags = Meetup::where("id", $meetupId);


        
        if (isset($meetupId)) {
            return view("meetups.meetupPage", ['meetupId' => strval($meetupId), 'meetup' => $meetupData]);
        } else {
            return view("meetups.meetupPage", ['meetupId' => 1]);
        }
    }
}
