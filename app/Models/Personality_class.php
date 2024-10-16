<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personality_class extends Model
{
    use HasFactory;

    protected $table = 'personality_classes';

    protected $fillable = [
        'type', 
        'description', 
    ];

}
