<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nombre', 'apellido', 'correo', 'telefono', 'id_municipio', 'id_depto', 'activo'];

    public function departamento()
    {
        return $this->belongsTo(Catalogo::class, 'id_depto');
    }

    public function municipio()
    {
        return $this->belongsTo(Catalogo::class, 'id_municipio');
    }
}
