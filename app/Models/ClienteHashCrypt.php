<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteHashCrypt extends Model
{
    protected $table = 'clientes_hash_crypt';

    public function usuarios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Usuarios::class, 'id_cliente', 'id');
    }
}
