<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\Meetup;
use Illuminate\Http\Request;

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

        if ($query == null) {
            $users = User::all();
            return view('partial_views.user_cards', ['users' => $users]);
        }

        $users = Event::where('nom', 'LIKE', '%'.$query.'%')->get();
        return view('partial_views.user_cards', ['users' => $users]);
    }
}