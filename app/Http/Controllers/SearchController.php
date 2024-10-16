<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\Meetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function search()
    {
        return view('search.searchPage');
    }

    public function meetups(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : "";
        $meetups = ($query == null) ? Meetup::all() : Meetup::where('name', 'LIKE', '%' . $query . '%')->get();


        $page = $request->has('page') ? $request->get('page') : 1;
        if ($page == null || $page < 1) 
            return response()->json(['error' => 'Invalid page number']);
        
        $meetups = $meetups->forPage($page, 20);

        return view('partial_views.meetup_cards', ['meetups' => $meetups]);
    }

    public function events(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : null;
        $events = ($query == null) ? Event::all() : Event::where('name', 'LIKE', '%' . $query . '%')->get();

        $page = $request->has('page') ? $request->get('page') : 1;
        if ($page == null || $page < 1) 
            return response()->json(['error' => 'Invalid page number']);
        
        $events = $events->forPage($page, 20);

        return view('partial_views.event_cards', ['events' => $events]);
    }

    public function users(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : "";
        $users = ($query == null) ? User::all() : User::where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $query . '%')->get();
        
        $page = $request->has('page') ? $request->get('page') : 1;
        $users = $users->forPage($page, 20);
        
        return view('partial_views.user_cards', ['users' => $users]);
    }
}