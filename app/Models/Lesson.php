<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'author',

    ];
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
