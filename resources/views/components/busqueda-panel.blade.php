<div class="multisteps-form__panel p-3 border-radius-xl bg-white my-0 px-0 pb-0" style="position: relative">
    <h5 class="mb-0 text-sm">Busqueda por RFC, NIU o Razón Social</h5>
    <form method="POST" action="{{ route('admin.proveedores.search') }}" id="form_busqueda">
        @csrf
        <div class="d-flex align-items-center" style="width: 550px; margin-top: 1rem">
            <input type="text" class="form-control custom-width text-uppercase" value="@if(session('busqueda_proveedor')){{session('busqueda_proveedor')}}@endif" name="busqueda_proveedor" id="busqueda_proveedor" placeholder="Búsqueda" required style="width:335px; margin-right: 1rem"/>
            <button type="submit" class="btn bg-gradient-dark ms-2 mb-0" role="button" id="buscar_data">Buscar</button>
            <button class="btn bg-gradient-dark ms-auto mb-0 float-right hide_div" type="button" disabled id="btn_loading_busqueda">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Cargando...
            </button>
        </div>
    </form>
    <x-results-table :resultsArray="$resultsArray" />
</div>
