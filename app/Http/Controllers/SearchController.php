<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
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

        return view('search.meetups', ['meetups' => $meetups]);
    }

    public function events(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : null;
        $events = [];
        
        if ($query == null) {
            $events = Event::all();
            return view('search.events', ['events' => $events, 'query' => $query]);
        }

        $events = Event::where('nom', 'LIKE', '%'.$query.'%')->get();
        return view('search.events', ['events' => $events, 'query' => $query]);
    }

    public function users(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : "";
        $users = [];

        return view('search.users', ['search' => $users]);
    }
}