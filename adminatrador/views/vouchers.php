<?php  if($_SESSION['configuracion'] == 1){ ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Comprobantes</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalAddVouchers"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Agregar comprobante
        </button>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableVouchers" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Serie</th>
                                <th>Número</th>
                                <th width="10px">Estado</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th width="10px">Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->


<!-- Modals -->

<div class="modal fade" id="modalAddVouchers" tabindex="-1" role="dialog" aria-labelledby="modalAddVouchers"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Comprobante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddVouchers">
                <div class="modal-body">
                    <input type="hidden" value="insert" name="option">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="serie" class="form-control" placeholder="Serie">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="number" class="form-control" placeholder="Número">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditVouchers" tabindex="-1" role="dialog" aria-labelledby="modalEditVouchers"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Comprobante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditVouchers">
                <div class="modal-body">
                    <input type="hidden" value="update" name="option">
                    <input type="hidden" class="id" name="id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="serie" id="serie" class="form-control" placeholder="Serie">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="number" id="number" class="form-control" placeholder="Número">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDeleteVouchers" tabindex="-1" role="dialog" aria-labelledby="modalDeleteVouchers"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formDeleteVouchers">
                <div class="modal-body">
                    <input type="hidden" value="delete" name="option">
                    <input type="hidden" class="id" name="id">
                    <div class="d-flex justify-content-center align-items-center p-4">
                        <div class="mr-3">
                            <i class="fas fa-question-circle" style="color:#d03433; font-size:5em;"></i>
                        </div>
                        <div class="modal-icon">
                            <h4>Eliminar</h4>
                            <p>¿Estás seguro de querer borrar el registro?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }else{?>

<div class="d-flex justify-content-center align-items-center flex-wrap grid-margin p-5">
    <img src="assets/images/401.svg" width="100%" alt="security">
</div>


<?php } ?>