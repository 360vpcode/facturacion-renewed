<div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns card">
    <div class="align-items-start mt-3">
        <div style="width: 189px;"></div> <!-- Espaciador izquierdo -->

        <div style="width: 189px;" class="text-end"> <!-- Contenedor del botón con ancho fijo -->
            <a href="{{ route('export.excel') }}" class="btn btn-success" style="border-color: rgb(59 119 41 / 95%); background-color: rgb(59 119 41 / 95%);">
                <i class="fas fa-file-excel me-2"></i>Descargar Excel
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <div class="dataTable-top d-flex align-items-center">
            <div class="dataTable-dropdown">
                <label>
                    <select class="dataTable-selector me-3" name="perPage"
                            onchange="document.getElementById('perPageForm').submit();">
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                        <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                    </select>
                    Registros por página
                </label>
            </div>
            <div class="dataTable-search ms-auto">
                <input class="form-control dataTable-input" placeholder="Buscar..." type="text"
                       style="width: 200px;" id="search-table">
            </div>
        </div>


        <div class="table-scrollable" style=" overflow-y: auto;">
            <table class="table table-flush dataTable-table" id="datatable-search">
                <thead class="thead-light">
                <tr>
                    <th class="text-xs"></th>
                    <th class="text-xs">Serie</th>
                    <th class="text-xs">Folio</th>
                    <th class="text-xs">Fecha fact</th>
                    <th class="text-xs">Forma de pago</th>
                    <th class="text-xs">Membresía</th>
                    <th class="text-xs">NIU</th>
                    <th class="text-xs">Razón social</th>
                    <th class="text-xs">Cliente</th>
                    <th class="text-xs">Total</th>
                    <th class="text-xs">IVA</th>
                    <th class="text-xs">Importe</th>
                    <th class="text-xs">Fecha pago</th>
                    <th class="text-xs">Observaciones</th>
                </tr>
                </thead>
                <tbody style="vertical-align: middle">
                @if($facturacion->isEmpty())
                    <tr>
                        <td colspan="13" class="text-center text-sm">Sin registros</td>
                    </tr>
                @else
                    @foreach($facturacion as $factura)
                        <tr>
                            @if($factura->factura_archivo != "Pendiente")
                                <td class="text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <button class="border-0 download-button text-xs"
                                                data-file-id="{{ $factura->id }}"
                                                style="background-color: #ffffff; margin-bottom: 3px">
                                                <span class="badge badge-success text-white px-4"  style="border-color: rgba(58, 65, 111, 0.95); background-color: rgba(58, 65, 111, 0.95);">
                                                    Descargar
                                                </span>
                                        </button>
                                        <button class="border-0 text-xs" style="background-color: #ffffff;"
                                                data-bs-toggle="modal" data-bs-target="#informationModal"
                                                onclick="openInformationModal({{ $factura->id }})">
                                                    <span class="badge badge-info ms-auto text-white"  style="border-color: rgba(58, 65, 111, 0.95); background-color: rgba(58, 65, 111, 0.95);">
                                                            Ver información
                                                    </span>
                                        </button>
                                    </div>
                                </td>
                            @else
                                <td class="text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <input type="file" id="file-{{ $factura->id }}" class="file-input"
                                               data-file-id="{{ $factura->id }}" style="display: none;"
                                               name="file_path" accept="application/pdf"
                                               max="2048">
                                        <button class="upload-button border-0 text-xs" style="background-color: #ffffff;"
                                                data-file-id="{{ $factura->id }}">
                                            <span class="badge badge-danger text-white px-3"  style="border-color: rgba(58, 65, 111, 0.95); background-color: rgba(58, 65, 111, 0.95);">Adjuntar PDF</span>
                                        </button>

                                        <button class="border-0 text-xs p-0" style="background-color: #ffffff;"
                                                data-bs-toggle="modal" data-bs-target="#informationModal"
                                                onclick="openInformationModal({{ $factura->id }})">
                                                    <span class="badge badge-info ms-auto text-white"  style="border-color: rgba(58, 65, 111, 0.95); background-color: rgba(58, 65, 111, 0.95);">
                                                            Ver información
                                                    </span>
                                        </button>
                                    </div>
                                </td>

                            @endif
                            <td class="text-xs">{{ $factura->serie }}</td>
                            <td class="text-xs">{{ $factura->folio }}</td>
                            <td class="text-xs">{{ $factura->fecha_facturacion }}</td>
                            <td class="text-xs">{{ $factura->forma_pago }}</td>
                            <td class="text-xs">{{ $factura->membresia }}</td>
                            <td class="text-xs">{{ $factura->niu }}</td>
                            <td class="text-xs">{{ $factura->razon_social }}</td>
                            <td class="text-xs">{{ $factura->cliente }}</td>
                            <td class="text-xs">{{ $factura->total }}</td>
                            <td class="text-xs">{{ $factura->iva }}</td>
                            <td class="text-xs">{{ $factura->importe }}</td>
                            <td class="text-xs">{{ $factura->fecha_pago }}</td>
                            <td class="text-xs">{{ $factura->observaciones }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="pagination-container d-flex justify-content-center" style="margin-top: -1rem">
                {{ $facturacion->appends(['perPage' => request()->get('perPage'), 'search' => request()->get('search')])->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>

</div>
