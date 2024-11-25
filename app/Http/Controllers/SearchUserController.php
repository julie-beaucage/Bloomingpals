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
    /*public function pals_index(Request $request)
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
    }*/

}