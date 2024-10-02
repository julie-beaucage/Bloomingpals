<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class utilisateur_interet extends Model
{
    protected $table= 'utilisateur_interet';

    public $timestamps = false;

    public static function getInteretsParUtilisateur($userId)
    {
        return DB::table('utilisateur_interet')
            ->join('interet', 'utilisateur_interet.id_interet', '=', 'interet.id')
            ->join('categorie_interet', 'interet.id_categorie', '=', 'categorie_interet.id')
            ->where('utilisateur_interet.id_utilisateur', $userId)
            ->select('utilisateur_interet.id_interet', 'interet.nom', 'categorie_interet.id', 'categorie_interet.nom as categorie')
            ->get();
    }
    public static function getInteretsParUtilisateurTab($userId)
{
    return DB::table('utilisateur_interet')
        ->where('utilisateur_interet.id_utilisateur', $userId)
        ->pluck('id_interet') 
        ->toArray(); 
}
    
}
