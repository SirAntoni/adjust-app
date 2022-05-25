<?php  if($_SESSION['configuracion'] == 1){ ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Configuración</h4>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">

                <form id="formUpdateSettings">
                    <input type="hidden" name="option" value="update">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">Empresa</label>
                                <input type="text" name="company" id="company" class="form-control" placeholder="Nombre de la empresa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="document_number">Número de documento</label>
                                <input type="text" name="document_number" id="document_number" class="form-control"
                                    placeholder="Número de documento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Pais</label>
                                <input type="text" name="country" id="country" class="form-control" placeholder="Pais">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direction">Dirección</label>
                                <input type="text" name="direction" id="direction" class="form-control"
                                    placeholder="Dirección">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">Ciudad</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Ciudad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefono</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exchange_rate">Tipo de cambio</label>
                                <input type="text" name="exchange_rate" id="exchange_rate" class="form-control"
                                    placeholder="Tipo de cambio">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-right">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                        </div>

                    </div>

                </form>


            </div>
        </div>
    </div>
</div>
<?php }else{?>

<div class="d-flex justify-content-center align-items-center flex-wrap grid-margin p-5">
    <img src="assets/images/401.svg" width="100%" alt="security">
</div>


<?php } ?>
<!-- row -->