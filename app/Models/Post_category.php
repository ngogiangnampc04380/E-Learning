<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Post_category extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'slug'
    ];
    public function post_pivots(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_pivots')->withTimestamps();
    }
}
