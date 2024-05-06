<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'content',
        'lesson_id',
        'user_id',
        'status',


    ];
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(lesson::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
