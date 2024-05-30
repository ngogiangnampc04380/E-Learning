<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table='check_outs';
    protected $fillable=[
        'id',
        'fullname',
        'email',
        'phone',
        'user_id',
        'course_id',
        'address',
    ];
}
