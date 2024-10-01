<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use App\Models\CategorieInteret;
use App\Models\utilisateur_interet;
use App\Models\Interet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InterestsController extends Controller
{
    public function interets($id)
    {
        $categories = CategorieInteret::all(); 
        $interets = Interet::all(); 
        $interetsUtilisateur = utilisateur_interet::getInteretsParUtilisateur($id); 
        $interetsUtilisateurTab=utilisateur_interet::getInteretsParUtilisateurTab($id); 
        return view('interets.interets', compact('categories', 'interets', 'interetsUtilisateur','interetsUtilisateurTab'));
    }
    
    public function update_Interets($id, Request $request)
    {
        $selectedInterets = $request->input('interets');
        if ($selectedInterets) {
            DB::statement("CALL ajouterInterets(?, ?)", [$id, $selectedInterets]);
            return redirect()->back()->with('success', 'Vos intérêts ont été mis à jour avec succès.');
        }
    
        return redirect()->back()->with('error', 'Aucun intérêt sélectionné.');

    }
}
