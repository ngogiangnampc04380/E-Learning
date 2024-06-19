<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course_category extends Model
{
    use HasFactory;
    protected $table=('course_categories');
    protected $fillable=[
        'name',
        'slug',
        'description',
    ];
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
