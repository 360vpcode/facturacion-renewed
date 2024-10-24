<?php

namespace App\Services;

use App\Models\Facturacion;
use App\Models\FacturacionTest;
use App\Models\Usuarios;

class SearchService
{
    public function search($searchTerm)
    {
        if ($searchTerm !== "" && $searchTerm !== null) {
            return Usuarios::with(['clienteHashCrypt', 'niu'])
                ->where('estatus_registro', 'COMPLETADO')
                ->where(function ($query) use ($searchTerm) {
                    $terms = explode(' ', $searchTerm);
                    foreach ($terms as $term) {
                        $query->where(function ($subQuery) use ($term) {
                            $subQuery->where('rfc', 'LIKE', '%'.$term.'%')
                                ->orWhere('razon_social', 'LIKE', '%'.$term.'%')
                                ->orWhere('name', 'LIKE', '%'.$term.'%')
                                ->orWhere('apellido_paterno', 'LIKE', '%'.$term.'%')
                                ->orWhere('tipo_sociedad', 'LIKE', '%'.$term.'%')
                                ->orWhere('apellido_materno', 'LIKE', '%'.$term.'%')
                                ->orWhereHas('niu', function ($niuQuery) use ($term) {
                                    $niuQuery->where('niu', 'LIKE', '%'.$term.'%');
                                });
                        });
                    }
                })
                ->get();
        } else {
            return "";
        }
    }

    public function searchTable($query){
        return FacturacionTest::where('serie', 'LIKE', "%{$query}%")
            ->orWhere('folio', 'LIKE', "%{$query}%")
            ->orWhere('membresia', 'LIKE', "%{$query}%")
            ->orWhere('niu', 'LIKE', "%{$query}%")
            ->orWhere('forma_pago', 'LIKE', "%{$query}%")
            ->orWhere('fecha_pago', 'LIKE', "%{$query}%")
            ->orWhere('razon_social', 'LIKE', "%{$query}%")
            ->orWhere('cliente', 'LIKE', "%{$query}%")
            ->get();
    }

    public function searchTablePaginate($query, $perPage){
        return FacturacionTest::where('serie', 'LIKE', "%{$query}%")
            ->orWhere('folio', 'LIKE', "%{$query}%")
            ->orWhere('membresia', 'LIKE', "%{$query}%")
            ->orWhere('niu', 'LIKE', "%{$query}%")
            ->orWhere('forma_pago', 'LIKE', "%{$query}%")
            ->orWhere('fecha_pago', 'LIKE', "%{$query}%")
            ->orWhere('razon_social', 'LIKE', "%{$query}%")
            ->orWhere('cliente', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }


    public function searchUsuario($searchTerm)
    {
        $query = Usuarios::query();

        if ($searchTerm) {
            $terms = preg_split('/[\s,]+/', $searchTerm);
            foreach ($terms as $term) {
                $query->where(function ($q) use ($term) {
                    $q->where('razon_social', 'LIKE', '%' . $term . '%')
                        ->orWhere('tipo_sociedad', 'LIKE', '%' . $term . '%')
                        ->orWhere('name', 'LIKE', '%' . $term . '%')
                        ->orWhere('apellido_paterno', 'LIKE', '%' . $term . '%')
                        ->orWhere('apellido_materno', 'LIKE', '%' . $term . '%');
                });
            }
        }

        $usuario = $query->first();
        return $usuario ? $usuario->id : null;
    }

    public function searchUsuarioSave($searchTerm)
    {
        $query = Usuarios::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('id', '=', $searchTerm );
            });
        }

        $usuario = $query->first();
        return $usuario ? $usuario->id : null;
    }
    public function searchFacturacion($searchTerm)
    {
        if ($searchTerm !== "" && $searchTerm !== null) {
            return Facturacion::where('id_proveedor', '=', $searchTerm )->get();
        } else {
            return null;
        }
    }

}
