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

            $selectedGroups = $request->input('group_personality', []);
            Log::info("Search initiated with term:", $selectedGroups);

            $typePersonality = $request->input('type_personality', []);
            Log::info("Search initiated with term personalit :", $typePersonality);

            // Créer une liste vide pour les utilisateurs à afficher
            $userAfficher = collect();

            // Ajouter les utilisateurs qui appartiennent aux groupes sélectionnés
            if (!empty($selectedGroups)) {
                $groupUsers = $users->filter(function ($user) use ($selectedGroups) {
                    $group = $user->getPersonalityGroup();
                    return in_array($group, $selectedGroups);
                });
                $userAfficher = $userAfficher->merge($groupUsers);
                Log::info("Users filtered by group: " . $groupUsers->count());
            }

            // Ajouter les utilisateurs qui correspondent aux types de personnalité sélectionnés
            if (!empty($typePersonality)) {
                $typeUsers = $users->filter(function ($user) use ($typePersonality) {
                    $type = $user->getPersonalityType();
                    return in_array($type, $typePersonality);
                });
                $userAfficher = $userAfficher->merge($typeUsers);
                Log::info("Users filtered by type: " . $typeUsers->count());
            }

            // Supprimer les doublons dans la liste des utilisateurs à afficher
            $userAfficher = $userAfficher->unique('id');

            // Log final du nombre d'utilisateurs filtrés
            Log::info("Final users retrieved: " . $userAfficher->count());

            return view('partial_views.user_cards', ['users' => $userAfficher])->render();
        }

        // Si la requête n'est pas AJAX
        $users = User::all();
        return view('pals.pals', ['users' => $users]);
    }

    public function pals_index21(Request $request)
    {
        if ($request->ajax()) {
            $searchTerm = $request->get('search', '');
            $users = User::where('first_name', 'like', '%' . $searchTerm . '%')->get();

            $selectedGroups = $request->input('group_personality', []);
            Log::info("Search initiated with term:", $selectedGroups);

            $typePersonality = $request->input('type_personality', []);
            Log::info("Search initiated with term personalit :", $typePersonality);

            if (!empty($selectedGroups)) {
                $users = $users->filter(function ($user) use ($selectedGroups) {
                    $group = $user->getPersonalityGroup();
                    return in_array($group, $selectedGroups);
                });
                 Log::info("Users filtered by group: " . $users->count());
            } 
            if (!empty($typePersonality)) {
                    $users = $users->filter(function ($user) use ($typePersonality) {
                    $type = $user->getPersonalityType();
                    return in_array($type, $typePersonality);
                });
                 Log::info("Users filtered by type: " . $users->count());
            }

            // Log final count of users
             Log::info("Final users retrieved: " . $users->count());

            return view('partial_views.user_cards', ['users' => $users])->render();
        }

        // Si la requête n'est pas AJAX
        $users = User::all();
        return view('pals.pals', ['users' => $users]);
    }

    public function pals_index33(Request $request)
    {
        if ($request->ajax()) {
            $searchTerm = $request->get('search', '');
            $users = User::where('first_name', 'like', '%' . $searchTerm . '%')->get();

            $selectedGroups = $request->input('group_personality', []);
            $typePersonality = $request->input('type_personality', []);
            if (!empty($selectedGroups)) {
                $users = $users->filter(function ($user) use ($selectedGroups) {
                    $group = $user->getPersonalityGroup();
                    return in_array($group, $selectedGroups);
                });
                // Log::info("Users filtered by group: " . $users->count());
            }
            if (!empty($typePersonality)) {
                $users = $users->filter(function ($user) use ($typePersonality) {
                    $type = $user->getPersonalityType();
                    return in_array($type, $typePersonality);
                });
                // Log::info("Users filtered by type: " . $users->count());
            }

            // Log final count of users
            // Log::info("Final users retrieved: " . $users->count());

            return view('partial_views.user_cards', ['users' => $users])->render();
        }

        // Si la requête n'est pas AJAX
        $users = User::all();
        return view('pals.pals', ['users' => $users]);
    }
    public function pals_index3(Request $request)
    {
        if ($request->ajax()) {
            $searchTerm = $request->get('search', '');
            //Log::info("Search initiated with term: {$searchTerm}");
            $users = User::where('first_name', 'like', '%' . $searchTerm . '%')->get();
            // Log::info("Users retrieved: " . $users->count());
            $typePersonality = $request->input('type_personality');

            if ($request->has('group_personality')) {
                $selectedGroups = $request->get('group_personality');
                //Log::info("SELECTEDGROUP: " . json_encode($selectedGroups)); // Convertir le tableau en JSON
                $users = $users->filter(function ($user) use ($selectedGroups) {
                    $group = $user->getPersonalityGroup();
                    //Log::info("GROUPE FRO THE USER {$group}");
                    $isInGroup = in_array($group, $selectedGroups);
                    return $isInGroup;
                });            Log::info("Users add groupe " . $users->count());

            }
            if ($request->has('type_personality')) {
                $typePersonality = $request->get('type_personality');
                //Log::info("SELECTEDGROUP: " . json_encode($selectedGroups)); // Convertir le tableau en JSON
                $users = $users->filter(function ($user) use ($typePersonality) {
                    $type = $user->getPersonalityType();
                    $haveType = in_array($type, $typePersonality);
                    return $haveType;
                });            Log::info("Users add perosp: " . $users->count());

            }
            Log::info("Users retrieved finale: " . $users->count());

            return view('partial_views.user_cards', ['users' => $users])->render();
        }
        $users = User::all();
        return view('pals.pals', ['users' => $users]);
    }
    private function filterName($queryBuilder, $query)
    {
        return $queryBuilder->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $query . '%');
    }

    private function filterByPersonalityGroup($queryBuilder, $personalityGroup)
    {
        return $queryBuilder->where('personality_group', $personalityGroup);
    }


}