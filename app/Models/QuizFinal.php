<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizFinal extends Model
{
    use HasFactory;

    protected $table = 'quiz_finals';

    protected $fillable = [
        'course_id',
        'mentor_id',
        'nmuber',
        'title',
    ];

    public function questions()
    {
        return $this->hasMany(QuestionFinal::class, 'quiz_final_id');
    }

    // Mối quan hệ nhiều-một với Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Mối quan hệ nhiều-một với User (mentor)
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }
}