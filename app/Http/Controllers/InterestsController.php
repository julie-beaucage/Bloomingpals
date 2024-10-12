<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category_Interest;
use App\Models\User_Interest;
use App\Models\User;
use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InterestsController extends Controller
{
    public function interets($id)
    {

        $user = User::find($id);
        $categories = Category_Interest::all(); 
        $interets = Interest::all(); 
        $interetsUtilisateur = User_Interest::getInteretsParUtilisateur($id); 
        $interetsUtilisateurTab = User_Interest::getInteretsParUtilisateurTab($id); 
        return view('interets.interets', compact('user', 'categories', 'interets', 'interetsUtilisateur','interetsUtilisateurTab'));
    }
    
    public function update_Interets(Request $request)
    {
        $selectedInterets = $request->input('interets');
    
        DB::statement("CALL add_user_interests(?, ?)", [Auth::user()->id, $selectedInterets]);
        return redirect()->back()->with('success', 'Vos intérêts ont été mis à jour avec succès.');
    }
}
