<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'id';
  
    public function answerOptions()
    {
        return $this->hasMany(Question_answer::class, 'question_id', 'id');
    }

}