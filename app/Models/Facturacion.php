<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $table = 'facturacion';
    public $timestamps = false;

    protected $fillable = [
        'regimen_fiscal_id',
        'regimen_fiscal_desc',
        'rfc',
        'razon_social',
        'correo',
        'nombre_vialidad',
        'numero_exterior',
        'numero_interior',
        'colonia',
        'alcaldia_municipio',
        'codigo_postal',
        'entidad',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_proveedor', 'id');
    }
}
