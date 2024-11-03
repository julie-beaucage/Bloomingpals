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
use Illuminate\Support\Facades\Log;

class SearchUserController extends Controller
{
    public function pals_index(Request $request)
    {
        if ($request->ajax()) {
            $searchTerm = $request->get('search', '');
            $users = User::where('first_name', 'like', '%' . $searchTerm . '%')->get();
            return view('partial_views.user_cards', ['users' => $users])->render();
        }
        $users = User::all();
        return view('pals.pals', ['users' => $users]);
    }
  /*  public function pals_index()
    {
        $users = User::all();
        return view('pals.pals',['users' => $users]);
    }*/
  public function searchUsers2(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $currentUser = auth()->user();
        $query = $request->input('search');
        $users = User::query()
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where(function ($subQuery) use ($query) {
                    $subQuery->where('first_name', 'like', '%' . $query . '%')
                             ->orWhere('last_name', 'like', '%' . $query . '%')
                             ->orWhereHas('interests', function ($interestQuery) use ($query) {
                                 $interestQuery->where('name', 'like', '%' . $query . '%');
                             });
                });
            })
            ->where('id', '!=', $currentUser->id) // Exclure l'utilisateur actuel des résultats
            ->get();
        return view('partial_views.user_cards', compact('users', 'currentUser'));
    }

    public function searchUser3(Request $request)
    {

        $query = $request->get('query', '');
        $users = User::query();
    
        if ($query) {
            $users = $this->filterName($users, $query);
        }

        /*$query = $request->has('query') ? $request->get('query') : "";
        $users = ($query == null) ? User::all() : User::where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $query . '%')->get();
        
        $page = $request->has('page') ? $request->get('page') : 1;
        $users = $users->forPage($page, 20);
        
        return view('partial_views.user_cards', ['users' => $users]);*/

        return view('partial_views.user_cards', ['users' => $users->get()]);
    }
    private function filterName($queryBuilder, $query)
    {
        return $queryBuilder->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $query . '%');
    }

    // Méthode pour filtrer par groupe de personnalité
    private function filterByPersonalityGroup($queryBuilder, $personalityGroup)
    {
        return $queryBuilder->where('personality_group', $personalityGroup);
    }

    /* public function users(Request $request)
     {
         $query = $request->has('query') ? $request->get('query') : "";
         $users = ($query == null) ? User::all() : User::where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $query . '%')->get();
         
         $page = $request->has('page') ? $request->get('page') : 1;
         $users = $users->forPage($page, 20);
         
         return view('partial_views.user_cards', ['users' => $users]);
     }*/
}