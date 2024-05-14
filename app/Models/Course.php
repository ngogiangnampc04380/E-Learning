<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'thumbnail',
        'price',
        'view',
        'description',
        'enrollment',
    ];
    public function category(): BelongsTo{
        return $this ->belongsTo(Course_category::class);
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    public function comment(): HasManyThrough{
        return $this ->hasManyThrough('Comment::class','Chapters::class', 'course_id', 'chapter_id');
    }
    
}
