<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturacionTest extends Model
{
    use HasFactory;

    protected $table = 'facturacion_test';
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'serie',
        'folio',
        'fecha_facturacion',
        'forma_pago',
        'membresia',
        'niu',
        'razon_social',
        'cliente',
        'total',
        'iva',
        'importe',
        'fecha_pago',
        'renovacion',
        'observaciones',
        'fecha_creacion',
        'factura_archivo'
        // 'regimen_fiscal',
        // 'rfc',
        // 'correo',
        // 'vialidad',
        // 'numero_interior',
        // 'numero_exterior',
        // 'codigo_postal',
        // 'colonia',
        // 'alcaldia_municipio',
        // 'entidad',
        // 'file_path',
        // 'usuario_id',
        // 'cliente_id',

    ];

    // Deshabilitar el manejo de updated_at
    public function setUpdatedAt($value)
    {
        // No hacer nada para evitar que se actualice el campo updated_at
    }    
}
