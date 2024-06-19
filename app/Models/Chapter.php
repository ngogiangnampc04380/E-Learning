<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'course_id'
    ];

    // Mối quan hệ với bảng Lesson: Một chương có nhiều bài học
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // Mối quan hệ với bảng Course: Một chương thuộc về một khóa học
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
