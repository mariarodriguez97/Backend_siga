<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'id_rol',
        'estado',
        'correo',
        'contraseña',
    ];
    protected $hidden = [
        'contraseña',
        'remember_token',
    ];
    protected function casts():array {

        return [
            'correo_verified_at' => 'datetime',
            'contraseña' => 'hashed',
        ];
        
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(array $claims = [])
    {
        return [];
    }
}

