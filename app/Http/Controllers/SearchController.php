<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\Meetup;
use App\Models\Interest;
use App\Models\Meetup_Interest;
use App\Models\Event_Interest;
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
                ->orderBy('count', 'DESC')
                ->get();

            $new_meetups = collect([]);
            foreach ($interests_filter as $interest) {
                if ($interest->count != count($interests))
                continue;

                foreach ($meetups as $meetup) {
                    if ($interest->id_meetup == $meetup->id) {
                        $new_meetups->push($meetup);
                    }
                }
            }
            $meetups = $new_meetups;
        }

        $categories = $request->has('categories') ? $request->get('categories') : null;
        if ($categories != null) {
            $categories = explode(',', $categories);

            $categories_filter = Meetup_Interest::select('meetups_interests.id_meetup', DB::raw("COUNT(meetups_interests.id_meetup) as count"))
            ->join('interests', 'meetups_interests.id_interest', '=', 'interests.id')
            ->join('categories_interests', 'interests.id_category', '=', 'categories_interests.id')
            ->whereIn('categories_interests.id', $categories)
            ->groupBy('meetups_interests.id_meetup')
            ->orderBy('count', 'DESC')
            ->get();

            $new_meetups = collect([]);
            foreach ($categories_filter as $category) {
                foreach ($meetups as $meetup) { 
                    if ($category->id_meetup == $meetup->id) {
                        $new_meetups->push($meetup);
                    }
                }
            }
            $meetups = $new_meetups;
        }

        $page = $request->has('page') ? $request->get('page') : 1;
        if ($page == null || $page < 1) 
            return response()->json(['error' => 'Invalid page number']);
        
        $meetups = $meetups->forPage($page, 20);

        return view('partial_views.meetup_cards', ['meetups' => $meetups]);
    }

    public function events(Request $request)
    {
        $events = Event::all();

        $query = $request->has('query') ? $request->get('query') : null;
        if ($query != null) {
            $query_filter = Event::where('name', 'LIKE', '%' . $query . '%')->get();
            $events = ($query == null) ? $events : $events->intersect($query_filter);
        }
        
        $city = $request->has('city') ? $request->get('city') : null;
        if ($city != null) {
            $city_filter = Event::where(DB::raw('LOWER(`city`)'), 'LIKE', strtolower($city))->get();
            $events = ($city == null) ? $events : $events->intersect($city_filter);
        }

        $interests = $request->has('interests') ? $request->get('interests') : null;
        if ($interests != null) {
            $interests =  explode(',', $interests);

            $interests_filter = Event_Interest::select('events_interests.id_event', DB::raw("COUNT(events_interests.id_event) as count"))
                ->whereIn('events_interests.id_interest', $interests)
                ->groupBy('events_interests.id_event')
                ->orderBy('count', 'DESC')
                ->get();

            $new_events = collect([]);
            foreach ($interests_filter as $interest) {
                if ($interest->count != count($interests))
                continue;

                foreach ($events as $event) {
                    if ($interest->id_event == $event->id) {
                        $new_events->push($event);
                    }
                }
            }
            $events = $new_events;
        }

        $categories = $request->has('categories') ? $request->get('categories') : null;
        if ($categories != null) {
            $categories = explode(',', $categories);

            // Categories
            $categories_filter = Event_Category::select('events_categories.id_event', DB::raw("COUNT(events_categories.id_event) as count"))
            ->whereIn('events_categories.id_category', $categories)
            ->groupBy('events_categories.id_event')
            ->orderBy('count', 'DESC')
            ->get();

            $new_events_categories = collect([]);
            foreach ($categories_filter as $category) {
                foreach ($events as $event) { 
                    if ($category->id_event == $event->id) {
                        $new_events_categories->push($event);
                    }
                }
            }

            // Categories of the interests
            $categories_filter = Event_Interest::select('events_interests.id_event', DB::raw("COUNT(events_interests.id_event) as count"))
            ->join('interests', 'events_interests.id_interest', '=', 'interests.id')
            ->join('categories_interests', 'interests.id_category', '=', 'categories_interests.id')
            ->whereIn('categories_interests.id', $categories)
            ->groupBy('events_interests.id_event')
            ->orderBy('count', 'DESC')
            ->get();

            $new_events_interests = collect([]);
            foreach ($categories_filter as $category) {
                foreach ($events as $event) { 
                    if ($category->id_event == $event->id) {
                        $new_events_interests->push($event);
                    }
                }
            }

            // Merge Both
            $events = $new_events_categories->merge($new_events_interests)->unique();
        }

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

    public function cities(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : "";
        $cities = ($query == null) ? null : DB::table('canadacities')->where('city', 'LIKE', $query . '%')->limit(5)->get();
        return response()->json($cities);
    }

    public function interests(Request $request)
    {
        $query = $request->has('query') ? $request->get('query') : "";
        $interests = ($query == null) ? null : Interest::where('name', 'LIKE', $query . '%')->limit(5)->get();
        
        return response()->json($interests);
    } 

    public function getInterests(Request $request)
    {
        if (!$request->has('ids'))
            return response()->json(['error' => 'No ids provided']);

        $ids = $request->get('ids');
        $interests = Interest::whereIn('id', $ids)->get();
        
        return response()->json($interests);
    }
}