<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;

class ReplyCommentCourse extends Model
{
    use HasFactory;
    protected $table = 'replies_comments_courses';

    protected $fillable = [
        'comment_course_id',
        'user_id',
        'content',
        'status',
    ];
    public function commentCourse()
    {
        return $this->belongsTo(CommentCourse::class, 'comment_course_id');
    }

    /**
     * Liên kết với bảng users.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
