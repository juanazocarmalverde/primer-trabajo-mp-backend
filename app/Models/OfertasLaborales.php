<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertasLaborales extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'fecha_publicacion', 'descripcion', 'tipo_contrato', 'modalidad', 'rango_minimo', 'rango_maximo', 'beneficios', 'empresa_id', 'usuarios_id'];

}
