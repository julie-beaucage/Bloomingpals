<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Interest extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'interests';
    protected $primaryKey = 'id';
    public function categorie()
    {
        return $this->belongsTo(Category_Interest::class, 'id_category'); 
    }
    public function getTagsByCategory($categoryId) {
        $tags = Interest::where('id_category', $categoryId)->get(['id', 'name']);
        return response()->json($tags);
    }
    

}