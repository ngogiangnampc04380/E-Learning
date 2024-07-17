<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_user extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'course_id',
    'user_id',

    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
