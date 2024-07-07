<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Course_subrised extends Model
{
    use HasFactory;
    protected $table ="course_subriseds";
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'category_id',
        'mentor_id',
        'user_id',
    ];
    public function user(): BelongsTo{
        return $this ->belongsTo(User::class);
    }
    public function mentor(): BelongsTo{
        return $this ->belongsTo(Mentor::class);
    }
    public function category(): BelongsTo{
        return $this ->belongsTo(Course_category::class);
    }
}
