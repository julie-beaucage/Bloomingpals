<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\City;
use App\Models\Meetup;
use App\Models\Friendship_Request;
use App\Models\Interest;
use App\Models\Meetup_Interest;
use App\Models\Event_Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $page = $request->has('page') ? $request->get('page') : 1;
        if ($page == null || $page < 1) 
            return response()->json(['error' => 'Invalid page number']);

        //$events = Event::all();
        $events = Event::query();

        $query = $request->has('query') ? $request->get('query') : null;
        if ($query != null) {
            $events = $events->where('name', 'LIKE', '%' . $query . '%');
        }
        
        $city = $request->has('city') ? $request->get('city') : null;
        if ($city != null) {
            $events = $events->where(DB::raw('LOWER(`city`)'), 'LIKE', strtolower($city));
        }

        $interests = $request->has('interests') ? $request->get('interests') : null;
        if ($interests != null) {
            $interests =  explode(',', $interests);
            $events = $events->join('events_interests', 'events.id', '=', 'events_interests.id_event')
                ->whereIn('events_interests.id_interest', $interests)
                ->groupBy('events.id')
                ->havingRaw('COUNT(events_interests.id_interest) >= ?', [count($interests)]);
        }

        $categories = $request->has('categories') ? $request->get('categories') : null;
        if ($categories != null) {
            $categories = explode(',', $categories);
            $events = $events->join('events_categories', 'events.id', '=', 'events_categories.id_event')
                ->whereIn('events_categories.id_category', $categories)
                ->groupBy('events.id');
        }

        // Take page requested
        $events = $events->skip(($page - 1) * 20)->take(20)->get();

        $user = User::find(auth()->user()->id);
        $events = $events->sort(function($a, $b) use ($user) {
            $interests_ids_a = Event_Interest::select('id_interest')->where('id_event', '=', $a->id)->get();
            $affinity_a = $user->affinity($interests_ids_a) + rand(0, 30) / 100;

            $interests_ids_b = Event_Interest::select('id_interest')->where('id_event', '=', $b->id)->get();
            $affinity_b = $user->affinity($interests_ids_b) + rand(0, 30) / 100;

            $diff = $affinity_b - $affinity_a;
            return $diff * 100;
        });

        return view('partial_views.event_cards', ['events' => $events]);
    }

    public function users(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : "";
        $users = [];

        $friends = Meetup::GetFriends(Auth::user()->id);
        $friendRequestsSent = Friendship_Request::GetFriendRequestSent(Auth::user()->id);
        $friendRequestsReceive = Friendship_Request::GetFriendRequestReceive(Auth::user()->id);


        if ($query == null) {
            $users = User::all();
            return view('partial_views.user_cards', ['users' => $users, "friends" => $friends, "friendRequestsSent" => $friendRequestsSent, "friendRequestsReceive" => $friendRequestsReceive]);
        }

        $users = Event::where('nom', 'LIKE', '%'.$query.'%')->get();
        return view('partial_views.user_cards', ['users' => $users, "friends" => $friends, "friendRequestsSent" => $friendRequestsSent, "friendRequestsReceive" => $friendRequestsReceive]);
    }
    public function cities(Request $request)
    {
        return response()->json(City::select('city')->get());
    }

    public function interests(Request $request)
    {
        return response()->json(Interest::all());
    } 
}