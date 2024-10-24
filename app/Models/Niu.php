<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niu extends Model
{
    use HasFactory;

    protected $table = 'niu';

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_proveedor', 'id');
    }

    public function facturacion()
    {
        return $this->belongsTo(Facturacion::class, 'id_proveedor', 'id_proveedor');
    }


}
