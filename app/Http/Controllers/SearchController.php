<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\City;
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
        $page = $request->has('page') ? $request->get('page') : 1;
        if ($page == null || $page < 1) 
            return response()->json(['error' => 'Invalid page number']);


        $meetups = Meetup::query();

        $query = $request->has('query') ? $request->get('query') : null;
        if ($query != null) {
            $meetups = $meetups->where('name', 'LIKE', '%' . $query . '%');
        }

        $city = $request->has('city') ? $request->get('city') : null;
        if ($city != null) {
            $meetups = $meetups->where(DB::raw('LOWER(`city`)'), 'LIKE', strtolower($city));
        }

        $interests = $request->has('interests') ? $request->get('interests') : null;
        if ($interests != null) {
            $interests =  explode(',', $interests);

            $meetups = $meetups->join('meetups_interests', 'meetups.id', '=', 'meetups_interests.id_meetup')
                ->whereIn('meetups_interests.id_interest', $interests)
                ->groupBy('meetups.id')
                ->havingRaw('COUNT(meetups_interests.id_interest) >= ?', [count($interests)]);
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
        $meetups = $meetups->skip(($page - 1) * 20)->take(20)->get();
        
        $user = User::find(auth()->user()->id);
        $meetups = $meetups->sort(function($a, $b) use ($user) {
            $interests_ids_a = Meetup_Interest::select('id_interest')->where('id_meetup', '=', $a->id)->get();
            $affinity_a = $user->affinity($interests_ids_a);

            $interests_ids_b = Meetup_Interest::select('id_interest')->where('id_meetup', '=', $b->id)->get();
            $affinity_b = $user->affinity($interests_ids_b);

            $diff = $affinity_b - $affinity_a;
            return $diff * 100;
        });

        return view('partial_views.meetup_cards', ['meetups' => $meetups]);
    }

    public function events(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;
        if ($page == null || $page < 1) 
            return response()->json(['error' => 'Invalid page number']);

        //$events = Event::all();
        $events = Event::query();

        $events = $events->where('date', '>=', date('Y-m-d H:i:s'));

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
    
    public function pals_index(Request $request)
    {
        if ($request->ajax()) {
            $searchTerm = $request->get('search', '');
            $users = User::where('first_name', 'like', '%' . $searchTerm . '%')->get();
            $selectedGroups = $request->input('group_personality', []);
            $typePersonality = $request->input('type_personality', []);
            $userAfficher = collect();

            if (!empty($selectedGroups)) {
                $groupUsers = $users->filter(function ($user) use ($selectedGroups) {
                    $group = $user->getPersonalityGroup();
                    return in_array($group, $selectedGroups);
                });
                $userAfficher = $userAfficher->merge($groupUsers);
            }

            if (!empty($typePersonality)) {
                $typeUsers = $users->filter(function ($user) use ($typePersonality) {
                    $type = $user->getPersonalityType();
                    return in_array($type, $typePersonality);
               
                });
                $userAfficher = $userAfficher->merge($typeUsers);            
             }
            $userAfficher = $userAfficher->unique('id');
            
            if ($request->allFilters) {
                $userAfficher = User::all();
            } 
            return view('partial_views.user_cards', ['users' => $userAfficher])->render();   
        }
        $users = User::all();
        return view('pals.pals', ['users' => $users]);
    }
}