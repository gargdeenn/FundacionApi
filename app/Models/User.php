<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authentique;

class User extends Authentique implements JWTSubject
{
    use HasFactory;
    use Notifiable;
    protected $table = 'users';

    protected $fillable = [
        'name', 'password', 'celphone', 'email', 'rol_id'
    ];

    // Resto del modelo...
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
