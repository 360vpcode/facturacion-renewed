@extends('Admin.layout.base')

@section('title')
    Proveedores
@endsection

@section('head')
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('content')
    <div class="card-body p-3">
        <x-search-button/>

        <x-search-modal :resultsArray="$resultsArray" :regimenesFiscales="$regimenesFiscales"/>

        <x-dinamic-table :perPage="$perPage" :facturacion="$facturacion"/>
    </div>

    <x-ver-mas-modal/>


        <script>
            $(document).ready(function () {

                function fetch_data(page, query, perPage) {
                    $.ajax({
                        url: '?page=' + page + '&search=' + query + '&perPage=' + perPage,
                        type: 'GET',
                        success: function (output) {
                            $('#datatable-search tbody').html($(output).find('#datatable-search tbody').html());
                            $('.pagination-container').html($(output).find('.pagination-container').html());

                            attachButtonEvents();
                        },
                        error: function (xhr) {
                            console.error("Error en la búsqueda:", xhr.responseText);
                        }
                    });
                }

                function attachButtonEvents() {
                    $('.download-button').off('click').on('click', function () {
                        var fileId = $(this).data('file-id');
                        downloadFile(fileId);
                    });

                    $('.upload-button').off('click').on('click', function () {
                        const fileId = $(this).data('file-id');
                        $('#file-' + fileId).click();
                    });

                    $('.file-input').off('change').on('change', function () {
                        const fileId = $(this).data('file-id');
                        uploadFile(fileId);
                    });
                }

                $('select[name="perPage"]').on('change', function () {
                    let perPage = $(this).val();
                    let query = $('#search-table').val();
                    fetch_data(1, query, perPage);
                });

                $('#search-table').on('keyup', function () {
                    let query = $(this).val();
                    let perPage = $('select[name="perPage"]').val();
                    fetch_data(1, query, perPage);
                });

                $(document).on('click', '.pagination a', function (event) {
                    event.preventDefault();
                    let page = $(this).attr('href').split('page=')[1];
                    let query = $('#search-table').val();
                    let perPage = $('select[name="perPage"]').val();
                    fetch_data(page, query, perPage);
                });

                $('.upload-button').click(function () {
                    const fileId = $(this).data('file-id');
                    $('#file-' + fileId).click();
                });

                $('.file-input').change(function () {
                    const fileId = $(this).data('file-id');
                    uploadFile(fileId);
                });

                function uploadFile(fileId) {
                    const fileInput = $('#file-' + fileId)[0];
                    const file = fileInput.files[0];
                    if (!file || file.type !== 'application/pdf') {
                        Swal.fire('Error', 'Por favor, sube solo archivos PDF.', 'error');
                        return;
                    }

                    if (!confirm("¿Estás seguro de que quieres subir este archivo?")) {
                        return;
                    }

                    const formData = new FormData();
                    formData.append('file', file);
                    Swal.fire({
                        title: 'Subiendo archivo...',
                        text: 'Por favor espera.',
                        icon: 'info',
                        button: false,
                        closeOnClickOutside: false,
                            customClass: {
                            popup: 'text-sm',
                            title: 'text-lg',
                            icon: 'text-sm',
                        }                           
                    });

                    $.ajax({
                        url: `{{ url('/facturas/') }}/${fileId}/update-file`,
                        method: 'POST',

                        enctype: 'multipart/form-data',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            console.log(data);
                            setTimeout(function () {
                                Swal.fire('Completado', data.message, 'success');
                            }, 3000);
                            setTimeout(function () {
                                location.replace("{{ route('admin.proveedores') }}");
                            }, 3000);
                        },
                        error: function (xhr) {
                            setTimeout(function () {
                                Swal.fire('Error', 'Error al subir el archivo: ' + xhr.responseText, 'error');
                            }, 5000);
                        }
                    });
                }
            });
        </script>

        <script>
            function downloadFile(id) {
                var url = '{{ url("/download/") }}/' + id;
                window.open(url, '_blank');
            }

            document.addEventListener('DOMContentLoaded', function () {
                var downloadButtons = document.querySelectorAll('.download-button');
                downloadButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        var fileId = this.getAttribute('data-file-id');
                        downloadFile(fileId);
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function () {

                if ("{{ session('search_clicked') }}" == true) {
                    $('#exampleModal').modal('show');
                }

                var x = 1;
                var addButton = $('.add_button');
                var wrapper = $('.field_wrapper');

                $(addButton).click(function () {
                    x++;
                    var c = (x + 1);
                    $(wrapper).append('<div class="contenedor"><div class="row"><div class="form-group col-md-2"><label for="serie">Cliente</label><input type="text" class="form-control" id="cliente" name="cliente[]" style="text-transform:uppercase;" /><input type="hidden" name="tpo_carga" value="individual"></div><div class="form-group col-md-2"><label for="rfc_estandarizado">RFC</label><input type="text" class="form-control" id="rfc_estandarizado" name="rfc_estandarizado[]" style="text-transform:uppercase;" /></div><div class="form-group col-md-2"><label for="tipo_proveedor">Tipo de proveedor</label><select class="form-control" name="tipo_proveedor[]" id="tipo_proveedor' + x + '"><option value = "">Seleccionar</option><option value = "PF">Persona Fisica</option><option value = "PM">Persona Moral</option></select></div><div class="form-group col-md-2 hide_div data_PM' + x + ' "><label for="razon_social_estandarizada">Razón social</label><input type="text" class="form-control" id="razon_social_estandarizada" name="razon_social_estandarizada[]" style="text-transform:uppercase;" /></div><div class="form-group col-md-2 hide_div data_PM' + x + ' "><div class="eliminar"><label for="tipo_sociedad">Tipo de sociedad</label><a href="javascript:void(0);" class="remove_button text-danger" title="Eliminar"><b>[x]</b></a></div><input type="text" class="form-control" id="tipo_sociedad" name="tipo_sociedad[]" style="text-transform:uppercase;" /></div><div class="form-group col-md-2 hide_div data_PF' + x + '"><label for="">Nombre</label><input type="text" class="form-control" id="nombre" name="nombre[]" style="text-transform:uppercase;" /></div><div class="form-group col-md-2 hide_div data_PF' + x + ' "><label for="">Apellido materno</label><input type="text" class="form-control" id="a_paterno" name="a_paterno[]" style="text-transform:uppercase;" /></div><div class="form-group col-md-2 hide_div data_PF' + x + ' "><div class="eliminar"><label for="a_materno">Apellido paterno</label><a href="javascript:void(0);" class="remove_button text-danger" title="Eliminar"><b>[x]</b></a></div><input type="text" class="form-control" id="a_materno" name="a_materno[]" style="text-transform:uppercase;" /></div><div class="form-row align-items-center"></div></div></div>');
                    for (let i = 1; i < c; i++) {
                        $("#tipo_proveedor" + i).change(function () {
                            $("#msg_status").empty("p");
                            var opc_proveedor = $("#tipo_proveedor" + i + " option").filter(":selected").val();
                            if (opc_proveedor == "PF") {
                                $(".data_PM" + i).hide();
                                $(".data_PF" + i).show();
                            } else if (opc_proveedor == "PM") {
                                $(".data_PM" + i).show();
                                $(".data_PF" + i).hide();
                            } else {
                                $(".data_PM" + i).hide();
                                $(".data_PF" + i).hide();
                            }
                        });
                    }
                });

                $(wrapper).on('click', '.remove_button', function (e) {
                    e.preventDefault();
                    $(this).parent('.eliminar').parent().parent().parent().remove();
                    x--;
                });

                function resetButtonStyles() {
                    $('.btn').css({'border-width': '', 'border-style': '', 'border-color': '', 'color': ''});
                }

                function hideAllDivs() {
                    $('.info_div').hide();
                    $('.action_div').hide();
                }

                function handleButtonClick(buttonId, divId) {
                    $(buttonId).on('click', function () {
                        resetButtonStyles();
                        $(this).css({
                            'border-width': '2px',
                            'border-style': 'solid',
                            'border-color': '#3A416F',
                            'color': '#344767'
                        });
                        hideAllDivs();
                        $(divId).show();
                    });
                }

                handleButtonClick('#btn_carga', '#carga_div');
                handleButtonClick('#btn_buscar', '#busqueda_div');
                handleButtonClick('#btn_pendientes', '#pendientes_div');
                handleButtonClick('#btn_liberacion', '#liberacion_div');
                handleButtonClick('#btn_eliminar', '#eliminar_div');
                handleButtonClick('#btn_baja', '#baja_div');
                handleButtonClick('#btn_reactivar', '#reactivar_div');
                handleButtonClick('#btn_busqueda', '#buscar_div');

                function checkSession(sessionVar, buttonId, divId) {
                    if (sessionVar != "") {
                        resetButtonStyles();
                        $(buttonId).css({'border-width': '3px', 'border-style': 'solid', 'border-color': '#3A416F'});
                        hideAllDivs();
                        $(divId).show();
                    }
                }

                var busqueda = "{{ session('busqueda') }}";
                var busqueda_pendiente = "{{ session('busqueda_pendiente') }}";
                var busqueda_liberacion = "{{ session('busqueda_liberacion') }}";
                var busqueda_eliminar = "{{ session('busqueda_eliminar') }}";
                var busqueda_baja = "{{ session('busqueda_baja') }}";
                var busqueda_reactivar = "{{ session('busqueda_reactivar') }}";
                var busqueda_proveedor = "{{ session('busqueda_proveedor') }}";

                checkSession(busqueda, '#btn_buscar', '#busqueda_div');
                checkSession(busqueda_pendiente, '#btn_pendientes', '#pendientes_div');
                checkSession(busqueda_liberacion, '#btn_liberacion', '#liberacion_div');
                checkSession(busqueda_eliminar, '#btn_eliminar', '#eliminar_div');
                checkSession(busqueda_baja, '#btn_baja', '#baja_div');
                checkSession(busqueda_reactivar, '#btn_reactivar', '#reactivar_div');
                checkSession(busqueda_proveedor, '#btn_busqueda', '#buscar_div');

                $('#tipo_proveedor').change(function () {
                    $('#msg_status').empty("p");
                    var opc_proveedor = $('#tipo_proveedor option').filter(':selected').val();
                    if (opc_proveedor == "PF") {
                        $('.data_PM').hide();
                        $('.data_PF').show();
                    } else if (opc_proveedor == "PM") {
                        $('.data_PM').show();
                        $('.data_PF').hide();
                    } else {
                        $('.data_PM').hide();
                        $('.data_PF').hide();
                    }
                });

                $('input[name="select_option"]').click(function () {
                    $('#msg_status').empty("p");
                    var opc = $('input[name="select_option"]:checked').val();
                    if (opc == "opc_0") {
                        $('#info_0').show();
                        $('#info_1').hide();
                        $('#info_2').hide();
                        $("#form_busqueda")[0].reset();
                        $("#FormDataImport")[0].reset();
                    } else if (opc == "opc_1") {
                        $('#info_0').hide();
                        $('#info_1').show();
                        $('#info_2').hide();
                        $("#form_busqueda")[0].reset();
                    } else {
                        $('#info_0').hide();
                        $('#info_1').hide();
                        $('#info_2').hide();
                        $("#FormDataImport")[0].reset();
                        $("#FormData")[0].reset();
                    }
                });
            });

            function openInformationModal(facturaId) {
                $.ajax({
                    url: '/factura/informacion/' + facturaId,
                    type: 'GET',
                    success: function (response) {
                        $('#modalSerie').val(response.serie);
                        $('#modalFolio').val(response.folio);
                        $('#modalFechaFacturacion').val(response.fecha_facturacion);
                        $('#modalFormaDePago').val(response.forma_pago);
                        $('#modalMembresia').val(response.membresia);
                        $('#modalNiu').val(response.niu);
                        $('#modalRazonSocial').val(response.razon_social);
                        $('#modalCliente').val(response.cliente);
                        $('#modalTotal').val(response.total);
                        $('#modalIva').val(response.iva);
                        $('#modalImporte').val(response.importe);
                        $('#modalFechaDePago').val(response.fecha_pago);
                        $('#modalRenovacion').val(response.renovacion);
                        $('#modalObservaciones').val(response.observaciones);

                        $('#modalRegimen_fiscal').val(response.regimen_fiscal);
                        $('#modalRfc').val(response.rfc);
                        $('#modalCorreo').val(response.correo);
                        $('#modalVialidad').val(response.vialidad);
                        $('#modalNumero_interior').val(response.numero_interior);
                        $('#modalNumero_exterior').val(response.numero_exterior);
                        $('#modalCodigo_postal').val(response.codigo_postal);
                        $('#modalColonia').val(response.colonia);
                        $('#modalAlcaldia_municipio').val(response.alcaldia_municipio);
                        $('#modalEntidad').val(response.entidad);
                        $('#informationModal').modal('show');
                    },

                    error: function (xhr) {
                        console.error("Error al obtener la información de la factura:", xhr.responseText);
                    }
                });
            }

        </script>


        <style>
            .table-responsive {
                overflow-x: auto;
            }
        </style>
@endsection
