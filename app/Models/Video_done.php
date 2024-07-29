<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video_done extends Model
{
    use HasFactory;

    protected $table = "video_done";
    protected $fillable = [
        "user_id",
        "course_id",
        "chapter_id",
        "lesson_id",
        "completed",

    ] ;

}
