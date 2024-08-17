<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionFinal extends Model
{
    use HasFactory;

    protected $table = 'questions_final';

    public $timestamps = true;

    protected $fillable = [
        'quiz_final_id',
        'questions'
    ];

    // Mối quan hệ nhiều-một với QuizFinal
    public function quizFinal()
    {
        return $this->belongsTo(QuizFinal::class, 'quiz_final_id');
    }

    // Mối quan hệ một-nhiều với AnswerFinal
    public function answers()
    {
        return $this->hasMany(AnswerFinal::class, 'question_id');
    }
}