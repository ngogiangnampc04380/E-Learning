<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Education extends Model
{
    use HasFactory;
    protected $table = 'educations';
    protected $fillable = [
        'id',
        'user_id',
        'academic_level',
        'school',
        'describe',
        'time',
        'thumbnail'
    ];
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    
}
