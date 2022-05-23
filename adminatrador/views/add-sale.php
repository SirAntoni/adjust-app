<?php  if($_SESSION['ventas'] == 1){ ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Nueva venta</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="main?module=sales" class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="arrow-left-circle"></i>
            Ir a ventas
        </a>
        <button type="button" data-toggle="modal" data-target="#modalAddNewArticles"
            class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0 mr-2"><i class="btn-icon-prepend mr-2"
                data-feather="plus-circle"></i> Agregar articulo</button>
    </div>

</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <input type="hidden" id="module" name="module" value="add-sale">
            <input type="hidden" id="edit" name="edit" value="edit-sale">
            <form id="formAddSales">
                <input type="hidden" name="option" value="save_sale">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="client_id" id="clients">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="voucher_type" id="vouchers">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" name="voucher_serie" id="voucher_serie" class="form-control"
                                    placeholder="Serie">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="number" name="voucher_number" id="voucher_number" class="form-control"
                                    placeholder="Número">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="tax"
                                            <?php echo ($_SESSION['tax'] == 1) ? 'checked="checked"' : ''; ?>
                                            class="form-check-input">
                                        Aplicar impuesto
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <input type="number" name="price_delivery" readonly="true" id="price_delivery"
                                    class="form-control" placeholder="Precio Delivery">
                                <input type="hidden" name="validate_delivery" id="validate_delivery" value="0">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" disabled="true" id="apply_delivery">Aplicar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="delivery" name="delivery" class="form-check-input">
                                        Delivery
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="contact" class="contacts">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="payment_method" class="payment_methods">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="table-responsive">
                                <table id="" class="table text-center table-bordered table-hover">
                                    <thead>
                                        <tr class="table-primary">
                                            <th width="10px">Accion</th>
                                            <th>Articulo</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartArticles">

                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit">Vender</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- row -->


<!-- Modals -->

<div class="modal fade" id="modalAddNewArticles" tabindex="-1" role="dialog" aria-labelledby="modalAddNewArticles"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="dataTableAddArticles" class="table table-stripe table-hover table-bordered w-100">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Articulo</th>
                                <th>Categoría</th>
                                <th>Marca</th>
                                <th>Detalle</th>
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

<div class="modal fade" id="modalEditPriceArticle" tabindex="-1" role="dialog" aria-labelledby="modalEditPriceArticle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Precio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditPriceArticle">
                <input type="hidden" name="id" id="edit_price_id">
                <input type="hidden" name="option" value="edit-price-article-sale">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="number" class="form-control" name="price" step="0.1" placeholder="Nuevo precio">
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
<?php }else{?>

<div class="d-flex justify-content-center align-items-center flex-wrap grid-margin p-5">
    <img src="assets/images/401.svg" width="100%" alt="security">
</div>


<?php } ?>