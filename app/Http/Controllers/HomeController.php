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
    const AMOUNT = 30;
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

            $amis=Relation::GetFriends(Auth::user()->id);
           
            $listfriendsId=[];
            $index=0;
            foreach($amis as $friend){
                $listfriendsId[$index]=$friend->id;
                $index++;
            }
            
            $feed = DB::table('actions')
                ->join('types_actions', 'type', '=', 'types_actions.id')
                ->select('actions.id', 'message', 'name', 'content')
                ->whereIn('id_user', $listfriendsId)->orderBy('id','desc')->offset(self::AMOUNT * $page)->take(30)
                ->get();
            return $feed;
        }
    }

    public function fetchData(Request $req)
    {
        $users=$req->users;
        $meetups=$req->meetups;
       
        if (Auth::user()->id != null) {
            $usersFromDb=User::select('id','first_name','last_name','image_profil')->whereIn('id',$users)->get();
            $meetupsfromDb=Meetup::select('id','name','adress','city','image')->whereIn('id',$meetups)->get();
            $userList=[];
            $meetupList=[];
            $index=0;

            
            foreach($users as $user){
                foreach($usersFromDb as $user2){
                    if($user2->id == $user){
                        $userList[$index]=$user2;
                    }
                }
                $index++;
            }
            $index=0;
            foreach($meetups as $key=>$meetup){

                foreach($meetupsfromDb as $meetup2){
                    if($meetup2->id == $meetup){
                        $meetupList[$key]=$meetup2;
                    }
                }
            }

            return array($userList,$meetupList);
            
        }
    }
}
