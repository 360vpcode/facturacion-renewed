<div class="table-responsive" id="tabla-proveedores" style="margin-top: 1.5rem">
    <table class="table table-flush mb-0" id="datatable-proveedores">
        <thead class="thead-light">
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center p-0"></th>            
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left p-0">CLIENTE</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left p-0">NIU</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left p-0">RFC</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left p-0">RAZÓN SOCIAL</th>
        </tr>
        </thead>
        <tbody>
        @if(empty($resultsArray))
            <tr>
                <td colspan="5" class="text-center mt-3">No se encontraron resultados.</td>
            </tr>
        @else
            @foreach($resultsArray as $result)
                <tr>
                    <td class="text-xs font-weight-bold align-middle text-center p-0 ">
                        <input type="hidden" id="id_proveedor" name="id_proveedor" value="{{  $result['id'] }}">
                        <button class="btn btn-outline-secondary m-auto my-2 py-1 pe-2 me-2" id="btn_Ver">
                            <div class="d-flex align-items-center justify-content-center text-xs" style="gap: 5px">
                                Ver
                                <svg xmlns="http://www.w3.org/2000/svg" height="10" width="17.5" viewBox="0 0 576 512"
                                     class="ms-1">
                                    <path fill="#8392AB"
                                          d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                                </svg>
                            </div>
                        </button>
                    </td>
                    <td class="text-xs font-weight-normal align-middle py-3">
                        {{ $result['cliente_hash_crypt']['cliente'] }}
                    </td>
                    <td class="text-xs font-weight-normal align-middle py-3">
                        @if(isset($result['niu'][0]['niu']))
                            {{ $result['niu'][0]['niu'] }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="text-xs font-weight-normal align-middle text-left py-3">{{ $result['rfc'] }}</td>
                    <td class="text-xs font-weight-normal align-middle text-left py-3">

                        @if($result['tipo_proveedor'] == 'PM')
                            {{ $result['razon_social'] }} <br>
                            {{ $result['tipo_sociedad'] }}
                        @elseif($result['tipo_proveedor'] == 'PF')
                            {{ $result['name'] }}
                            {{ $result['apellido_paterno'] }}
                            {{ $result['apellido_materno'] }}
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

