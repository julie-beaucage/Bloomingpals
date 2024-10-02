<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Interet extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'interet';
    protected $primaryKey = 'id';
    public function categorie()
    {
        return $this->belongsTo(CategorieInteret::class, 'id_categorie'); // Utilisez le modèle approprié
    }
    public function getTagsByCategory($categoryId) {
        $tags = Interet::where('id_categorie', $categoryId)->get(['id', 'nom']);
        return response()->json($tags);
    }
    

}