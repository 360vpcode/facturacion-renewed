<form id="evidenciaForm" >
<div class="multisteps-form__panel p-0 border-radius-xl bg-white" style="position: relative">
    <div class="container my-2 px-0">
            <h5 class="mb-3 text-black text-sm mb-3">Nuevo Registro</h5>
            <div class="form-inputs-container" style="position: relative; padding-left: 15px;">
                <div
                    style="position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background-color: lightgreen;"></div>
                <div class="row mb-2">

                    <div class="col-md-3">
                        <label for="folio">FOLIO</label>
                        <input type="number" class="form-control text-uppercase" id="folio" name="folio" required>
                    </div>
                    <div class="col-md-3">
                        <label for="fecha_facturacion">FECHA DE FACTURACIÓN</label>
                        <input type="date" class="form-control" id="fecha_facturacion" name="fecha_facturacion"
                               required>
                    </div>
                    <div class="col-md-3">
                        <label for="forma_pago">FORMA DE PAGO</label>
                        <select class="form-control" id="forma_pago" name="forma_pago">
                            <option class=" text-xs" value="0" selected>Selecciona una opción</option>
                            <option class=" text-xs" value="TARJETA">TARJETA</option>
                            <option class=" text-xs" value="EFECTIVO">EFECTIVO</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="divisa">DIVISA</label>
                        <select class="form-control" id="divisa" name="divisa">
                            <option class=" text-xs" value="0" selected>Selecciona una opción</option>
                            <option class=" text-xs" value="MXN">MXN</option>
                            <option class=" text-xs" value="DLS">USD</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label for="membresía">MEMBRESÍA</label>
                        <select class="form-control" id="membresia" name="membresia">
                            <option class=" text-xs" value="0" selected>Selecciona una opción</option>
                            <option class=" text-xs" value="BIMESTRAL">BIMESTRAL</option>
                            <option class=" text-xs" value="TRIMESTRAL">TRIMESTRAL</option>
                            <option class=" text-xs" value="SEMESTRAL">SEMESTRAL</option>
                            <option class=" text-xs" value="ANUAL">ANUAL</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="niu">NIU</label>
                        <input disabled type="text" class="form-control" id="niu" name="niu" required>
                    </div>
                    <div class="col-md-3">
                        <label for="razón_social">RAZÓN SOCIAL</label>
                        <input disabled type="text" class="form-control" id="razon_social" name="razon_social" required>
                    </div>
                    <div class="col-md-3">
                        <label for="cliente">CLIENTE</label>
                        <input disabled type="text" class="form-control" id="cliente" name="cliente" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label for="total">TOTAL</label>
                        <input type="number" class="form-control" id="total" name="total" min="1" step="0.01" required>
                    </div>
                    <div class="col-md-3">
                        <label for="iva">IVA</label>
                        <input type="number" disabled class="form-control" id="iva" name="iva"
                               step="0.01" required>
                    </div>
                    <div class="col-md-3">
                        <label for="importe">IMPORTE</label>
                        <input type="number" disabled class="form-control" id="importe" name="importe"
                               step="0.01" required>
                    </div>
                    <div class="col-md-3">
                        <label for="fecha_pago">FECHA DE PAGO</label>
                        <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label for="renovación">RENOVACIÓN</label>
                        <select type="text" class="form-control" id="renovacion" name="renovacion">
                            <option class="text-xs" value="0" selected>Selecciona una opción</option>
                            <option class="text-xs" value="RENOVACIÓN">RENOVACIÓN</option>
                            <option class="text-xs" value="NUEVO">NUEVO</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="observaciones">OBSERVACIONES</label>
                        <textarea class="form-control text-uppercase" id="observaciones" name="observaciones" rows="3"></textarea>
                    </div>
                </div>
            </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        let isValid = true;

        function validateForm() {
            const requiredFields = $('.multisteps-form__panel.js-active').find('[required], select');
            isValid = true;
            requiredFields.each(function () {
                if ($(this).id === 'renovacion') {
                    return;
                }

                // Validar si es un campo select
                if ($(this).is('select')) {
                    if ($(this).val() === '0' || $(this).val() === null) {
                        // Solo validar si no es el select de "renovación"
                        if ($(this).attr('id') !== 'renovacion') {
                            isValid = false;
                            $(this).addClass('is-invalid');
                            if (!$(this).next('.invalid-feedback').length) {
                                $('<div class="invalid-feedback">Este campo es obligatorio.</div>').insertAfter($(this));
                            }
                        }
                    } else {
                        $(this).removeClass('is-invalid');
                        $(this).next('.invalid-feedback').remove();
                    }
                } else if (!$(this).val().trim()) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                    if (!$(this).next('.invalid-feedback').length) {
                        $('<div class="invalid-feedback">Este campo es obligatorio.</div>').insertAfter($(this));
                    }
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).next('.invalid-feedback').remove();
                }
            });
        }


        $(document).on('input change', '.multisteps-form__panel.js-active [required]', function () {
            validateForm();
        });

        $(document).on('change', '.multisteps-form__panel.js-active select', function () {
            validateForm();
        });
    });

    $(document).ready(function () {
        $('#renovacion, #membresia, #divisa, #forma_pago').on('change', function () {
            if ($(this).val() !== null) {
                $(this).find('option[value="0"]').prop('disabled', true);
            }

            // Evitar validación en el select de "Renovación"
            if ($(this).attr('id') !== 'renovacion' && ($(this).val() === '0' || $(this).val() === null)) {
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const totalInput = document.getElementById('total');
        const importeInput = document.getElementById('importe');
        const ivaInput = document.getElementById('iva');

        totalInput.addEventListener('input', function () {
            const totalValue = parseFloat(totalInput.value);
            if (totalValue < 0) {
                totalInput.value = '';
            } else {
                if (!isNaN(totalValue)) {
                    const importeValue = totalValue / 1.16;
                    const ivaValue = totalValue - importeValue;
                    importeInput.value = importeValue.toFixed(2);
                    ivaInput.value = ivaValue.toFixed(2);
                } else {
                    importeInput.value = '';
                    ivaInput.value = '';
                }
            }
        });
    });
</script>
<style>
    .is-invalid {
        border-color: red;
    }

    .invalid-feedback {
        color: red;
        font-size: 0.875em;
        margin-top: 0.25rem;
    }

    .bg-gradient-dark {
        background: linear-gradient(195deg, #42424a 0%, #191919 100%);
        color: #ffffff;
    }

    .bg-gradient-light {
        background: linear-gradient(195deg, #ebeff4 0%, #ced4da 100%);
        color: #7b809a;
    }
</style>
