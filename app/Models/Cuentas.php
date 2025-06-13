<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
    use HasFactory;
    protected $fillable = [
        'proveedor_id',
        'nit',
        'banco',
        'numero_cuenta',
        'numero_convenio',
        'titular_cuenta',
        'tipo_cuenta',
        'formato',
        'observaciones',
        'cuenta_base64',
        'fecha_creacion',
        'fecha_modificacion',
        'cuenta_id',
    ];
}
