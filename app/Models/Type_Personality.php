<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_personality extends Model
{
    use HasFactory;

    protected $table = 'types_personalities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type', 
        'description', 
    ];

}
