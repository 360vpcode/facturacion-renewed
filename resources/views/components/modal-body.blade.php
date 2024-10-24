
<div class="modal-body text-sm px-0 pb-0" style="transform: scale(0.90);">
    <div class="row">
        <div class="col-12 col-lg-8 mx-auto my-4">
            <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn js-active" type="button" title="Búsqueda" disabled>
                    <span>Búsqueda</span>
                </button>
                <button class="multisteps-form__progress-btn" type="button" title="Nuevo Registro" disabled>
                    <span>Nuevo Registro</span>
                </button>
                <button class="multisteps-form__progress-btn" type="button" title="Datos Facturación" disabled>
                    <span>Datos Facturación</span>
                </button>
                <button class="multisteps-form__progress-btn" type="button" title="Evidencia" disabled>
                    <span>Evidencia</span>
                </button>
            </div>

        </div>
    </div>
    <x-busqueda-panel :resultsArray="$resultsArray"/>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" id="storeForm">
        @csrf
        <x-nuevo-registro-panel />
        <x-datos-facturacion-panel :regimenesFiscales="$regimenesFiscales" />
        <x-evidencia-panel />
    </form>
</div>
