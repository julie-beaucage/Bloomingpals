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
    /*  public function interets($id)
      {
          $user = User::findOrFail($id);

          $interets = $user->interets()->with('categorie')->get(); 

          $groupedInterets = $interets->groupBy(function ($interet) {
              return $interet->categorie->nom; 
          });

          return view('interets.interets', ['user' => $user, 'groupedInterets' => $groupedInterets]);
      }*/

      public function interets($id)
      {
          Log::info('Entrée dans la méthode interets');
      
          // Récupérer toutes les catégories
          $categories = CategorieInteret::all();
      
          // Récupérer les intérêts de l'utilisateur en utilisant la table pivot utilisateur_interet
          $interetsUtilisateur = Interet::join('utilisateur_interet', 'interet.id', '=', 'utilisateur_interet.id_interet')
              ->where('utilisateur_interet.id_utilisateur', $id)
              ->select('interet.*') // Sélectionner uniquement les informations d'intérêts
              ->get();
      
          // Passer les catégories et les intérêts à la vue
          return view('interets.interets', [
              'categories' => $categories,
              'interets' => $interetsUtilisateur
          ]);
      }
      
   /* public function modifier_interet_form()
    {
        $interets = DB::table('interet')
        ->join('categorie_interet', 'interet.id_categorie', '=', 'categorie_interet.id')
        ->select('interet.id AS interet_id', 'interet.nom AS interet_nom', 'categorie_interet.nom AS categorie_nom')
        ->orderBy('categorie_interet.nom')
        ->get();
        $userId = Auth::id();
        Log::info($userId);
        $categories = CategorieInteret::all();

        $interetsUtilisateur = DB::table('utilisateur_interet')
            ->where('id_utilisateur', $userId)
            ->pluck('id_interet')
            ->toArray();

        // (le reste de ta logique)
    
        return view('interets/interetEdit', compact('interets', 'interetsUtilisateur', 'categories'));
       /* Log::info('Entrée dans la méthode modifier_interet_form');
        $interets = DB::table('interet')
            ->join('categorie_interet', 'interet.id_categorie', '=', 'categorie_interet.id')
            ->select('interet.id AS interet_id', 'interet.nom AS interet_nom', 'categorie_interet.nom AS categorie_nom')
            ->orderBy('categorie_interet.nom')
            ->get();

        $userId = Auth::id();
        Log::info($userId);

        $interetsUtilisateur = DB::table('utilisateur_interet')
            ->where('id_utilisateur', $userId)
            ->pluck('id_interet')
            ->toArray();

        return view('interets/interetEdit', compact('interets', 'interetsUtilisateur'));
*/
        /* $userId = auth()->user()->id;

         $interets =  Interet::all();
         $interetsUtilisateur = DB::select('CALL GetInteretsUtilisateur(?)', [$userId]);
         $interetsUtilisateurIds = array_map(function($interet) {
             return $interet->id_interet;
         }, $interetsUtilisateur);

         return view('interets.afficher', [
             'interets' => $interets,
             'interetsUtilisateur' => $interetsUtilisateurIds
         ]);*/
    //}*/
    public function modifier_interet_form()
{
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


    public function update_Interets($id,Request $request)
    {
        Log::info('Entrée dans la méthode update');
        //$userId = auth()->user()->id;
        $userId  = User::find($id);

        $selectedInterets = explode(',', $request->input('interets'));
        DB::table('utilisateur_interet')->where('id_utilisateur', $userId)->delete();
        foreach ($selectedInterets as $interetId) {
            if (!empty($interetId)) {
                DB::table('utilisateur_interet')->insert([
                    'id_utilisateur' => $userId,
                    'id_interet' => $interetId
                ]);
            }
        }

        return redirect()->back()->with('success', 'Vos intérêts ont été mis à jour avec succès.');
    }

}
