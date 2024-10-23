<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class GroupPersonality extends Model
{
    use HasFactory;
    protected $table = 'groups_personalities';
    protected $primaryKey = 'id'; 
    public function personality()
    {
        return $this->hasMany(Personality::class, 'group_perso');
    }

}
