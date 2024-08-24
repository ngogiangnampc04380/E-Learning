<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
class CommentCourse extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'comments_courses';

    protected $fillable = [
        'user_id',
        'course_id',
        'content',
        'status',
        'stars',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function replies()
    {
        return $this->hasMany(ReplyCommentCourse::class, 'comment_course_id');
    }
}
