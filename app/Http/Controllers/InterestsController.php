<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $interetsUtilisateurTab = utilisateur_interet::getInteretsParUtilisateurTab($id); 
        return view('interets.interets', compact('categories', 'interets', 'interetsUtilisateur','interetsUtilisateurTab'));
    }
    
    public function update_Interets(Request $request)
    {
        $selectedInterets = $request->input('interets');
    
        DB::statement("CALL ajouterInterets(?, ?)", [Auth::user()->id, $selectedInterets]);
        return redirect()->back()->with('success', 'Vos intérêts ont été mis à jour avec succès.');
    }
}
