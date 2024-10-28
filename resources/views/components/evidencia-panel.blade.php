<div class="multisteps-form__panel p-0 border-radius-xl bg-white" style="position: relative">
    <h5 class="mb-0 text-black text-center mb-3 mt-5">¿Adjuntar facturación?</h5>
    <div class="container my-2 px-0">
        @csrf
        <div class="form-group text-center">
            <div>
                <label class="text-lg font-weight-normal" for="btnSi">SI</label>
                <input type="radio" id="btnSi" name="adjuntarArchivo" value="si" class="mx-2">
                <input type="radio" id="btnNo" name="adjuntarArchivo" value="no" checked>
                <label class="text-lg font-weight-normal" for="btnNo">NO</label>
            </div>
        </div>
        <div class="form-group text-center" id="fileInputContainer" style="display: none;">
            <label class="text-lg mb-3 font-weight-normal" for="file_path">Adjuntar archivo PDF</label>
            <input type="file" class="form-control" id="file_path" name="file_path" accept="application/pdf"
                   max="2048">
        </div>
        <div class="text-center">
            <button type="submit" id="submit-evidencia" class="btn btn-primary" style="background-color: #00008B;">
                Guardar
            </button>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('input[name="adjuntarArchivo"]').on('change', function () {
            if ($('#btnSi').is(':checked')) {
                $('#fileInputContainer').show();
            } else {
                $('#fileInputContainer').hide();
            }
        });
        $('#submit-evidencia').on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                icon: 'success',
                title: 'Datos guardados correctamente',
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    title: 'text-lg',
                    icon: 'text-sm'
                }
            }).then(function () {
                //location.reload();
            });
        });
    });

</script>
