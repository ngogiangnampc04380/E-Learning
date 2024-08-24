<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
class Course extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'courses';
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

    public function quizFinals()
    {
        return $this->hasMany(QuizFinal::class, 'course_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Course_Category::class, 'category_id');
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Sale::class, 'sale_pivots', 'course_id', 'sale_id');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id');
    }
}