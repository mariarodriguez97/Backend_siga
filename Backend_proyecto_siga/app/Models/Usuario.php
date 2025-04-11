<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = ['rol_id','estado','correo','password'];
    protected $hidden = ['password'];

    protected function rol(){
        return $this->belongsTo(Rol::class);
    }

    protected function docente(){
        return $this->hasOne(Docente::class);
    }

    protected function administrativo(){
        return $this->hasOne(Administrativo::class);
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

