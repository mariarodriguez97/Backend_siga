<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['acudiente_id', 'curso_id', 'nombre', 'apellido'];

    public function acudiente()
    {
        return $this->belongsTo(Acudiente::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
