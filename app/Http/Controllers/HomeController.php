<?php

namespace App\Http\Controllers;

use App\Models\Relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category_Interest;
use App\Models\User_Interest;
use App\Models\User;
use App\Models\Interest;
use App\Models\Feed;
use App\Models\Meetup;
use App\Models\Meetup_Interest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    const AMOUNT = 20;
    public function home()
    {
        return view('home.home');
    }

    public function showcase()
    {
        $meetups = Event::all()->take(20);
        return view('partial_views.event_cards', ['events' => $meetups]);
    }

    public function user_meetups()
    {
        $meetups = Event::all()->take(20);
        return view('partial_views.meetup_cards', ['events' => $meetups]);
    }

    public function top_events()
    {
        $events = Event::all()->take(20);
        return view('partial_views.event_cards', ['events' => $events]);
    }

    public function recent_meetups()
    {
        $meetups = Meetup::orderBy('id', 'desc')->take(20)->get();
        return view('partial_views.meetup_cards', ['meetups' => $meetups]);
    }

    public function upcoming_events()
    {
        $events = Event::where('date', '>', date('Y-m-d H:i:s'))->orderBy('date', 'asc')->take(20)->get();
        return view('partial_views.event_cards', ['events' => $events]);
    }
    public function fetchFeed($page)
    {
        if (Auth::user()->id != null) {

            // $amis=Relation::GetFriends(Auth::user()->id);

            // $listfriendsId=[];
            // $index=0;
            // foreach($amis as $friend){
            //     $listfriendsId[$index]=$friend->id;
            //     $index++;
            // }

            // $feed = DB::table('actions')
            //     ->join('types_actions', 'type', '=', 'types_actions.id')
            //     ->select('actions.id', 'message', 'name', 'content')
            //     ->whereIn('id_user', $listfriendsId)->orderBy('id','desc')->offset(self::AMOUNT * $page)->take(self::AMOUNT)
            //     ->get();

            $feed = DB::table('actions')
                ->join('types_actions', 'type', '=', 'types_actions.id')
                ->select('actions.id', 'message', 'name', 'content')
                ->offset(self::AMOUNT * $page)->take(self::AMOUNT)
                ->get();

            return $feed;
        }
    }

    public function fetchData(Request $req)
    {
        if (Auth::user()->id != null) {

            $users = [];
            $index = 0;
            if (!empty($req->users)) {
                foreach ($req->users as $user) {
                    if (!(in_array($user, $users))) {
                        $users[$index] = $user;
                        $index++;
                    }
                }
            }


            $meetups = [];
            $index = 0;
            if (!empty($req->meetups)) {
                foreach ($req->meetups as $meetup) {
                    if (!(in_array($meetup, $meetups))) {
                        $meetups[$index] = $meetup;
                        $index++;
                    }
                }
            }
            $usersFromDb = User::select('id', 'first_name', 'last_name', 'image_profil')->whereIn('id', $users)->get();
            $meetupsfromDb = Meetup::select('id', 'name', 'adress', 'city', 'image')->whereIn('id', $meetups)->get();


            return array($usersFromDb, $meetupsfromDb);

        }
        return false;
    }
    public function fetchMeetups($page)
    {
        $offset = 30;
        if (Auth::user()->id != null) {
            $meetupsSorted = [];
            $meetups = Meetup::select('id')->orderBy('id', 'desc')->offset($offset * $page)->take($offset)->get();
            $userInterests = User_Interest::select('id_interest')->where('id_user', Auth::user()->id)->get();


            $meetupsByInterest = DB::table('meetups')->join('meetups_interests', 'id', '=', 'id_meetup')
                ->select('id')->whereIn('id_interest', $userInterests)
                ->whereIn('id', $meetups)->orderBy('id', 'desc')->get();

            //enlever les doublons

            $index = count($meetupsSorted);
            foreach ($meetupsByInterest as $meetup) {
                if (!(in_array($meetup->id, $meetupsSorted))) {
                    $meetupsSorted[$index] = $meetup->id;
                    $index++;
                }
            }
            $result = Meetup::whereIn('id', $meetupsSorted)->get();
            return $result;
        }
        return false;
    }
    public function fetchEvents($page)
    {
        $offset = 30;
        if (Auth::user()->id != null) {
            $eventsSorted = [];
            $events = Event::select('id')->orderBy('id', 'desc')->offset($offset * $page)->take($offset)->get();
            $userInterests = User_Interest::select('id_interest')->where('id_user', Auth::user()->id)->get();


            $eventsByInterest = DB::table('events')->join('events_interests', 'id', '=', 'id_event')
                ->select('id')->whereIn('id_interest', $userInterests)
                ->whereIn('id', $events)->orderBy('id', 'desc')->get();

            //enlever les doublons

            $index = count($eventsSorted);
            foreach ($eventsByInterest as $event) {
                if (!(in_array($event->id, $eventsSorted))) {
                    $eventsSorted[$index] = $event->id;
                    $index++;
                }
            }

            $result = Event::whereIn('id', $eventsSorted)->get();
            return $result;

        }
        return false;
    }
}
