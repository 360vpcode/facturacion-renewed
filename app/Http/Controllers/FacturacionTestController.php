<?php

namespace App\Http\Controllers;

use App\Exports\FacturacionTestExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class FacturacionTestController extends Controller
{
    public function exportExcel()
    {
        $fechaHora = Carbon::now()->format('Y-m-d_H-i-s');
        $nombreArchivo = "facturacion_test_{$fechaHora}.xlsx";

        return Excel::download(new FacturacionTestExport, $nombreArchivo);
    }
}
