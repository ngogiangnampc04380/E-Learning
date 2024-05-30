<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'price_sale',
        'sales_code',
        'start_date',
        'end_date',
        'course_id',
        'amount',
        'status',
    ];
}
