<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Lesson extends Model
{
    protected $fillable = [
        'name',
        'chapter_id'
    ];
    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
    }
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
