<?php

use App\Http\Controllers\admin\ImportarProveedoresController;
use App\Http\Controllers\FacturacionTestController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/proveedores', [ImportarProveedoresController::class, 'vistaProveedores'])->name('admin.proveedores');

Route::post('/facturacion/search', [ImportarProveedoresController::class, 'searchTable'])->name('table.search');

Route::post('/admin/proveedores', [ImportarProveedoresController::class, 'search'])->name('admin.proveedores.search');

Route::get('/factura/informacion/{id}', [ImportarProveedoresController::class, 'obtenerInformacionFactura']);

Route::get('/get-location-data-from-db/{codigoPostal}', [ImportarProveedoresController::class, 'getLocationDataFromDb']);

Route::post('/store', [ImportarProveedoresController::class, 'saveSection'])->name('store');

Route::post('/search/facturacion', [ImportarProveedoresController::class, 'searchFacturacion'])->name('search.facturacion');

Route::get('/download/{id}', [FileController::class, 'download'])->name('download.file');

Route::POST('/facturas/{id}/update-file', [FileController::class, 'updateFilePath'])->name('facturas.update-file');

Route::get('/export-excel', [FacturacionTestController::class, 'exportExcel'])->name('export.excel');

Route::put('/update/facturacion',[ImportarProveedoresController::class, 'updateFacturacion'])->name('update.facturacion');
