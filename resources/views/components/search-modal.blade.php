<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-lg-down" role="document">
        <div class="modal-content">
            <x-modal-body :resultsArray="$resultsArray" :regimenesFiscales="$regimenesFiscales"/>
            <x-modal-footer/>
        </div>
    </div>
</div>
<script src={{ asset('/assets/js/plugins/sweetalert.min.js') }}></script>

<script>
    $(document).ready(function () {
        let formData = {};

        function logElementData() {
            let elementName = $(this).attr('name');
            let elementValue = $(this).val();
            formData[elementName] = elementValue;
        }

        $('.multisteps-form__panel input, .multisteps-form__panel textarea, .multisteps-form__panel select').on('change', logElementData);

        $('.multisteps-form__panel input, .multisteps-form__panel textarea, .multisteps-form__panel select').each(function () {
            logElementData.call(this);
        });

        $('#siguiente').on('click', function () {
            $('.multisteps-form__panel input, .multisteps-form__panel textarea, .multisteps-form__panel select').each(function () {
                logElementData.call(this);
            });
        });


        $('#submit-evidencia').on('click', function (event) {
            event.preventDefault();

            let formData = new FormData();

            $('.multisteps-form__panel input, .multisteps-form__panel textarea, .multisteps-form__panel select').each(function () {
                let elementName = $(this).attr('name');
                let elementValue = $(this).val();
                formData.append(elementName, elementValue);
            });

            if ($('#btnSi').is(':checked')) {
                let fileInput = document.getElementById('file_path');
                let file = fileInput.files[0];
                formData.append('file_path', file);
                formData.append('adjuntarArchivo', 'si');
            } else {
                formData.append('file_path', null);
                formData.append('adjuntarArchivo', 'no');
            }



            $.ajax({
                url: '/store',
                method: 'POST',
                enctype: 'multipart/form-data',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    location.replace("{{ route('admin.proveedores') }}");
                },
            });
        });
    });

    $(document).ready(function () {
        $(document).on('click', '#btn_Ver', function () {
            let $row = $(this).closest('tr');
            let niu = $row.find('td').eq(2).text().trim();
            let razonSocial = $row.find('td').eq(4).text().trim();
            let cliente = $row.find('td').eq(1).text().trim();
            let rfc = $row.find('td').eq(3).text().trim();

            localStorage.setItem('rfc', rfc);
            localStorage.setItem('razon_social', razonSocial);


            let $currentPanel = $('.multisteps-form__panel.js-active');
            let currentIndex = $currentPanel.index('.multisteps-form__panel');

            if (currentIndex < $('.multisteps-form__panel').length - 1) {
                $currentPanel.hide().removeClass('js-active');
                let $nextPanel = $('.multisteps-form__panel').eq(currentIndex + 1);
                $nextPanel.show().addClass('js-active');
                $nextPanel.find('input[name="niu"]').val(niu);
                $nextPanel.find('input[name="razon_social"]').val(razonSocial);
                let cleanedCliente = cliente.trim().replace(/\s+/g, ' ');
                $nextPanel.find('input[name="cliente"]').val(cleanedCliente);

                updateProgressButtons(currentIndex + 1);
                updateNavigationButtons(currentIndex + 1);
            }


        });

        let isValid = true;

        function validateForm() {
            const requiredFields = $('.multisteps-form__panel.js-active').find('[required], select');
            isValid = true;
            requiredFields.each(function () {
                if ($(this).is('select')) {
                    if($(this).attr('id')==='renovacion'){
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

        $('.multisteps-form__panel').hide();
        $('.multisteps-form__panel').first().show().addClass('js-active');

        updateNavigationButtons(0);

        $(document).on('click', '.multisteps-form__progress-btn', function () {
            var index = $(this).index();

            updateProgressButtons(index);

            $('.multisteps-form__panel').hide();

            $('.multisteps-form__panel').eq(index).show().addClass('js-active');

            updateNavigationButtons(index);
        });

        $('#anterior').on('click', function () {
            let $currentPanel = $('.multisteps-form__panel.js-active');
            let currentIndex = $currentPanel.index('.multisteps-form__panel');
            if (currentIndex > 0) {
                $currentPanel.hide().removeClass('js-active');
                let $prevPanel = $('.multisteps-form__panel').eq(currentIndex - 1);
                $prevPanel.show().addClass('js-active');
                updateProgressButtons(currentIndex - 1);
                updateNavigationButtons(currentIndex - 1);
            }
        });

        $('#siguiente').on('click', function () {
            let $currentPanel = $('.multisteps-form__panel.js-active');
            let currentIndex = $currentPanel.index('.multisteps-form__panel');

            if ((currentIndex - 1) === 0) {
                validateForm();
            } else if ((currentIndex - 1) === 1) {
                validateForm();
            }

            if (isValid === false) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos incompletos',
                    text: 'Por favor, completa todos los campos obligatorios antes de continuar.',
                    customClass: {
                        popup: 'text-sm',
                        title: 'text-lg',
                        icon: 'text-sm',
                        confirmButton: 'btn bg-gradient-dark'
                    }
                });
            } else {
                if (currentIndex < $('.multisteps-form__panel').length - 1) {
                    $currentPanel.hide().removeClass('js-active');
                    let $nextPanel = $('.multisteps-form__panel').eq(currentIndex + 1);
                    $nextPanel.show().addClass('js-active');
                    if ($nextPanel.find('#rfc').length > 0) {
                        let storedRfc = localStorage.getItem('rfc');
                        let storedRazon = localStorage.getItem('razon_social');
                        if (storedRfc) {
                            $nextPanel.find('input[name="rfc"]').val(storedRfc);
                        }
                        if (storedRazon) {
                            $nextPanel.find('input[name="razon_social"]').val(storedRazon);
                        }
                    }


                    updateProgressButtons(currentIndex + 1);
                    updateNavigationButtons(currentIndex + 1);
                }
            }
        });

        function updateProgressButtons(index) {
            $('.multisteps-form__progress-btn').removeClass('js-active');

            $('.multisteps-form__progress-btn').each(function (i) {
                if (i <= index) {
                    $(this).addClass('js-active');
                }
            });
        }

        function updateNavigationButtons(index) {
            if (index === 0) {
                $('#anterior, #siguiente').hide();
            } else if (index === $('.multisteps-form__panel').length - 1) {
                $('#anterior').show();
                $('#siguiente').hide();
            } else {
                $('#anterior, #siguiente').show();
            }
        }
    });

    $(document).ready(function () {
        $('#renovacion').on('change', function () {
            if ($(this).val() !== null) {
                $(this).find('option[value=null]').prop('disabled', true);
            }
        });
    });
    $(document).ready(function () {
        $('#membresia').on('change', function () {
            if ($(this).val() !== null) {
                $(this).find('option[value=null]').prop('disabled', true);
            }
        });
    });
</script>
