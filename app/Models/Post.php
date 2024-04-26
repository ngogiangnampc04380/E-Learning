<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    public function Post_pivot(): BelongsTo
    {
        return $this->belongsTo(Post_pivot::class);
    }
}
