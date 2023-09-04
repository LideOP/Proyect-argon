<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function users()
    {
        return $this->belongsToMany(Estudiante_curso::class, '_estudiantes__cursos');
    }
    use HasFactory;
}
