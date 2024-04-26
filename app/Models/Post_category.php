<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Post_category extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'slug'
    ];
    public function post_pivot(): BelongsTo
    {
        return $this->belongsTo(Post_pivot::class);
    }
}
