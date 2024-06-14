<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'id',
        'name',
        'description',
        'percent_sale',
        'sales_code',
        'start_date',
        'end_date',
        'amount',
        'status',
        'course_id',


    ];
    public function course()
    {
        return $this->belongsTo(Course::class); // Mỗi mã khuyến mãi thuộc về một khóa học
    }
}

