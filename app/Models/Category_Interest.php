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
    public static function getCategoryName($categoryId)
    {
        return self::where('id', $categoryId)->value('name');
    }
    public static function getColor($categoryId)
    {
        switch ($categoryId) {
            case 1:
                return '#3C57B0';
                break;
            case 2:
                return '#FFBF3B';
                break;
            case 3:
                return '#E62A65';
                break;
            case 4:
                return '#199588';
                break;
            case 5:
                return '#54AC58';
                break;
            case 6:
                return '#9936AC';
                break;
        }
        return;
    }
}
