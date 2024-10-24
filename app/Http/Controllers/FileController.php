<?php

namespace App\Http\Controllers;


use App\Models\FacturacionTest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class FileController extends Controller
{
    public function __construct(){}

    public function download($id)
    {
        $factura = FacturacionTest::findOrFail($id);
        $pathToFile = storage_path('app/public/' . $factura->factura_archivo);

        if (file_exists($pathToFile)) {
            return response()->download($pathToFile);
        } else {
            return response()->json(['status' => 'error', 'message' => 'El archivo no existe.']);
        }
    }

    public function updateFilePath(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'file' => 'file|mimes:pdf|max:2048',
            ]);

            $factura = FacturacionTest::findOrFail($id);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('evidencias', $filename, 'public');
                $factura->factura_archivo = $filePath;


                $factura->save();



                return response()->json(['message' => 'Archivo subido con éxito', 'status' => 'success']);
            } else {
                return response()->json(['message' => 'No se proporcionó ningún archivo', 'status' => 'error']);
            }
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validación fallida: ' . $e->getMessage(), 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Error al subir archivo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al procesar la solicitud', 'status' => 'error'], 500);
        }
    }

}
