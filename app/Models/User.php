<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable  implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role == 1 ;
    }

    protected $fillable = [
        'name',
        'email',
        'role',
        'introduce',
        'phone',
        'thumbnail',
        'password',
        'address',
        'link_mail',
        'link_face',
        'link_youtube'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function comments(): HasMany
    {
        return $this->hasMany(comment::class);
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class);
    }


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function educations() {
        return $this->hasMany(Education::class);
    }
}
