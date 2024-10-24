<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'prov_pdf'
    ];

    public function clienteHashCrypt(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ClienteHashCrypt::class, 'id_cliente', 'id');
    }

    public function facturacion(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Facturacion::class, 'id_proveedor', 'id');
    }

    public function niu(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Niu::class, 'id_proveedor', 'id');
    }
}
