<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
        'spotify_token', 'spotify_refresh_token', 'spotify_token_expires_at'
    ];

    protected $casts = [
        'spotify_token_expires_at' => 'datetime',
    ];

    protected $hidden = [
        'password', 'remember_token', 'spotify_token', 'spotify_refresh_token',
    ];
    public function post(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }
}
