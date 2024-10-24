<div class="multisteps-form__panel p-0 border-radius-xl bg-white" id="datosFacturacionModal" style="position: relative">
    <div class="container my-2 px-0">
        <h5 class="mb-0 text-black text-sm mb-3">Datos Facturación</h5>
        <div class="form-inputs-container" style="position: relative; padding-left: 15px;">
            <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background-color: #334661;"></div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="regimen_fiscal">RÉGIMEN FISCAL</label>
                        <select class="form-control text-uppercase" id="regimen_fiscal" name="regimen_fiscal">
                            <option value="0">Selecciona una opción</option>
                            @foreach($regimenesFiscales as $id => $descripcion)
                                <option class="text-xs" value="{{ $id }}">{{ $descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input type="text" class="form-control text-uppercase" id="rfc" value="" name="rfc" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="razon_social">RAZÓN SOCIAL</label>
                        <input type="text" class="form-control text-uppercase" id="razon_social" name="razon_social"
                               required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="correo">CORREO ELECTRÓNICO</label>
                        <input type="email" class="form-control" id="correo" required name="correo" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="vialidad">VIALIDAD</label>
                        <input type="text" class="form-control text-uppercase" id="vialidad" required
                               name="vialidad" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="numero_interior">NÚMERO INTERIOR</label>
                        <input type="text" class="form-control text-uppercase" id="numero_interior" required
                               name="numero_interior"
                               maxlength="10" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="num_exterior">NÚMERO EXTERIOR</label>
                        <input type="text" class="form-control text-uppercase" id="numero_exterior" required
                               name="numero_exterior"
                               maxlength="10" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="codigo_postal">CÓDIGO POSTAL</label>
                    <input type="number" class="form-control" id="codigo_postal" name="codigo_postal" required
                           maxlength="5" oninput="this.value = this.value.slice(0, 5)">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="colonia">COLONIA</label>
                        <select class="form-control" id="colonia" name="colonia">
                            <option class="text-xs" value="">Ingresa el CP</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="alcaldia_municipio">ALCALDÍA/MUNICIPIO</label>
                        <input type="text" class="form-control" id="alcaldia_municipio" name="alcaldia_municipio"
                               placeholder="Ingresa el CP" required disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="entidad">ENTIDAD</label>
                        <input type="text" class="form-control" id="entidad" name="entidad" required disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        let codigoP=false;
            function populateFormFields(result) {
                if (result) {
                    if (result["Correo"] !== "") {
                        $('input[name="correo"]').val(result["Correo"]);
                    }
                    if (result["regimen_fiscal"] !== "") {
                        $('select[name="regimen_fiscal"]').val(result["regimen_fiscal"]);
                    }
                    if (result["Vialidad"] !== "") {
                        $('input[name="vialidad"]').val(result["Vialidad"]);
                    }
                    if (result["Numero_Interior"] !== "") {
                        $('input[name="numero_interior"]').val(result["Numero_Interior"]);
                    }
                    if (result["Numero_Exterior"] !== "") {
                        $('input[name="numero_exterior"]').val(result["Numero_Exterior"]);
                    }
                    if (result["Codigo_Postal"] !== "") {
                        $('input[name="codigo_postal"]').val(result["Codigo_Postal"]);
                        fetchLocationData(result["Codigo_Postal"]);
                    }
                    setTimeout(function() {
                    if(result["Colonia"] !== "") {
                        $('select[name="colonia"]').val(result["Colonia"]);
                    }
                    }, 1000);
                }
            }

            function checkIdProveedorField() {
                let checkInterval = setInterval(function () {
                    let rfcField = $('input[name="rfc"]');
                    let rfc = document.getElementById('rfc').value;
                    if (rfcField.is(':visible') && rfcField.val().trim() !== '') {
                        let csrfToken = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '/search/facturacion?rfc=' + rfc,
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            success: function (response) {
                                let searchResults = response;
                                populateFormFields(searchResults);
                            },
                        });
                        clearInterval(checkInterval);
                    }
                });
            }

            $(document).on('click', '.multisteps-form__progress-btn', function () {
                var index = $(this).index();
                if (index === 2) {
                    checkIdProveedorField();
                }
            });

            $('#siguiente').on('click', function () {
                let $currentPanel = $('.multisteps-form__panel.js-active');
                let currentIndex = $currentPanel.index('.multisteps-form__panel');
                if (currentIndex === 1) {
                    checkIdProveedorField();
                }
            });

        // Función para obtener y llenar los datos de ubicación
        function fetchLocationData(codigoPostal) {
            if (codigoPostal.length === 5) {
                $.ajax({
                    url: '/get-location-data-from-db/' + codigoPostal,
                    method: 'GET',
                    success: function (response) {
                        if (response.success) {
                            const coloniaSelect = $('#colonia');
                            coloniaSelect.empty();

                            // Añadir las colonias al select
                            if (Array.isArray(response.colonia)) {
                                coloniaSelect.append('<option value="">Seleccione una colonia</option>');
                                response.colonia.forEach(function (colonia) {
                                    coloniaSelect.append(`<option value="${colonia}">${colonia}</option>`);
                                });
                            } else {
                                coloniaSelect.append(`<option value="${response.colonia}">${response.colonia}</option>`);
                            }

                            // Habilitar y marcar como válido el select de colonias
                            coloniaSelect
                                .prop('disabled', false)
                                .removeClass('is-invalid')
                                .addClass('is-valid');

                            // Actualizar campos de municipio y entidad
                            $('#alcaldia_municipio')
                                .val(response.municipio)
                                .prop('disabled', true)
                                .removeClass('is-invalid')
                                .addClass('is-valid');

                            $('#entidad')
                                .val(response.entidad)
                                .prop('disabled', true)
                                .removeClass('is-invalid')
                                .addClass('is-valid');
                        } else {
                            resetLocationFields();
                        }
                    },
                    error: function () {
                        resetLocationFields();
                        console.log("Error");
                    }
                });
            } else {
                resetLocationFields();
            }
        }

        // Función para resetear los campos
        function resetLocationFields() {
            $('#colonia')
                .empty()
                .append('<option value="">Ingresa el CP</option>')
                .prop('disabled', true)
                .removeClass('is-valid')
                .addClass('is-invalid');

            $('#alcaldia_municipio, #entidad')
                .val('')
                .prop('disabled', true)
                .removeClass('is-valid')
                .addClass('is-invalid');
        }

        // Función para mostrar mensajes de error
        function showError(message) {
            const codigoPostalInput = $('#codigo_postal');
            if (!codigoPostalInput.next('.invalid-feedback').length) {
                $(`<div class="invalid-feedback">${message}</div>`).insertAfter(codigoPostalInput);
            }
        }

        // Event listener para el campo de código postal
        $('#codigo_postal').on('input', function () {
            const codigoPostal = $(this).val().trim();
            $(this).next('.invalid-feedback').remove();

            // Validación básica del código postal
            if (!/^\d{0,5}$/.test(codigoPostal)) {
                $(this).val(codigoPostal.replace(/[^\d]/g, '').slice(0, 5));
                return;
            }

            // Validación y obtención de datos
            if (codigoPostal.length === 5) {
                $(this)
                    .removeClass('is-invalid')
                    .addClass('is-valid');
                fetchLocationData(codigoPostal);
            } else {
                $(this)
                    .removeClass('is-valid')
                    .addClass('is-invalid');
                resetLocationFields();
                if (codigoPostal.length > 0) {
                    showError('El código postal debe tener 5 dígitos');
                }
            }
        });

        // Event listener para el select de colonia
        $('#colonia').on('change', function () {
            if ($(this).val()) {
                $(this).removeClass('is-invalid').addClass('is-valid');
            } else {
                $(this).removeClass('is-valid').addClass('is-invalid');
            }
        });


        document.addEventListener('DOMContentLoaded', function () {
            const regimenFiscalSelect = document.getElementById('regimen_fiscal');

            regimenFiscalSelect.addEventListener('change', function () {
                const seleccionarOption = regimenFiscalSelect.querySelector('option[value="0"]');
                if (seleccionarOption) {
                    seleccionarOption.disabled = true;
                }
            });
        });

        $('#regimen_fiscal').on('change', function () {
            if ($(this).val() !== '0') {
                $(this).find('option[value="0"]').prop('disabled', true);
            }
        });

        let isValid = true;

        function validateForm() {
            const requiredFields = $('.multisteps-form__panel.js-active').find('[required], select');
            isValid = true;
            requiredFields.each(function () {
                if ($(this).is('select')) {
                    if ($(this).attr('id') === 'renovacion') {
                        return;
                    }
                    if ($(this).val() === '0' || $(this).val() === null) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        if (!$(this).next('.invalid-feedback').length) {
                            $('<div class="invalid-feedback">Este campo es obligatorio.</div>').insertAfter($(this));
                        }
                    } else {
                        $(this).removeClass('is-invalid');
                        $(this).next('.invalid-feedback').remove();
                    }
                } else if ($(this).attr('type') === 'email') {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test($(this).val().trim())) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        if (!$(this).next('.invalid-feedback').length) {
                            $('<div class="invalid-feedback">Por favor, ingresa un correo electrónico válido.</div>').insertAfter($(this));
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
        let changeTimeout;

        // Función para cambiar el texto del botón
        function updateButtonText() {
            $('#siguiente').text('Guardar y continuar');
        }

        // Manejar cambios en los campos del formulario
        function handleFieldChange() {
            clearTimeout(changeTimeout);
            changeTimeout = setTimeout(updateButtonText, 1000);
        }

        // Adjuntar listeners para detectar cambios en los inputs y selects
        $('#datosFacturacionModal input, #datosFacturacionModal select').on('input change', handleFieldChange);

        // Evento para manejar el clic en el botón 'Siguiente'
        $('#siguiente').on('click', function () {
            if ($(this).text() === 'Guardar y continuar') {
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                let formData = {
                    regimen_fiscal: $('#regimen_fiscal').val(),
                    rfc: $('#rfc').val(),
                    razon_social: $('#razon_social').val(),
                    correo: $('#correo').val(),
                    vialidad: $('#vialidad').val(),
                    numero_interior: $('#numero_interior').val(),
                    numero_exterior: $('#numero_exterior').val(),
                    codigo_postal: $('#codigo_postal').val(),
                    colonia: $('#colonia').val(),
                    alcaldia_municipio: $('#alcaldia_municipio').val(),
                    entidad: $('#entidad').val(),
                };

                $.ajax({
                    url: '/update/facturacion',  // La ruta para actualizar los datos
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            alert('Datos actualizados correctamente.');
                        } else {
                            alert('Ocurrió un error al actualizar los datos.');
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON); // Muestra el error exacto en la consola
                        alert('Error en la solicitud. Revisa la consola para más detalles.');
                    }
                });

            }
        });
    });

</script>

