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

    /* public function user_meetups()
     {
         $meetups = Event::all()->take(20);
         return view('partial_views.meetup_cards', ['events' => $meetups]);
     }*/

    public function top_events()
    {
        $events = Event::all()->take(20);
        return view('partial_views.event_cards', ['events' => $events]);
    }

    /* public function recent_meetups()
     {
         $meetups = Meetup::orderBy('id', 'desc')->take(20)->get();
         return view('partial_views.meetup_cards', ['meetups' => $meetups]);
     }*/

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
                ->select('actions.id', 'name', 'id_user', 'content')->where('id_user', '!=', Auth::user()->id)->groupBy('id')
                ->offset(self::AMOUNT * $page)->take(self::AMOUNT)->orderByDesc('actions.id')
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
    public function fetchMeetupsInterest($page)
    {
        $offset = 5;
        if (Auth::user()->id != null) {
            $id_user=Auth::user()->id;

            $userInterests = User_Interest::select('id_interest')->where('id_user', Auth::user()->id)->get();
            $meetupsByInterest = DB::table('meetups')->join('meetups_interests', 'id', '=', 'id_meetup')->where('id_owner','!=',$id_user)
                ->whereIn('id_interest', $userInterests)->groupBy('id')
                ->orderBy('id', 'desc')->offset($offset * $page)->take($offset)->get();

            return $meetupsByInterest;
        }
        return false;
    }
    public function fetchMeetups($page)
    {
        $offset = 5 * $page;
        if (Auth::user()->id != null) {
            $id_user=Auth::user()->id;
            $meetups = DB::select("SELECT *
            FROM meetups 
            WHERE id_owner != $id_user AND NOT EXISTS(
                SELECT 1
                FROM meetups_interests
                WHERE meetups.id= meetups_interests.id_meetup AND id_interest IN ( select id_interest from users_interests where id_user=$id_user)  -- Replace with the IDs of the interests you want to exclude
            ) order by id desc LIMIT 5 offset $offset;");
            return $meetups;
        }
        return false;
    }
    public function fetchEventsInterest($page)
    {
        $offset = 5;
        if (Auth::user()->id != null) {
            $id_user=Auth::user()->id;
            $userInterests = User_Interest::select('id_interest')->where('id_user', Auth::user()->id)->get();

            $eventsByInterest = DB::table('events')->join('events_interests', 'id', '=', 'id_event')->groupBy('id')
                ->whereIn('id_interest', $userInterests)->orderBy('id', 'desc')->offset($offset * $page)->take($offset)->get();

            return $eventsByInterest;
        }
        return false;
    }

    public function fetchEvents($page)
    {
        $offset = 5 * $page;
        if (Auth::user()->id != null) {
            $id_user=Auth::user()->id;

            $events = DB::select("SELECT *
            FROM events 
            WHERE  NOT EXISTS(
                SELECT 1
                FROM events_interests
                WHERE events.id= events_interests.id_event AND id_interest IN ( select id_interest from users_interests where id_user=$id_user)  -- Replace with the IDs of the interests you want to exclude
            ) order by id desc LIMIT 5 offset $offset;");

            return $events;
        }
        return false;
    }

    public function suggestedUsers()
    {
        if (Auth::user()->id != null) {
            $userId = Auth::user()->id;
            $userInterest = User_Interest::select('id_interest')->where('id_user', Auth::user()->id)->limit(2000)->get();
            $similarUsers = User_Interest::select('id_user')->whereIn('id_interest', $userInterest)
                ->where('id_user', '!=', Auth::user()->id)->groupBy('id_user')->get()->toArray();

            $friendList = Relation::GetFriends($userId);

            $friendListId = [];
            $index = 0;
            foreach ($friendList as $friend) {
                $friendListId[$index] = $friend->id;
                $index++;
            }
            // get les amis des amis
            $friendsOffFriends = [];
            $temp_tab = DB::table('relations')->select('id_user2')->whereIn('id_user1', $friendListId)->get()->toArray();
            $index = 0;
            foreach ($temp_tab as $obj) {
                $isIn = false;
                //pas id user
                if ($userId != $obj->id_user2) {
                    //cherche les doublons de userId
                    foreach ($friendsOffFriends as $obj2) {
                        if ($obj2 == $obj->id_user2) {
                            $isIn = true;
                            break;
                        }
                    }
                    if ($isIn == false) {
                        $friendsOffFriends[$index] = $obj->id_user2;
                        $index++;
                    }
                }
            }
            //delete my own friends from the array friendsOffFriend
            $indexToDelete = [];
            foreach ($friendsOffFriends as $key => $friend) {
                if (in_array($friend, $friendListId)) {
                    $indexToDelete = array_merge(array($key), $indexToDelete);
                }
            }
            foreach ($indexToDelete as $index) {
                array_splice($friendsOffFriends, $index, 1);
            }
            //dd($friendsOffFriends);

            // check that array similarUsers and array friendsOffFriends dont have same user
            $similarUsesInterestsCount = [];
            $indexToDelete = [];
            //dd(in_array($similarUsers[0]['id_user'],$friendListId));
            foreach ($similarUsers as $key => $user) {
                if (in_array($user['id_user'], $friendsOffFriends) || in_array($user['id_user'], $friendListId)) {
                    $indexToDelete = array_merge(array($key), $indexToDelete);
                }
            }
            foreach ($indexToDelete as $index) {
                array_splice($similarUsers, $index, 1);
            }
            if (count($similarUsers) < 1 && count($friendListId) < 1) {
                return false;
            }
            // calculate how many common interests

            foreach ($similarUsers as $user) {
                $isAlreadyIn = array_key_exists($user['id_user'], $similarUsesInterestsCount);

                if ($isAlreadyIn == false) {
                    $similarUsesInterestsCount[$user['id_user']] = 1;
                } else {
                    $similarUsesInterestsCount[$user['id_user']] += 1;
                }
            }
            global $common_interest;
            $common_interest = 3;
            if (count($userInterest) < 10) {
                $common_interest = 1;
            }
            function similar($var)
            {
                global $common_interest;
                return $var >= $common_interest;
            }
            // get users with 3 or more similar interests
            array_filter($similarUsesInterestsCount, function ($var) {
                global $common_interest;
                return $var >= $common_interest;
            });

            $index = 0;
            $similarUsers = [];
            // get only Id of users 
            foreach ($similarUsesInterestsCount as $key => $value) {
                $similarUsers[$index] = $key;
                $index++;
            }
            //check that friends of ur  frieend no
            $index = count($similarUsers);
            foreach ($friendsOffFriends as $id) {
                $similarUsers[$index] = $id;
                $index++;
            }
            shuffle($similarUsers);
            $index = 0;
            $SuggestedUsers = [];

            foreach ($similarUsers as $user) {
                $SuggestedUsers[$index] = $user;
                $index++;
                if ($index >= 10) {
                    break;
                }
            }
            //dd($SuggestedUsers);
            return User::select('id', 'first_name', 'last_name', 'image_profil')->whereIn('id', $SuggestedUsers)->get();
        }
    }
    public function calculateAffinity(Request $req)
    {
        $affinities = [];
        $index = 0;
        $idUser = Auth::user()->id;
        $USER = new User();
        foreach ($req->ids as $id) {
            $affinities[$index] = $USER->calculateAffinity($id, $idUser);
            $index++;
        }
        return $affinities;
    }
    public function friends(Request $req)
    {
        $RELATION = new Relation();
        $id = $req->id == -1 ? Auth::user()->id : $req->id;

        $friends = $RELATION->GetFriends($id);
        //enlever info dangereuse
        foreach ($friends as $friend) {
            $friend->password = null;
        }
        return $friends;
    }
}


