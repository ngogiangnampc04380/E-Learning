<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'mentor_id',
        'discount_title',
        'discount_percent',
        'discount_code',
        'quantity',
        'used_quantity',
        'start_date',
        'end_date',
    ];
    protected $dates = [
        'start_date',
        'end_date',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'sale_pivots', 'sale_id', 'course_id');
    }
}

