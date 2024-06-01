<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'author'
    ];
    public function post_pivots(): BelongsToMany
    {
        return $this->belongsToMany(Post_category::class, 'post_pivots')->withTimestamps();
    }
    public function post_cate(): BelongsTo
    {
        return $this->belongsTo(Post_category::class);
    }
}
