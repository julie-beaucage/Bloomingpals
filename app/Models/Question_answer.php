<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_answer extends Model
{
    use HasFactory;
    protected $table = 'answer_options';
    protected $primaryKey = 'id';
  
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}