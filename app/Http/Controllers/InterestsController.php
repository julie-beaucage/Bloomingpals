<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use App\Models\CategorieInteret;
use App\Models\Interet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InterestsController extends Controller
{
    public function interets($id)
    {
        $categories = CategorieInteret::all();
        $interets = Interet::all();

        $interetsUtilisateur = Interet::join('utilisateur_interet', 'interet.id', '=', 'utilisateur_interet.id_interet')
            ->where('utilisateur_interet.id_utilisateur', $id)
            ->select('interet.*')
            ->get();

        return view('interets.interets', [
            'categories' => $categories,
            'interetsUtilisateur' => $interetsUtilisateur,
            'interets' => $interets,
            'userId' => $id
        ]);
    }

    public function update_Interets($id, Request $request)
    {
        $selectedInterets = $request->input('interets');
        DB::statement("CALL ajouterInterets(?, ?)", [$id, $selectedInterets]);
        return redirect()->back()->with('success', 'Vos intérêts ont été mis à jour avec succès.');
    }
    public function modifier_interet_form()
    {
        Log::info('Le bouton Modifier a été cliqué.');
        $interets = DB::table('interet')
            ->join('categorie_interet', 'interet.id_categorie', '=', 'categorie_interet.id')
            ->select('interet.id AS interet_id', 'interet.nom AS interet_nom', 'categorie_interet.id AS id_categorie', 'categorie_interet.nom AS categorie_nom') // Ajoutez 'categorie_interet.id AS id_categorie'
            ->orderBy('categorie_interet.nom')
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
