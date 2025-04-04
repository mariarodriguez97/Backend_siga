<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'nombre',
        'apellido',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}