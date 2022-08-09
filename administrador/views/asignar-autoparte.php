<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Asignar autopartes</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalAddPartToCategory"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Asignar autoparte
        </button>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTablePartToCategory" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Categoria</th>
                                <th>Accesorio</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th>Whatsapp</th>
                                <th>Messenger</th>
                                <th>SRC</th>
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

<div class="modal fade" id="modalAddPartToCategory" tabindex="-1" role="dialog" aria-labelledby="modalAddPartToCategory"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar autoparte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddPartToCategory">
                <div class="modal-body">
                    <input type="hidden" value="insert" name="option">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="cars" name="mtma_id" class="cars"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="mtmac_id" class="categories">
                                    <option value="">Selecciona un auto</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="accesorio" class="form-control" placeholder="Accesorio">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="stock">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Disponible">Disponible</option>
                                    <option value="No Disponible">No Disponible</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="instagram" class="form-control" placeholder="Instagram">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="whatsapp" class="form-control" placeholder="Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="messenger" class="form-control" placeholder="Messenger">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Preview (Recomendado 960px × 640px)</label>
                                <input type="file" name="preview" class="file-upload-default">
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
                                <label>Imagen1 (Recomendado 960px × 640px)</label>
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
                                <label>Imagen2 (Recomendado 960px × 640px)</label>
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
                                <label>Imagen3 (Recomendado 960px × 640px)</label>
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
                                <label>Imagen4 (Recomendado 960px × 640px)</label>
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
                                <label>Imagen6 (Recomendado 960px × 640px)</label>
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

<div class="modal fade" id="modalDeletePartToCategory" tabindex="-1" role="dialog"
    aria-labelledby="modalDeletePartToCategory" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formDeletePartToCategory">
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