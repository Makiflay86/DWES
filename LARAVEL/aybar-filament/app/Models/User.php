<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;                           // añadimos esto
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;         // añadimos esto
use Illuminate\Database\Eloquent\Factories\HasFactory;      // añadimos esto
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    /////////////////////// añadimos esta parte
    /**
     * Get all of the posts for the User
     *
     * @return HasMany<int, Post>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);    // un usuario tiene muchos posts (relación 1:n, lado 1)
    }
}