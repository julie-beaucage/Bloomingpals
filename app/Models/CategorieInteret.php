<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CategorieInteret extends Model
{
    use HasFactory;
    protected $table = 'categorie_interet';
    protected $primaryKey = 'idCategorie'; 
    public function interets()
    {
        return $this->hasMany(Interet::class, 'id_categorie');
    }
    public static function getCategoryName($categoryId)
    {
        return self::where('idCategorie', $categoryId)->value('nomCategorie');
    }

}
