<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\Meetup;
use App\Models\Relation;
use App\Models\Friendship_Request;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

    public function search()
    {
        return view('search.searchPage');
    }

    public function meetups(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : "";
        $meetups = [];

        if ($query == null) {
            $meetups = Meetup::all();
            return view('partial_views.meetup_cards', ['meetups' => $meetups]);
        }

        $meetups = Meetup::where('nom', 'LIKE', '%'.$query.'%')->get();

        return view('partial_views.meetup_cards', ['meetups' => $meetups]);
    }

    public function events(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : null;
        $events = [];
        
        if ($query == null) {
            $events = Event::all();
            return view('partial_views.event_cards', ['events' => $events]);
        }

        $events = Event::where('nom', 'LIKE', '%'.$query.'%')->get();
        return view('partial_views.event_cards', ['events' => $events]);
    }

    public function users(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : "";
        $users = [];

        $friends = Relation::GetFriends(Auth::user()->id);
        $friendRequestsSent = Friendship_Request::GetFriendRequestSent(Auth::user()->id);
        $friendRequestsReceive = Friendship_Request::GetFriendRequestReceive(Auth::user()->id);


        if ($query == null) {
            $users = User::all();
            return view('partial_views.user_cards', ['users' => $users, "friends" => $friends, "friendRequestsSent" => $friendRequestsSent, "friendRequestsReceive" => $friendRequestsReceive]);
        }

        $users = Event::where('nom', 'LIKE', '%'.$query.'%')->get();
        return view('partial_views.user_cards', ['users' => $users, "friends" => $friends, "friendRequestsSent" => $friendRequestsSent, "friendRequestsReceive" => $friendRequestsReceive]);
    }
}