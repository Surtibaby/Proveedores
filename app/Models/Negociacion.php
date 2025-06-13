<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negociacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nit',
        'proveedor_id',
        'regimen_impuestos_venta',
        'iva_incluido',
        'por_descuento',
        'plazo_descuento',
        'detalles_descuento',
        'dto_pie_factura',
        'flete_100_proveedor',
        'flete_100_empresa',
        'flete_50_50',
        'plazo_garantia_tienda',
        'condiciones_garantia_tienda',
        'plazo_garantia_cliente',
        'condiciones_garantia_cliente',
        'tipo_retiro',
        'nombre_transportadora',
        'convenio_transportadora',
        'estado',
    ];
}
