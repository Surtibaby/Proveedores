<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'nit',
        'nombre_contacto',
        'celular_contacto',
        'email_contacto',
        'departamento',
        'fecha_creacion',
        'fecha_modificacion',
        'contacto_id',
        'direccion_contacto',

    ];
}
