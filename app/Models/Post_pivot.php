<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Post_pivot extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'post_id',
        'category_id'
    ];
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function post_category(): HasMany
    {
        return $this->hasMany(Post_category::class);
    }
}
