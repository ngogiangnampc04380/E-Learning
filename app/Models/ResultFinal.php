<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultFinal extends Model
{
    use HasFactory;

    protected $table = 'results_final';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'quiz_final_id',
        'course_id',
        'score',
    ];

    // Mối quan hệ nhiều-một với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Mối quan hệ nhiều-một với QuizFinal
    public function quizFinal()
    {
        return $this->belongsTo(QuizFinal::class, 'quiz_final_id');
    }

    // Mối quan hệ nhiều-một với Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}