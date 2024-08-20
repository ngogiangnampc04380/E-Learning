<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SalePivot extends Model
{
    use HasFactory;
    protected $table = 'sale_pivots';
    protected $fillable = [
        'course_id',
        'sale_id',
    ];
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
    public function sales(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
