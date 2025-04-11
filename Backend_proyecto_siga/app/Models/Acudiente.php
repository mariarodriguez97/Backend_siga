<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido'];


    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}
