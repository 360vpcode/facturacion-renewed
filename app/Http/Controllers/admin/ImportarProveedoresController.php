<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClienteHashCrypt;
use App\Models\Facturacion;
use App\Models\FacturacionTest;
use App\Models\CatRegimenFiscal;
use App\Models\NIU;
use App\Models\Usuarios;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;
use Illuminate\Validation\ValidationException;
use App\Models\CP;

class ImportarProveedoresController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function vistaProveedores(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search', '');


        $facturacion = $this->searchService->searchTablePaginate($search, $perPage);

        $resultsArray = [];
        $regimenesFiscales = [];

        session(['busqueda_proveedor' => ""]);
        session(['search_clicked' => false]);

        return view('Admin.Proveedores.index', compact('resultsArray', 'regimenesFiscales', 'facturacion', 'perPage'));
    }


    public function searchTable(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = $request->input('query');

        $facturacion = $this->searchService->searchTable($query);

        $output = '';

        if ($facturacion->isEmpty()) {
            $output = '<tr><td colspan="13" class="text-center">No hay registros</td></tr>';
        } else {
            foreach ($facturacion as $factura) {
                $output .= '<tr>';

                $output .= '<td>' . $factura->serie . '</td>';
                $output .= '<td>' . $factura->folio . '</td>';
                $output .= '<td>' . $factura->fecha_facturacion . '</td>';
                $output .= '<td>' . $factura->forma_pago . '</td>';
                $output .= '<td>' . $factura->membresia . '</td>';
                $output .= '<td>' . $factura->niu . '</td>';
                $output .= '<td>' . $factura->razon_social . '</td>';
                $output .= '<td>' . $factura->cliente . '</td>';
                $output .= '<td>' . $factura->total . '</td>';
                $output .= '<td>' . $factura->iva . '</td>';
                $output .= '<td>' . $factura->importe . '</td>';
                $output .= '<td>' . $factura->fecha_pago . '</td>';
                $output .= '<td>' . $factura->observaciones . '</td>';
                $output .= '</tr>';
            }
        }

        return response()->json($output);
    }

    public function search(Request $request)
    {

        $perPage = $request->input('perPage', 10);
        $search = $request->input('search', '');

        $facturacion = $this->searchService->searchTablePaginate($search, $perPage);

        $regimenesFiscales = DB::table('cat_regimen_fiscal')->pluck('Descripcion', 'id');
        $resultsArray = [];
        $searchTerm = $request->input('busqueda_proveedor', '');
        $results = $this->searchService->search($searchTerm);
        session(['busqueda_proveedor' => $searchTerm]);

        if ($results != "")
            $resultsArray = $results->toArray();
        session(['search_clicked' => true]);

        return view('Admin.Proveedores.index', compact('resultsArray', 'regimenesFiscales', 'facturacion', 'perPage'));
    }

    public function getLocationDataFromDb($codigoPostal): \Illuminate\Http\JsonResponse
    {

        $locations = cp::where('d_codigo', $codigoPostal)->get();

        if ($locations->isNotEmpty()) {
            $colonias = $locations->pluck('d_asenta');
            $municipio = $locations->first()->D_mnpio;
            $entidad = $locations->first()->d_estado;

            return response()->json([
                'success' => true,
                'colonia' => $colonias,
                'municipio' => $municipio,
                'entidad' => $entidad,
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function saveSection(Request $request)
    {
        $rules = [
            'folio' => 'required|string|max:50',
            'fecha_facturacion' => 'required|date',
            'forma_pago' => 'required|string|max:255',
            'membresia' => 'required|string|max:7',
            'niu' => 'required|string|max:50',
            'razon_social' => 'required|string|max:255',
            'cliente' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'iva' => 'required|numeric|min:0',
            'importe' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'renovacion' => 'string|max:255',
            'observaciones' => 'nullable|string|max:255',
            'regimen_fiscal' => 'required|string|max:255',
            'rfc' => 'required|string|max:13',
            'correo' => 'required|email|max:255',
            'vialidad' => 'required|string|max:255',
            'numero_interior' => 'nullable|string|max:10',
            'numero_exterior' => 'required|string|max:10',
            'codigo_postal' => 'required|string|max:5',
            'colonia' => 'required|string|max:255',
            'alcaldia_municipio' => 'required|string|max:255',
            'entidad' => 'required|string|max:255',
            'usuario_id' => 'integer',
            'file_path' => 'nullable|string|max:255',
            'cliente_id' => 'integer',
        ];

        if ($request->input('adjuntarArchivo') === 'si') {
            $rules['file_path'] = 'file|mimes:pdf|max:2048';
        }

        $request->folio = strtoupper($request->folio);
        $request->rfc = strtoupper($request->rfc);
        $request->razon_social = strtoupper($request->razon_social);
        $request->vialidad = strtoupper($request->vialidad);
        $request->numero_interior = strtoupper($request->numero_interior);
        $request->numero_exterior = strtoupper($request->numero_exterior);
        $request->colonia = strtoupper($request->colonia);
        $request->alcaldia_municipio = strtoupper($request->alcaldia_municipio);
        $request->entidad = strtoupper($request->entidad);

        $validatedData = $request->validate($rules);

        // $searchTerm = $request->input('id_proveedor');

        // $resultUsuarioId = $this->searchService->searchUsuarioSave($searchTerm);

        $resultUsuarioId = $request->input('id_proveedor');

        $searchTerm = $request->input('cliente');
        $resultClienteId = $this->findClienteByNombre($searchTerm);


        $validatedData['cliente_id'] = $resultClienteId;
        $validatedData['usuario_id'] = $resultUsuarioId;

        $usuario = Usuarios::findOrFail($resultUsuarioId);

        if ($request->input('adjuntarArchivo') === 'no') {
            $validatedData['file_path'] = "Pendiente";
            $usuario->prov_pdf = "completo_pdf";
            $usuario->save();
        } else if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('evidencias', 'public');
            $validatedData['file_path'] = $filePath;
        }

        $validatedData['importe'] = $validatedData['total'] / 1.16;
        $validatedData['iva'] = $validatedData['total'] - $validatedData['importe'];

        $formData = new FacturacionTest();

        $validatedData['razon_social'] = trim(str_replace(',', '', $validatedData['razon_social']));
        $validatedData['cliente'] = trim(str_replace(',', '', $validatedData['cliente']));

        $formData->fill($validatedData);
        $formData->factura_archivo = $validatedData['file_path'];
        $formData->save();

        $facturacion_proveedor = Facturacion::where('id_proveedor', $request->input('id_proveedor'))->get();

        $fieldsMap  = [
            //'' => 'uso_cfdi',
            'regimen_fiscal' => 'regimen_fiscal_id',
            'rfc' => 'rfc',
            'razon_social' => 'razon_social',
            'correo' => 'correo',
            'vialidad' => 'nombre_vialidad',
            'numero_exterior' => 'numero_exterior',
            'numero_interior' => 'numero_interior' ,
            'colonia' => 'colonia' ,
            'alcaldia_municipio' => 'alcaldia_municipio' ,
            'codigo_postal' => 'codigo_postal' ,
            'entidad' => 'entidad'
        ];

        foreach ($fieldsMap as $requestField => $dbField) {
            if ($request->has($requestField)) {
                if ($request->$requestField !== $facturacion_proveedor[0]->$dbField) {
                    $facturacion_proveedor[0]->$dbField = $request->$requestField;
                }
            }
        }

        $facturacion_proveedor[0]->save();

        session(['search_clicked' => false]);
        session(['busqueda_proveedor' => ""]);

        return redirect()->route('admin.proveedores');
    }


    private function findClienteByNombre($clienteNombre)
    {
        $cliente = ClienteHashCrypt::where('cliente', $clienteNombre)->first();

        if ($cliente) {
            return $cliente->id;
        } else {
            return null;
        }
    }

    public function searchFacturacion(Request $request): \Illuminate\Http\JsonResponse
    {
        $searchTerm = $request->input('rfc');
        if ($searchTerm == "" || $searchTerm == null) {
            return response()->json(['error' => 'ID de proveedor vacío']);
        }
        $results = Facturacion::where('rfc', $searchTerm)->get();

        if ($results->isEmpty()) {
            return response()->json(['error' => 'No se encontraron resultados']);
        }

        $resultArray = [];
        $regimenFiscalId = null;

        foreach ($results as $result) {
            $resultArray[] = [
                'Correo' => $result->correo,
                'Vialidad' => $result->nombre_vialidad,
                'Numero_Exterior' => $result->numero_exterior,
                'Numero_Interior' => $result->numero_interior,
                'Colonia' => $result->colonia,
                'Alcaldía/Municipio' => $result->alcaldia_municipio,
                'Codigo_Postal' => $result->codigo_postal,
                'Entidad' => $result->entidad,
                'regimen_fiscal'=> $result->regimen_fiscal_id
            ];
            $regimenFiscalId = $result->regimen_fiscal;
        }

        if ($regimenFiscalId) {
            $regimenFiscal = $this->getRegimenFiscalDescription($regimenFiscalId);
            if ($regimenFiscal) {
                $resultArray[0]['Regimen_Fiscal'] = $regimenFiscal;
            }
        }

        return response()->json($resultArray[0]);
    }

    function getFirstFiveCharacters($string)
    {
        if (strlen($string) >= 5) {
            return substr($string, 0, 5);
        } else {
            return $string;
        }
    }

    private function getRegimenFiscalDescription($regimenFiscalId)
    {
        $regimenFiscal = CatRegimenFiscal::where('c_RegimenFiscal', $regimenFiscalId)->first(['Descripcion']);
        return $regimenFiscal ? $regimenFiscal->Descripcion : null;
    }

    public function obtenerInformacionFactura($id): \Illuminate\Http\JsonResponse
    {
        $factura = FacturacionTest::find($id);

        $factura_domicilio = NIU::with('facturacion')
                             ->where('niu', $factura->niu)
                             ->first();

        if (!$factura) {
            return response()->json(['error' => 'Factura no encontrada'], 404);
        } else {
            $cat_regimenFiscal = CatRegimenFiscal::where('id', $factura_domicilio['facturacion']->cat_regimen_fiscal_id)->first();

            if (!$cat_regimenFiscal) {
                $descripcionRegimenFiscal = 'Régimen Fiscal No Definido';
            } else {
                $descripcionRegimenFiscal = $cat_regimenFiscal->Descripcion;
            }

            return response()->json([
                'serie' => $factura->serie,
                'folio' => $factura->folio,
                'fecha_facturacion' => $factura->fecha_facturacion,
                'forma_pago' => $factura->forma_pago,
                'membresia' => $factura->membresia,
                'niu' => $factura->niu,
                'razon_social' => $factura->razon_social,
                'cliente' => $factura->cliente,
                'total' => $factura->total,
                'iva' => $factura->iva,
                'importe' => $factura->importe,
                'fecha_pago' => $factura->fecha_pago,
                'renovacion' => $factura->renovacion,
                'observaciones' => $factura->observaciones,
                'regimen_fiscal' => $descripcionRegimenFiscal,
                'rfc' => $factura_domicilio['facturacion']->rfc,
                'correo' => $factura_domicilio['facturacion']->correo,
                'vialidad' => $factura_domicilio['facturacion']->nombre_vialidad,
                'numero_interior' => $factura_domicilio['facturacion']->numero_interior,
                'numero_exterior' => $factura_domicilio['facturacion']->numero_exterior,
                'codigo_postal' => $factura_domicilio['facturacion']->codigo_postal,
                'colonia' => $factura_domicilio['facturacion']->colonia,
                'alcaldia_municipio' => $factura_domicilio['facturacion']->alcaldia_municipio,
                'entidad' => $factura_domicilio['facturacion']->entidad,
            ]);
        }
    }
    public function updateFacturacion(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            // Validación de los campos que llegan desde el formulario
            $validatedData = $request->validate([
                'regimen_fiscal_id' => 'required|integer',
                'rfc' => 'required|string|max:13',
                'razon_social' => 'required|string|max:255',
                'correo' => 'required|email|max:255',
                'nombre_vialidad' => 'required|string|max:255',
                'numero_interior' => 'nullable|string|max:10',
                'numero_exterior' => 'required|string|max:10',
                'codigo_postal' => 'required|string|max:5',
                'colonia' => 'required|string|max:255',
                'alcaldia_municipio' => 'required|string|max:255',
                'entidad' => 'required|string|max:255',
            ]);

            $facturacion = Facturacion::where('rfc', $request->rfc)->first();

            if ($facturacion) {
                // Actualizamos los datos de facturación con lo que llega del request
                $facturacion->update($validatedData);
                return response()->json(['success' => true, 'message' => 'Datos actualizados correctamente.']);
            } else {
                return response()->json(['success' => false, 'message' => 'No se encontró el registro de facturación.'], 404);
            }
        } catch (ValidationException $e) {
            // Devolver errores de validación
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Manejar otros errores y devolver una respuesta de error
            return response()->json(['success' => false, 'message' => 'Error al actualizar los datos.'], 500);
        }
    }


}
