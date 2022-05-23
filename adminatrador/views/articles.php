<?php  if($_SESSION['almacen'] == 1){ ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Articulos</h4>
    </div>
    <?php if($_SESSION['rol'] == 0){ ?>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalAddArticles"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Agregar articulo
        </button>
    </div>
    <?php } ?>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableArticles" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Articulo</th>
                                <th>Categoría</th>
                                <th>Detalle</th>
                                <th>Marca</th>
                                <th>Descripción</th>
                                <th>SKU</th>
                                <th>Stock</th>
                                <th>P. Compra</th>
                                <th>P. Venta</th>
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
<?php if($_SESSION['rol'] == 0){ ?>
<div class="modal fade" id="modalAddArticles" tabindex="-1" role="dialog" aria-labelledby="modalAddArticles"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddArticles">
                <div class="modal-body">
                    <input type="hidden" value="insert" name="option">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="category" class="categories">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="detail" class="form-control" placeholder="Detalle del articulo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="brand" class="brands">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" readonly="readonly" name="stock" class="form-control" placeholder="Stock inicial" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" step="0.1" name="purchase_price" class="form-control"
                                    placeholder="Precio compra">
                                <small class="ml-1 text-muted">Ingresar precio en dólares ($)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" step="0.1" name="sale_price" class="form-control" placeholder="Precio venta">
                                <small class="ml-1 text-muted">Ingresar precio referencial en soles (S/.)</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="description" class="form-control" cols="30" rows="5"
                                    placeholder="Descripción"></textarea>
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

<div class="modal fade" id="modalEditArticles" tabindex="-1" role="dialog" aria-labelledby="modalEditArticles"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditArticles">
                <div class="modal-body">
                    <input type="hidden" value="update" name="option">
                    <input type="hidden" class="id" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="category" class="categories" id="category">
                                    <option value="">Selecciona una categoía</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="detail" id="detail" class="form-control" placeholder="Detalle del articulo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="brand" class="brands" id="brand">
                                    <option value="">Selecciona una marca</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input readonly type="number" name="stock" id="stock" class="form-control" placeholder="Stock inicial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" step="0.1" name="purchase_price" id="purchase_price" class="form-control"
                                    placeholder="Precio compra">
                                    <small>Ingresar precio en dolares ($)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" step="0.1" name="sale_price" id="sale_price" class="form-control" placeholder="Precio venta">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5"
                                    placeholder="Descripción"></textarea>
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

<div class="modal fade" id="modalDeleteArticles" tabindex="-1" role="dialog" aria-labelledby="modalDeleteArticles"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formDeleteArticles">
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

<?php } ?>
<?php }else{?>

<div class="d-flex justify-content-center align-items-center flex-wrap grid-margin p-5">
    <img src="assets/images/401.svg" width="100%" alt="security">
</div>


<?php } ?>