<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Category_Interest extends Model
{
    use HasFactory;
    protected $table = 'categories_interests';
    protected $primaryKey = 'id'; 
    public function interests()
    {
        return $this->hasMany(Interest::class, 'id_category');
    }
}
