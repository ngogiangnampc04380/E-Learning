<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mentor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'front_card',
        'back_card',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
  

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
