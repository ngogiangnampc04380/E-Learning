<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    public function user(): BelongsTo{
        return $this ->belongsTo(User::class);
    }
    public function order_details(): HasOne{
        return $this ->hasOne(Order_detail::class);
    }
    public function course(): BelongsTo{
        return $this ->belongsTo(Course::class);
    }
}
