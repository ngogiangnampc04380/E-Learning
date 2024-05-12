<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course_category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'slug',
    ];
    public function course(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
