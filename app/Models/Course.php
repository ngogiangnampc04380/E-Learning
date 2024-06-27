<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Notifications\Notifiable;
class Course extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'category_id',
        'name',
        'thumbnail',
        'video_demo',
        'status',
        'price',
        'view',
        'mentor_id',
        'description',
        'enrollment',
    ];


    public function category(): BelongsTo{
        return $this->belongsTo(Course_Category::class, 'category_id');
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    // public function comment(): HasManyThrough{
    //     return $this ->hasManyThrough('Comment::class','Chapters::class', 'course_id', 'chapter_id');
    // }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    
    
}
