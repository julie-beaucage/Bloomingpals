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
        Log::info('Intérêts de l\'utilisateur ID ' . $id . ': ', $interetsUtilisateur->toArray());

        return view('interets.interets', compact('categories', 'interets', 'interetsUtilisateur'));
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
    public function modifier_interet_form()
    {
        Log::info('Le bouton Modifier a été cliqué.');

        $interets = DB::table('interet')
            ->join('categorie_interet', 'interet.id_categorie', '=', 'categorie_interet.idCategorie')
            ->select('interet.idInteret AS interet_id', 'interet.nomInteret AS interet_nom', 'categorie_interet.idCategorie AS id_categorie', 'categorie_interet.nomCategorie AS categorie_nom') 
            ->orderBy('categorie_interet.nomCategorie')
            ->get();

        $userId = Auth::id();
        Log::info($userId);
        $categories = CategorieInteret::all();

        $interetsUtilisateur = DB::table('utilisateur_interet')
            ->where('id_utilisateur', $userId)
            ->pluck('id_interet')
            ->toArray();

        return view('interets/interetEdit', compact('interets', 'interetsUtilisateur', 'categories'));
    }

}
