<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerFinal extends Model
{
    use HasFactory;

    protected $table = 'answers_final';

    public $timestamps = true;

    protected $fillable = [
        'question_id',
        'answer_text',
        'is_correct',
    ];

    // Mối quan hệ nhiều-một với QuestionFinal
    public function question()
    {
        return $this->belongsTo(QuestionFinal::class, 'question_id');
    }
}