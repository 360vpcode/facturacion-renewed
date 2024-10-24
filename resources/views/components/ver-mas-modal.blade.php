<div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="informationModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down"  style="transform: scale(0.90);" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container my-2">
                    <div class="row">
                        <div class="col-12 col-lg-8 mx-auto my-1">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="Datos generales" disabled id="multisteps-form__progress-modal1">
                                    <span>Datos generales</span>
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Datos Facturación" disabled id="multisteps-form__progress-modal2">
                                    <span>Datos Facturación</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="section" id="section-1">
                        <h5 class="fw-bold mb-3 text-start mt-5">Datos generales</h5>
                        <div class="form-inputs-container" style="position: relative; padding-left: 15px;">
                            <div
                                style="position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background-color: lightgreen;">
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="modalSerie">SERIE</label>
                                    <input type="text" class="form-control" id="modalSerie"
                                           disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalFolio">FOLIO</label>
                                    <input type="text" class="form-control" id="modalFolio"
                                           disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalFechaFacturacion">FECHA DE FACTURACIÓN</label>
                                    <input type="text" class="form-control" id="modalFechaFacturacion" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalFormaDePago">FORMA DE PAGO</label>
                                    <input type="text" class="form-control" id="modalFormaDePago" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="modalMembresia">MEMBRESÍA</label>
                                    <input type="text" class="form-control" id="modalMembresia" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalNiu">NIU</label>
                                    <input type="text" class="form-control" id="modalNiu" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalRazonSocial">RAZÓN SOCIAL</label>
                                    <input type="text" class="form-control" id="modalRazonSocial" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalCliente">CLIENTE</label>
                                    <input type="text" class="form-control" id="modalCliente" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="modalTotal">TOTAL</label>
                                    <input type="text" class="form-control" id="modalTotal" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalIva">IVA</label>
                                    <input type="text" class="form-control" id="modalIva" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalImporte">IMPORTE</label>
                                    <input type="text" class="form-control" id="modalImporte" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="modalFechaDePago">FECHA DE PAGO</label>
                                    <input type="text" class="form-control" id="modalFechaDePago" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="modalRenovacion">RENOVACIÓN</label>
                                    <input type="text" class="form-control" id="modalRenovacion" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="modalObservaciones">OBSERVACIONES</label>
                                    <textarea class="form-control" id="modalObservaciones" rows="3"
                                              disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 2: Datos de facturación -->
                    <div class="section d-none" id="section-2">
                        <h5 class="fw-bold mb-3 text-start mt-5">Datos de facturación</h5>
                        <div class="form-inputs-container" style="position: relative; padding-left: 15px;">
                            <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background-color: #334661;"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modalRegimen_fiscal">RÉGIMEN FISCAL</label>
                                        <input type="text" class="form-control" id="modalRegimen_fiscal" disabled value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modalRfc">RFC</label>
                                        <input type="text" class="form-control" id="modalRfc"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modalCorreo">CORREO ELECTRÓNICO</label>
                                        <input type="email" class="form-control" id="modalCorreo" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modalVialidad">VIALIDAD</label>
                                        <input type="text" class="form-control" id="modalVialidad" style="width: 32rem" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modalNumero_interior">NÚMERO INTERIOR</label>
                                        <input type="text" class="form-control" id="modalNumero_interior" disabled maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modalNumero_exterior">NÚMERO EXTERIOR</label>
                                        <input type="text" class="form-control" id="modalNumero_exterior" disabled maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="modalCodigo_postal">CÓDIGO POSTAL</label>
                                    <input type="number" class="form-control" id="modalCodigo_postal" maxlength="5" disabled>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="modalColonia">COLONIA</label>
                                        <input type="text" class="form-control" id="modalColonia" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modalAlcaldia_municipio">ALCALDÍA/MUNICIPIO</label>
                                        <input type="text" class="form-control" id="modalAlcaldia_municipio" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modalEntidad">ENTIDAD</label>
                                        <input type="text" class="form-control" id="modalEntidad" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-primary" id="prev-btn">Anterior</button>
                <button type="button" class="btn bg-gradient-primary" id="next-btn">Siguiente</button>
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sections = document.querySelectorAll(".section");
        let currentSection = 0;

        const prevBtn = document.getElementById("prev-btn");
        const nextBtn = document.getElementById("next-btn");

        const progressBtn1 = document.getElementById("multisteps-form__progress-modal1");
        const progressBtn2 = document.getElementById("multisteps-form__progress-modal2");

        function updateSections() {
            sections.forEach((section, index) => {
                section.classList.toggle("d-none", index !== currentSection);
            });

            if (currentSection === 0) {
                progressBtn1.classList.add("js-active");
                progressBtn2.classList.remove("js-active");
            } else if (currentSection === 1) {
                progressBtn2.classList.add("js-active");
            }

            if (currentSection === 0) {
                prevBtn.classList.add("d-none");
            } else {
                prevBtn.classList.remove("d-none");
            }

            if (currentSection === sections.length - 1) {
                nextBtn.classList.add("d-none");
            } else {
                nextBtn.classList.remove("d-none");
            }
        }

        nextBtn.addEventListener("click", function () {
            if (currentSection < sections.length - 1) {
                currentSection++;
                updateSections();
            }
        });

        prevBtn.addEventListener("click", function () {
            if (currentSection > 0) {
                currentSection--;
                updateSections();
            }
        });

        $('#informationModal').on('shown.bs.modal', function () {
            progressBtn1.classList.add("js-active");
            progressBtn2.classList.remove("js-active");
            currentSection = 0;
            updateSections();
        });

        updateSections();
    });
</script>
