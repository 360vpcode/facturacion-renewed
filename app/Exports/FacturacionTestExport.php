<?php

namespace App\Exports;

use App\Models\FacturacionTest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FacturacionTestExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return FacturacionTest::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Serie',
            'Folio',
            'Fecha de Facturación',
            'Forma de Pago',
            'Membresía',
            'NIU',
            'Razón Social',
            'Cliente',
            'Total',
            'IVA',
            'Importe',
            'Fecha de Pago',
            'Renovación',
            'Observaciones',
            'Régimen Fiscal',
            'RFC',
            'Correo',
            'Vialidad',
            'Número Interior',
            'Número Exterior',
            'Código Postal',
            'Colonia',
            'Alcaldía/Municipio',
            'Entidad',
            'Ruta del Archivo',
            'ID de Usuario',
            'ID de Cliente',
            'Creado en',
            'Actualizado en'
        ];
    }
}
