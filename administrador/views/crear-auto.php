<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Autos</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalAddCars"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Agregar auto
        </button>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableCars" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Nombre</th>
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

<div class="modal fade" id="modalAddCars" tabindex="-1" role="dialog" aria-labelledby="modalAddCars" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Auto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddCars">
                <div class="modal-body">
                    <input type="hidden" value="insert" name="option">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="mark_id" id="brands"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="type_id" id="types"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="model_id" id="models"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="anio_id" id="anios"></select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 1 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen1" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 2 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen2" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 3 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen3" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 4 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen4" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 5 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen5" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 6 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen6" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 7 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen7" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 8 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen8" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 9 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen9" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 10 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen10" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 11 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen11" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen 12 (Recomendado 960px × 640px)</label>
                                <input type="file" name="imagen12" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
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

<div class="modal fade" id="modalDeleteCars" tabindex="-1" role="dialog" aria-labelledby="modalDeleteCars"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formDeleteCars">
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