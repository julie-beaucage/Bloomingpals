<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Interest extends Model
{
    protected $table= 'users_interests';

    public $timestamps = false;

    public static function getInteretsParUtilisateur($userId)
    {
        return DB::table('users_interests')
            ->join('interests', 'users_interests.id_interest', '=', 'interests.id')
            ->join('categories_interests', 'interest.id_category', '=', 'categories_interests.id')
            ->where('users_interests.id_user', $userId)
            ->select('users_interests.id_interest', 'interest.name', 'categories_interests.id', 'categories_interests.nom as categories')
            ->get();
    }
    public static function getInteretsParUtilisateurTab($userId)
{
    return DB::table('users_interests')
        ->where('users_interests.id_user', $userId)
        ->pluck('id_interest') 
        ->toArray(); 
}
    
}
