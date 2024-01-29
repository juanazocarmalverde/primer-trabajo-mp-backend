<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = ['correo_acceso', 'clave_acceso', 'primer_nombre', 'segundo_nombre', 'apellido_paterno', 'apellido_materno', 'telefono', 'pais_residencia', 'nacionalidad', 'genero', 'tipo_usuario'];

}
