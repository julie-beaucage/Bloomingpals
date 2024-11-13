<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\City;
use App\Models\Meetup;
use App\Models\Interest;
use App\Models\Meetup_Interest;
use App\Models\Event_Category;
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
        $page = $request->has('page') ? $request->get('page') : 1;
        if ($page == null || $page < 1) 
            return response()->json(['error' => 'Invalid page number']);

        $meetups = Meetup::all();

        $query = $request->has('query') ? $request->get('query') : null;
        if ($query != null) {
            $query_filter = Meetup::where('name', 'LIKE', '%' . $query . '%')->get();
            $meetups = ($query == null) ? $meetups : $meetups->intersect($query_filter);
        }

        $city = $request->has('city') ? $request->get('city') : null;
        if ($city != null) {
            $city_filter = Meetup::where(DB::raw('LOWER(`city`)'), 'LIKE', strtolower($city))->get();
            $meetups = ($city == null) ? $meetups : $meetups->intersect($city_filter);
        }

        $interests = $request->has('interests') ? $request->get('interests') : null;
        if ($interests != null) {
            $interests =  explode(',', $interests);

            $interests_filter = Meetup_Interest::select('meetups_interests.id_meetup', DB::raw("COUNT(meetups_interests.id_meetup) as count"))
                ->whereIn('meetups_interests.id_interest', $interests)
                ->groupBy('meetups_interests.id_meetup')
                ->having('count', '>=', count($interests))
                ->get();

            $meetups = $meetups->whereIn('id', $interests_filter->map(function($int) { return $int->id_meetup; })->toArray());
        }

        $categories = $request->has('categories') ? $request->get('categories') : null;
        if ($categories != null) {
            $categories = explode(',', $categories);

            $categories_filter = Meetup_Interest::select('meetups_interests.id_meetup', DB::raw("COUNT(meetups_interests.id_meetup) as count"))
            ->join('interests', 'meetups_interests.id_interest', '=', 'interests.id')
            ->join('categories_interests', 'interests.id_category', '=', 'categories_interests.id')
            ->whereIn('categories_interests.id', $categories)
            ->groupBy('meetups_interests.id_meetup')
            ->get();

            $meetups = $meetups->whereIn('id', $categories_filter->map(function($cat) { return $cat->id_meetup; })->toArray());
        }

        // Take page requested
        $meetups = $meetups->skip(($page - 1) * 30)->take(30);
        
        $user = User::find(auth()->user()->id);
        $meetups = $meetups->sort(function($a, $b) use ($user) {
            $interests_ids_a = Meetup_Interest::select('id_interest')->where('id_meetup', '=', $a->id)->get();
            $affinity_a = $user->affinity($interests_ids_a);

            $interests_ids_b = Meetup_Interest::select('id_interest')->where('id_meetup', '=', $b->id)->get();
            $affinity_b = $user->affinity($interests_ids_b);

            $diff = $affinity_b - $affinity_a;
            return $diff * 100;
        });

        // Take half and shuffle
        if (count($meetups) > 15)
            $meetups = $meetups->take(15)->shuffle();
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
            $interests_ids_a = Event_Category::select('id_category')->where('id_event', '=', $a->id)->get();
            $affinity_a = $user->affinity($interests_ids_a) + rand(0, 30) / 100;

            $interests_ids_b = Event_Category::select('id_category')->where('id_event', '=', $b->id)->get();
            $affinity_b = $user->affinity($interests_ids_b) + rand(0, 30) / 100;

            $diff = $affinity_b - $affinity_a;
            return $diff * 100;
        });

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

    public function cities(Request $request)
    {
        return response()->json(City::select('city')->get());
    }

    public function interests(Request $request)
    {
        return response()->json(Interest::all());
    } 
}