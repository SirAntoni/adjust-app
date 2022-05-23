<?php  if($_SESSION['reportes'] == 1){ ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Reporte de ventas</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="main?module=purchases" class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="arrow-left-circle"></i>
            Ir a ventas
        </a>
        <a href="main?module=purchases" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="shopping-cart"></i>
            Realizar venta
        </a>
    </div>

</div>
<!-- row -->
<div class="row">
    <div class="col-12 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Reporte Diario
            </div>
            <input type="hidden" id="module" name="module" value="add-purchase">
            <input type="hidden" id="edit" name="edit" value="edit-purchase">
            <form id="formAddPurchases">
                <input type="hidden" name="option" value="save_purchase">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group date datepicker" id="report-daily-datepicker">
                                    <input type="text" class="form-control"><span class="input-group-addon"><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-block btn-icon-text mb-2 mb-md-0 mr-2"><i
                                    class="btn-icon-prepend mr-2 mt-0 pt-0" data-feather="file-text"></i>Generar
                                reporte</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Reporte Mensual
            </div>
            <form id="formAddPurchases">
                <input type="hidden" name="option" value="save_purchase">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="month" id="month">
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="month" id="month">
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-block btn-icon-text mb-2 mb-md-0 mr-2"><i
                                    class="btn-icon-prepend mr-2 mt-0 pt-0" data-feather="file-text"></i>Generar
                                reporte</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Reporte Personalizado
            </div>
            <form id="formAddPurchases">
                <input type="hidden" name="option" value="save_purchase">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group date datepicker" id="report-custom-start-datepicker">
                                    <input type="text" class="form-control"><span class="input-group-addon"><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group date datepicker" id="report-custom-end-datepicker">
                                    <input type="text" class="form-control"><span class="input-group-addon"><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-block btn-icon-text mb-2 mb-md-0 mr-2"><i
                                    class="btn-icon-prepend mr-2 mt-0 pt-0" data-feather="file-text"></i>Generar
                                reporte</button>
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
                <input type="text" name="id" id="edit_price_id">
                <input type="text" name="option" value="edit-price-article-purchase">
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